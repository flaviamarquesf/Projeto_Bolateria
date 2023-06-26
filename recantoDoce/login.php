<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Recanto Doce - Login</title>
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
                <span class="site-heading-upper text-primary mb-3">Faça seu login e</span>
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
                                <span class="section-heading-upper">Login</span>
                                <span class="section-heading-lower">Seja bem vindo!</span>
                            </h2>
                            <form method="post" action="../control/checarLoginCliente.php">
                                        <?php
                                        if (isset($_GET['erroNoLogin'])){
                                            echo "<div style='color:red'>Email e Senha errados</div>";
                                        }
                                        ?>
                                        <div class="list-unstyled list-hours mb-5 text-left mx-auto">
                                            <input type="text" class="list-unstyled-item list-hours-item d-flex"
                                                id="nome" name="nome" aria-describedby="emailHelp"
                                                placeholder="Digite seu nome">
                                        </div>
                                        <div class="list-unstyled list-hours mb-5 text-left mx-auto">
                                            <input type="password" class="list-unstyled-item list-hours-item d-flex"
                                                id="senha" name="senha" placeholder="digite sua senha">
                                        </div>
                                        <div class="list-unstyled list-hours mb-5 text-left mx-auto">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lembre-se de mim
                                                    </label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Entre" class="btn btn-primary btn-user btn-block">
                                    </form>
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
       
        <?php
            include_once('menuBaixo.php');
        ?>
    </body>
</html>
