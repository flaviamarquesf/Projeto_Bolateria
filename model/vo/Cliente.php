<?php
class Cliente{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $bairro;
    private $cidade;
    private $uf;
    private $numero;

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
    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function getSenha(){
        return $this->senha;
    }
    function setSenha($senha){
        $this->senha=$senha;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    function getBairro(){
        return $this->bairro;
    }
    function setBairro ($bairro){
        $this->bairro=$bairro;
    }
    function getCidade(){
        return $this->cidade;
    }
    function setCidade($cidade){
        $this->cidade=$cidade;
    }
    function getUf(){
        return $this->uf;
    }
    function setUf($uf){
        $this->uf=$uf;
    }
    function getNumero(){
        return $this->numero;
    }
    function setNumero($numero){
        $this->numero=$numero;
    }
}
?>