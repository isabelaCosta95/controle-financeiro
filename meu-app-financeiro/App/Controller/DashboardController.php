<?php

namespace App\Controller;

use App\DAO\DashboardDAO;
class DashboardController extends Controller{

    /** 
     * Exibe dados do Dashboard
     */
    public static function index() {
        parent::isProtected();
    
        $dashboardDAO = new DashboardDAO();
    
        $saldoPorCategoria = $dashboardDAO->saldoGeralCategoria();
        $totalSaldoPorCategoria = count($saldoPorCategoria);
    
        $saldoAtualizado = $dashboardDAO->saldoAtual();
    
        $receitaDespesaAtual = $dashboardDAO->receitaXDespesaMesAtual();
        $totalReceitaDespesaAtual = count($receitaDespesaAtual);
    
        $receitaDespesaAnterior = $dashboardDAO->receitaXDespesaMesAnterior();
        $totalReceitaDespesaAnterior = count($receitaDespesaAnterior);
    
        $contasVencidas = $dashboardDAO->contasVencidas();
        $totalContasVencidas = count($contasVencidas);
    
        $contasMesAtual = $dashboardDAO->contasMesAtual();
        $totalContasMesAtual = count($contasMesAtual);
    
        include PATH_VIEW . 'home.php';
    }
    
}