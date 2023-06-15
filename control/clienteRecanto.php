<?php
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
$obj->setId($_POST['id']);
if($obj->getId() !=0)
    ClienteDAO::getInstance()->update($obj);
else
    ClienteDAO::getInstance()->insert($obj);
    header('location: ../recantoDoce/');