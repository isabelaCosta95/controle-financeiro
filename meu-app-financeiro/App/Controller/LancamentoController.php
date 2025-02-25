<?php

namespace App\Controller;
use App\DAO\{LancamentoDAO, CategoriaDAO};

class LancamentoController extends Controller{

    /** 
     * Retorna a listagem de Todos os lançamentos
     */
    public static function index(){

        parent::isProtected();

        $lancamento_DAO = new LancamentoDAO();
        $lista_lancamento = $lancamento_DAO->getAllRows();
        $total_lancamento = count($lista_lancamento);
            
        include PATH_VIEW . 'modulos/lancamento/listar_lancamentos.php';
    }

    /** 
     * Envia para a página de cadastrar lançamentos
     */
    public static function cadastrar(){

        parent::isProtected();

        $categoria_DAO = new CategoriaDAO();
        $lista_categoria = $categoria_DAO->getAllRows();
        $total_categoria = count($lista_categoria);
        
        include PATH_VIEW . 'modulos/lancamento/cadastrar_lancamento.php';
    }
    /** 
     * Salva os dados do lançamento no banco de dados
     */
    public static function salvar(){

        parent::isProtected();

        $lancamento_DAO = new LancamentoDAO();
        $dados_salvar = array(
            'tipo' => $_POST["tipo"],
            'data_lancamento' => $_POST["data_lancamento"],
            'descricao' => $_POST["descricao"],
            'valor' => $_POST["valor"],
            'categoria_id' => $_POST["categoria_id"],
            'forma_pagamento' => $_POST["forma_pagamento"],
            'parcelas' => $_POST["parcelas"],
            'vencimento' => $_POST["vencimento"],
            'status' => $_POST["status"],
            'observacoes' => $_POST["observacoes"]
        );
            
        if(isset($_POST['id'])){
            $dados_salvar['id'] = $_POST['id'];
            $lancamento_DAO->update($dados_salvar);
        }
        else{
            $lancamento_DAO->insert($dados_salvar);
        }
        header('Location: /meu-app-financeiro/lancamento');        
    }

    /** 
     * Exclui o lançamento
     */
    public static function excluir(){

        parent::isProtected();

        $lancamento_DAO = new LancamentoDAO();
        $lancamento_DAO->delete($_GET['id']);
        header("Location: /meu-app-financeiro/lancamento");
    }

    /** 
     * Exibe as informações do lançamento expecífico para edição
     */
    public static function ver(){

        parent::isProtected();

        $categoria_DAO = new CategoriaDAO();
        $lista_categoria = $categoria_DAO->getAllRows();
        $total_categoria = count($lista_categoria);

        if(isset($_GET['id'])){
            $lancamento_DAO = new LancamentoDAO();
            $dados_lancamento = $lancamento_DAO->getById($_GET['id']);
        
            include PATH_VIEW . 'modulos/lancamento/cadastrar_lancamento.php';
        }
        else{
            header("Location: /meu-app-financeiro/lancamento");
        }
    }
}