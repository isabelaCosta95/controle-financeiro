<head>
    <?php include 'css_config.php';?>
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/meu-app-financeiro"><h1>CONTROLE FINANCEIRO</h1></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/meu-app-financeiro">Tela Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="/meu-app-financeiro/categoria/cadastrar">Cadastrar Categoria</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="/meu-app-financeiro/categoria">Listar Categoria</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="/meu-app-financeiro/lancamento/cadastrar">Cadastrar Lançamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/meu-app-financeiro/lancamento">Listar Lançamento</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="/meu-app-financeiro/usuario/meus-dados">Usuário</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <fieldset>
                <legend>Dados do usuário</legend>
                    Bem-vindo <strong>
                    <a href="/meu-app-financeiro/usuario/meus-dados"> <?= App\Controller\LoginController::nomeUsuario(); ?></a>
                </strong> | <a href="/meu-app-financeiro/sair" class="btn btn-info">Sair</a>
            </fieldset>
        </div>
    </div>
    <hr>
</header>