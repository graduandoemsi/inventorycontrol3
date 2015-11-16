<?php
require_once '..\dao\conexaoBanco.php';
require_once '..\to\Estoque.php';
require_once '..\dao\Crud.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstoqueDAO
 *
 * 
 */
class EstoqueDAO implements Crud {
    public function delete($id) {
        try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "delete from estoque where id=:id";
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
        $sql = "select * from estoque where id=:id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id",$id);
        $prepare->execute();
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
        
    }

    public function insert( $obj) {
        try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "insert into estoque (id_produto,quantidade) values (:id_produto,:quantidade)";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id_produto",$obj->getId_produto());
        $prepare->bindValue(":quantidade",$obj->getQuantidade());
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
        $sql = "update estoque set(id_produto,quantidade) values (:id_produto,:quantidade) where id=:id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id_produto",$obj->getId_produto());
        $prepare->bindValue(":quantidade",$obj->getQuantidade());
        $prepare->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
     public function getEstoque() {
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "select produto.descricao as descricao , estoque.quantidade as quantidade "
       . "from  estoque inner join produto on produto.id = estoque.id_produto order by descricao asc";
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
