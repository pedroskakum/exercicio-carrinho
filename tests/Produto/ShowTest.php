<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProdutoShowTest extends TestCase
{
    /**
     * teste Visualizar Produto.
     *
     * @return void
     */
    public function testVisualizarProduto(){

        $produto = \App\Entities\Product::where('productSpecial', '=', '1')->get()->random(1);
        $this->actingAs(factory(\App\User::class)->create())->visit('/produtos/'.$produto->id)
            ->seeText($produto->productName)
            ->see($produto->productPrice)
            ->seeText($produto->productDescription)
            ->dontSeeText($produto->id);
    }

    /**
     * teste Visualizar 403.
     *
     * @return void
     */
    public function testVisualizar403(){
        
        $produto = \App\Entities\Product::where('productSpecial', '=', '1')->get()->random(1);
        $this->get(route('produto.show', $produto->id))->assertResponseStatus(403)->seeText('Acesso Negado');

    }

    /**
     * teste Visualizar 404.
     *
     * @return void
     */
    public function testVisualizar404(){

        $this->get(route('produto.show', '0'))->assertResponseStatus(404)->seeText('Não encontrado');
    }
}
