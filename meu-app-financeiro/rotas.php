<?php

// Página destinada as rotas do sistema, feitas com switch case

use App\Controller\{DashboardController, LoginController, CategoriaController, LancamentoController, UsuarioController};

try {

    switch($uri_parse) {

        // Login
        case '/meu-app-financeiro/login':
            LoginController::login();
        break;

        case '/meu-app-financeiro/autenticar':
            LoginController::autenticar();
        break;
        
        case '/meu-app-financeiro/sair':
            LoginController::sair();
        break;


        // Página Inicial
        case '/meu-app-financeiro/':
            DashboardController::index();
        break;


        // Usuário
        case '/meu-app-financeiro/usuario/meus-dados':
            UsuarioController::meusDados();
        break;

        case '/meu-app-financeiro/usuario/salvar':
            UsuarioController::salvar();
        break;



        // Categoria
        case '/meu-app-financeiro/categoria':
            CategoriaController::index(); 
        break;

        case '/meu-app-financeiro/categoria/cadastrar':
            CategoriaController::cadastrar();
        break;

        case '/meu-app-financeiro/categoria/salvar':
            CategoriaController::salvar();
        break;

        case '/meu-app-financeiro/categoria/ver':
            CategoriaController::ver();
        break;

        case '/meu-app-financeiro/categoria/excluir':
            CategoriaController::excluir();
        break;


        // Lançamento
        case '/meu-app-financeiro/lancamento':
            LancamentoController::index(); 
        break;

        case '/meu-app-financeiro/lancamento/cadastrar':
            LancamentoController::cadastrar();
        break;

        case '/meu-app-financeiro/lancamento/salvar':
            LancamentoController::salvar();
        break;

        case '/meu-app-financeiro/lancamento/ver':
            LancamentoController::ver();
        break;

        case '/meu-app-financeiro/lancamento/excluir':
            LancamentoController::excluir();
        break;


        default:
            echo "Página não encontrada.";
        break;

    }

}
catch(Exception $e) {
    echo "Ocorreu um erro!!";
}