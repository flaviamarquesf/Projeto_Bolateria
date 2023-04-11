<?php
class Compra{
    private $id;
    private $idCliente;
    private $dataCompra;
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id=$id;
    }
    function getIdCliente(){
        return $this->idcliente;
    }
    function setIdcliente($idcliente){
        $this->idcliente=$idcliente;
    }
    function getDataCompra(){
        return $this->dataCompra;
    }
    function setDataCompra($dataCompra){
        $this->dataCompra=$dataCompra;
    }
}
?>