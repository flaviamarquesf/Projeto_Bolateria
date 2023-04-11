<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>
<body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/dao/UsuarioDAO.php';
    //CRIANDO COLUNAS NO SQL 
    /*$u = new Usuario();
    $u->setNome("manu com dois Eli");
    $u->setEmail("fravia@gmail.com");
    $u->setSenha("aaaaa");
    UsuarioDAO::getInstance()->insert($u);
    echo "Acabou o código..."; 
    */
    //echo "Salvou mais um...";
    //testando o getById()
    //$objDoId2=UsuarioDAO::getInstance()->getById(2);
    //print_r($objDoId2);
    //atualizar
    //$objDoId2->setNome("Antonio");
    //UsuarioDAO::getInstance()->update($objDoId2);
    //deletar
    //UsuarioDAO::getInstance()->delete(1);
    //print_r(UsuarioDAO::getInstance() ->listAll());
    $arrayDeParametros = array(":nome");
    $arrayDeValores = array("m%");
    print_r(UsuarioDAO::getInstance() ->listWhere("where nome like :nome", $arrayDeParametros, $arrayDeValores));
?>
</body>
</html>
