<?php

namespace App\Models;

use CodeIgniter\Model;

class TemplateModel extends Model
{
    protected $table = 'templates';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['name', 'type', 'preview_url', 'content_structure'];

    // Validation rules
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[100]',
        'type' => 'required|in_list[wedding,engagement,birthday,graduation]',
        'preview_url' => 'permit_empty|valid_url|max_length[255]',
        'content_structure' => 'permit_empty',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Template name is required',
            'min_length' => 'Template name must be at least 3 characters',
            'max_length' => 'Template name cannot exceed 100 characters',
        ],
        'type' => [
            'required' => 'Template type is required',
            'in_list' => 'Template type must be wedding, engagement, birthday, or graduation',
        ],
        'preview_url' => [
            'valid_url' => 'Preview URL must be a valid URL',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Get templates by type
    public function getTemplatesByType($type)
    {
        return $this->where('type', $type)->findAll();
    }

    // Get template by ID
    public function getTemplateById($id)
    {
        return $this->find($id);
    }

    // Generate unique order code
    public function generateOrderCode()
    {
        $date = date('Ymd');
        $prefix = 'INV-' . $date . '-';
        
        // Get the last order number for today
        $lastOrder = $this->db->table('wedding_orders')
            ->like('code', $prefix, 'after')
            ->orderBy('code', 'DESC')
            ->get()
            ->getRow();
        
        if ($lastOrder) {
            $lastNumber = intval(substr($lastOrder->code, -3));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }
        
        return $prefix . $newNumber;
    }
}