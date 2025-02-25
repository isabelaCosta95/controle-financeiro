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
                        <th>Tipo</th>
                        <th>Data de Lançamento</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Categoria</th>
                        <th>Forma de Pagamento</th>
                        <th>Parcelas</th>
                        <th>Vencimento</th>
                        <th>Status</th>
                        <th>Observações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_lancamento; $i++) { ?>
                        <tr>
                            <td>
                                <a href="/meu-app-financeiro/lancamento/ver?id=<?= $lista_lancamento[$i]->id ?>" class="btn btn-warning btn-sm">
                                    Abrir
                                </a>
                            </td>
                            <td><?= $lista_lancamento[$i]->id ?></td>
                            <td><?= $lista_lancamento[$i]->tipo ?></td>
                            <td><?= $lista_lancamento[$i]->data_lancamento ?></td>
                            <td><?= $lista_lancamento[$i]->descricao ?></td>
                            <td><?= $lista_lancamento[$i]->valor ?></td>
                            <td><?= $lista_lancamento[$i]->categoria_id ?></td>
                            <td><?= $lista_lancamento[$i]->forma_pagamento ?></td>
                            <td><?= $lista_lancamento[$i]->parcelas ?></td>
                            <td><?= $lista_lancamento[$i]->vencimento ?></td>
                            <td><?= $lista_lancamento[$i]->status ?></td>
                            <td><?= $lista_lancamento[$i]->observacoes ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </main>
        <?php include_once PATH_VIEW . 'includes/rodape.php';?>
    </body>
</html>