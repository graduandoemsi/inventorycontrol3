<?php

require_once '../dao/conexaoBanco.php';
require_once '../to/Usuario.php';
require_once '../dao/Crud.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *

 */
class UsuarioDAO implements Crud {

    public function delete($id) {
        try {
            $conexao = ConexaoBanco::getInstance()->getConnection();
            $sql = "delete from usuario where id=:id";
            $prepare = $conexao->prepare($sql);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function get($id) {
        try {
            $conexao = ConexaoBanco::getInstance()->getConnection();
            $sql = "select * from usuario where id=:id";
            $prepare = $conexao->prepare($sql);
            $prepare->bindValue(":id", $id);
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
            $sql = "insert into usuario (login,senha,categoria_id) values (:login,:senha,:categoria_id)";
            $prepare = $conexao->prepare($sql);
            $prepare->bindValue(":login", $obj->getLogin());
            $prepare->bindValue(":senha", $obj->getSenha());
            $prepare->bindValue(":categoria_id", $obj->getCategoria_id());
            $prepare->execute();
            $prepare->errorInfo();
            $id = $conexao->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $id;
    }

    public function update($id, $obj) {
        try {
            $conexao = ConexaoBanco::getInstance()->getConnection();
            $sql = "update usuario set(senha,categoria_id) values (:senha,:categoria_id) where id=:id";
            $prepare = $conexao->prepare($sql);
            $prepare->bindValue(":senha", $obj->getSenha());
            $prepare->bindValue(":categoria_id", $obj->getCategoria_id());
            $prepare->bindValue(":id",$obj->getId());
            $prepare->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login(Usuario $usuario) {
        try {
            $conexao = ConexaoBanco::getInstance()->getConnection();
            $sql = "select * from usuario where login=:login and senha=:senha";
            $prepare = $conexao->prepare($sql);
            $prepare->bindValue(":login", $usuario->getLogin());
            $prepare->bindValue(":senha", $usuario->getSenha());
            $prepare->execute();
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

//put your code here
}
