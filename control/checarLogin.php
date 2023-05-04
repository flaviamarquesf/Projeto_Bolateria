<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioDAO.php';
$daoUsuario = UsuarioDAO::getInstance();
$sql = " where nome=:nome and senha=:senha";
$arrayDeParametros = array(":nome",":senha");
$arrayDeValores = array($_POST['login'],md5( $_POST['senha']));
$lista = $daoUsuario->listWhere($sql, $arrayDeParametros, $arrayDeValores);

if(count($lista)>0){
    session_start();
    $_SESSION['idUsuarioLogado']=$lista[0]->getId();
   header("Location: ../View/index.php");
    echo "login feito com sucesso";
}else{
  header("Location: ../View/login.php?erroNoLogin=true");
    echo "senha errada";
}
?>