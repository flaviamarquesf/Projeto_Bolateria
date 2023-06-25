<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
}
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ItemCompraDAO.php';
$nome = $_POST['nome_produto'];
$quantidade = $_POST['quantidade'];
$valorUnitario = $_POST['preco_produto'];
$valorTotal = $_POST['valorTotal'];
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
                <span class="site-heading-upper text-primary mb-3">Sua lista de produtos</span>
                <span class="site-heading-lower">não sei uma frase legal p pôr aqui</span>
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
                                <ul class="list-unstyled list-hours mb-5 text-left mx-auto">

                                <li class="list-unstyled-item list-hours-item d-flex">
                                    <?php echo $nome; ?>
                                    <span class="ms-auto"><?php echo $valorTotal; ?></span>
                                </li>
                            </ul>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            include_once('menuBaixo.php');
        ?>
    </body>
</html>
