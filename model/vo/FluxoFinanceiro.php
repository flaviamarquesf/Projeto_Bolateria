<?php
class FluxoFinanceiro{
    //id, sabor, nome, 
    private $id;
    private $valor;
    private $dataPagamento;
    private $fluxo;
    private $tipo;
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id=$id;
    }
    function getValor(){
        return $this->valor;
    }
    function setValor($valor){
        $this->valor=$valor;
    }
    function getDataPagamento(){
        return $this->dataPagamento;
    }
    function setDataPagamento($dataPagamento){
        $this->dataPagamento=$dataPagamento;
    }
    function getFluxo(){
        return $this->fluxo;
    }
    function setFluxo($fluxo){
        $this->fluxo=$fluxo;
    }
    function getTipo(){
        return $this->tipo;
    }
    function setTipo($tipo){
        $this->tipo=$tipo;
    }
}
?>