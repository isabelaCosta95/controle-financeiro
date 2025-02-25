<?php

namespace App\DAO;
class CategoriaDAO extends DAO{
    public function __construct(){

        parent::__construct();

    }

    public function insert($dados_categoria) {
        $sql = "INSERT INTO categoria(nome, descricao) VALUES(?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_categoria['nome']);
        $stmt->bindValue(2, $dados_categoria['descricao']);
        $stmt->execute();
    }

    public function update($dados_categoria){
        $sql = "UPDATE categoria set nome = ?, descricao = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_categoria['nome']);
        $stmt->bindValue(2,$dados_categoria['descricao']);
        $stmt->bindValue(3,$dados_categoria['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM categoria where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM categoria");
        $stmt->execute();

        $arr_categoria = array();

        while($c = $stmt->fetchObject()){
            $arr_categoria[] = $c;
        }

        return $arr_categoria;
    }

    public function getById($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM categoria WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
        
    }
}