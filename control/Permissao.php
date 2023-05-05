<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Permissao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/PermissaoDAO.php';
$obj = new Permissao();
$obj->setNome($_POST['nome']);

PermissaoDAO::getInstance()->insert($obj);
?>