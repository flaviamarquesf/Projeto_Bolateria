<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/FluxoFinanceiroDAO.php';

FluxoFinanceiroDAO::getInstance()->delete($_GET['id']);
header("location: ../View/listarFluxo.php");
