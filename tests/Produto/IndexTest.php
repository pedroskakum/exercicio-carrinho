<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProdutoIndexTest extends TestCase
{
    /**
     * teste Visualiza Produtos.
     *
     * @return void
     */
    public function testVisualiarProdutos(){

        $produtoRoute = $this->visit('/produtos');
        foreach(App\Entities\Product::where('productStock', '>', 0)->orderBy('id', 'desc')->paginate(9) as $produto){
            $produtoRoute
                ->seeText($produto->productName)
                ->seeText($produto->productPrice)
                ->see($produto->productPhoto);
        }
        
        $produtoRoute->seeElement("ul", ['class' => 'pagination']);
        //$produtoRoute->assertCount(1, $this->crawler->filter("ul.pagination"));
    }

    /**
     * teste Visualizar Produtos Logado.
     *
     * @return void
     */
    public function testVisualizarProdutosLogado(){

        $produtoRoute = $this->visit('/produtos');
        foreach(App\Entities\Product::where('productStock', '>', 0)->orderBy('id', 'desc')->paginate(9) as $produto){
            $produtoRoute
                ->seeText($produto->productName)
                ->seeText($produto->productPrice)
                ->see($produto->productPhoto);

            if($produto->productSpecial == 1){
                $produtoRoute->seeText('(especial)');
            }

        }
        
        $produtoRoute->seeElement("ul", ['class' => 'pagination']);
        //$produtoRoute->assertCount(1, $this->crawler->filter("ul.pagination"));
    }
}
