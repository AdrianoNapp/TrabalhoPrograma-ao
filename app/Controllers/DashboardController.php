<?php

namespace App\Controllers;

use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');
    
        $userModel = new UserModel();
        
        $usuario = $userModel->find($userId);
        
        return view('dashboard', ['usuario' => $usuario]);
    }
    
}
