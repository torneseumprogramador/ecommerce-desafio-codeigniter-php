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

        // Passa os clientes e o pager para a view
        return view('clientes/index', [
            'clientes' => $clientes,
            'pager' => $this->clienteModel->pager,
            'currentPage' => $currentPage
        ]);
    }


    public function new()
    {
        // Retorna o formulário para criar um novo cliente
        return view('clientes/create');
    }

    public function create()
    {
        $rules = [
            'nome' => 'required|min_length[3]|max_length[10]',
        ];

        if ($this->validate($rules)) {
            $data = $this->request->getPost();
            $this->clienteModel->save($data);
            return redirect()->to('/clientes')->with('success', 'Cliente criado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function show($id)
    {
        // Pega o cliente específico do banco de dados
        $cliente = $this->clienteModel->find($id);

        // Passa o cliente para a view
        return view('clientes/show', ['cliente' => $cliente]);
    }

    public function edit($id)
    {
        // Pega o cliente específico do banco de dados
        $cliente = $this->clienteModel->find($id);

        // Retorna o formulário de edição
        return view('clientes/edit', ['cliente' => $cliente]);
    }

    public function update($id)
    {
        $rules = [
            'nome' => 'required|min_length[3]|max_length[100]',
        ];

        if ($this->validate($rules)) {
            $data = $this->request->getPost();
            $this->clienteModel->update($id, $data);
            return redirect()->to('/clientes')->with('success', 'Cliente atualizado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }


    public function delete($id)
    {
        if ($this->clienteModel->delete($id)) {
            $session = session();
            $session->setFlashdata('success', 'Cliente apagado com sucesso.');
        } else {
            $session->setFlashdata('error', 'Não foi possível apagar o cliente.');
        }
    
        return redirect()->to('/clientes');
    }
}
