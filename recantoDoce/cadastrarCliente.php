<?php
session_start();
if(!isset($_SESSION['idClienteLogado'])){
    header("Location: login.php");
}
//se estiver setado é pq é pra atualizar
$objCliente=NULL;
if(isset($_GET['id'])){
       //buscar da base o cara com o id do get
       //e salvar na variavel $objCliente;
       //Para usar o DAO eu preciso importar ele
    require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ClienteDAO.php';
    //usar o meu getByid da classe Cliente dao e armazenar o restorno
    //na variável $objCliente
   $objCliente=ClienteDAO::getInstance()->getById($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Casual - Start Bootstrap Theme</title>
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
                <span class="site-heading-upper text-primary mb-3">Faça seu cadastro e</span>
                <span class="site-heading-lower">Adoce seu dia</span>
            </h1>
        </header>
        <!-- Navigation-->
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper">Cadastro</span>
                                <span class="section-heading-lower">Seja bem vindo!</span>
                            </h2>
                            <form method="post" action="control/cliente.php">
                                <input type='hidden' value="<?php echo isset($_GET['id'])?$_GET['id']:"0"?>" name = "id">
                                <div class="list-unstyled list-hours mb-5 text-left mx-auto">
                                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" value="<?php echo ($objCliente==NULL?"":$objCliente->getNome());?>" class="list-unstyled-item list-hours-item d-flex>
                                </div>
                                <div class="list-unstyled list-hours mb-5 text-left mx-auto">
                                <input type="email" id="email" name="email" placeholder="Digite seu email" value="<?php echo ($objCliente==NULL?"":$objCliente->getEmail());?>" class="list-unstyled-item list-hours-item d-flex>
                                </div>
                                <div class="list-unstyled list-hours mb-5 text-left mx-auto row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" class="list-unstyled-item list-hours-item d-flex>
                                </div>
                                </div>
                                <input class="btn btn-primary btn-user btn-block" type="submit" name="enviar" id="enviar" value="Enviar">
                                <hr>
                                    <br>
                            <p class="address mb-5">
                                <em>
                                    <a href="cadastrarCliente.php"><strong>Ainda não é cadastrado?</strong></a>
                                    <br />
                                    
                                </em>
                            </p>
                            <p class="mb-0">
                                <small><em>Telefone para contato</em></small>
                                <br />
                                (87) 98146-8271
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/about.jpg" alt="..." />
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Strong Coffee, Strong Roots</span>
                                    <span class="section-heading-lower">About Our Cafe</span>
                                </h2>
                                <p>Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.</p>
                                <p class="mb-0">
                                    We guarantee that you will fall in
                                    <em>lust</em>
                                    with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Bolateria 5 estrelas. Desde 2012</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>