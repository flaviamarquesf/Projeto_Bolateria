<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
}
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/ItemCompraBO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
$comprouProduto = ItemCompraBO::clienteComprouProduto($_SESSION['idClienteLogado'], $obj->getNome());
if(!$comprouProduto){
    header("location: naoCompra.php?compra=".$obj->getNome());
}
$objCliente=NULL;
if(isset($_GET['id'])){
       //buscar da base o cara com o id do get
       //e salvar na variavel $objUsuario;
       //Para usar o DAO eu preciso importar ele
    require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ClienteDAO.php';
    //usar o meu getByid da classe usuario dao e armazenar o restorno
    //na variável $objUsuario
   $objCliente=ClienteDAO::getInstance()->getById($_SESSION['idClienteLogado']);
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
        <!-- funcao de calcular preço 
        <script async src="js/calc.js"></script>
        Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />        <!-- Core theme CSS (includes Bootstrap)-->
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
                        $lista = ProdutoDAO::getInstance()->listAll();
                        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
                        $comprouProduto = ItemCompraBO::clienteComprouProduto($_SESSION['idClienteLogado'], $obj->getNome());
                        if(!$comprouProduto){
                            header("location: naoCompra.php?compra=".$obj->getNome());
                        }
                        foreach ($lista as $obj){
                            if (ItemCompraBO::clienteComprouProduto($_SESSION['idClienteLogado'], $obj->getNome())){
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
                            .$obj->getPreco()
                            .'</div></div>';
                            echo '<hr>';
                            }
                            ?>
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
                        <form action="carrinho.php" method="POST">
                        <td class="product-identification">
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
                        </tr>
                    </tbody>
                </table> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="submit">Cancelar</button>
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