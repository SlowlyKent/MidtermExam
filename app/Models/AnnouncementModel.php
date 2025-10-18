<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['title', 'content', 'created_at'];
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'content' => 'required',
    ];

    // Validation messages
    protected $validationMessages = [
        'title' => [
            'required' => 'The announcement title is required',
            'min_length' => 'The title must be at least 3 characters long',
            'max_length' => 'The title cannot exceed 255 characters'
        ],
        'content' => [
            'required' => 'The announcement content is required'
        ]
    ];

    // Callbacks
    protected $beforeInsert = ['setCreatedAt'];

    protected function setCreatedAt(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}
