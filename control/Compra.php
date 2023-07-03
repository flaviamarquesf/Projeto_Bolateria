<?php
session_start();
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Compra.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ClienteDAO.php';

$obj = new Compra();
$obj->setId($_POST['id']);
echo '<form action="../recantoDoce/carrinho.php" method="POST">
        <input type="number" name="quantidade" value="'.$_POST['quantidade'].'">
        <input type="submit" >
      </form>';
    
if($obj->getId() !=0){
    CompraDAO::getInstance()->update($obj);
}
    else{
    $idClienteSalvo = $_SESSION['idClienteLogado'];
    foreach($_POST['produto'] as $idProduto){
        $ClienteCompra = new Compra();
        $ClienteCompra->setIdCliente($idClienteSalvo);
        $ClienteCompra->setIdProduto($idProduto);
        CompraDAO::getInstance()->insert($ClienteCompra);
    }
}
//header('location: ../recantoDoce/carrinho.php');
?>