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
                                <a class="nav-link active" href="<?php echo base_url('dashboard'); ?>">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('dashboard/products'); ?>">
                                    <span data-feather="shopping-cart"></span>
                                    Produtos 
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
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Estoque:</h1>
                    </div>
                    <div class="row mb-5">
                        <div class="col col-md-4">
                            <div class="card-status">
                                <div class="icon-status bg-success">
                                    <span data-feather="check-circle"></span>
                                </div>
                                <div class="pl-3">
                                    <p class="mb-1 text-muted">Produtos disponíveis:</p>
                                    <h3><?php echo $inStock; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="card-status">
                                <div class="icon-status bg-warning">
                                    <span data-feather="alert-circle"></span>
                                </div>
                                <div class="pl-3">
                                    <p class="mb-1 text-muted">Produtos acabando:</p>
                                    <h3><?php echo $ending; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="card-status">
                                <div class="icon-status bg-danger">
                                    <span data-feather="x-circle"></span>
                                </div>
                                <div class="pl-3">
                                    <p class="mb-1 text-muted">Produtos esgotados:</p>
                                    <h3><?php echo $outOfStock; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Visão Geral:</h1>
                    </div>
                    <canvas class="my-4 w-100 mb-5" id="myChart" width="900" height="380" data-url="<?php echo base_url('dashboard/get-orders'); ?>"></canvas>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Receita:</h1>
                    </div>
                    <div class="row mb-5">
                        <div class="col col-md-6">
                            <div class="card-status">
                                <div class="icon-status bg-success">
                                    <span data-feather="dollar-sign"></span>
                                </div>
                                <div class="pl-3">
                                    <p class="mb-1 text-muted">Faturamento total:</p>
                                    <h1>R$ <?php echo str_replace('.', ',', $renevues[0]['faturamento'] > 0 ? number_format($renevues[0]['faturamento'], 2) : 0); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="card-status">
                                <div class="icon-status bg-primary">
                                    <span data-feather="trending-up"></span>
                                </div>
                                <div class="pl-3">
                                    <p class="mb-1 text-muted">Ticket Médio:</p>
                                    <h1>R$ <?php echo str_replace('.', ',', $ticket > 0 ? number_format($ticket, 2) : 0); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="<?php echo base_url('src/js/dashboard.js') ?>"></script>
    </body>
</html>
