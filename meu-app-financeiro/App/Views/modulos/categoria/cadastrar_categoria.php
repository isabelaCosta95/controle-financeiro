<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria</title>
</head>
<body>
    <div>
        <?php include_once PATH_VIEW . 'includes/cabecalho.php';?>
    </div>
    <main>
        <form action="/meu-app-financeiro/categoria/salvar" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Nome</label>
                        <input class="form-control form-control-lg w-100" name="nome" type="text" 
                            value="<?= isset($dados_categoria) ? $dados_categoria->nome : '' ;?>">
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <label class="form-label">Descrição</label>
                        <input class="form-control form-control-lg w-100" name="descricao" type="text"
                            value="<?= isset($dados_categoria) ? $dados_categoria->descricao : '' ;?>">
                    </div>
                </div>
                

                <?php if(isset($dados_categoria)): ?>
                    <input type="hidden" name="id" value="<?= $dados_categoria->id?>">

                    <a class="btn btn-danger btn-lg" href="/meu-app-financeiro/categoria/excluir?id=<?= $dados_categoria->id?>">Excluir</a>
                <?php endif ?>
                <br>
                <button class="btn btn-success btn-lg" type="submit">Salvar</button>
            </div>
        </form>
    </main>
    <?php include_once PATH_VIEW . 'includes/rodape.php';?>
</body>
</html>