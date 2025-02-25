<html>
    <head>
        <title>SISTEMA</title>
    </head>
    <body>
        <?php include 'includes/cabecalho.php';?>
        <main>
            <h2>Dashboard</h2>
            <div>
                <hr>
                <h3>Saldo Por categoria</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Receita</th>
                            <th>Despesa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<$totalSaldoPorCategoria;$i++) { ?>
                            <tr>
                                <td><?= $saldoPorCategoria[$i]->nome?></td> 
                                <td><?= $saldoPorCategoria[$i]->total_receitas?></td>
                                <td><?= $saldoPorCategoria[$i]->total_despesas?></td>
                                <td><?= $saldoPorCategoria[$i]->saldo?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div>
                <hr>
                <h3>Saldo Atual</h3>
                <p><?= $saldoAtualizado->saldo?></p>
            </div>

            <div>
                <hr>
                <h3>Receita X Despesa Mês Atual</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Receita</th>
                            <th>Despesa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<$totalReceitaDespesaAtual;$i++) { ?>
                            <tr>
                                <td><?= $receitaDespesaAtual[$i]->total_receitas?></td>
                                <td><?= $receitaDespesaAtual[$i]->total_despesas?></td>
                                <td><?= $receitaDespesaAtual[$i]->saldo?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div>
                <hr>
                <h3>Receita X Despesa Mês Anterior</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Receita</th>
                            <th>Despesa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<$totalReceitaDespesaAnterior;$i++) { ?>
                            <tr>
                                <td><?= $receitaDespesaAnterior[$i]->total_receitas?></td>
                                <td><?= $receitaDespesaAnterior[$i]->total_despesas?></td>
                                <td><?= $receitaDespesaAnterior[$i]->saldo?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div>
                <hr>
                <h3>Contas Vencidas</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Receita</th>
                            <th>Despesa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<$totalContasVencidas;$i++) { ?>
                            <tr>
                                <td><?= $contasVencidas[$i]->id?></td>
                                <td><?= $contasVencidas[$i]->descricao?></td>
                                <td><?= $contasVencidas[$i]->data_lancamento?></td>
                                <td><?= $contasVencidas[$i]->vencimento?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div>
                <hr>
                <h3>Contas mês atual</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Receita</th>
                            <th>Despesa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<$totalContasMesAtual;$i++) { ?>
                            <tr>
                                <td><?= $contasMesAtual[$i]->id?></td>
                                <td><?= $contasMesAtual[$i]->descricao?></td>
                                <td><?= $contasMesAtual[$i]->data_lancamento?></td>
                                <td><?= $contasMesAtual[$i]->vencimento?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php include 'includes/rodape.php';?>
    </body>
</html>