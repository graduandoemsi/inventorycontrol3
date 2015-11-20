<?php

//require_once '../config.php';
 require_once ('../config.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexaoBanco
 *
 * @author Isnack 
 */
class ConexaoBanco {

    private static $instance;

    private function __construct() {
        //  
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {

                self::$instance = new ConexaoBanco();
            } catch (Exception $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
    
    public function getConnection(){
        return  new PDO("mysql:host=" . HOST . "; dbname=" . DB_NAME . ";", DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
    }

}

?>