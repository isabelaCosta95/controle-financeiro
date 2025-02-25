<?php

namespace App\DAO;

class LancamentoDAO extends DAO{
    public function __construct(){

        parent::__construct();

    }

    public function insert($dados_lancamento) {
        $sql = "INSERT INTO lancamentos (tipo, data_lancamento, descricao, valor, categoria_id, forma_pagamento, parcelas, vencimento, status, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_lancamento['tipo']);
        $stmt->bindValue(2,$dados_lancamento['data_lancamento']);
        $stmt->bindValue(3,$dados_lancamento['descricao']);
        $stmt->bindValue(4,$dados_lancamento['valor']);
        $stmt->bindValue(5,$dados_lancamento['categoria_id']);
        $stmt->bindValue(6,$dados_lancamento['forma_pagamento']);
        $stmt->bindValue(7,$dados_lancamento['parcelas']);
        $stmt->bindValue(8,$dados_lancamento['vencimento']);
        $stmt->bindValue(9,$dados_lancamento['status']);
        $stmt->bindValue(10,$dados_lancamento['observacoes']);

        $stmt->execute();
    }
    

    public function update($dados_lancamento) {
        $sql = "UPDATE lancamentos SET 
                    tipo = ?, 
                    data_lancamento = ?, 
                    descricao = ?, 
                    valor = ?, 
                    categoria_id = ?, 
                    forma_pagamento = ?, 
                    parcelas = ?, 
                    vencimento = ?, 
                    status = ?, 
                    observacoes = ?
                WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_lancamento['tipo']);
        $stmt->bindValue(2,$dados_lancamento['data_lancamento']);
        $stmt->bindValue(3,$dados_lancamento['descricao']);
        $stmt->bindValue(4,$dados_lancamento['valor']);
        $stmt->bindValue(5,$dados_lancamento['categoria_id']);
        $stmt->bindValue(6,$dados_lancamento['forma_pagamento']);
        $stmt->bindValue(7,$dados_lancamento['parcelas']);
        $stmt->bindValue(8,$dados_lancamento['vencimento']);
        $stmt->bindValue(9,$dados_lancamento['status']);
        $stmt->bindValue(10,$dados_lancamento['observacoes']);
        $stmt->bindValue(11,$dados_lancamento['id']);

        $stmt->execute();
    }
    

    public function delete($id){
        $sql = "DELETE FROM lancamentos where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM lancamentos");
        $stmt->execute();

        $arr_lancamento = array();

        while($c = $stmt->fetchObject()){
            $arr_lancamento[] = $c;
        }

        return $arr_lancamento;
    }

    public function getById($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM lancamentos WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
        
    }
}