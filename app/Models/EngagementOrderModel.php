<?php

namespace App\Models;

use CodeIgniter\Model;

class EngagementOrderModel extends Model
{
    protected $table = 'engagement_orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'code', 'template_id', 'man_name', 'woman_name', 'engagement_date', 
        'engagement_time', 'location', 'image_url', 'contact', 'status'
    ];

    // Validation rules
    protected $validationRules = [
        'code' => 'required|is_unique[engagement_orders.code]',
        'template_id' => 'required|integer',
        'man_name' => 'required|min_length[3]|max_length[100]',
        'woman_name' => 'required|min_length[3]|max_length[100]',
        'engagement_date' => 'required|valid_date',
        'engagement_time' => 'required|min_length[3]|max_length[20]',
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
        'man_name' => [
            'required' => "Man's name is required",
            'min_length' => "Man's name must be at least 3 characters",
            'max_length' => "Man's name cannot exceed 100 characters",
        ],
        'woman_name' => [
            'required' => "Woman's name is required",
            'min_length' => "Woman's name must be at least 3 characters",
            'max_length' => "Woman's name cannot exceed 100 characters",
        ],
        'engagement_date' => [
            'required' => 'Engagement date is required',
            'valid_date' => 'Engagement date must be a valid date',
        ],
        'engagement_time' => [
            'required' => 'Engagement time is required',
            'min_length' => 'Engagement time must be at least 3 characters',
            'max_length' => 'Engagement time cannot exceed 20 characters',
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
        $builder = $this->db->table('engagement_orders')
            ->select('engagement_orders.*, templates.name as template_name, templates.preview_url as template_preview')
            ->join('templates', 'templates.id = engagement_orders.template_id');
        
        if ($status) {
            $builder->where('engagement_orders.status', $status);
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
}