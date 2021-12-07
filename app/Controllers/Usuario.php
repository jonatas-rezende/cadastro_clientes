<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class Usuario extends ResourceController
{
    private $usuarioModel;

	public function __construct()
	{
		$this->usuarioModel = new UsuarioModel();
	}

    public function login(){
        $login = $this->request->getVar('login');
        $senha = $this->request->getVar('senha');

        $data = $this->usuarioModel->where(['nome' => $login])->first();
        if(!empty($data)){
            if(password_verify($senha, $data['senha'])){
                session()->set('logado', true);
                session()->set('usuario', $login);
                $response = [
                    'status' => 200,
                    "message" => "Usuário $login logado com sucesso",
                ];
                return $this->respond($response);
            } else {
                return $this->failNotFound('Login ou senha inválidos');
            }
        } else {
            return $this->failNotFound('Login ou senha inválidos');
        }
    }

    public function logout(){
        session()->destroy();
        $response = [
            'status' => 200,
            "message" => "Usuário deslogado com sucesso",
        ];
        return $this->respond($response);
    }
}
