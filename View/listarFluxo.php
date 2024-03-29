<?php
session_start();
if(!isset($_SESSION['idUsuarioLogado'])){
    header("Location: login.php");
}
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/UsuarioPermissaoBO.php';
$possuiPermissao = UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Cadastrar Fluxo");
if(!$possuiPermissao){
    header("location: naoPermissao.php?permissao=ListarFluxo");
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

    <title>Listar Fluxo</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />

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
                include_once('menutopo.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Listar Fluxo</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Fluxo</h6>
                        </div>
                        <div class="card-body">
                        <form action='listarFLuxo.php' METHOD='GET'>
                            <label for="dataInicial">Inicial: </label>
                                <input type='date' id='dataInicial' name='dataInicial'required/>
                            <label for="dataFinal">Final: </label>
                                <input type='date'  id='dataFinal' name='dataFinal'required/>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                        </form>
                        <br>
                         <!-- Grafico de barras 
                         <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Margem de lucro</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
-->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Fluxo</th>
                                            <th>Valor</th>
                                            <th>Data de Pagamento</th>
                                            <th>Tipo</th>
                                            <th>ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Fluxo</th>
                                            <th>Valor</th>
                                            <th>Data de Pagamento</th>
                                            <th>Tipo</th>
                                            <th>ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/FluxoFinanceiroDAO.php';
                                            if(isset($_GET['dataInicial'])  && isset($_GET['dataFinal'])){
                                                $sql = "SELECT * FROM dataPagamento>= :dataInicial and dataPagamento<= :dataFinal";
                                                $arrayDeParametros = array(":dataInicial", ":dataFinal");
                                                $arrayDeValores = array($_GET["dataInicial"], $_GET["dataFinal"]);
                                                $lista = FluxoFinanceiroDAO::getInstance()->listWhere($sql,$arrayDeParametros,$arrayDeValores);
                                            }
                                            $lista = FluxoFinanceiroDAO::getInstance()->listAll();
                                            $total=0;
                                            foreach ($lista as $obj){
                                                if($obj->getFluxo()=="Entrada"){
                                                    $total+=$obj->getValor();
                                                }
                                                else if($obj->getFluxo()=="Saida"){
                                                    $total-=$obj->getValor();
                                                }
                                                echo '<tr>';
                                                echo '<td>'.$obj->getId().'</td>';
                                                echo '<td>'.$obj->getFluxo().'</td>';
                                                echo '<td>'.$obj->getvalor().'</td>';
                                                echo '<td>'.$obj->getDataPagamento().'</td>';
                                                echo '<td>'.$obj->getTipo().'</td>';
                                                echo '<td>'; ?>
                                                <a href='cadastrarFluxo.php?id=<?php echo $obj->getId();?>' class='btn btn-primary btn-icon-split btn-sm'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-pen'></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <a href= '../control/FluxoDeletar.php?id=<?php echo $obj->getId();?>'data-toggle='modal' data-target="#modal<?php echo $obj->getId();?>" class='btn btn-danger btn-icon-split btn-sm'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-trash'></i>
                                                    </span> 
                                                    <span class="text">Deletar</span>
                                                </a>
                                                <div class="modal fade" id="modal<?php echo $obj->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Tem certeza que deseja deletar?</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-danger" href="../control/FluxoDeletar.php?id=<?php echo $obj->getId();?>">Deletar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo '</td>';
                                                echo '</tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- imprimindo o total -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Disponivel em caixa</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
            include_once('menubaixo.php');
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
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>