<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioDAO.php';

UsuarioDAO::getInstance()->delete($_GET['id']);
header("location: ../View/listarUsuario.php");
?>