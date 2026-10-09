<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'full_name', 'email', 'avatar', 'created_at'];
    protected $validationRules = [
        'username' => 'required|max_length[50]',
        'full_name' => 'required|max_length[100]',
        'email' => 'permit_empty|valid_email|max_length[100]',
    ];
    protected $useTimestamps = false;
}
