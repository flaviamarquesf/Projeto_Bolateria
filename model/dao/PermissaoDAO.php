<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Permissao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/BDPDO.php';

class PermissaoDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new PermissaoDAO();

    return self::$instance;

    }
    public function insert (Permissao $permissao){
        try {
            $sql = "INSERT INTO permissao (nome) VALUES (:nome)"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $permissao->getNome());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($permissao){
        try {
            $sql = "UPDATE permissao SET nome=:nome WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $permissao->getNome());
            $p_sql->bindValue(":id", $permissao->getId());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM permissao WHERE id = :id";
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
            $sql = "SELECT * FROM permissao WHERE id = :id";
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
        $obj = new Permissao;
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        return $obj;
    }
    public function listAll (){
        try {
            $sql = "SELECT * FROM permissao";
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
            $sql = "SELECT * FROM usuario ".$restanteSql;
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