<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DataBaseTransactions;

class ClientesTest extends TestCase
{
    use DataBaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $cliente = Clientes::create(['nome' => 'Bono',
                                    'endereco' => 'Av. interlagos',
                                    'email' => 'teste@teste.com',
                                    'telefone' => '11977644854']);


        $this->assertDataBaseHas('Clientes', ['nome' => 'Bono']);

        $cliente->destroy($cliente->id);

        $this->assertDataBaseMissing('Clientes', ['nome' => 'Bono']);
    }
}
