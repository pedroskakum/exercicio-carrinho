<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SistemaIndexTest extends TestCase
{
    /**
     * teste Visualiza Formulario.
     *
     * @return void
     */
    public function testVisualizaFormulario(){

        $this->visit('/')
            ->seeElement('form')
            ->seeElement('input', ['name' => 'email'])
            ->seeElement('input', ['name' => 'password']);
    }

    /**
     * teste Acesso Logado.
     *
     * @return void
     */
    public function testAcessoLogado(){

        $this->actingAs(factory(\App\User::class)->create())
            ->visit('/')
            ->seePageIs('/produtos');
    }
}
