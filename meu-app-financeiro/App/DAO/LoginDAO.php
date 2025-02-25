<?php

namespace App\DAO;
class LoginDAO extends DAO{
    public function __construct(){

        parent::__construct();

    }

    /**
     * Busca um usuário no banco de dados com base no nome de usuário e senha
     */
    public function buscarUsuarioPorCredenciais($usuario, $senha) {
        $sql = "SELECT id, nome FROM usuario WHERE usuario=? AND senha =sha1(?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject();
        
    }

}