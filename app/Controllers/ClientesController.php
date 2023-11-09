<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;

class ClientesController extends BaseController
{
    protected $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
    }

    public function index()
    {
        // Configurações de paginação
        $pager = \Config\Services::pager();
        $perPage = 10; // Definir quantos registros por página você quer

        // Pega o número da página atual
        $currentPage = $this->request->getVar('page') ?? 1;

        // Pega os clientes do banco de dados com paginação
        $clientes = $this->clienteModel->orderBy("id", "desc")->paginate($perPage, 'clientes');

        // Obtém o total de registros
        $total = $this->clienteModel->countAllResults();

        // Prepara a resposta JSON
        $response = service('response');
        $response->setJSON([
            'clientes' => $clientes,
            'paginateInfo' => [
                'currentPage' => $currentPage,
                'perPage' => $perPage,
                'totalRecords' => $total,
                'totalPages' => ceil($total / $perPage)
            ]
        ]);

        // Retorna a resposta JSON
        return $response->getBody();
    }

    public function create()
    {
        $rules = [
            'nome' => 'required|min_length[3]|max_length[100]',
        ];

        $response = service('response');

        if ($this->validate($rules)) {
            $data = $this->request->getJSON(true); // para ele retornar um array direcional ao invés de um stdClass
            $this->clienteModel->save($data);

            $id = $this->clienteModel->getInsertID();
            $cliente = $this->clienteModel->find($id);

            $response->setStatusCode(201);
            $response->setJSON($cliente);
        } else {
            $response->setStatusCode(400); // HTTP Status Code para 'Bad Request'
            $response->setJSON(['errors' => $this->validator->getErrors()]);
        }

        return $response->getBody();
    }

    public function show($id)
    {
        // Pega o cliente específico do banco de dados
        $cliente = $this->clienteModel->find($id);

        if (!$cliente) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Cliente com ID $id não encontrado.");
        }

        $response = service('response');
        $response->setJSON($cliente);
        return $response->getBody();
    }

    public function update($id)
    {
        $rules = [
            'nome' => 'required|min_length[3]|max_length[100]',
        ];


        $response = service('response');

        if ($this->validate($rules)) {
            $data = $this->request->getJSON(true); // para ele retornar um array direcional ao invés de um stdClass
            $this->clienteModel->update($id, $data);

            $cliente = $this->clienteModel->find($id);

            $response->setStatusCode(200);
            $response->setJSON($cliente);
        } else {
            $response->setStatusCode(400); // HTTP Status Code para 'Bad Request'
            $response->setJSON(['errors' => $this->validator->getErrors()]);
        }

        return $response->getBody();
    }


    public function delete($id)
    {
        $cliente = $this->clienteModel->find($id);

        if (!$cliente) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Cliente com ID $id não encontrado.");
        }

        $response = service('response');

        if ($this->clienteModel->delete($id)) {
            $response->setStatusCode(200);
            $response->setJSON(["mensagem" => "ID $id excluido com sucesso"]);
        } else {
            $response->setStatusCode(400);
            $response->setJSON(['errors' => "O ID $id não pode ser excluído"]);
        }

        return $response->getBody();
    }
}
