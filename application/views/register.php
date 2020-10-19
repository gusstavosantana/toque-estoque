<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastro | Toque&Estoque</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('src/styles/signin.css') ?>">
    </head>
    <body class="text-center"> 
        <form class="form-register" method="POST" action="<?php echo base_url('insert-user') ?>">
            <img class="login-logo" src="<?php echo base_url('src/images/logo.png') ?>" alt="Logo">
            <h1 class="h3 mb-3 font-weight-normal">Cadastre sua conta</h1>
            <div class="form-row">
                <div class="form-group col-md-6 text-left">
                    <label for="inputStoreName">Nome da loja</label>
                    <input type="text" class="form-control" name="nome_loja" id="inputStoreName" placeholder="Loja Exemplo" required/>
                </div>
                <div class="form-group col-md-6 text-left">
                    <label for="inputStoreUser">Usuário</label>
                    <input type="text" class="form-control" name="usuario_loja" id="inputStoreUser" placeholder="lojaexemplo20" pattern="\S+" required/>
                </div>
            </div>
            <div class="form-group text-left">
                <label for="inputStorePass">Senha</label>
                <input type="password" class="form-control" name="senha_loja" id="inputStorePass" placeholder="******" minlength="6" required/>
            </div>
            <div class="mb-3">
                <p>Já possui uma conta? <a href="<?php echo base_url('login') ?>">Faça o login</a></p>
            </div>
            <button class="btn btn-lg btn-primary btn-block button-submit" type="submit">Cadastrar</button>
            <p class="mt-5 mb-3 text-muted">Toque&Estoque&copy; 2020</p>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="<?php echo base_url('src/js/signin.js') ?>"></script>
    </body>
</html>
