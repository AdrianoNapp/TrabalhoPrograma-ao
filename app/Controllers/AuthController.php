<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController

{
    //Função que retorna a página de cadastro
    public function mostrarPaginaCadastro()
    {
        return view('cadastro');
    }

    //Função que retorna a página de login
    public function mostrarPaginaLogin()
    {
        return view('login');
    }

    
    public function realizarCadastro()
    {
       
        $novoUsuario = new UserModel();

        $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                //'password' => $this->request->getPost('password')
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),

            ];

            var_dump($data);

        if($novoUsuario->save($data)){
            return redirect()->route('login');
        }
        else{
       echo 'erro';
        }
        
    }

   
    public function realizarLogin()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $usuario = $userModel->login($username, $password);

        if ($usuario) {
            $session = session();
            $session->set('user_id', $usuario['id']);
            return redirect()->to('/dashboard');
        } 
        else {
            $session = session ();
            $session->setFlashdata('mensagem', 'Nome de usuário ou senha incorretos.');
            echo view('login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('login');
    }
}