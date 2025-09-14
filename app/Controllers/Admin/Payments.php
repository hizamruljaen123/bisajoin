<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\WeddingOrderModel;
use App\Models\EngagementOrderModel;
use App\Models\BirthdayOrderModel;
use App\Models\GraduationOrderModel;

class Payments extends BaseController
{
    protected $paymentModel;
    protected $weddingOrderModel;
    protected $engagementOrderModel;
    protected $birthdayOrderModel;
    protected $graduationOrderModel;

    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
        $this->weddingOrderModel = new WeddingOrderModel();
        $this->engagementOrderModel = new EngagementOrderModel();
        $this->birthdayOrderModel = new BirthdayOrderModel();
        $this->graduationOrderModel = new GraduationOrderModel();
    }

    public function index()
    {
        $status = $this->request->getGet('status');
        
        $payments = $status ? 
            $this->paymentModel->getPaymentsByStatus($status) : 
            $this->paymentModel->getRecentPayments();

        // Get order details for each payment
        foreach ($payments as &$payment) {
            $order = null;
            $orderType = null;
            
            // Try to find order in each table
            $order = $this->weddingOrderModel->getOrderByCode($payment['order_code']);
            if ($order) {
                $orderType = 'wedding';
            } else {
                $order = $this->engagementOrderModel->getOrderByCode($payment['order_code']);
                if ($order) {
                    $orderType = 'engagement';
                } else {
                    $order = $this->birthdayOrderModel->getOrderByCode($payment['order_code']);
                    if ($order) {
                        $orderType = 'birthday';
                    } else {
                        $order = $this->graduationOrderModel->getOrderByCode($payment['order_code']);
                        if ($order) {
                            $orderType = 'graduation';
                        }
                    }
                }
            }
            
            $payment['order'] = $order;
            $payment['order_type'] = $orderType;
        }

        $data = [
            'title' => 'Manage Payments',
            'payments' => $payments,
            'status_filter' => $status,
            'page' => 'payments'
        ];

        return view('admin/payments/index', $data);
    }

    public function show($id)
    {
        $payment = $this->paymentModel->find($id);
        
        if (!$payment) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Get order details
        $order = null;
        $orderType = null;
        
        // Try to find order in each table
        $order = $this->weddingOrderModel->getOrderByCode($payment['order_code']);
        if ($order) {
            $orderType = 'wedding';
        } else {
            $order = $this->engagementOrderModel->getOrderByCode($payment['order_code']);
            if ($order) {
                $orderType = 'engagement';
            } else {
                $order = $this->birthdayOrderModel->getOrderByCode($payment['order_code']);
                if ($order) {
                    $orderType = 'birthday';
                } else {
                    $order = $this->graduationOrderModel->getOrderByCode($payment['order_code']);
                    if ($order) {
                        $orderType = 'graduation';
                    }
                }
            }
        }

        $data = [
            'title' => 'Payment Details - ' . $payment['order_code'],
            'payment' => $payment,
            'order' => $order,
            'order_type' => $orderType,
            'page' => 'payments'
        ];

        return view('admin/payments/show', $data);
    }

    public function verify($id)
    {
        $payment = $this->paymentModel->find($id);
        
        if (!$payment) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Payment not found'
            ]);
        }

        // Update payment status to verified
        $this->paymentModel->updatePaymentStatus(
            $payment['order_code'], 
            'verified', 
            date('Y-m-d H:i:s')
        );

        // Update order status to active
        $this->updateOrderStatus($payment['order_code'], 'active');

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Payment verified successfully'
        ]);
    }

    public function reject($id)
    {
        $payment = $this->paymentModel->find($id);
        
        if (!$payment) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Payment not found'
            ]);
        }

        // Update payment status to rejected (we'll use 'unpaid' for rejection)
        $this->paymentModel->updatePaymentStatus($payment['order_code'], 'unpaid');

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Payment rejected successfully'
        ]);
    }

    private function updateOrderStatus($orderCode, $status)
    {
        $order = null;
        $model = null;
        
        // Find order and determine which model to use
        $order = $this->weddingOrderModel->getOrderByCode($orderCode);
        if ($order) {
            $model = $this->weddingOrderModel;
        } else {
            $order = $this->engagementOrderModel->getOrderByCode($orderCode);
            if ($order) {
                $model = $this->engagementOrderModel;
            } else {
                $order = $this->birthdayOrderModel->getOrderByCode($orderCode);
                if ($order) {
                    $model = $this->birthdayOrderModel;
                } else {
                    $order = $this->graduationOrderModel->getOrderByCode($orderCode);
                    if ($order) {
                        $model = $this->graduationOrderModel;
                    }
                }
            }
        }

        if ($model) {
            $model->updateStatus($orderCode, $status);
        }
    }

    public function getStatistics()
    {
        $stats = $this->paymentModel->getPaymentStatistics();
        $revenue = $this->paymentModel->getTotalRevenue();

        return $this->response->setJSON([
            'statistics' => $stats,
            'revenue' => $revenue
        ]);
    }
}