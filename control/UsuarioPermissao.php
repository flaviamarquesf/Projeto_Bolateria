<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/UsuarioPermissao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioPermissaoDAO.php';
$obj = new UsuarioPermissao();
$obj->seIdUsuario($_POST['idUsuario']);
$obj->setIdPermissao($_POST['idPermissao']);

UsuarioPermissaoDAO::getInstance()->insert($obj);
?>