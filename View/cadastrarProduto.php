<?php
session_start();
if(!isset($_SESSION['idUsuarioLogado'])){
    header("Location: login.php");
}
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/UsuarioPermissaoBO.php';
$possuiPermissao = UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Listar Produto");
if(!$possuiPermissao){
    header("location: naoPermissao.php?permissao=ListarProduto");
}
//se estiver setado é pq é pra atualizar
$objProduto=NULL;
if(isset($_GET['id'])){
       //buscar da base o cara com o id do get
       //e salvar na variavel $objUsuario;
       //Para usar o DAO eu preciso importar ele
    require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
    //usar o meu getByid da classe usuario dao e armazenar o restorno
    //na variável $objUsuario
   $objProduto=ProdutoDAO::getInstance()->getById($_GET['id']);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastrar Produtos</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
     <?php
     include_once('menulateral.php');
     ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include_once ('menutopo.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Cadastrar</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cadastre aqui</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="container">

                                <div class="card o-hidden border-0 shadow-lg my-5">
                                    <div class="card-body p-0">
                                        <!-- Nested Row within Card Body -->
                                        <div class="row">
                                            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                                            <div class="col-lg-7">
                                                <div class="p-5">
                                                    <div class="text-center">
                                                        <h1 class="h4 text-gray-900 mb-4">Crie Produto</h1>
                                                    </div>
                                                    <form action="../control/produto.php"  method="POST">
                                                        <input type='hidden' value="<?php echo isset($_GET['id'])?$_GET['id']:"0"?>" name = "id">
                                                        <div class="form-group">
                                                        <input class="input-claro"  type="text" id="nome" name="nome" placeholder="Nome do produto" value="<?php echo ($objProduto==NULL?"":$objProduto->getNome());?>">
                                                        </div>
                                                        <div class="form-group">
                                                        <input class="input-claro"  type="text" id="link" name="link" placeholder="URL: https://www.youtube.com/embed/FAY1K2aUg5g" value="<?php echo ($objProduto==NULL?"":$objProduto->getLink());?>">
                                                        </div>
                                                        <div class="form-group">
                                                        <input class="input-claro"  type="number" id="precokg" name="precokg" placeholder="Preço" step="0.010" value="<?php echo ($objProduto==NULL?"":$objProduto->getPreco());?>">
                                                        </div>
                                                        <input class="btn btn-primary btn-user btn-block" type="submit" name="enviar" id="enviar" value="Enviar">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include_once ('menubaixo.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>