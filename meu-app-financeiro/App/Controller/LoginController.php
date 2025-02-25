<?php

namespace App\Controller;

use App\DAO\LoginDAO;
use Error;
use Exception;
class LoginController extends Controller{

    /** 
     * Redireciona ao login
     */
    public static function login() {
        include PATH_VIEW . 'login.php';
    }

    /** 
     * Autenticacao usuário e senha
     */
    public static function autenticar() {

        $usuario = $_POST["user"];
        $senha = $_POST["pass"];

        $login_DAO = new LoginDAO();

        $resultado = $login_DAO->buscarUsuarioPorCredenciais($usuario, $senha);

        if($resultado !== false) {
            $_SESSION["usuario_logado"] = array('id'   => $resultado->id,
                                                'nome' => $resultado->nome);
            header("Location: /meu-app-financeiro/");
        } else{
            header("Location: /meu-app-financeiro/login?fail=true");
        }

    }

    /** 
     * Finaliza a sessão e sai do sistema
     */
    public static function sair() {

        unset($_SESSION["usuario_logado"]);
        parent::isProtected();

    }

    /** 
     * Retorna o nome do usuário guardado na sessão
     */
    public static function nomeUsuario() {
        return $_SESSION['usuario_logado']['nome'];
    }

    /** 
     * Atualiza o nome do usuário na sessão
     */
    public static function novoNomeUsuario($nome) {
        $_SESSION['usuario_logado']['nome'] = $nome;
    }

    /** 
     * Retorna o id do usuário guardado na sessão
     */
    public static function idDoUsuario() {
        return $_SESSION['usuario_logado']['id'];
    }
}