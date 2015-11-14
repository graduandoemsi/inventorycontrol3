<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 * Classe de tranferencia de dados
 * @author Isnack Developer
 */
class Produto {
    private $id;
    private $descricao;
    private $status;
    private $categoria_produto_id;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getStatus() {
        return $this->status;
    }

    function getCategoria_produto_id() {
        return $this->categoria_produto_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setCategoria_produto_id($categoria_produto_id) {
        $this->categoria_produto_id = $categoria_produto_id;
    }


   
}
