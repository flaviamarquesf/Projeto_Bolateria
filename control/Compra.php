<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Compra.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/ItemCompra.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ItemCompraDAO.php';
$obj = new Compra();
$obj->setDataCompra($_POST['dataCompra']);
$obj->setId($_POST['id']);
if($obj->getId() !=0){
    ClienteDAO::getInstance()->update($obj);
}
    else{
    $idClienteSalvo = $_SESSION['idClienteLogado'];
    foreach($_POST['compra'] as $id){
        $ClienteCompra = new Compra();
        $ClienteCompra->setIdCliente($idClienteSalvo);
        CompraDAO::getInstance()->insert($ClienteCompra);
    }
    $idCompraSalvo = CompraDAO::getInstance()->insert($obj);
    foreach($_POST['compra'] as $idProduto){
        $ItemCompra = new ItemCompra();
        $ItemCompra->setIdCompra($idCompraSalvo);
        $ItemCompra->setIdProduto($idProduto);
        ItemCompraDAO::getInstance()->insert($ItemCompra);
    }
}
//header('location: ../recantoDoce/Compra.php');
?>