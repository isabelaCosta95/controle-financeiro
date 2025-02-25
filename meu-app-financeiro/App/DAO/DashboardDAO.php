<?php

namespace App\DAO;
class DashboardDAO extends DAO{
    public function __construct(){

        parent::__construct();

    }

    public function saldoGeralCategoria(){
        $sql = "SELECT c.nome, 
                SUM(CASE WHEN l.tipo = 'receita' THEN l.valor ELSE 0 END) AS total_receitas,
                SUM(CASE WHEN l.tipo = 'despesa' THEN -l.valor ELSE 0 END) AS total_despesas,
                SUM(CASE WHEN l.tipo = 'receita' THEN l.valor ELSE 0 END) - SUM(CASE WHEN l.tipo = 'despesa' THEN l.valor ELSE 0 END) AS saldo
         FROM lancamentos l 
         INNER JOIN categoria c ON (l.categoria_id = c.id)
         GROUP BY l.categoria_id
         ORDER BY saldo
         LIMIT 3";


        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $arr_gastosCategoria = array();

        while($c = $stmt->fetchObject()){
            $arr_gastosCategoria[] = $c;
        }

        return $arr_gastosCategoria;
    }

    public function saldoAtual() {
        $sql = "SELECT 
                SUM(CASE WHEN tipo = 'receita' THEN valor ELSE 0 END) - SUM(CASE WHEN tipo = 'despesa' THEN valor ELSE 0 END) AS saldo
         FROM lancamentos";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public function receitaXDespesaMesAtual(){
        $sql = "SELECT 
                SUM(CASE WHEN tipo = 'receita' THEN valor ELSE 0 END) AS total_receitas,
                SUM(CASE WHEN tipo = 'despesa' THEN -valor ELSE 0 END) AS total_despesas,
                SUM(CASE WHEN tipo = 'receita' THEN valor ELSE 0 END) - SUM(CASE WHEN tipo = 'despesa' THEN valor ELSE 0 END) AS saldo
         FROM lancamentos
         WHERE data_lancamento BETWEEN '" . date("Y-m-01") . "' AND '" . date("Y-m-t") . "'";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $arr_receitaXdespesa = array();

        while($c = $stmt->fetchObject()){
            $arr_receitaXdespesa[] = $c;
        }

        return $arr_receitaXdespesa;
    }

    public function receitaXDespesaMesAnterior(){
        $sql = "SELECT 
                SUM(CASE WHEN tipo = 'receita' THEN valor ELSE 0 END) AS total_receitas,
                SUM(CASE WHEN tipo = 'despesa' THEN -valor ELSE 0 END) AS total_despesas,
                SUM(CASE WHEN tipo = 'receita' THEN valor ELSE 0 END) - SUM(CASE WHEN tipo = 'despesa' THEN valor ELSE 0 END) AS saldo
         FROM lancamentos
         WHERE data_lancamento BETWEEN '" . date("Y-m-01", strtotime("-1 month")) . "' AND '" . date("Y-m-t", strtotime("-1 month")) . "'";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $arr_receitaXdespesa = array();

        while($c = $stmt->fetchObject()){
            $arr_receitaXdespesa[] = $c;
        }

        return $arr_receitaXdespesa;
    }

    public function contasVencidas(){
        $sql = "SELECT id, descricao, data_lancamento, vencimento FROM lancamentos 
        WHERE vencimento < CURDATE()
        AND status = 'pendente'";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $arr_vencidas = array();

        while($c = $stmt->fetchObject()){
            $arr_vencidas[] = $c;
        }

        return $arr_vencidas;
    }

    public function contasMesAtual(){
        $sql = "SELECT id, descricao, data_lancamento, vencimento FROM lancamentos 
        WHERE MONTH(vencimento) =  MONTH(CURDATE())
        AND status = 'pendente'";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $arr_atual = array();

        while($c = $stmt->fetchObject()){
            $arr_atual[] = $c;
        }

        return $arr_atual;
    }
}      