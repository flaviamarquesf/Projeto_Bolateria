<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/FluxoFinanceiro.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/BDPDO.php';

class FluxoFinanceiroDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new FluxoFinanceiroDAO();

    return self::$instance;

    }
    public function insert (FluxoFinanceiro $fluxoFinanceiro){
        try {
            $sql = "INSERT INTO fluxoFinanceiro (fluxo,dataPagamento,tipo,valor) VALUES (:fluxo,:dataPagamento,:tipo,:valor)"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":fluxo", $fluxoFinanceiro->getFluxo());
            $p_sql->bindValue(":dataPagamento", $fluxoFinanceiro->getdataPagamento());
            //iremos critografar a senha para md5, assim o usuário terá mais segurança, já que frequentemente usamos a mesma senha para diversas aplicações.
            $p_sql->bindValue(":tipo", $fluxoFinanceiro->getTipo());
            $p_sql->bindValue(":valor", $fluxoFinanceiro->getValor());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($fluxoFinanceiro){
        try {
            $sql = "UPDATE fluxoFinanceiro SET fluxo=:fluxo,dataPagamento=:dataPagamento,tipo=:tipo,valor=:valor WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":fluxo", $fluxoFinanceiro->getFluxo());
            $p_sql->bindValue(":dataPagamento", $fluxoFinanceiro->getDataPagamento());
            $p_sql->bindValue(":tipo", $fluxoFinanceiro->getTipo());
            $p_sql->bindValue(":valor", $fluxoFinanceiro->getValor());
            $p_sql->bindValue(":id", $fluxoFinanceiro->getId());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM fluxoFinanceiro WHERE id = :id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de deletar".$e->getMessage();
            }
    }
    public function getById($id){
        try {
            $sql = "SELECT * FROM fluxoFinanceiro WHERE id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDaBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
            getCode() . " Mensagem: " . $e->getMessage());
        }
    }
    private function converterLinhaDaBaseDeDadosParaObjeto($row) {
        $obj = new FluxoFinanceiro;
        $obj->setId($row['id']);
        $obj->setValor($row['valor']);
        $obj->setTipo($row['tipo']);
        $obj->setDataPagamento($row['dataPagamento']);
        $obj->setFluxo($row['fluxo']);
        return $obj;
    }
    public function listAll (){
        try {
            $sql = "SELECT * FROM fluxoFinanceiro";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            $lista = array();
            while ($row){
                $lista[]=$this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
            getCode() . " Mensagem: " . $e->getMessage());
        }
        
    }
    public function listWhere($restanteSql, $arrayDeParametros, $arrayDeValores){
        try {
            $sql = "SELECT * FROM fluxoFinanceiro ".$restanteSql;
            $p_sql = BDPDO::getInstance()->prepare($sql);
            for($i = 0; $i < sizeof($arrayDeParametros); $i++){
                $p_sql->bindValue($arrayDeParametros[$i], $arrayDeValores[$i]);
            }
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            $lista = array();
            while ($row){
                $lista[]=$this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
            getCode() . " Mensagem: " . $e->getMessage());
        }
    }
}
?>