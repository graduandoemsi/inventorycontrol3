<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estoque
 * Classe de tranferencia de dados
 * @author Isnack Developer
 */
class Estoque {
    
    private $id;
    private $id_produto;
    private $quantidade;
    
    
    function getId() {
        return $this->id;
    }

    function getId_produto() {
        return $this->id_produto;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_produto($id_produto) {
        $this->id_produto = $id_produto;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }


   
}
