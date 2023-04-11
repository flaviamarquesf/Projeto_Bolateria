<?php
class UsuarioPermissao{
    private $id;
    private $idUsuario;
    private $idPermissao;
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id=$id;
    }
    function getIdUsuario(){
        return $this->idUsuario;
    }
    function setIdUsuario($idUsuario){
        $this->idUsuario=$idUsuario;
    }
    function getIdPermissao(){
        return $this->idPermissao;
    }
    function setIdPermissao($idPermissao){
        $this->idPermissao=$idPermissao;
    }
}
?>