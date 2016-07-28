<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarrinhoPutTest extends TestCase
{
    /**
     * teste Inserindo Produto Via Index.
     *
     * @return void
     */
    public function testInserindoProdutoViaIndex(){

        foreach(App\Entities\Product::where('productStock', '>', 0)->orderBy('id', 'desc')->paginate(9)->random(3) as $produto){

            /* NÃO CONCLUÍDO */
            //$this->actingAs(factory(\App\User::class)->create())->visit('/produtos')->click("adicionar[$produto->id]")->assertResponseStatus(404)->seeText('Produto adicionado ao carrinho');
            //$this->actingAs(factory(\App\User::class)->create())->get(route('produto.index'))->click("adicionar[$produto->id]")->assertResponseStatus(404)->seeText('Produto adicionado ao carrinho');

        }
        
    }

    /**
     * teste Visualizar Produtos Logado.
     *
     * @return void
     */
    public function testVisualizarProdutosLogado(){
        
        
        
    }
}
