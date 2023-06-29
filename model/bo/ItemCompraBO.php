<?php
 class ItemCompraBO{
      static function clienteComprouProduto($idCliente, $nomePermissao){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
        $sql = "where idCliente = :idClienteLogado and idProduto in (select id from produto where nome = :nomeDoProduto)";
        $arrayDeParametros = array(":idClienteLogado", ":nomeDoProduto");
        $arrayDeValores = array($idCliente,$nomePermissao);
        $lista = CompraDAO::getInstance()->listWhere($sql,$arrayDeParametros,$arrayDeValores);
        return sizeof($lista)>0;
      }
      static function PegarComprasCliente($idCliente){
        require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/CompraDAO.php';
        $sql = "where idCliente =:idClienteLogado";
        $arrayDeParametros = array(":idClienteLogado");
        $arrayDeValores = array($idCliente);
        $lista = CompraDAO::getInstance()->listWhere($sql,$arrayDeParametros,$arrayDeValores);
        return $lista;
      }
 }
?>