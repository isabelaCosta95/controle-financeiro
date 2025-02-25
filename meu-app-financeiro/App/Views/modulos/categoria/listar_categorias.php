<html>
    <head>
        <title>SISTEMA</title>
        <?php include_once PATH_VIEW . 'includes/css_config.php';?>
    </head>
    <body>
        <?php include_once PATH_VIEW . 'includes/cabecalho.php';?>
        <main>

            <table class="table table-striped table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Ações</th>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < $total_categoria; $i++) { ?>
                        <tr>
                            <td>
                                <a href="/meu-app-financeiro/categoria/ver?id=<?= $lista_categoria[$i]->id ?>" class="btn btn-warning btn-sm">
                                    Abrir
                                </a>
                            </td>
                            <td><?= $lista_categoria[$i]->id ?></td>
                            <td><?= $lista_categoria[$i]->nome ?></td>
                            <td><?= $lista_categoria[$i]->descricao ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </main>
        <?php include_once PATH_VIEW . 'includes/rodape.php';?>
    </body>
</html>