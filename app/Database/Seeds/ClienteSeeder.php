<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Cliente;
use Faker\Factory;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        // Carregar a instância do Faker com a localização pt_BR
        $faker = Factory::create('pt_BR');

        // Instanciar o modelo Cliente
        $clienteModel = new Cliente();

        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nome' => $faker->name,
                'telefone' => $faker->cellphoneNumber,
                'email' => $faker->email,
                'endereco' => $faker->address,
            ];

            // Usar o modelo Cliente para inserir os dados
            $clienteModel->insert($data);
        }
    }
}
