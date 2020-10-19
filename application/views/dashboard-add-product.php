<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard | Toque&Estoque</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('src/styles/dashboard.css') ?>">
    </head>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><?php echo $storeName; ?></a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link logout" href="<?php echo base_url('logout') ?>">Sair</a>
              </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                                    <span data-feather="home"></span>
                                    Dashboard 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('dashboard/products'); ?>">
                                    <span data-feather="shopping-cart"></span>
                                    Produtos <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('dashboard/orders'); ?>">
                                    <span data-feather="file"></span>
                                    Pedidos
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <nav class="mt-4" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/products'); ?>">Produtos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cadastro de produto</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Cadastro de produto:</h1>
                    </div>
                    <form class="form-product pb-4" method="POST" action="<?php echo base_url('dashboard/insert-product'); ?>">
                        <div class="form-group">
                            <label for="inputProductName">Nome do produto</label>
                            <input type="text" class="form-control" id="inputProductName" name="nome_produto" placeholder="Ex: Porta retrato" required/>
                        </div>
                        <div class="form-group">
                            <label for="inputProductDescription">Descrição do produto</label>
                            <textarea class="form-control" id="inputProductDescription" name="descricao_produto" rows="3" required></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputProductPrice">Valor do produto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">R$</div>
                                    </div>
                                    <input type="number" class="form-control" id="inputProductPrice" name="preco_produto" placeholder="Ex: 129.99" min="0" step="any" required/>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputProductQty">Quantidade em estoque</label>
                                <input type="number" class="form-control" id="inputProductQty" name="qtd_produto" min="0" step="1" required/>
                            </div>
                        </div>
                        <a href="<?php echo base_url('dashboard/products'); ?>" class="btn btn-light mr-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary button-submit">Salvar</button>
                    </form>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="<?php echo base_url('src/js/dashboard.js') ?>"></script>
    </body>
</html>
