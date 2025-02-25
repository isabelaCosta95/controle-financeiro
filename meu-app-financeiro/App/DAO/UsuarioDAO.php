<?php

namespace App\DAO;

class UsuarioDAO extends DAO{
    public function __construct(){

        parent::__construct();

    }

    public function insert($dados_usuario) {
        $sql = "INSERT INTO usuario(nome, descricao) VALUES(?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_usuario['nome']);
        $stmt->bindValue(2, $dados_usuario['descricao']);
        $stmt->execute();
    }

    public function update($dados_usuario){
        $sql = "UPDATE usuario set nome = ?, email = ?, senha = sha1(?) where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_usuario['nome']);
        $stmt->bindValue(2,$dados_usuario['email']);
        $stmt->bindValue(3,$dados_usuario['senha']);
        $stmt->bindValue(4,$dados_usuario['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM usuario where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM usuario");
        $stmt->execute();

        $arr_usuario = array();

        while($c = $stmt->fetchObject()){
            $arr_usuario[] = $c;
        }

        return $arr_usuario;
    }

    /**
     * Dados do usuário de acordo com o ID
     */
    public function buscarUsuarioPorId($id) {
        $stmt = $this->conexao->prepare("SELECT id, nome, usuario, email FROM usuario WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
        
    }

    /**
     * Verifica se o ID do usuário e a senha são de algum usuário
     */
    public function verificarUsuarioPorIdESenha($id, $senha) {
        $stmt = $this->conexao->prepare("SELECT id FROM usuario WHERE id = ? AND senha = sha1(?)");
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject();
    }
}