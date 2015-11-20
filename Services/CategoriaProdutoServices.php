<?php

require_once ('../dao/CategoriaProdutoDAO.php');

/**
 * Description of CategoriaProdutoServices
 *
 * @author Isnack Developer
 */
class CategoriaProdutoServices {

    public static function InsertCategory($categoriesProducts) {
        if (isset($categoriesProducts["descricao"])) {
            $categoriaProduto = new CategoriaProduto();
            $categoriaProduto->setDescricao($categoriesProducts["descricao"]);
            $categoriaProdutoDAO = new CategoriaProdutoDAO();
            $id = $categoriaProdutoDAO->insert($categoriaProduto);

            if ($id) {
                $responseJson = array(
                    "mensagem" => "Categoria inserida com sucesso!!",
                    "resposta" => TRUE
                );
                return json_encode($responseJson);
            } else {
                $responseJson = array(
                    "mensagem" => "Categoria não inserida!",
                    "resposta" => FALSE
                );
                return json_encode($responseJson);
            }
        }else{
             $responseJson = array(
                "mensagem" => "Por favor informar a descrição!",
                "resposta" => FALSE
            );
            return json_encode($responseJson);
        }
    }

}
