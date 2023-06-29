<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/BDPDO.php';

class ClienteDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new ClienteDAO();

    return self::$instance;

    }
    public function insert (Cliente $cliente){
        try {
            $sql = "INSERT INTO cliente (nome,telefone,email,senha,bairro,cidade,uf,numero) VALUES (:nome,:telefone,:email,:senha,:bairro,:cidade,:uf,:numero)"; 
            //perceba que na linha abaixo vai precisar de um import
            $pdo = BDPDO::getInstance();
            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":telefone", $cliente->getTelefone());
            $p_sql->bindValue(":email", $cliente->getEmail());
            $p_sql->bindValue(":senha", md5($cliente->getSenha()));
            $p_sql->bindValue(":bairro", $cliente->getBairro());
            $p_sql->bindValue(":cidade", $cliente->getCidade());
            $p_sql->bindValue(":uf", $cliente->getUf());
            $p_sql->bindValue(":numero", $cliente->getNumero());
            $p_sql->execute();
            return $pdo->lastInsertId();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($cliente){
        try {
            $sql = "UPDATE cliente SET nome=:nome,email=:email,senha=:senha,telefone=:telefone,bairro=:bairro,cidade=:cidade,uf=:uf,numero=:numero WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":telefone", $cliente->getTelefone());
            $p_sql->bindValue(":email", $cliente->getEmail());
            $p_sql->bindValue(":senha", md5($cliente->getSenha()));
            $p_sql->bindValue(":bairro", $cliente->getBairro());
            $p_sql->bindValue(":cidade", $cliente->getCidade());
            $p_sql->bindValue(":uf", $cliente->getUf());
            $p_sql->bindValue(":numero", $cliente->getNumero());
            $p_sql->bindValue(":id", $cliente->getId());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM cliente WHERE id = :id";
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
            $sql = "SELECT * FROM cliente WHERE id = :id";
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
        $obj = new Cliente;
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        $obj->setEmail($row['email']);
        $obj->setSenha($row['senha']);
        $obj->setTelefone($row['telefone']);
        $obj->setCidade($row['cidade']);
        $obj->setUf($row['uf']);
        $obj->setBairro($row['bairro']);
        $obj->setNumero($row['numero']);
        return $obj;
    }
    public function listAll (){
        try {
            $sql = "SELECT * FROM cliente";
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
            $sql = "SELECT * FROM cliente ".$restanteSql;
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