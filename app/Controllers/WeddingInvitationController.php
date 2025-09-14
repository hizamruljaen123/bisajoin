<?php

namespace App\Controllers;

use App\Models\WeddingOrderModel;
use App\Models\TemplateModel; // Assuming we still need this for template details

class WeddingInvitationController extends BaseController
{
    protected $weddingOrderModel;
    protected $templateModel;

    public function __construct()
    {
        $this->weddingOrderModel = new WeddingOrderModel();
        $this->templateModel = new TemplateModel();
    }

    public function showJoined(string $templateName, string $orderCode)
    {
        $order = $this->weddingOrderModel->getWeddingOrderWithPayment($orderCode);

        // Construct the view path dynamically
        $viewPath = 'invitation/wedding_template/' . $templateName;

        // Check if the view file exists
        if (!is_file(APPPATH . 'Views/' . $viewPath . '.php')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Template view not found: ' . $viewPath);
        }

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Fetch template to get content_structure if needed, similar to Invitation controller
        $template = $this->templateModel->find($order['template_id']);
        $content = [];
        if ($template && !empty($template['content_structure'])) {
            $decoded = json_decode($template['content_structure'], true);
            if (is_array($decoded)) {
                $content = $decoded;
            }
        }

        // Check payment status from the joined data
        if (($order['wedding_order_status'] ?? 'pending') !== 'active' || ($order['payment_status'] ?? 'unpaid') !== 'active') {
            return view('invitation/not_active', [
                'title' => 'Invitation Not Active',
                'order_code' => $orderCode,
            ]);
        }

        return view($viewPath, [
            'title' => 'Wedding Invitation - ' . ($order['groom_name'] ?? '') . ' & ' . ($order['bride_name'] ?? ''),
            'order' => $order, // Pass the joined data as 'order'
            'template' => $template,
            'content' => $content,
        ]);
    }
}