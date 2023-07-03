<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
}
//$valorTotal = $_POST['valorTotal'];
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
date_default_timezone_set('America/Sao_Paulo');
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
        <section class="page-section">

<div class="container">
<div class="product-item">                    
   <div class="product-item-title d-flex">                  
       <div class="bg-faded p-5 d-flex me-auto rounded">
           <h2 class="section-heading mb-0">
               <span class="section-heading-upper">Confira aqui o seu</span>
               <span class="section-heading-lower">Carrinho</span>
           </h2>
       </div>
   </div>
   <br><br><br>
                        
                        <fieldset>
                                <legenda><br>
<?php                   require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
                        $lista = ProdutoDAO::getInstance()->listAll();
                        foreach ($lista as $obj){
                        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/ItemCompraBO.php';
                        $ClienteComprou = ItemCompraBO::clienteComprouProduto($_SESSION['idClienteLogado'], $obj->getNome());
                        $lista = ItemCompraBO::PegarComprasCliente($_SESSION['idClienteLogado']);
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
                            .$obj->getPreco();
                            
                            if($_POST['quantidade']==NULL){
                                echo '-- Quantidade: 0</p></div></div>';
                            } else{
                                 echo '-- Quantidade: '.$_POST['quantidade'].'</p></div></div>';
                            }
                            }
                             }
                        ?>
                            </legenda>
                        </fieldset>
                        
                        
                </div>
                </div>
            </div>
        </section>
        <?php
            include_once('menuBaixo.php');
            ?>
    </body>
</html>
