<?php

namespace App\Controller;
abstract class Controller {
    /** 
     * Verifica se o usuário está autenticado
     */
    protected static function isProtected() {
        if(!isset($_SESSION["usuario_logado"]))
            header("Location: /meu-app-financeiro/login");
    }
}