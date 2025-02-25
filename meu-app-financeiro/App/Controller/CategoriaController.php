<?php

namespace App\Controller;

use App\DAO\CategoriaDAO;

class CategoriaController extends Controller {

    /** 
     * Retorna a listagem de Todas as Categorias
     */
    public static function index(){

        parent::isProtected();

        $categoria_DAO = new CategoriaDAO();
        $lista_categoria = $categoria_DAO->getAllRows();
        $total_categoria = count($lista_categoria);
            
        include PATH_VIEW . 'modulos/categoria/listar_categorias.php';
    }

    /** 
     * Envia para a página de cadastrar categoria
     */
    public static function cadastrar(){

        parent::isProtected();

        include PATH_VIEW . 'modulos/categoria/cadastrar_categoria.php';
    }

    /** 
     * Salva os dados da categoria no banco de dados
     */
    public static function salvar(){

        parent::isProtected();

        $categoria_DAO = new CategoriaDAO();
        $dados_salvar = array(
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao']
        );
            
        if(isset($_POST['id'])){
            $dados_salvar['id'] = $_POST['id'];
            $categoria_DAO->update($dados_salvar);
        }
        else{
            $categoria_DAO->insert($dados_salvar);
        }
        header('Location: /meu-app-financeiro/categoria');        
    }

    /** 
     * Exclui a categoria
     */
    public static function excluir(){

        parent::isProtected();

        $categoria_DAO = new CategoriaDAO();
        $categoria_DAO->delete($_GET['id']);
        header("Location: /meu-app-financeiro/categoria");
    }

    /** 
     * Exibe as informações da categoria expecífica para edição
     */
    public static function ver(){

        parent::isProtected();
        
        if(isset($_GET['id'])){
            $categoria_DAO = new CategoriaDAO();
            $dados_categoria = $categoria_DAO->getById($_GET['id']);
        
            include PATH_VIEW . 'modulos/categoria/cadastrar_categoria.php';
        }
        else{
            header("Location: /meu-app-financeiro/categoria");
        }
    }
}