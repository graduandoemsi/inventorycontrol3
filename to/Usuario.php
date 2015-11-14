<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 * Classe de tranferencia de dados
 * @author Isnack Developer
 */
class Usuario {
    private $id;
    private $login;
    private $senha;
    private $categoria_id;
    
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }


    
}
