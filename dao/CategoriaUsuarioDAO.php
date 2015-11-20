<?php
require_once 'dao/conexaoBanco.php';
require_once 'to/CategoriaUsuario.php';
require_once 'dao/Crud.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaUsuarioDAO
 
 */
class CategoriaUsuarioDAO implements Crud {

    public function delete($id) {
        try {
        $conexao = ConexaoBanco::getInstance()->getConnection();
        $sql = "delete from categoria_usuario where id=:id";
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
        $sql = "select * from categoria_usuario where id=:id";
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
        $sql = "insert into categoria_usuario (descricao) values (:descricao)";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":descricao",$obj->getDescricao());
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
        $sql = "update categoria_usuario set(descricao) values (:descricao) where id=:id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":descricao",$obj->getDescricao());
        $prepare->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

}
