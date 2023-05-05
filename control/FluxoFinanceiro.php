<?php
/* fluxograma?
1 instanciar objeto
2 "setar" informações vindas do formulário no objeto
3 pegar um Dao
4 salvar usando método salvar do DAO
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/FluxoFinanceiro.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/FluxoFinanceiroDAO.php';
$obj = new FluxoFinanceiro();
$obj->setValor($_POST['valor']);
$obj->setDataPagamento($_POST['dataPagamento']);
$obj->setFluxo($_POST['fluxo']);
$obj->setTipo($_POST['tipo']);


FluxoFinanceiro::getInstance()->insert($obj);
?>