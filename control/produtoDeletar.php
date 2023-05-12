<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';

ProdutoDAO::getInstance()->delete($_GET['id']);
header("location: ../View/listarProduto.php");
?>