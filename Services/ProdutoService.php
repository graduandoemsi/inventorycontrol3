<?php

require_once ('..\dao\ProdutoDAO.php');
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

    public function insertProduto($request) {

        if (isset($request["categoria"]) && isset($request["descricao"]) && isset($request["status"]) && is_numeric($request["status"])) {
            $produto = new Produto();
            $produto->setCategoria_produto_id($request["categoria"]);
            $produto->setDescricao($request["descricao"]);
            $produto->setStatus($request["status"]);
            $produtoDAO = new ProdutoDAO();
            $id = $produtoDAO->insert($produto);
            if ($id) {
                $responseJson = array(
                    "mensagem" => "Produto inserido com sucesso!!",
                    "resposta" => TRUE
                );
                return json_encode($responseJson);
            } else {
                $responseJson = array(
                    "mensagem" => "Produto não inserido!",
                    "resposta" => FALSE
                );
                return json_encode($responseJson);
            }
        } else {
            $responseJson = array(
                "mensagem" => "Por favor informar todos os dados!",
                "resposta" => false
            );
            return json_encode($responseJson);
        }
    }

    public static function getActiveProducts() {

        $produtoDAO = new ProdutoDAO();
        $products = $produtoDAO->getActive();
        return json_encode($products);
    }
    
    public static function getProductsByCategory($categoriaId){
    $produtoDAO = new ProdutoDAO();
    //Listando produtos por categoria
    $products = $produtoDAO->getProductByCategory($categoriaId);
    return json_encode($products);
    }

}
