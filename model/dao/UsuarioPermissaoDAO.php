<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/UsuarioPermissao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/BDPDO.php';

class UsuarioPermissaoDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new UsuarioPermissaoDAO();

    return self::$instance;

    }
    public function insert (UsuarioPermissao $usuarioPermissao){
        try {
            $sql = "INSERT INTO usuarioPermissao (idUsuario,idPermissao) VALUES (:idUsuario,:idPermissao)"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":idUsuario", $usuarioPermissao->getIdUsuario());
            $p_sql->bindValue(":idPermissao", $usuarioPermissao->getIdPermissao());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($usuarioPermissao){
        try {
            $sql = "UPDATE usuarioPermissao SET idUsuario=:idUsuario,idPermissao=:idPermissao WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":idUsuario", $usuarioPermissao->getIdUsuario());
            $p_sql->bindValue(":idPermissao", md5($usuarioPermissao->getIdPermissao()));
            $p_sql->bindValue(":id", $usuarioPermissao->getId());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM usuarioPermissao WHERE id = :id";
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
            $sql = "SELECT * FROM usuarioPermissao WHERE id = :id";
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
        $obj = new UsuarioPermissao;
        $obj->setId($row['id']);
        $obj->setIdUsuario($row['idUsuario']);
        $obj->setIdPermissao($row['idPermissao']);
        return $obj;
    }
    public function listAll (){
        try {
            $sql = "SELECT * FROM usuario";
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