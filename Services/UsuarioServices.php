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
                    resposta => FALSE
                );

                return json_encode($responseJson);
            } else {
                $responseJson = array(
                    mensagem => "Logado com sucesso!",
                    resposta => TRUE
                );
            }
        } else {
            $responseJson = array(
                mensagem => "Por favor informe seu usuário e senha",
                resposta => FALSE
            );
            return json_encode($responseJson);
        }
    }

    public static function cadastrar($response) {

        if (isset($response["login"]) && isset($response["senha"]) && isset($response["categoria_id"])) {
            $usuario = new Usuario();
            $usuarioDAO = new UsuarioDAO();
            $usuario->setCategoria_id($response["categoria_id"]);
            $usuario->setLogin($response["login"]);
            $usuario->setSenha($response["senha"]);
            $id = $usuarioDAO->insert($usuario);
            if ($id) {
                $responseJson = array(
                    "mensagem" => "Usuário cadastrado com sucesso!!",
                    "resposta" => TRUE
                );
                return json_encode($responseJson);
            } else {
                $responseJson = array(
                    "mensagem" => "Usuário não foi cadastrado!",
                    "resposta" => FALSE
                );
                return json_encode($responseJson);
            }
        } else {

            $responseJson = array(
                "mensagem" => "Por favor informar os campos!",
                "resposta" => FALSE
            );
            return json_encode($responseJson);
        }
    }

    //put your code here
}
