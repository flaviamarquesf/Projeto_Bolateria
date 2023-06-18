<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Recanto Doce - Produtos</title>
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
                <span class="site-heading-upper text-primary mb-3">É meu, é seu, é</span>
                <span class="site-heading-lower">Nosso doce</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <?php
            include_once('menu.php');
            ?>
        </nav>
        <section class="page-section">

                 <div class="container">
                <div class="product-item">                    
                    <div class="product-item-title d-flex">                  
                        <div class="bg-faded p-5 d-flex me-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Venha olhar nosso</span>
                                <span class="section-heading-lower">Cardápio</span>
                            </h2>
                        </div>
                    </div>
                    <hr><hr><hr>
                    <?php
                        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
                        $lista = ProdutoDAO::getInstance()->listAll();
                        foreach ($lista as $obj){
                            echo '<div class="product-item-title d-flex">
                                    <div class="bg-faded p-5 d-flex ms-auto rounded">
                                        <h2 class="section-heading mb-0">
                                            <span class="section-heading-lower">'.$obj->getNome().'</span>
                                        </h2>
                                    </div>
                                   </div>';
                            echo '<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="'
                            .$obj->getLink(). '"alt="..." />';
                            echo '<div class="product-item-description d-flex me-auto"><div class="bg-faded p-5 rounded"><p class="mb-0">Preço/kg: R$'
                            .$obj->getPrecokg().'</p></div></div>'; 
                            echo '<hr>';
                    }?>
                </div>
            </div>
        </section>
<!--                SESSÕES PARA SE QUISER USAR FORMATAÇÃO DELAS
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex me-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Delicious Treats, Good Eats</span>
                                <span class="section-heading-lower">Bakery & Kitchen</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-02.jpg" alt="..." />
                    <div class="product-item-description d-flex ms-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Our seasonal menu features delicious snacks, baked goods, and even full meals perfect for breakfast or lunchtime. We source our ingredients from local, oragnic farms whenever possible, alongside premium vendors for specialty goods.</p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">From Around the World</span>
                                <span class="section-heading-lower">Bulk Speciality Blends</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-03.jpg" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Travelling the world for the very best quality coffee is something take pride in. When you visit us, you'll always find new blends from around the world, mainly from regions in Central and South America. We sell our blends in smaller to large bulk quantities. Please visit us in person for more details.</p></div>
                    </div>
                </div>
            </div>
        </section>
-->
        <?php
            include_once('menuBaixo.php');
        ?>
    </body>
</html>
