<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Toque&Estoque</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="src/styles/signin.css">
    </head>
    <body class="text-center"> 
        <form class="form-signin" method="POST" action="<?php echo base_url('session') ?>">
            <img class="login-logo" src="src/images/logo.png" alt="Logo">
            <h1 class="h3 mb-3 font-weight-normal">Acesse sua conta</h1>
            <label for="inputStoreEmail" class="sr-only">E-mail</label>
            <input type="text" id="inputStoreEmail" name="email_loja" class="form-control" placeholder="E-mail" required autofocus>
            <label for="inputStorePassword" class="sr-only">Senha</label>
            <input type="password" id="inputStorePassword" name="senha_loja" class="form-control" placeholder="Senha" required>
            <div class="mb-3">
              <p>Não possui conta? <a href="register">Cadastre-se</a></p>
            </div>
            <button class="btn btn-lg btn-primary btn-block button-submit" type="submit">Acessar</button>
            <p class="mt-5 mb-3 text-muted">Toque&Estoque&copy; 2020</p>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="src/js/signin.js"></script>
    </body>
</html>
