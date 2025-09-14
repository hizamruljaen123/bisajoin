<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'order_code', 'amount', 'method', 'status', 'paid_at'
    ];

    // Validation rules
    protected $validationRules = [
        'order_code' => 'required',
        'amount' => 'required|decimal|greater_than_equal_to[0]',
        'method' => 'required|in_list[transfer,ewallet]',
        'status' => 'in_list[unpaid,paid,verified]',
        'paid_at' => 'permit_empty|valid_date',
    ];

    protected $validationMessages = [
        'order_code' => [
            'required' => 'Order code is required',
        ],
        'amount' => [
            'required' => 'Amount is required',
            'decimal' => 'Amount must be a valid decimal number',
            'greater_than_equal_to' => 'Amount must be greater than or equal to 0',
        ],
        'method' => [
            'required' => 'Payment method is required',
            'in_list' => 'Payment method must be transfer or ewallet',
        ],
        'status' => [
            'in_list' => 'Status must be unpaid, paid, or verified',
        ],
        'paid_at' => [
            'valid_date' => 'Payment date must be a valid date',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Get payment by order code
    public function getPaymentByOrderCode($orderCode)
    {
        return $this->where('order_code', $orderCode)->first();
    }

    // Get payments by status
    public function getPaymentsByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    // Update payment status
    public function updatePaymentStatus($orderCode, $status, $paidAt = null)
    {
        $data = ['status' => $status];
        if ($paidAt) {
            $data['paid_at'] = $paidAt;
        }
        
        return $this->where('order_code', $orderCode)->set($data)->update();
    }

    // Get payment statistics
    public function getPaymentStatistics()
    {
        $total = $this->countAllResults();
        $paid = $this->where('status', 'paid')->countAllResults();
        $verified = $this->where('status', 'verified')->countAllResults();
        $unpaid = $this->where('status', 'unpaid')->countAllResults();
        
        return [
            'total' => $total,
            'paid' => $paid,
            'verified' => $verified,
            'unpaid' => $unpaid,
        ];
    }

    // Get total revenue
    public function getTotalRevenue()
    {
        $result = $this->select('SUM(amount) as total')
            ->where('status', 'verified')
            ->first();
        
        return $result ? floatval($result['total']) : 0;
    }

    // Get recent payments
    public function getRecentPayments($limit = 10)
    {
        return $this->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    // Check if payment exists for order
    public function paymentExists($orderCode)
    {
        return $this->where('order_code', $orderCode)->countAllResults() > 0;
    }
}