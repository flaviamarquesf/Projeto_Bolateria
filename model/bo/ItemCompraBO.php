<?php
 class ItemCompraBO{
      static function usuarioPossuiPermissao($idCliente, $nomePermissao){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ItemCompraDAO.php';
        $sql = "where idCliente = :idClienteLogado and idPermissao in (select id from permissao where nome = :nomeDaPermissao)";
        $arrayDeParametros = array(":idClienteLogado", ":nomeDaPermissao");
        $arrayDeValores = array($idCliente,$nomePermissao);
        $lista = ItemCompraDAO::getInstance()->listWhere($sql,$arrayDeParametros,$arrayDeValores);
        return sizeof($lista)>0;
      }
      static function PegarPermissõesCliente($idCliente){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/ItemCompraDAO.php';
        $sql = "where idCliente =:idCliente";
        $arrayDeParametros = array(":idCliente");
        $arrayDeValores = array($idCliente);
        $lista = ItemCompraDAO::getInstance()->listWhere($sql,$arrayDeParametros,$arrayDeValores);
        return $lista;
      }
 }
?>