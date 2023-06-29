<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/UsuarioPermissao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioPermissaoDAO.php';
$obj = new Usuario();
$obj->setNome($_POST['nome']);
$obj->setEmail($_POST['email']);
$obj->setSenha(($_POST['senha']));
$obj->setId($_POST['id']);
if($obj->getId() !=0){
    UsuarioDAO::getInstance()->update($obj);
}
    else{
    $idUsuarioSalvo = UsuarioDAO::getInstance()->insert($obj);
    foreach($_POST['permissao'] as $idPermissao){
        $usuarioPermissao = new UsuarioPermissao();
        $usuarioPermissao->setIdPermissao($idPermissao);
        $usuarioPermissao->setIdUsuario($idUsuarioSalvo);

        UsuarioPermissaoDAO::getInstance()->insert($usuarioPermissao);
    }
}
header('location: ../View/listarUsuario.php');
?>