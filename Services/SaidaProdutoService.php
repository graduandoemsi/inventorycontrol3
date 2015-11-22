<?php

require_once ('../dao/SaidaProdutoDAO.php');

/**
 * Description of SaidaProdutoService
 *
 * @author Isnack Developer
 */
class SaidaProdutoService {

    public static function InsertOut($outProducts) {
           //Testa se as variáveis contém valor 
        if (isset($outProducts["idProduto"]) && isset($outProducts["quantidade"]) && isset($outProducts["data"])) {
            $saidaProduto = new SaidaProduto();
            
            //Testa se a quantidade é uma string numérica e seta os valores no objeto se negativo retorna uma mensagem de erro
            if (is_numeric($outProducts["quantidade"]) || $outProducts["idProduto"]!=0) {
                $saidaProduto->setId_produto($outProducts["idProduto"]);
                $saidaProduto->setQuantidade($outProducts["quantidade"]);
                $saidaProduto->setData($outProducts["data"]);
            } else {
                $responseJson = array(
                    "mensagem" => "Por favor informar o produto e quantidade!",
                    "resposta" => false
                );
                return json_encode($responseJson);
            }

            $saidaProdutoDAO = new SaidaProdutoDAO();
            $estoqueDAO = new EstoqueDAO();
            $produtoEstoque = $estoqueDAO->get($outProducts["idProduto"]);
            // Verifica se o produto está nos padrões de quantidade
            if ($produtoEstoque["quantidade"] < $outProducts["quantidade"] || $outProducts["quantidade"] <= 0) {
                $responseJson = array(
                    "mensagem" => "Quantidade não permitida!",
                    "resposta" => FALSE
                );
                return json_encode($responseJson);
            }

                
            $id = $saidaProdutoDAO->insert($saidaProduto);
            // Testa se foi retornado um id do banco  e exibe a mensagem de sucesso.    
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
