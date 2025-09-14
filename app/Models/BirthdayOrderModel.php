<?php

namespace App\Models;

use CodeIgniter\Model;

class BirthdayOrderModel extends Model
{
    protected $table = 'birthday_orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'code', 'template_id', 'birthday_person_name', 'age', 'birthday_date', 
        'birthday_time', 'location', 'image_url', 'contact', 'status'
    ];

    // Validation rules
    protected $validationRules = [
        'code' => 'required|is_unique[birthday_orders.code]',
        'template_id' => 'required|integer',
        'birthday_person_name' => 'required|min_length[3]|max_length[100]',
        'age' => 'permit_empty|integer|greater_than_equal_to[0]|less_than_equal_to[120]',
        'birthday_date' => 'required|valid_date',
        'birthday_time' => 'required|min_length[3]|max_length[20]',
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
        'birthday_person_name' => [
            'required' => 'Birthday person name is required',
            'min_length' => 'Birthday person name must be at least 3 characters',
            'max_length' => 'Birthday person name cannot exceed 100 characters',
        ],
        'age' => [
            'integer' => 'Age must be a valid number',
            'greater_than_equal_to' => 'Age must be greater than or equal to 0',
            'less_than_equal_to' => 'Age must be less than or equal to 120',
        ],
        'birthday_date' => [
            'required' => 'Birthday date is required',
            'valid_date' => 'Birthday date must be a valid date',
        ],
        'birthday_time' => [
            'required' => 'Birthday time is required',
            'min_length' => 'Birthday time must be at least 3 characters',
            'max_length' => 'Birthday time cannot exceed 20 characters',
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
        $builder = $this->db->table('birthday_orders')
            ->select('birthday_orders.*, templates.name as template_name, templates.preview_url as template_preview')
            ->join('templates', 'templates.id = birthday_orders.template_id');
        
        if ($status) {
            $builder->where('birthday_orders.status', $status);
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