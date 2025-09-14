<?php

namespace App\Controllers;

use App\Models\WeddingOrderModel;
use App\Models\EngagementOrderModel;
use App\Models\BirthdayOrderModel;
use App\Models\GraduationOrderModel;
use App\Models\TemplateModel;
use App\Models\PaymentModel;

class Invitation extends BaseController
{
    protected $weddingOrderModel;
    protected $engagementOrderModel;
    protected $birthdayOrderModel;
    protected $graduationOrderModel;
    protected $templateModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->weddingOrderModel = new WeddingOrderModel();
        $this->engagementOrderModel = new EngagementOrderModel();
        $this->birthdayOrderModel = new BirthdayOrderModel();
        $this->graduationOrderModel = new GraduationOrderModel();
        $this->templateModel = new TemplateModel();
        $this->paymentModel = new PaymentModel();
    }

    public function show(string $orderCode)
    {
        // Find order across tables for non-wedding types
        $order = $this->engagementOrderModel->getOrderByCode($orderCode)
              ?? $this->birthdayOrderModel->getOrderByCode($orderCode)
              ?? $this->graduationOrderModel->getOrderByCode($orderCode);

        if (! $order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // For non-wedding invitations, we assume they are active for now
        // Further logic can be added here for other types if needed
        if (($order['status'] ?? 'pending') !== 'active') {
            return view('invitation/not_active', [
                'title' => 'Invitation Not Active',
                'order_code' => $orderCode,
            ]);
        }

        // Fetch template to get content_structure
        $template = $this->templateModel->find($order['template_id']);
        $content = [];
        if ($template && !empty($template['content_structure'])) {
            $decoded = json_decode($template['content_structure'], true);
            if (is_array($decoded)) {
                $content = $decoded;
            }
        }

        // Determine view based on order type (e.g., engagement, birthday, graduation)
        // For now, a generic view or specific views can be implemented here
        $view = 'invitation/default_invitation'; // A generic view for other types

        // Example: if ($orderType === 'engagement') { $view = 'invitation/engagement_template/engagement_1'; }

        return view($view, [
            'title' => 'Invitation - ' . ($order['name'] ?? 'Guest'), // Adjust title based on order type
            'order' => $order,
            'template' => $template,
            'content' => $content,
        ]);
    }
}
