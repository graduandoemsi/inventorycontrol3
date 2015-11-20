<?php
require_once '../dao/conexaoBanco.php';
require_once '../to/SaidaProduto.php';
require_once '../dao/Crud.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SaidaProdutoDAO
 *
 
 */
class SaidaProdutoDAO implements Crud {
    public function delete($id) {
        try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "delete from saida_produto where id=:id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id",$id);
        $prepare->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }

    public function get($id) {
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "select * from saida_produto where id=:id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id",$id);
        $prepare->execute();
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
        
    }

    public function insert($obj) {
        try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "insert into saida_produto (id_produto,quantidade,data) values (:id_produto,:quantidade,:data)";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id_produto",$obj->getId_produto());
        $prepare->bindValue(":quantidade",$obj->getQuantidade());
        $prepare->bindValue(":data",$obj->getData());
        $prepare->execute();
        $id=$conexao->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        } 
        return $id;
    }
    public function update($id, $obj) {
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "update entrada_produto set(id_produto,quantidade,data) values (:id_produto,:quantidade,:data) where id=:id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id_produto",$obj->getId_produto());
        $prepare->bindValue(":quantidade",$obj->getQuantidade());
        $prepare->bindValue(":data",$obj->getData());
        $prepare->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

//put your code here
}
