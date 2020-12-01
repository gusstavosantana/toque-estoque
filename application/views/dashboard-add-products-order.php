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
                                <a class="nav-link" href="<?php echo base_url('dashboard/products'); ?>">
                                    <span data-feather="shopping-cart"></span>
                                    Produtos 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('dashboard/orders'); ?>">
                                    <span data-feather="file"></span>
                                    Pedidos <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <nav class="mt-4" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/orders'); ?>">Pedidos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pedido #202010<?php echo $order[0]['id_pedido']; ?></li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                        <h1 class="h2">Pedido #202010<?php echo $order[0]['id_pedido']; ?></h1>
                    </div>
                    <?php
                        if (empty($products)) {
                    ?>
                        <p>Nenhum produto cadastrado</p>
                    <?php
                        } else {
                    ?>
                        <h6>Adicione os produtos ao pedido:</h6>
                        <table class="table table-striped order">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($products as $item) {
                                        if ($item->qtd_produto > 0) {
                                ?>
                                    <tr class="product-order">
                                        <th scope="row"><?php echo $item->nome_produto; ?></th>
                                        <td>R$ <?php echo str_replace('.', ',', $item->preco_produto); ?></td>
                                        <td><input class="input-qtd" onkeydown="return false" type="number" min="1" step="1" value="1" max="<?php echo $item->qtd_produto; ?>"></td>
                                        <td class="text-right">
                                            <a href="<?php echo base_url('dashboard/insert-product-order?orderId=' . $order[0]['id_pedido'] . '&orderValue=' . $order[0]['valor_pedido'] . '&productId=' . $item->id_produto . '&productOldQty=' . $item->qtd_produto . '&productPrice=' . $item->preco_produto); ?>" class="btn btn-secondary add-product-btn btn-order">
                                                <span data-feather="plus-circle"></span> 
                                                Adicionar ao pedido 
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                        }
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
