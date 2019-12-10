<?php

session_start();

require_once('../php/usuarioDao.php');    
require_once('../php/usuario.php');

$senha = MD5($_POST['senha']);

$udao = New usuarioDAO();
$u = $udao->login($_POST['email'],$senha);


if ($u===1){
    //senha errada
    print("senha errada");
}

if ($u===0){
    //ta tudo errado
    print("tudo errado");
}

if ($u!==0 && $u!==1 && is_object($u)){
    //logar
    $_SESSION['nome_usuario']=$u->get_nome();
    $_SESSION['email']=$u->get_email();
    $_SESSION['cod_usuario']=$u->get_codUsuario();
    $_SESSION['telefone']=$u->get_telefone();
    $_SESSION['autenticado']= true;
    header("Location: ../index.php");
    //print_r($_SESSION['cod_usuario']);
}






//redireciona para o listar.php
//header("Location: listar.php");






?>