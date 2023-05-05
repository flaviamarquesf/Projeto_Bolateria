<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Compra.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
$obj = new Compra();
$obj->setDataCompra($_POST['dataCompra']);
$obj->setIdCliente($_POST['idCliente']);


CompraDAO::getInstance()->insert($obj);
?>