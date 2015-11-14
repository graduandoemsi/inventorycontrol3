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

        if (isset($response)) {
            $usuario = new Usuario();
            $usuarioDAO = new UsuarioDAO();
            $usuario->setLogin($response["login"]);
            $usuario->setSenha($response["senha"]);
            $respostaBanco = $usuarioDAO->login($usuario);
            if ($respostaBanco == null) {
                $responseJson = array(
                    mensagem => "Usuário ou senha inválidos!",
                    resposta=> FALSE
                );

                return json_encode($responseJson);
            } else {
                 $responseJson = array(
                mensagem => "Logado com sucesso!",
                resposta=> TRUE
            );
            }
        } else {
            $a = null;

            $responseJson = array(
                mensagem => "Por favor informe seu usuário e senha",
                resposta=> FALSE
            );
            return json_encode($responseJson);
        }
    }

    public static function cadastrar($response) {

        if (isset($response)) {
            $usuario = new Usuario();
            $usuarioDAO = new UsuarioDAO();
            $usuario->setCategoria_id($response["categoria_id"]);
            $usuario->setLogin($response["login"]);
            $usuario->setSenha($response["senha"]);
            $usuarioDAO->insert($usuario);
        } else {
            
        }
    }

    //put your code here
}
