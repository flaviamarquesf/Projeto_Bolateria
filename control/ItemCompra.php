<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/ItemCompra.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ItemCompraDAO.php';
$obj = new ItemCompra();
$obj->setIdCompra($_POST['idCompra']);
$obj->setIdProduto($_POST['idProduto']);


ItemCompraDAO::getInstance()->insert($obj);
?>