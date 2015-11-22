<?php

require_once ('../dao/EntradaProdutoDAO.php');

/**
 * Description of EntradaProdutoService
 *
 * @author Isnack Developer
 */
class EntradaProdutoService {

    public function insert($request) {

        if (isset($request["idProduto"]) && isset($request["quantidade"]) && isset($request["data"])) {
            $entradaProduto = new EntradaProduto();
            if (is_numeric($request["quantidade"])|| $request["idProduto"]!=0) {


                $entradaProduto->setId_produto($request["idProduto"]);
                $entradaProduto->setQuantidade($request["quantidade"]);
                $entradaProduto->setData($request["data"]);
            } else {
                $responseJson = array(
                    "mensagem" => "Por favor informar o produto e quantidade!",
                    "resposta" => false
                );
                return json_encode($responseJson);
            }
            $entradaProdutoDAO = new EntradaProdutoDAO();
            $estoqueDAO = new EstoqueDAO();
            $produtoEstoque = $estoqueDAO->get($request["idProduto"]);
            if ($request["quantidade"] <= 0) {
                   $responseJson = array(
                    "mensagem" => "Quantidade não permitida!",
                    "resposta" => FALSE
                );
                   return json_encode($responseJson);
            }

            $id = $entradaProdutoDAO->insert($entradaProduto);
            if ($id) {
                $responseJson = array(
                    "mensagem" => "Produto inserido no estoque com sucesso!!",
                    "resposta" => TRUE
                );
                return json_encode($responseJson);
            } else {
                $responseJson = array(
                    "mensagem" => "Produto não inserido no estoque!",
                    "resposta" => FALSE
                );
                return json_encode($responseJson);
            }
        } else {
            $responseJson = array(
                "mensagem" => "Por favor informar o produto e quantidade!",
                "resposta" => FALSE
            );
            return json_encode($responseJson);
        }
    }

}
