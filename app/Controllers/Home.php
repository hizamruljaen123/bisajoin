<?php

namespace App\Controllers;

use App\Models\TemplateModel;

class Home extends BaseController
{
    protected $templateModel;

    public function __construct()
    {
        $this->templateModel = new TemplateModel();
    }

    public function index()
    {
        // Get all templates grouped by type
        $templates = [
            'wedding' => $this->templateModel->getTemplatesByType('wedding'),
            'engagement' => $this->templateModel->getTemplatesByType('engagement'),
            'birthday' => $this->templateModel->getTemplatesByType('birthday'),
            'graduation' => $this->templateModel->getTemplatesByType('graduation'),
        ];

        $data = [
            'title' => 'Platform Undangan Online Otomatis',
            'templates' => $templates,
            'page' => 'home'
        ];

        return view('home/index', $data);
    }

    public function template($type)
    {
        if (!in_array($type, ['wedding', 'engagement', 'birthday', 'graduation'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $templates = $this->templateModel->getTemplatesByType($type);
        
        $data = [
            'title' => ucfirst($type) . ' Templates',
            'type' => $type,
            'templates' => $templates,
            'page' => 'template'
        ];

        return view('template/index', $data);
    }

    public function order($type, $templateId)
    {
        if (!in_array($type, ['wedding', 'engagement', 'birthday', 'graduation'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $template = $this->templateModel->getTemplateById($templateId);
        
        if (!$template || $template['type'] !== $type) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Order ' . ucfirst($type) . ' Invitation',
            'type' => $type,
            'template' => $template,
            'page' => 'order'
        ];

        return view('order/index', $data);
    }
}
