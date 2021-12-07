<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use CodeIgniter\RESTful\ResourceController;

class Cliente extends ResourceController
{
    private $clienteModel;

	public function __construct()
	{
		$this->clienteModel = new ClienteModel();
	}

    public function index()
	{
        $data = $this->clienteModel->findAll();
      
        if ($data) {
            $response = [
                'status' => 200,
                "data" => $data,
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Não existem clientes cadastrados');
        }
	}

	public function show($id = null)
	{      
        $data = $this->clienteModel->where(['cliente_id' => $id])->first();
      
        if ($data) {
            $response = [
                'status' => 200,
                "data" => $data,
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound("Não encontrado cliente com o id: $id");
        }
	}

	public function create()
	{
        $data = [
            'nome' => $this->request->getVar('nome'),
            'cidade' => $this->request->getVar('cidade'),
            'UF' => $this->request->getVar('UF'),
            'email' => $this->request->getVar('email'),
            'telefone' => $this->request->getVar('telefone'),
            'whatsapp' => $this->request->getVar('whatsapp')
        ];

        $cliente = $this->clienteModel->insert($data);
        if ($cliente) {
            $dataCliente = $this->responseCreate($cliente);
            $response = [
                'status' => 200,
                'messages' => "Cliente salvo com sucesso",
                'data' => $dataCliente
            ];
            return $this->respondCreated($response);
        } else {
            return $this->failNotFound('Não foi possível salvar o cliente');
        }

	}

	public function update($id = null)
	{
        $data = [
            'nome' => $this->request->getVar('nome'),
            'cidade' => $this->request->getVar('cidade'),
            'UF' => $this->request->getVar('UF'),
            'email' => $this->request->getVar('email'),
            'telefone' => $this->request->getVar('telefone'),
            'whatsapp' => $this->request->getVar('whatsapp')
        ];
        $update = $this->clienteModel->update($id, $data);
        if ($update) {
            $dataCliente = $this->responseCreate($id);
            $response = [
                'status' => 200,
                'messages' => "Cliente editado com sucesso",
                'data' => $dataCliente
            ];
            return $this->respondCreated($response);
        } else {
            return $this->failNotFound('Não foi possível editar o cliente');
        }
	}

	public function delete($id = null)
	{
        $data = $this->clienteModel->find($id);

        if ($data) {
            if($this->clienteModel->delete($id)){
                $response = [
                    'status' => 200,
                    'messages' => "Cliente deletado com sucesso",
                ];
                return $this->respondDeleted($response);
            } else {
                return $this->failNotFound("Cliente com o id $id não foi deletado");
            }
        } else {
            return $this->failNotFound("Não encontrado cliente com o id: $id");
        }
	}

    public function responseCreate($id = null)
	{
        return $this->clienteModel->where(['cliente_id' => $id])->first();
	}
}