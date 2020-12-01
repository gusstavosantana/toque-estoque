<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Produtos | Toque&Estoque</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Seus produtos:</h1>
                        <a href="<?php echo base_url('dashboard/create-product'); ?>" class="btn btn-primary">Cadastrar produto</a>
                    </div>
                    <?php
                        if (empty($products)) {
                    ?>
                        <p>Nenhum produto cadastrado</p>
                    <?php
                        } else {
                    ?>
                        <table class="table table-striped products">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($products as $item) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $item->nome_produto; ?></th>
                                        <td>R$ <?php echo str_replace('.', ',', $item->preco_produto); ?></td>
                                        <td><?php echo $item->qtd_produto; ?></td>
                                        <td>
                                            <?php
                                                if ($item->qtd_produto == 0) {
                                            ?>
                                                <span class="badge badge-status badge-danger py-2 px-4">Indisponível</span>
                                            <?php
                                                } elseif ($item->qtd_produto > 0 && $item->qtd_produto <= 5) {
                                            ?>
                                                <span class="badge badge-status badge-warning py-2 px-4">Acabando</span>
                                            <?php
                                                } else { 
                                            ?>
                                                <span class="badge badge-status badge-success py-2 px-4">Disponível</span>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="td-edit">
                                            <div class="btn-group edit-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="edit-table" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span data-feather="more-vertical"></span>
                                                </button>
                                                <div class="dropdown-menu edit-modal p-0" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item" href="<?php echo base_url('dashboard/product/' . $item->id_produto); ?>">Editar</a>
                                                    <a class="dropdown-item bg-danger text-white remove-product-order" href="<?php echo base_url('dashboard/delete-product/' . $item->id_produto); ?>">Excluir</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    }   
                                ?>
                            </tbody>
                        </table>
                    <?php
                        }   
                    ?>
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
