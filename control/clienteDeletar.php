<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ClienteDAO.php';

CLienteDAO::getInstance()->delete($_GET['id']);
header("location: ../View/listarCliente.php");
?>