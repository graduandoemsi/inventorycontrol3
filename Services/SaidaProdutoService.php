<?php

require_once ('../dao/SaidaProdutoDAO.php');

/**
 * Description of SaidaProdutoService
 *
 * @author Isnack Developer
 */
class SaidaProdutoService {

    public static function InsertOut($outProducts) {

        if (isset($outProducts["idProduto"]) && isset($outProducts["quantidade"]) && isset($outProducts["data"])) {
            $saidaProduto = new SaidaProduto();
            $saidaProduto->setId_produto($outProducts["idProduto"]);
            $saidaProduto->setQuantidade($outProducts["quantidade"]);
            $saidaProduto->setData($outProducts["data"]);
            $saidaProdutoDAO = new SaidaProdutoDAO();
            $id = $saidaProdutoDAO->insert($saidaProduto);

            if ($id) {
                $responseJson = array(
                    "mensagem" => "Produto retirado do estoque com sucesso!!",
                    "resposta" => TRUE
                );
                return json_encode($responseJson);
            } else {
                $responseJson = array(
                    "mensagem" => "Produto não foi retirado do estoque!",
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
