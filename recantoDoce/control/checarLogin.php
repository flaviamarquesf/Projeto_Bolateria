<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ClienteDAO.php';
$daoCliente = ClienteDAO::getInstance();
$sql = " where nome=:nome and senha=:senha";
$arrayDeParametros = array(":nome",":senha");
$arrayDeValores = array($_POST['nome'],md5( $_POST['senha']));
$lista = $daoCliente->listWhere($sql, $arrayDeParametros, $arrayDeValores);

if(count($lista)>0){
    session_start();
    $_SESSION['idClienteLogado']=$lista[0]->getId();
   header("Location: ../index.php");
    echo "login feito com sucesso";
}else{
  header("Location: ../login.php?erroNoLogin=true");
    echo "senha errada";
}
?>