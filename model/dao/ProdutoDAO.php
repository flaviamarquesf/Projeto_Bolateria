<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/vo/Produto.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/BDPDO.php';

class ProdutoDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new ProdutoDAO();

    return self::$instance;

    }
    public function insert (Produto $produto){
        try {
            $sql = "INSERT INTO produto (nome,email,senha) VALUES (:nome,:email,:senha)"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":email", $produto->getEmail());
            //iremos critografar a senha para md5, assim o usuário terá mais segurança, já que frequentemente usamos a mesma senha para diversas aplicações.
            $p_sql->bindValue(":senha", md5($produto->getSenha()));
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($produto){
        try {
            $sql = "UPDATE produto SET nome=:nome,precokg=:precokg WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":precokg", $produto->getPrecokg());
            $p_sql->bindValue(":id", $produto->getId());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM produto WHERE id = :id";
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
            $sql = "SELECT * FROM produto WHERE id = :id";
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
        $obj = new Produto;
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        $obj->setPrecoKg($row['precokg']);
        return $obj;
    }
    public function listAll (){
        try {
            $sql = "SELECT * FROM produto";
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
            $sql = "SELECT * FROM produto ".$restanteSql;
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