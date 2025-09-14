<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TelegramLogModel;

class Notifications extends BaseController
{
    protected $telegramLogModel;

    public function __construct()
    {
        $this->telegramLogModel = new TelegramLogModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $dateFrom = $this->request->getGet('date_from');
        $dateTo = $this->request->getGet('date_to');
        
        $logs = [];
        
        if ($search) {
            $logs = $this->telegramLogModel->searchLogs($search);
        } elseif ($dateFrom && $dateTo) {
            $logs = $this->telegramLogModel->getLogsByDateRange($dateFrom, $dateTo);
        } else {
            $logs = $this->telegramLogModel->getRecentLogs(50);
        }

        $data = [
            'title' => 'Manage Notifications',
            'logs' => $logs,
            'search' => $search,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'page' => 'notifications'
        ];

        return view('admin/notifications/index', $data);
    }

    public function show($id)
    {
        $log = $this->telegramLogModel->find($id);
        
        if (!$log) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Notification Details',
            'log' => $log,
            'page' => 'notifications'
        ];

        return view('admin/notifications/show', $data);
    }

    public function delete($id)
    {
        $log = $this->telegramLogModel->find($id);
        
        if (!$log) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->telegramLogModel->delete($id);

        return redirect()->to('/admin/notifications')->with('success', 'Notification deleted successfully');
    }

    public function clearOld()
    {
        $days = $this->request->getPost('days', 30);
        
        $deleted = $this->telegramLogModel->deleteOldLogs($days);

        return redirect()->to('/admin/notifications')->with('success', "Deleted {$deleted} old notifications");
    }

    public function getStatistics()
    {
        $stats = $this->telegramLogModel->getLogStatistics();

        return $this->response->setJSON([
            'statistics' => $stats
        ]);
    }
}