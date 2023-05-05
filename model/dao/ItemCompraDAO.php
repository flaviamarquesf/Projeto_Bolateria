<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/ItemCompra.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/BDPDO.php';

class ItemCompraDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new ItemCompraDAO();

    return self::$instance;

    }
    public function insert (ItemCompra $itemcompra){
        try {
            $sql = "INSERT INTO itemcompra (idProduto,idCompra) VALUES (:idProduto,:idCompra)"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":idProdtuo", $itemcompra->getIdProdtuo());
            $p_sql->bindValue(":idCompra", $itemcompra->getIdCompra());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($itemcompra){
        try {
            $sql = "UPDATE itemcompra SET idProdtuo=:idProduto,idCompra=:idCompra WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":idProduto", $itemcompra->getIdProduto());
            $p_sql->bindValue(":idCompra", ($itemcompra->getIdCompra()));
            $p_sql->bindValue(":id", $itemcompra->getId());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM itemcompra WHERE id = :id";
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
            $sql = "SELECT * FROM itemcompra WHERE id = :id";
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
        $obj = new ItemCompra;
        $obj->setId($row['id']);
        $obj->setIdProduto($row['idProduto']);
        $obj->setIdCompra($row['idCompra']);
        return $obj;
    }
    public function listAll (){
        try {
            $sql = "SELECT * FROM itemcompra";
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
            $sql = "SELECT * FROM itemcompra ".$restanteSql;
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