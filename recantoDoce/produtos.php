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
                            .$obj->getPreco().' <i class="fas fa-arrow-right"></i>
                            <a href= "carrinho.php?id='.$obj->getId().'" data-toggle="modal" data-target="#carrinho'.$obj->getId().'">
                                <i class="fas fa-"></i>Adicionar
                                <i class="fas fa-shopping-cart"></i>
                            </a></p></div></div>';
                            echo '<div class="product-item-description d-flex me-auto"></div>';  
                            echo '<hr>';
                            ?>
                            
                            <div class="modal fade" id="carrinho<?php echo $obj->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Faça aqui seu pedido!</h5>
                    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                <table border="1" class="cart-table">
                    <thead>
                        <tr>
                        <th class="table-head-item first-col">Item</th>
                        <th class="table-head-item second-col">Preço</th>
                        <th class="table-head-item third-col">Quantidade</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="cart-product">
                        <td class="product-identification">
                            <img width="150" height="100"src="<?php echo $obj->getLink();?>" alt="Miniatura" class="cart-product-image">
                            <br><strong class="cart-product-title"><?php echo $obj->getNome();?></strong>
                        </td>
                        <td>
                            <span class="cart-product-price">R$<?php echo $obj->getPreco();?></span>
                        </td>
                        <td>
                            <input type="number" value="2" min="0" class="product-qtd-input">
                            <button type="button" class="remove-product-button">Remover</button>
                        </td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                        <td colspan="3" class="cart-total-container">
                            <strong>Total</strong>
                            <span>R$0,00</span>
                        </td>
                        </tr>
                    </tfoot>
                </table>  
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Comprar Agora!</button>
                    <a class="btn btn-primary" href="login.html">Adicionar <i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
                                               
                                                
                  <?php  }?>
                   
                        
                </div>
            </div>
        </section>

        <?php
            include_once('menuBaixo.php');
        ?>
    <!-- funcao de calcular preço -->
    <script src="js/calcular.js"></script>
    <script>
        function calcularValorTotal() {
        var quantidade = parseInt(document.getElementById("quantidade").value);
        var valorUnitario = "<?php echo $obj->getPreco(); ?>"
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
