<?php
class ItemCompra{
    private $id;
    private $idCompra;
    private $idProduto;
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