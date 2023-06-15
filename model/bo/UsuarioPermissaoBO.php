<?php
 class UsuarioPermissaoBO{
      static function usuarioPossuiPermissao($idUsuario, $nomePermissao){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioPermissaoDAO.php';
        $sql = "where idUsuario = :idUsuarioLogado and idPermissao in (select id from permissao where nome = :nomeDaPermissao)";
        $arrayDeParametros = array(":idUsuarioLogado", ":nomeDaPermissao");
        $arrayDeValores = array($idUsuario,$nomePermissao);
        $lista = UsuarioPermissaoDAO::getInstance()->listWhere($sql,$arrayDeParametros,$arrayDeValores);
        return sizeof($lista)>0;
      }
      static function PegarPermissõesUsuario($idUsuario){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioPermissaoDAO.php';
        $sql = "where idUsuario =:idUsuario";
        $arrayDeParametros = array(":idUsuario");
        $arrayDeValores = array($idUsuario);
        $lista = UsuarioPermissaoDAO::getInstance()->listWhere($sql,$arrayDeParametros,$arrayDeValores);
        return $lista;
      }
 }
?>