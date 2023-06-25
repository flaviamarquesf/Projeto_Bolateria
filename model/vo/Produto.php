<?php
class Produto{
    //id, sabor, nome, 
    private $id;
    private $nome;
    private $link;
    private $preco;
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id=$id;
    }
    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome=$nome;
    }
    function getLink(){
        return $this->link;
    }
    function setLink($link){
        $this->link=$link;
    }
    function getPreco(){
        return $this->preco;
    }
    function setPreco($preco){
        $this->preco=$preco;
    }
}
?>