<?php
class Compra{
    private $id;
    private $idCliente;
    private $idProduto;
    private $dataCompra;
    //utilizando lazyloading
    function getCliente(){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ClienteDAO.php';
        return ClienteDAO::getInstance()->getById($this->idCliente);
    }
    function getProduto(){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ProdutoDAO.php';
        return ProdutoDAO::getInstance()->getById($this->idProduto);
    }
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id=$id;
    }
    function getIdCliente(){
        return $this->idCliente;
    }
    function setIdCliente($idCliente){
        $this->idCliente=$idCliente;
    }
    function getIdProduto(){
        return $this->idProduto;
    }
    function setIdProduto($idProduto){
        $this->idProduto=$idProduto;
    }
    function getDataCompra(){
        return $this->dataCompra;
    }
    function setDataCompra($dataCompra){
        $this->dataCompra=$dataCompra;
    }
}
?>