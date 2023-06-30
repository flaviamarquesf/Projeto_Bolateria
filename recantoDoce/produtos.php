<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
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
                    <br><br><br>
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
                        <th>Data</th>
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
                        <td>
                            
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
        ?>
        <script>
            function calcularValorTotal() {
            var quantidade = parseInt(document.getElementById("quantidade").value);
            var valorUnitario = parseDouble(document.getElementById("preco_produto").value);
            var valorTotal = quantidade * valorUnitario;
            document.getElementById("valorTotal").value = valorTotal.toFixed(2);
            }
        </script>
                    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
