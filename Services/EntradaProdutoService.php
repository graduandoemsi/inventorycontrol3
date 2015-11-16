<?php

require_once ('..\dao\EntradaProdutoDAO.php');

/**
 * Description of EntradaProdutoService
 *
 * @author Isnack Developer
 */
class EntradaProdutoService {

    public function insert($request) {

        if (isset($request["idProduto"])&& isset($request["quantidade"])&&isset($request["data"])) {
            $entradaProduto = new EntradaProduto();
            $entradaProduto->setId_produto($request["idProduto"]);
            $entradaProduto->setQuantidade($request["quantidade"]);
            $entradaProduto->setData($request["data"]);
            $entradaProdutoDAO = new EntradaProdutoDAO();
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
                    "resposta" => TRUE
                );
                return json_encode($responseJson);
            }
        } else {
            $responseJson = array(
                "mensagem" => "Por favor informar o produto e quantidade!",
                "resposta" => false
            );
            return json_encode($responseJson);
        }
    }

}
