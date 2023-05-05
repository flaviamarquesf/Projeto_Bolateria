<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioDAO.php';
$obj = new Usuario();
$obj->setNome($_POST['nome']);
$obj->setEmail($_POST['email']);
$obj->setSenha($_POST['senha']);

UsuarioDAO::getInstance()->insert($obj);
?>