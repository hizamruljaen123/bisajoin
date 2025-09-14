<?php

namespace App\Models;

use CodeIgniter\Model;

class WeddingOrderModel extends Model
{
    protected $table = 'wedding_orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'code', 'template_id', 'groom_name', 'bride_name', 'wedding_date', 
        'wedding_time', 'location', 'image_url', 'contact', 'status'
    ];

    // Validation rules
    protected $validationRules = [
        'code' => 'required|is_unique[wedding_orders.code]',
        'template_id' => 'required|integer',
        'groom_name' => 'required|min_length[3]|max_length[100]',
        'bride_name' => 'required|min_length[3]|max_length[100]',
        'wedding_date' => 'required|valid_date',
        'wedding_time' => 'required|min_length[3]|max_length[20]',
        'location' => 'required|min_length[5]',
        'contact' => 'required|min_length[5]|max_length[100]',
        'status' => 'in_list[pending,paid,active]',
    ];

    protected $validationMessages = [
        'code' => [
            'required' => 'Order code is required',
            'is_unique' => 'Order code already exists',
        ],
        'template_id' => [
            'required' => 'Template is required',
            'integer' => 'Template must be a valid number',
        ],
        'groom_name' => [
            'required' => 'Groom name is required',
            'min_length' => 'Groom name must be at least 3 characters',
            'max_length' => 'Groom name cannot exceed 100 characters',
        ],
        'bride_name' => [
            'required' => 'Bride name is required',
            'min_length' => 'Bride name must be at least 3 characters',
            'max_length' => 'Bride name cannot exceed 100 characters',
        ],
        'wedding_date' => [
            'required' => 'Wedding date is required',
            'valid_date' => 'Wedding date must be a valid date',
        ],
        'wedding_time' => [
            'required' => 'Wedding time is required',
            'min_length' => 'Wedding time must be at least 3 characters',
            'max_length' => 'Wedding time cannot exceed 20 characters',
        ],
        'location' => [
            'required' => 'Location is required',
            'min_length' => 'Location must be at least 5 characters',
        ],
        'contact' => [
            'required' => 'Contact information is required',
            'min_length' => 'Contact must be at least 5 characters',
            'max_length' => 'Contact cannot exceed 100 characters',
        ],
        'status' => [
            'in_list' => 'Status must be pending, paid, or active',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Get order by code
    public function getOrderByCode($code)
    {
        return $this->where('code', $code)->first();
    }

    // Get orders by status
    public function getOrdersByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    // Get orders with template info
    public function getOrdersWithTemplate($status = null)
    {
        $builder = $this->db->table('wedding_orders')
            ->select('wedding_orders.*, templates.name as template_name, templates.preview_url as template_preview')
            ->join('templates', 'templates.id = wedding_orders.template_id');
        
        if ($status) {
            $builder->where('wedding_orders.status', $status);
        }
        
        return $builder->get()->getResultArray();
    }

    // Update order status
    public function updateStatus($code, $status)
    {
        return $this->where('code', $code)->set('status', $status)->update();
    }

    // Check if order code exists
    public function isOrderCodeExists($code)
    {
        return $this->where('code', $code)->countAllResults() > 0;
    }

    public function getWeddingOrderWithPayment($orderCode)
    {
        return $this->db->table('wedding_orders AS wo')
            ->select('wo.id AS wedding_order_id, wo.code AS wedding_order_code, wo.template_id, wo.groom_name, wo.bride_name, wo.wedding_date, wo.wedding_time, wo.location, wo.contact, wo.status AS wedding_order_status, p.id AS payment_id, p.amount, p.method, p.status AS payment_status, p.paid_at')
            ->join('payments AS p', 'wo.id_peyment = p.id')
            ->where('wo.code', $orderCode)
            ->get()
            ->getRowArray();
    }
}