<?php

namespace App\Models;

use CodeIgniter\Model;

class GraduationOrderModel extends Model
{
    protected $table = 'graduation_orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'code', 'template_id', 'graduate_name', 'faculty', 'graduation_date', 
        'graduation_time', 'location', 'image_url', 'contact', 'status'
    ];

    // Validation rules
    protected $validationRules = [
        'code' => 'required|is_unique[graduation_orders.code]',
        'template_id' => 'required|integer',
        'graduate_name' => 'required|min_length[3]|max_length[100]',
        'faculty' => 'permit_empty|min_length[3]|max_length[100]',
        'graduation_date' => 'required|valid_date',
        'graduation_time' => 'required|min_length[3]|max_length[20]',
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
        'graduate_name' => [
            'required' => 'Graduate name is required',
            'min_length' => 'Graduate name must be at least 3 characters',
            'max_length' => 'Graduate name cannot exceed 100 characters',
        ],
        'faculty' => [
            'min_length' => 'Faculty must be at least 3 characters',
            'max_length' => 'Faculty cannot exceed 100 characters',
        ],
        'graduation_date' => [
            'required' => 'Graduation date is required',
            'valid_date' => 'Graduation date must be a valid date',
        ],
        'graduation_time' => [
            'required' => 'Graduation time is required',
            'min_length' => 'Graduation time must be at least 3 characters',
            'max_length' => 'Graduation time cannot exceed 20 characters',
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
        $builder = $this->db->table('graduation_orders')
            ->select('graduation_orders.*, templates.name as template_name, templates.preview_url as template_preview')
            ->join('templates', 'templates.id = graduation_orders.template_id');
        
        if ($status) {
            $builder->where('graduation_orders.status', $status);
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