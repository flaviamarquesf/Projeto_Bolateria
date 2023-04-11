<?php
class Cliente{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $endereco;
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
    function getEndereco(){
        return $this->endereco;
    }
    function setEndereco($endereco){
        $this->endereco=$endereco;
    }
}
?>