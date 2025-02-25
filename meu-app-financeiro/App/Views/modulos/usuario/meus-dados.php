<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>
</head>
<body>
    <div>
        <?php include_once PATH_VIEW . 'includes/cabecalho.php';?>
    </div>
    <main>

    <?= isset($retorno) ? $retorno : '' ;?>

        <form action="/meu-app-financeiro/usuario/salvar" method="post">
            <label>Nome:
                <input name="nome" type="text" value="<?= $meus_dados->nome;?>">
            </label>

            <label>email:
                <input name="email" type="email" value="<?= $meus_dados->email;?>">
            </label>

            <label>senha:
                <input name="senha" type="password">
            </label>

            <label>Confirme nova senha:
                <input name="nova_senha" type="password" >
            </label>

            <label>senha atual:
                <input name="senha_atual" type="password" required>
            </label>

            <button type="submit">Salvar</button>
        </form>
    </main>
    <?php include_once PATH_VIEW . 'includes/rodape.php';?>
</body>
</html>