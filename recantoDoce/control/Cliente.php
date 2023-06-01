<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ClienteDAO.php';
$obj = new Cliente();
$obj->setNome($_POST['nome']);
$obj->setEmail($_POST['email']);
$obj->setSenha($_POST['senha']);
$obj->setTelefone($_POST['telefone']);
$obj->setBairro($_POST['bairro']);
$obj->setCidade($_POST['cidade']);
$obj->setUf($_POST['uf']);
$obj->setNumero($_POST['numero']);
<<<<<<< HEAD:control/Cliente.php

=======
$obj->setId($_POST['id']);
>>>>>>> f8652979d09fbb9cd9fccce29b1969e920f07555:recantoDoce/control/Cliente.php
if($obj->getId() !=0)
    ClienteDAO::getInstance()->update($obj);
else
    ClienteDAO::getInstance()->insert($obj);
<<<<<<< HEAD:control/Cliente.php
header('location: ../View/listarCliente.php');
=======
header('location: ../index.php');
>>>>>>> f8652979d09fbb9cd9fccce29b1969e920f07555:recantoDoce/control/Cliente.php
?>