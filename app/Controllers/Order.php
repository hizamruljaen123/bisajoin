<?php

namespace App\Controllers;

use App\Models\TemplateModel;
use App\Models\WeddingOrderModel;
use App\Models\EngagementOrderModel;
use App\Models\BirthdayOrderModel;
use App\Models\GraduationOrderModel;
use App\Models\PaymentModel;
use App\Models\TelegramLogModel;

class Order extends BaseController
{
    protected $templateModel;
    protected $weddingOrderModel;
    protected $engagementOrderModel;
    protected $birthdayOrderModel;
    protected $graduationOrderModel;
    protected $paymentModel;
    protected $telegramLogModel;

    public function __construct()
    {
        $this->templateModel = new TemplateModel();
        $this->weddingOrderModel = new WeddingOrderModel();
        $this->engagementOrderModel = new EngagementOrderModel();
        $this->birthdayOrderModel = new BirthdayOrderModel();
        $this->graduationOrderModel = new GraduationOrderModel();
        $this->paymentModel = new PaymentModel();
        $this->telegramLogModel = new TelegramLogModel();
    }

    public function process()
    {
        $type = $this->request->getPost('type');
        $templateId = $this->request->getPost('template_id');

        if (!in_array($type, ['wedding', 'engagement', 'birthday', 'graduation'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid event type'
            ]);
        }

        // Generate unique order code
        $orderCode = $this->templateModel->generateOrderCode();

        // Prepare order data based on type
        $orderData = [
            'code' => $orderCode,
            'template_id' => $templateId,
            'status' => 'pending'
        ];

        // Add type-specific fields
        switch ($type) {
            case 'wedding':
                $orderData['groom_name'] = $this->request->getPost('groom_name');
                $orderData['bride_name'] = $this->request->getPost('bride_name');
                $orderData['wedding_date'] = $this->request->getPost('wedding_date');
                $orderData['wedding_time'] = $this->request->getPost('wedding_time');
                $orderData['location'] = $this->request->getPost('location');
                $orderData['contact'] = $this->request->getPost('contact');
                
                // Handle image upload
                $image = $this->request->getFile('image');
                if ($image && $image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move('uploads/images', $imageName);
                    $orderData['image_url'] = 'uploads/images/' . $imageName;
                }
                
                $this->weddingOrderModel->insert($orderData);
                break;

            case 'engagement':
                $orderData['man_name'] = $this->request->getPost('man_name');
                $orderData['woman_name'] = $this->request->getPost('woman_name');
                $orderData['engagement_date'] = $this->request->getPost('engagement_date');
                $orderData['engagement_time'] = $this->request->getPost('engagement_time');
                $orderData['location'] = $this->request->getPost('location');
                $orderData['contact'] = $this->request->getPost('contact');
                
                // Handle image upload
                $image = $this->request->getFile('image');
                if ($image && $image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move('uploads/images', $imageName);
                    $orderData['image_url'] = 'uploads/images/' . $imageName;
                }
                
                $this->engagementOrderModel->insert($orderData);
                break;

            case 'birthday':
                $orderData['birthday_person_name'] = $this->request->getPost('birthday_person_name');
                $orderData['age'] = $this->request->getPost('age');
                $orderData['birthday_date'] = $this->request->getPost('birthday_date');
                $orderData['birthday_time'] = $this->request->getPost('birthday_time');
                $orderData['location'] = $this->request->getPost('location');
                $orderData['contact'] = $this->request->getPost('contact');
                
                // Handle image upload
                $image = $this->request->getFile('image');
                if ($image && $image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move('uploads/images', $imageName);
                    $orderData['image_url'] = 'uploads/images/' . $imageName;
                }
                
                $this->birthdayOrderModel->insert($orderData);
                break;

            case 'graduation':
                $orderData['graduate_name'] = $this->request->getPost('graduate_name');
                $orderData['faculty'] = $this->request->getPost('faculty');
                $orderData['graduation_date'] = $this->request->getPost('graduation_date');
                $orderData['graduation_time'] = $this->request->getPost('graduation_time');
                $orderData['location'] = $this->request->getPost('location');
                $orderData['contact'] = $this->request->getPost('contact');
                
                // Handle image upload
                $image = $this->request->getFile('image');
                if ($image && $image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move('uploads/images', $imageName);
                    $orderData['image_url'] = 'uploads/images/' . $imageName;
                }
                
                $this->graduationOrderModel->insert($orderData);
                break;
        }

        // Create payment record
        $paymentData = [
            'order_code' => $orderCode,
            'amount' => 150000, // Fixed amount for now
            'method' => 'transfer',
            'status' => 'unpaid'
        ];
        $this->paymentModel->insert($paymentData);

        // Send notification to Telegram
        $this->sendTelegramNotification($orderCode, $type);

        return $this->response->setJSON([
            'success' => true,
            'order_code' => $orderCode,
            'message' => 'Order created successfully'
        ]);
    }

    public function invoice($orderCode)
    {
        // Get order details based on code
        $order = null;
        $orderType = null;
        
        // Try to find order in each table
        $order = $this->weddingOrderModel->getOrderByCode($orderCode);
        if ($order) {
            $orderType = 'wedding';
        } else {
            $order = $this->engagementOrderModel->getOrderByCode($orderCode);
            if ($order) {
                $orderType = 'engagement';
            } else {
                $order = $this->birthdayOrderModel->getOrderByCode($orderCode);
                if ($order) {
                    $orderType = 'birthday';
                } else {
                    $order = $this->graduationOrderModel->getOrderByCode($orderCode);
                    if ($order) {
                        $orderType = 'graduation';
                    }
                }
            }
        }

        if (!$order) {
            // Fallback: render a placeholder invoice so the page is always available
            $orderType = 'unknown';
            $order = [
                'code' => $orderCode,
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'pending',
                'contact' => '-',
            ];
        }

        // Get payment details
        $payment = $this->paymentModel->getPaymentByOrderCode($orderCode);
        if (!$payment) {
            // Provide default payment info for placeholder invoices
            $payment = [
                'amount' => 150000,
                'method' => 'transfer',
                'status' => 'unpaid',
            ];
        }

        $data = [
            'title' => 'Invoice - ' . $orderCode,
            'order' => $order,
            'order_type' => $orderType,
            'payment' => $payment,
            'page' => 'invoice'
        ];

        return view('invoice/index', $data);
    }

    private function sendTelegramNotification($orderCode, $type)
    {
        $message = "🎉 New Order Received!\n\n";
        $message .= "Order Code: {$orderCode}\n";
        $message .= "Type: " . ucfirst($type) . "\n";
        $message .= "Status: Pending\n";
        $message .= "Time: " . date('Y-m-d H:i:s') . "\n\n";
        $message .= "Please check dashboard for details.";

        // Log the message
        $logData = [
            'order_code' => $orderCode,
            'message' => $message
        ];
        $this->telegramLogModel->insert($logData);

        // TODO: Implement actual Telegram Bot API call
        // For now, just log the message
    }
}