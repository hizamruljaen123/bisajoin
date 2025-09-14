<?php

namespace App\Models;

use CodeIgniter\Model;

class TelegramLogModel extends Model
{
    protected $table = 'telegram_logs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'order_code', 'message'
    ];

    // Validation rules
    protected $validationRules = [
        'order_code' => 'required',
        'message' => 'required|min_length[5]',
    ];

    protected $validationMessages = [
        'order_code' => [
            'required' => 'Order code is required',
        ],
        'message' => [
            'required' => 'Message is required',
            'min_length' => 'Message must be at least 5 characters',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Get logs by order code
    public function getLogsByOrderCode($orderCode)
    {
        return $this->where('order_code', $orderCode)
            ->orderBy('sent_at', 'DESC')
            ->findAll();
    }

    // Get recent logs
    public function getRecentLogs($limit = 50)
    {
        return $this->orderBy('sent_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    // Get logs by date range
    public function getLogsByDateRange($startDate, $endDate)
    {
        return $this->where('sent_at >=', $startDate)
            ->where('sent_at <=', $endDate)
            ->orderBy('sent_at', 'DESC')
            ->findAll();
    }

    // Get log statistics
    public function getLogStatistics()
    {
        $total = $this->countAllResults();
        $today = $this->where('DATE(sent_at)', date('Y-m-d'))->countAllResults();
        
        return [
            'total' => $total,
            'today' => $today,
        ];
    }

    // Search logs by message content
    public function searchLogs($searchTerm)
    {
        return $this->like('message', $searchTerm)
            ->orderBy('sent_at', 'DESC')
            ->findAll();
    }

    // Delete old logs (older than 30 days)
    public function deleteOldLogs($days = 30)
    {
        $cutoffDate = date('Y-m-d H:i:s', strtotime("-{$days} days"));
        return $this->where('sent_at <', $cutoffDate)->delete();
    }
}