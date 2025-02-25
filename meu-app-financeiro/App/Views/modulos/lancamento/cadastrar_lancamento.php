<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançamentos</title>
</head>
<body>
    <div>
        <?php include_once PATH_VIEW . 'includes/cabecalho.php';?>
    </div>
    <main>
        <form action="/meu-app-financeiro/lancamento/salvar" method="post">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <label for="tipo">Tipo</label>
                        <select class="form-select" name="tipo" id="tipo">
                            <option value="receita" <?= isset($dados_lancamento) && $dados_lancamento->tipo === 'receita' ? 'selected' : '' ?>>Receita</option>
                            <option value="despesa" <?= isset($dados_lancamento) && $dados_lancamento->tipo === 'despesa' ? 'selected' : '' ?>>Despesa</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="data_lancamento">Data do Lançamento</label>
                        <input class="form-control form-control-lg w-100" name="data_lancamento" type="text"
                        value="<?= isset($dados_lancamento) ? $dados_lancamento->data_lancamento : '' ;?>">
                    </div>
                    
                </div>
                

                <div class="row">

                    <div class="col-12 col-md-6">
                        <label>Descrição</label>
                        <input class="form-control form-control-lg w-100" name="descricao" type="text"
                        value="<?= isset($dados_lancamento) ? $dados_lancamento->descricao : '' ;?>">
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Valor</label>
                        <input class="form-control form-control-lg w-100" name="valor" type="text"
                        value="<?= isset($dados_lancamento) ? $dados_lancamento->valor : '' ;?>">
                    </div>
                    
                </div>
                
                <div class="row">

                    <div class="col-12 col-md-6">
                        <label for="categoria_id ">Categoria</label>
                        <select class="form-select" id="categoria_id" name="categoria_id">
                            <option>Selecione</option>
                            <?php for ($i = 0; $i < $total_categoria; $i++): 
                                $selecionado = "";
                                if (isset($dados_lancamento->id)) 
                                    $selecionado = ($lista_categoria[$i]->id == $dados_lancamento->categoria_id) ? "selected" : "";
                            ?>
                                <option value="<?= $lista_categoria[$i]->id ?>" <?= $selecionado ?>>
                                    <?= $lista_categoria[$i]->nome ?>
                                </option>
                            <?php endfor ?>
                        </select>  
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="forma_pagamento">Forma de Pagamento</label>
                        <select class="form-select" name="forma_pagamento" id="forma_pagamento">
                            <option value="dinheiro" <?= isset($dados_lancamento) && $dados_lancamento->forma_pagamento === 'dinheiro' ? 'selected' : '' ?>>Dinheiro</option>
                            <option value="cartao_credito" <?= isset($dados_lancamento) && $dados_lancamento->forma_pagamento === 'cartao_credito' ? 'selected' : '' ?>>Cartão de Crédito</option>
                            <option value="cartao_debito" <?= isset($dados_lancamento) && $dados_lancamento->forma_pagamento === 'cartao_debito' ? 'selected' : '' ?>>Cartão de Débito</option>
                            <option value="boleto" <?= isset($dados_lancamento) && $dados_lancamento->forma_pagamento === 'boleto' ? 'selected' : '' ?>>Boleto</option>
                            <option value="pix" <?= isset($dados_lancamento) && $dados_lancamento->forma_pagamento === 'pix' ? 'selected' : '' ?>>Pix</option>
                            <option value="transferencia" <?= isset($dados_lancamento) && $dados_lancamento->forma_pagamento === 'transferencia' ? 'selected' : '' ?>>Transferência</option>
                        </select>
                    </div>
                    
                </div>

                
                <div class="row">

                    <div class="col-12 col-md-6">
                        <label>Parcelas</label>
                        <input class="form-control form-control-lg w-100" name="parcelas" type="text"
                        value="<?= isset($dados_lancamento) ? $dados_lancamento->parcelas : '' ;?>">
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Vencimento</label>
                        <input class="form-control form-control-lg w-100" name="vencimento" type="text"
                        value="<?= isset($dados_lancamento) ? $dados_lancamento->vencimento : '' ;?>">
                    </div>
                    
                </div>

                <div class="row">

                    <div class="col-12 col-md-6">
                        <label>Status</label>
                        <input class="form-control form-control-lg w-100" name="status" type="text"
                        value="<?= isset($dados_lancamento) ? $dados_lancamento->status : '' ;?>">
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Observacoes</label>
                        <input class="form-control form-control-lg w-100" name="observacoes" type="text"
                        value="<?= isset($dados_lancamento) ? $dados_lancamento->observacoes : '' ;?>">
                    </div>
                    
                </div>

                <?php if(isset($dados_lancamento)): ?>
                    <input class="form-control form-control-lg w-100" type="hidden" name="id" value="<?= $dados_lancamento->id?>">

                    <a class="btn btn-danger btn-lg" href="/meu-app-financeiro/lancamento/excluir?id=<?= $dados_lancamento->id?>">Excluir</a>
                <?php endif ?>

                <br>
                <button class="btn btn-success btn-lg" type="submit">Salvar</button>
            </div>
            
        </form>
    </main>
    <?php include_once PATH_VIEW . 'includes/rodape.php';?>
</body>
</html>