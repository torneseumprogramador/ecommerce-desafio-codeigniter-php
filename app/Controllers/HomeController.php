<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $jsonHome = [
            "mensagem" => "Bem vindo a API Zend/Laminas",
            "endpoints" => [
                "clientes" => [
                    "GET" => "/api/clientes",
                    "GET " => "/api/clientes/{id}",
                    "POST" => [
                        "endpoint" => "/api/clientes/criar",
                        "body" => [
                            "nome" => "??",
                            "telefone" => "??",
                            "email" => "??",
                            "endereco" => "??"
                        ]
                    ],
                    "PUT" => [
                        "endpoint" => "/api/clientes/{id}/alterar",
                        "body" => [
                            "nome" => "??",
                            "telefone" => "??",
                            "email" => "??",
                            "endereco" => "??"
                        ]
                    ],
                    "DELETE" => "/api/clientes/{id}/excluir",
                ],
                "pedidos" => "/api/pedidos",
            ]
        ];

        $response = service('response');
        $response->setJSON($jsonHome);
        return $response->getBody();
    }
}
