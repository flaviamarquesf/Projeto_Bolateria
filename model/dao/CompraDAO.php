<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Compra.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/BDPDO.php';

class CompraDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new CompraDAO();

    return self::$instance;

    }
    public function insert (Compra $compra){
        try {
            $sql = "INSERT INTO compra (nome,email,senha) VALUES (:nome,:email,:senha)"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $compra->getNome());
            $p_sql->bindValue(":email", $compra->getEmail());
            //iremos critografar a senha para md5, assim o usuário terá mais segurança, já que frequentemente usamos a mesma senha para diversas aplicações.
            $p_sql->bindValue(":senha", md5($compra->getSenha()));
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($compra){
        try {
            $sql = "UPDATE compra SET nome=:nome,email=:email,senha=:senha WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $compra->getNome());
            $p_sql->bindValue(":email", $compra->getEmail());
            $p_sql->bindValue(":senha", md5($compra->getSenha()));
            $p_sql->bindValue(":id", $compra->getId());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM compra WHERE id = :id";
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
            $sql = "SELECT * FROM compra WHERE id = :id";
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
        $obj = new Compra;
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        $obj->setEmail($row['email']);
        $obj->setSenha($row['senha']);
        return $obj;
    }
    public function listAll (){
        try {
            $sql = "SELECT * FROM compra";
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
            $sql = "SELECT * FROM compra ".$restanteSql;
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