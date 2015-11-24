<?php
require_once '..\to\produto.php';
require_once '..\dao\conexaoBanco.php';
require_once '..\dao\Crud.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoDAO
 *

 */
class ProdutoDAO implements Crud {
    public function delete($id) {
        try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "delete from produto where id=:id";
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
        $sql = "select * from produto where id=:id";
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
        $sql = "insert into produto (descricao,status,categoria_produto_id) values (:descricao,:status,:categoria_produto_id)";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":descricao",$obj->getDescricao());
        $prepare->bindValue(":status",$obj->getStatus(),PDO::PARAM_INT);
        $prepare->bindValue(":categoria_produto_id",$obj->getCategoria_produto_id());
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
        $sql = "update produto set(descricao,status,categoria_produto_id) values (:descricao,:status,:categoria_produto_id) where id=:id";
        $prepare = $conexao->prepare($sql);
         $prepare->bindValue(":descricao",$obj->getDescricao());
        $prepare->bindValue(":status",$obj->getStatus());
        $prepare->bindValue(":categoria_produto_id",$obj->getCategoria_produto_id());
        $prepare->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    
      public function getActive() {
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "select * from produto where status =1";
        $prepare = $conexao->prepare($sql);        
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
        
    }
    
       public function getInactive() {
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "select * from produto where status =2";
        $prepare = $conexao->prepare($sql);        
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
        
    }
    
    public function getProductByCategory($categoryId){
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "SELECT * FROM produto where categoria_produto_id=:categoria_produto_id and status=1";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":categoria_produto_id",$categoryId);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }
    
    public function getProductMinimum() {
        
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "select produto.descricao as descricao,estoque.quantidade as quantidade"
         . " from produto inner join estoque on produto.id = estoque.id_produto"
         . " where estoque.quantidade <=10 and estoque.quantidade > 0 order by estoque.quantidade asc";
        $prepare = $conexao->prepare($sql);        
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
        
    }
     public function enableProduct($id) {
         try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "update produto set status=1  where id=:id";
        $prepare = $conexao->prepare($sql);
         
        $prepare->bindValue(":id",$id);
       
        $prepare->execute();
       return $prepare->rowCount();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
//put your code here
}
