<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoService
 *
 * @author Note
 */
class ProdutoService {
    public function insertProduto($response) {
        if (isset($response)){
            $produto = new Produto();
            $produto->setCategoria_produto_id($products["categoria"]);
            $produto->setDescricao($products["descricao"]);
            $produto->setStatus($products["status"]);
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->insert($produto);
         
        }
        
    }

}
