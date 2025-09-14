<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WeddingOrderModel;
use App\Models\EngagementOrderModel;
use App\Models\BirthdayOrderModel;
use App\Models\GraduationOrderModel;
use App\Models\PaymentModel;

class Orders extends BaseController
{
    protected $weddingOrderModel;
    protected $engagementOrderModel;
    protected $birthdayOrderModel;
    protected $graduationOrderModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->weddingOrderModel = new WeddingOrderModel();
        $this->engagementOrderModel = new EngagementOrderModel();
        $this->birthdayOrderModel = new BirthdayOrderModel();
        $this->graduationOrderModel = new GraduationOrderModel();
        $this->paymentModel = new PaymentModel();
    }

    public function index()
    {
        $type = $this->request->getGet('type');
        $status = $this->request->getGet('status');
        
        $allOrders = [];
        
        // Get orders based on filters
        if ($type) {
            switch ($type) {
                case 'wedding':
                    $orders = $status ? 
                        $this->weddingOrderModel->getOrdersByStatus($status) : 
                        $this->weddingOrderModel->getOrdersWithTemplate();
                    break;
                case 'engagement':
                    $orders = $status ? 
                        $this->engagementOrderModel->getOrdersByStatus($status) : 
                        $this->engagementOrderModel->getOrdersWithTemplate();
                    break;
                case 'birthday':
                    $orders = $status ? 
                        $this->birthdayOrderModel->getOrdersByStatus($status) : 
                        $this->birthdayOrderModel->getOrdersWithTemplate();
                    break;
                case 'graduation':
                    $orders = $status ? 
                        $this->graduationOrderModel->getOrdersByStatus($status) : 
                        $this->graduationOrderModel->getOrdersWithTemplate();
                    break;
                default:
                    $orders = [];
            }
            
            // Add type identifier
            foreach ($orders as &$order) {
                $order['type'] = $type;
            }
            $allOrders = $orders;
        } else {
            // Get all orders
            $weddingOrders = $this->weddingOrderModel->getOrdersWithTemplate($status);
            $engagementOrders = $this->engagementOrderModel->getOrdersWithTemplate($status);
            $birthdayOrders = $this->birthdayOrderModel->getOrdersWithTemplate($status);
            $graduationOrders = $this->graduationOrderModel->getOrdersWithTemplate($status);
            
            // Add type identifiers
            foreach ($weddingOrders as &$order) {
                $order['type'] = 'wedding';
            }
            foreach ($engagementOrders as &$order) {
                $order['type'] = 'engagement';
            }
            foreach ($birthdayOrders as &$order) {
                $order['type'] = 'birthday';
            }
            foreach ($graduationOrders as &$order) {
                $order['type'] = 'graduation';
            }
            
            $allOrders = array_merge($weddingOrders, $engagementOrders, $birthdayOrders, $graduationOrders);
            
            // Sort by created_at
            usort($allOrders, function($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });
        }

        $data = [
            'title' => 'Manage Orders',
            'orders' => $allOrders,
            'type_filter' => $type,
            'status_filter' => $status,
            'page' => 'orders'
        ];

        return view('admin/orders/index', $data);
    }

    public function show($orderCode)
    {
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
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Get payment details
        $payment = $this->paymentModel->getPaymentByOrderCode($orderCode);

        $data = [
            'title' => 'Order Details - ' . $orderCode,
            'order' => $order,
            'order_type' => $orderType,
            'payment' => $payment,
            'page' => 'orders'
        ];

        return view('admin/orders/show', $data);
    }

    public function updateStatus($orderCode = null)
    {
        $status = $this->request->getPost('status');
        // Support route without parameter: get orderCode from POST when missing
        if ($orderCode === null) {
            $orderCode = $this->request->getPost('orderCode');
        }

        if (empty($orderCode)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing orderCode'
            ]);
        }
        
        if (!in_array($status, ['pending', 'paid', 'active'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid status'
            ]);
        }

        $order = null;
        $orderType = null;
        $model = null;
        
        // Find order and determine which model to use
        $order = $this->weddingOrderModel->getOrderByCode($orderCode);
        if ($order) {
            $orderType = 'wedding';
            $model = $this->weddingOrderModel;
        } else {
            $order = $this->engagementOrderModel->getOrderByCode($orderCode);
            if ($order) {
                $orderType = 'engagement';
                $model = $this->engagementOrderModel;
            } else {
                $order = $this->birthdayOrderModel->getOrderByCode($orderCode);
                if ($order) {
                    $orderType = 'birthday';
                    $model = $this->birthdayOrderModel;
                } else {
                    $order = $this->graduationOrderModel->getOrderByCode($orderCode);
                    if ($order) {
                        $orderType = 'graduation';
                        $model = $this->graduationOrderModel;
                    }
                }
            }
        }

        if (!$order) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Order not found'
            ]);
        }

        // Update order status
        $model->updateStatus($orderCode, $status);

        // If status is 'paid', update payment status
        if ($status === 'paid') {
            $this->paymentModel->updatePaymentStatus($orderCode, 'paid', date('Y-m-d H:i:s'));
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Order status updated successfully'
        ]);
    }

    public function delete($orderCode)
    {
        $order = null;
        $orderType = null;
        $model = null;
        
        // Find order and determine which model to use
        $order = $this->weddingOrderModel->getOrderByCode($orderCode);
        if ($order) {
            $orderType = 'wedding';
            $model = $this->weddingOrderModel;
        } else {
            $order = $this->engagementOrderModel->getOrderByCode($orderCode);
            if ($order) {
                $orderType = 'engagement';
                $model = $this->engagementOrderModel;
            } else {
                $order = $this->birthdayOrderModel->getOrderByCode($orderCode);
                if ($order) {
                    $orderType = 'birthday';
                    $model = $this->birthdayOrderModel;
                } else {
                    $order = $this->graduationOrderModel->getOrderByCode($orderCode);
                    if ($order) {
                        $orderType = 'graduation';
                        $model = $this->graduationOrderModel;
                    }
                }
            }
        }

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Delete order
        $model->where('code', $orderCode)->delete();

        // Delete payment record if exists
        $this->paymentModel->where('order_code', $orderCode)->delete();

        return redirect()->to('/admin/orders')->with('success', 'Order deleted successfully');
    }
}