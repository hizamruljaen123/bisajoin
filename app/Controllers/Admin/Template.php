<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TemplateModel;
use CodeIgniter\Files\File;

class Template extends BaseController
{
    protected $templateModel;

    public function __construct()
    {
        $this->templateModel = new TemplateModel();
    }

    public function index()
    {
        $templates = $this->templateModel->findAll();
        
        $data = [
            'title' => 'Manage Templates',
            'templates' => $templates,
            'page' => 'templates'
        ];

        return view('admin/template/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New Template',
            'page' => 'templates'
        ];

        return view('admin/template/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[100]',
            'type' => 'required|in_list[wedding,engagement,birthday,graduation]',
            'preview_image' => 'uploaded[preview_image]|max_size[preview_image,1024]|is_image[preview_image]',
            'content_structure' => 'permit_empty'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle preview image upload
        $previewImage = $this->request->getFile('preview_image');
        $previewImageUrl = null;
        
        if ($previewImage && $previewImage->isValid() && !$previewImage->hasMoved()) {
            $imageName = $previewImage->getRandomName();
            $previewImage->move('uploads/templates', $imageName);
            $previewImageUrl = 'uploads/templates/' . $imageName;
        }

        $templateData = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'preview_url' => $previewImageUrl,
            'content_structure' => $this->request->getPost('content_structure')
        ];

        $this->templateModel->insert($templateData);

        return redirect()->to('/admin/templates')->with('success', 'Template created successfully');
    }

    public function edit($id)
    {
        $template = $this->templateModel->find($id);
        
        if (!$template) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Template',
            'template' => $template,
            'page' => 'templates'
        ];

        return view('admin/template/edit', $data);
    }

    public function update($id)
    {
        $template = $this->templateModel->find($id);
        
        if (!$template) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[100]',
            'type' => 'required|in_list[wedding,engagement,birthday,graduation]',
            'preview_image' => 'permit_empty|max_size[preview_image,1024]|is_image[preview_image]',
            'content_structure' => 'permit_empty'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle preview image upload
        $previewImage = $this->request->getFile('preview_image');
        $previewImageUrl = $template['preview_url'];
        
        if ($previewImage && $previewImage->isValid() && !$previewImage->hasMoved()) {
            // Delete old image if exists
            if ($template['preview_url'] && file_exists($template['preview_url'])) {
                unlink($template['preview_url']);
            }
            
            $imageName = $previewImage->getRandomName();
            $previewImage->move('uploads/templates', $imageName);
            $previewImageUrl = 'uploads/templates/' . $imageName;
        }

        $templateData = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'preview_url' => $previewImageUrl,
            'content_structure' => $this->request->getPost('content_structure')
        ];

        $this->templateModel->update($id, $templateData);

        return redirect()->to('/admin/templates')->with('success', 'Template updated successfully');
    }

    public function delete($id)
    {
        $template = $this->templateModel->find($id);
        
        if (!$template) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Delete preview image if exists
        if ($template['preview_url'] && file_exists($template['preview_url'])) {
            unlink($template['preview_url']);
        }

        $this->templateModel->delete($id);

        return redirect()->to('/admin/templates')->with('success', 'Template deleted successfully');
    }

    public function preview($id)
    {
        $template = $this->templateModel->find($id);
        
        if (!$template) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Parse content_structure
        $content = [];
        if (!empty($template['content_structure'])) {
            $decoded = json_decode($template['content_structure'], true);
            if (is_array($decoded)) {
                $content = $decoded;
            }
        }

        // Generate dummy data per type
        $now = time();
        if ($template['type'] === 'wedding') {
            $order = [
                'code' => 'PREVIEW-' . strtoupper(substr(md5($id . $now), 0, 6)),
                'template_id' => $template['id'],
                'groom_name' => 'Alif Ramadhan',
                'bride_name' => 'Nadia Kirana',
                'wedding_date' => date('Y-m-d', strtotime('+14 days', $now)),
                'wedding_time' => '10:00 - 12:00 WIB',
                'location' => "Grand Hall Jakarta\nJl. Contoh Raya No. 123, Jakarta",
                'image_url' => 'https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg',
                'contact' => '+62 812-3456-7890',
                'status' => 'active', // ensure preview is visible
            ];

            // Use elegant wedding invitation view by default for preview
            $view = is_file(APPPATH . 'Views/invitation/wedding_template/wedding_2.php')
                ? 'invitation/wedding_template/wedding_2'
                : 'invitation/wedding_template/wedding_2';

            return view($view, [
                'title' => 'Template Preview - ' . ($template['name'] ?? 'Wedding'),
                'order' => $order,
                'template' => $template,
                'content' => $content,
            ]);
        }

        // Other types can be added similarly (engagement, birthday, graduation)
        // For now return a simple message for unsupported types in preview
        return view('admin/template', [
            'title' => 'Template Preview',
            'content' => '<div class="alert alert-info">Preview for this template type is not implemented yet.</div>'
        ]);
    }
}