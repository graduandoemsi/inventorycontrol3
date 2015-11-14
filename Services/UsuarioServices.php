<?php

require_once ('..\to\Usuario.php');
require_once ('..\dao\UsuarioDAO.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioServices
 *
 * @author Isnack Developer
 */
class UsuarioServices {

    public static function login($response) {
        
        if(isset($response)){
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        $usuario->setLogin($response["login"]);
        $usuario->setSenha($response["senha"]);
       $respostaBanco= $usuarioDAO->insert($usuario);
       
       
      
            $responseJson=  array(
                resposta=>"Por favor informe seu usuário e senha"
            );
            return json_encode($responseJson);
        }
    }
    
    public static function cadastrar($response){
        
        if(isset($response)){
            $usuario = new Usuario();
            $usuarioDAO = new UsuarioDAO();
            $usuario->setCategoria_id($response["categoria_id"]);
            $usuario->setLogin($response["login"]);
            $usuario->setSenha($response["senha"]);
            $usuarioDAO->insert($usuario);
            
        }else{
            
        }
        
    }

    //put your code here
}
