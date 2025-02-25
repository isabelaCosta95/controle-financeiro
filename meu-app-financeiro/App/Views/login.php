<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include 'includes/css_config.php';?>
</head>
<body>
    <div>
        <header>
            <h1>Login</h1>
        </header>
    </div>
    <main>
        <form action="/meu-app-financeiro/autenticar" method="post">
            <div class="mb-3">
                <label for="user" class="form-label">Usuário</label>
                <input name="user" type="text" class="form-control w-25" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Senha</label>
                <input name="pass" type="password" class="form-control w-25" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-success">Entrar</button>
        </form>
    </main>
</body>
</html>