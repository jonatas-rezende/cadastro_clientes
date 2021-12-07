<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if((bool) session()->logado != true){
            $response = Services::response();
            $response->setStatusCode(401);
            $data = [
                'status' => 401,
                'message' => 'Acesso restrito, faça login',
            ];
            
            $response->setJSON($data);
            return $response;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}