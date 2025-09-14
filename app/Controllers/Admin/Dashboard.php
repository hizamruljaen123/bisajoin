<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WeddingOrderModel;
use App\Models\EngagementOrderModel;
use App\Models\BirthdayOrderModel;
use App\Models\GraduationOrderModel;
use App\Models\PaymentModel;
use App\Models\TelegramLogModel;

class Dashboard extends BaseController
{
    protected $weddingOrderModel;
    protected $engagementOrderModel;
    protected $birthdayOrderModel;
    protected $graduationOrderModel;
    protected $paymentModel;
    protected $telegramLogModel;

    public function __construct()
    {
        $this->weddingOrderModel = new WeddingOrderModel();
        $this->engagementOrderModel = new EngagementOrderModel();
        $this->birthdayOrderModel = new BirthdayOrderModel();
        $this->graduationOrderModel = new GraduationOrderModel();
        $this->paymentModel = new PaymentModel();
        $this->telegramLogModel = new TelegramLogModel();
    }

    public function index()
    {
        // Get order statistics
        $weddingStats = $this->getOrderStatistics($this->weddingOrderModel);
        $engagementStats = $this->getOrderStatistics($this->engagementOrderModel);
        $birthdayStats = $this->getOrderStatistics($this->birthdayOrderModel);
        $graduationStats = $this->getOrderStatistics($this->graduationOrderModel);

        // Get payment statistics
        $paymentStats = $this->paymentModel->getPaymentStatistics();
        $totalRevenue = $this->paymentModel->getTotalRevenue();

        // Get recent orders
        $recentOrders = $this->getRecentOrders();

        // Get recent notifications
        $recentNotifications = $this->telegramLogModel->getRecentLogs(10);

        $data = [
            'title' => 'Admin Dashboard',
            'wedding_stats' => $weddingStats,
            'engagement_stats' => $engagementStats,
            'birthday_stats' => $birthdayStats,
            'graduation_stats' => $graduationStats,
            'payment_stats' => $paymentStats,
            'total_revenue' => $totalRevenue,
            'recent_orders' => $recentOrders,
            'recent_notifications' => $recentNotifications,
            'page' => 'dashboard'
        ];

        return view('admin/dashboard/index', $data);
    }

    private function getOrderStatistics($model)
    {
        return [
            'pending' => $model->getOrdersByStatus('pending'),
            'paid' => $model->getOrdersByStatus('paid'),
            'active' => $model->getOrdersByStatus('active'),
            'total' => $model->countAllResults()
        ];
    }

    private function getRecentOrders()
    {
        $allOrders = [];
        
        // Get recent orders from all tables
        $weddingOrders = $this->weddingOrderModel->getOrdersWithTemplate(null, 5);
        $engagementOrders = $this->engagementOrderModel->getOrdersWithTemplate(null, 5);
        $birthdayOrders = $this->birthdayOrderModel->getOrdersWithTemplate(null, 5);
        $graduationOrders = $this->graduationOrderModel->getOrdersWithTemplate(null, 5);

        // Combine all orders
        $allOrders = array_merge($weddingOrders, $engagementOrders, $birthdayOrders, $graduationOrders);

        // Sort by created_at
        usort($allOrders, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        return array_slice($allOrders, 0, 10);
    }

    public function getChartData()
    {
        // Get orders by date for the last 7 days
        $last7Days = [];
        $orderCounts = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-{$i} days"));
            $last7Days[] = $date;
            
            $count = 0;
            $count += $this->weddingOrderModel->where('DATE(created_at)', $date)->countAllResults();
            $count += $this->engagementOrderModel->where('DATE(created_at)', $date)->countAllResults();
            $count += $this->birthdayOrderModel->where('DATE(created_at)', $date)->countAllResults();
            $count += $this->graduationOrderModel->where('DATE(created_at)', $date)->countAllResults();
            
            $orderCounts[] = $count;
        }

        return $this->response->setJSON([
            'dates' => $last7Days,
            'counts' => $orderCounts
        ]);
    }
}