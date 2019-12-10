<?php

require_once('../php/usuarioDao.php');    
require_once('../php/usuario.php');


$cod = $_POST['cod'];


if($cod!==null){
    $u1 = new Usuario($_POST['nome'], $_POST["email"],$_POST["senha"], $_POST["telefone"]);
    $u1->set_codUsuario(intval($cod));
    $udao = New usuarioDAO();
    $udao->alterar($u1);
    header("Location: ../perfil.php");
}
else{
    $senha1 = md5($_POST["senha"]);
    $u1 = new Usuario($_POST['nomeUsuario'], $_POST["email"],$senha1, $_POST["telefone"]);
    $udao = New usuarioDAO();
    $udao->inserir($u1);
}



//redireciona para o listar.php
//header("Location: listar.php");






?>