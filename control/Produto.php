<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Produto.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
$obj = new Produto();
$obj->setNome($_POST['nome']);
$obj->setLink($_POST['link']);
$obj->setPreco($_POST['preco']);
$obj->setId($_POST['id']);
if($obj->getId() !=0)
    ProdutoDAO::getInstance()->update($obj);
else
    ProdutoDAO::getInstance()->insert($obj);
header('location: ../View/listarProduto.php');
?>