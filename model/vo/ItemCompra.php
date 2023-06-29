<?php
class ItemCompra{
    private $id;
    private $idCompra;
    private $idProduto;
    //utilizando lazyloading
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
    function getIdCompra(){
        return $this->idCompra;
    }
    function setIdCompra($idCompra){
        $this->idCompra=$idCompra;
    }
    function getIdProduto(){
        return $this->idProduto;
    }
    function setIdProduto($idProduto){
        $this->idProduto=$idProduto;
    }
}
?>