<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
}
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ItemCompraDAO.php';
$imagem=array();
$imagem = $_POST['imagem_produto'];
$nome = $_POST['nome_produto'];
$quantidade = $_POST['quantidade'];
$valorUnitario = $_POST['preco_produto'];
//$valorTotal = $_POST['valorTotal'];
?>
<!DOCTYPE php>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Recanto Doce - Sobre</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Seu carrinho de compras</span>
                <span class="site-heading-lower">Compre Agora!</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <?php
            include_once('menu.php');
            ?>
        </nav>
        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/about.jpg" alt="..." />
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Seus produtos</span>
                                    <span class="section-heading-lower">Deguste sem moderação</span>
                                </h2>                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr width="100%">
                                        <th>Foto</th>
                                        <th>Nome</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart-product">
                                            <td>
                                                <img width="100" height="60"src="<?php //echo $imagem?>" alt="item">
                                            </td>
                                            <td>
                                                <?php //echo $nome; ?>
                                            </td>
                                            <td>
                                                <?php //echo $quantidade; ?>
                                            </td>
                                            <td>
                                                <?php //echo $valorUnitario;?>
                                            </td>
                                        </tr>
                                    </table>
                                    <span class="ms-auto"><?php //echo $valorTotal; ?></span>
                            </ul>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            include_once('menuBaixo.php');
            /*
            <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr width="100%">
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Quant</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="cart-product">
                        <td class="product-identification">
                            <form action="carrinho.php" method="post">
                                <input type='hidden' value="<?php echo isset($_GET['id'])?$_GET['id']:"0"?>" name = "id">
                                <input type='hidden' value="R$<?php echo $obj->getLink();?>" name = "imagem_produto">
                                <img name="link" id="link" width="70" height="40"src="<?php echo $obj->getLink();?>" alt="Miniatura" class="cart-product-image">
                        </td>
                        <td>
                            <input type='hidden' value="R$<?php echo $obj->getNome();?>" name = "nome_produto">
                            <strong class="cart-product-title"><?php echo $obj->getNome();?></strong>
                        </td>
                        <td>
                            <input style="width: 50px;" name="quantidade" type="number" value="0" min="0" class="product-qtd-input">
                        </td>
                        <td>
                            <input type='hidden' value="R$<?php echo $obj->getPreco();?>" name = "preco_produto">
                            <span class="cart-product-price">R$<?php echo $obj->getPreco();?></span>
                        </td>
                        <td class="cart-total-container">
                        <span>R$0,00</span>
                        </td>
                        <td>
                            <button style="padding-left:15px;" class="btn btn-danger" name="remove" style="padding-left:10px;" ><i class='fas fa-trash'></i></button>
                        </td>
                        </tr>
                    </tbody>
                </table> 
            */
        ?>
    </body>
</html>
