<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
}
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/ItemCompraBO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
                $lista = ProdutoDAO::getInstance()->listAll();
                foreach ($lista as $obj){
              if (ItemCompraBO::clienteComprouProduto($_SESSION['idClienteLogado'], $obj->getNome())){
                  echo $obj->getNome();
              }
            }
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
                            <button style="padding-left: 5px;"class="btn btn-secondary">
                                <i class="fas fa-"></i>
                                <i class="fas fa-shopping-cart"></i>
                            </button></p></div></div>';
                            echo '<div class="product-item-description d-flex me-auto"></div>';  
                            ?> <br>
    <div class="product-item-description d-flex ms-auto"><div class="bg-faded p-5 rounded">
    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr width="100%">
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Quant</th>
                        <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart-product">
                        <form action="../control/Compra.php" method="POST">
                        <td class="product-identification">
                        <?php $hoje = date('d/m/Y'); ?>
                                <input type='hidden' value="<?php echo isset($_GET['id'])?$_GET['id']:"0"?>" name = "id">
                                <input type='hidden' value="<?php echo $obj->getLink();?>" name = "imagem_produto">
                                <img name="link" id="link" width="70" height="40"src="<?php echo $obj->getLink();?>" alt="Miniatura" class="cart-product-image">
                        </td>
                        <td>
                            <input type='hidden' value="<?php echo $obj->getNome();?>" name = "nome_produto">
                            <strong class="cart-product-title"><?php echo $obj->getNome();?></strong>
                        </td>
                        <td>
                            <input style="width: 50px;" name="quantidade" id="quantidade" type="number" value="0" min="0" class="product-qtd-input">
                        </td>
                        <td>
                            <input type='hidden' value="R$<?php echo $obj->getPreco();?>" name = "preco_produto" id="preco_produto">
                            <span class="cart-product-price">R$<?php echo $obj->getPreco();?></span>
                        </td>
                        <fieldset>
                                <legenda>
                                    <br>
<?php 
                        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/ItemCompraBO.php';
                        $ClienteComprou = ItemCompraBO::clienteComprouProduto($_SESSION['idClienteLogado'], $obj->getNome());
                        $lista = ItemCompraBO::PegarComprasCliente($_SESSION['idClienteLogado']);
                        // FALTA VERIFICAR SE JÁ ESTÁ NO CARRINHO
                            foreach($lista as $ClienteComprou){
                            echo "<label for= 'up".$ClienteComprou->getIdProduto()."'>";
                            //echo $ClienteComprou->getProduto()->getNome();
                            echo " ";
                            echo "<input type= 'hidden' name='produto[]' value='".$ClienteComprou->getIdProduto()."'id='up".$ClienteComprou->getIdProduto()."'required/>";
                            echo " ";
                            echo "</label>";
                            echo "<label for= 'up".$ClienteComprou->getIdCliente()."'>";
                            //echo $ClienteComprou->getCliente()->getNome();
                            echo " ";
                            echo "<input type= 'hidden' name='cliente[]' value='".$ClienteComprou->getIdCliente()."'id='up".$ClienteComprou->getIdCliente()."'required/>";
                            echo " ";
                            echo "</label>";
                        }
                        
                        ?>
                            </legenda>
                        </fieldset>
                        
                        </tr>
                    </tbody>
                </table> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#carrinho<?php echo $obj->getId();?>">Adicionar<i class="fas fa-shopping-cart"></i></button>
                </div>
                </form>                         
                </div>
        </div>
        <!--
        <div class="modal fade" id="carrinho<?php //echo $obj->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Faça aqui seu pedido!</h5>
                    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja adicionar ao carrinho?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit" data-dismiss="modal">Adicionar<i class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
        </div>
    </div>
--> <br>                       
                  <?php  }?>
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
