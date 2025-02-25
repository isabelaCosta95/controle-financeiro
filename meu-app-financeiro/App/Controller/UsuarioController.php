<?php

namespace App\Controller;

use App\DAO\UsuarioDAO;

class UsuarioController extends Controller {

    /** 
     * Direciona a página de alteração de dados e retorna a mensagem se a alteração foi bem sucedida
     */
    public static function meusDados(){

        parent::isProtected();

        $usuario_DAO = new UsuarioDAO();

        $meus_dados = $usuario_DAO->buscarUsuarioPorId(LoginController::idDoUsuario());

        if(isset($_GET['sucess'])) {
            $retorno = "Dados alterados com sucesso";
        }

        if(isset($_GET['fail'])) {
            $retorno = "Senha incorreta! Não foi possóvel fazer alterações";
        }

        if(isset($_GET['confirmation'])) {
            $retorno = "Senha não alterada!";
        }

        include PATH_VIEW . '/modulos/usuario/meus-dados.php';
    }

    
    /** 
     * Confere se a senhas estão certas e salva os dados do usuário no banco de dados
     */
    public static function salvar() {
        parent::isProtected();

        // Usuário colocou senha atual correta?
        if(self::verificarSenhaUsuarioAtual($_POST['senha_atual'])){

            if(!empty($_POST['senha'])) {
                if($_POST['senha'] == $_POST['nova_senha']) {
                    $nova_senha = $_POST['nova_senha'];
                }
                else {
                    header("Location: /meu-app-financeiro/usuario/meus-dados?confirmation=false");
                }
            }


            $usuario_DAO = new UsuarioDAO();
            $dados_salvar = array(
                'id' => LoginController::idDoUsuario(),
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => isset($nova_senha) ? $nova_senha : $_POST['senha_atual']
            );
                
            $usuario_DAO->update($dados_salvar);

            LoginController::novoNomeUsuario($dados_salvar['nome']);

            header("Location: /meu-app-financeiro/usuario/meus-dados?sucess=true");

        } else {
            header("Location: /meu-app-financeiro/usuario/meus-dados?fail=true");
        }

    }
    /**
     * Verifica se a senha informada corresponde à senha do usuário
     */
    private static function verificarSenhaUsuarioAtual($senha) {
        $usuario_DAO = new UsuarioDAO();

        $id = LoginController::idDoUsuario();

        $retorno = $usuario_DAO->verificarUsuarioPorIdESenha($id, $senha);

        return ($retorno !== false) ? true : false;
    }
}