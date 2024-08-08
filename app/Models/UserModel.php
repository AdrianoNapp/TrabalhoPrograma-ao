<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'usuarios';
    protected $allowedFields = ['username', 'email', 'password'];
    protected $useTimestamps = false;
    
    public function login($username, $password)
    {
        $user = $this->where('username', $username)
            ->orWhere('email', $username)
            ->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}