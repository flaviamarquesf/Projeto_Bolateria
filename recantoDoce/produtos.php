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
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                            echo '<div class="product-item-description d-flex me-auto"><div class="bg-faded p-5 rounded"><p class="mb-0">Preço: R$'
                            .$obj->getPreco().'</p></div>
                            <div class="bg-faded p-5 rounded">
                            <p class="mb-0">
                                <a href= "compra.php" data-toggle="modal" data-target="#comprar'.$obj->getId().'">
                                    Comprar 
                                </a>
                                -
                                <a href= "carrinho.php" data-toggle="modal" data-target="#carrinho'.$obj->getId().'">
                                    <i class="fas fa-"></i>Adicionar
                                    <i class="fas fa-shopping-cart"></i>oi
                                </a>
                            </p></div></div>';
                            echo '<div class="product-item-description d-flex me-auto"></div>';  
                            echo '<hr>';
                            ?>
                            
                                            
                                               <div class="modal fade" id="carrinho<?php echo $obj->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Comprar</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Adicionar ao carrinho</div>
                                                            <form action="carrinho.php" method="POST">
                                                                <input type="text" name="nome_produto" value="<?php echo $obj->getName();?>" readonly>
                                                                <input type="text" name="preço_produto" value="<?php echo $obj->getPreco();?> por unidade" readonly>
                                                                Quantidade: <input type="number" id="quantidade" name="quantidade" oninput="calcularValorTotal()" min="1" max="10" step="1">
                                                                <input type="text" id="valorTotal" readonly>
                                                                <input class="btn btn-danger" type="submit" value="Adicionar ao carrinho">
                                                            </form>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- MODAL PARA COMPRA SEPARADO -->
                                                <!--
                                                <div class="modal fade" id="comprar<?php //echo $obj->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Comprar</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Comprar</div>
                                                            <form action="compra.php" method="POST">
                                                                <input type="text" name="nome_produto" value="<?php //echo $obj->getName();?>" readonly>
                                                                <input type="text" name="preço_produto" value="<?php //echo $obj->getPreco();?> por unidade" readonly>
                                                                Quantidade: <input type="number" id="quantidade" name="quantidade" oninput="calcularValorTotal()" min="1" max="10" step="1">
                                                                <input type="text" id="valorTotal" readonly>
                                                                <input class="btn btn-danger" type="submit" value="Comprar Agora!">
                                                            </form>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        -->
                  <?php  }?>
                   
                        
                </div>
            </div>
        </section>
               <!-- 
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
    <!-- funcao de calcular preço -->
    <script>
        function calcularValorTotal() {
        var quantidade = parseInt(document.getElementById("quantidade").value);
        var valorUnitario = parseFloat(document.getElementById("valorUnitario").value);
        var valorTotal = quantidade * valorUnitario;
        document.getElementById("valorTotal").value = valorTotal.toFixed(2);
        }
    </script>
                    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    </body>
</html>
