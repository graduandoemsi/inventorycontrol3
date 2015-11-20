<?php
require_once '../dao/conexaoBanco.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StatusProdutoDAO
 *
 * @author Isnack Developer
 */
class StatusProdutoDAO  {
   

    public function getAll() {
           try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "select * from status_produto";
        $prepare = $conexao->prepare($sql);      
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;  
    }
   

//put your code here
}
