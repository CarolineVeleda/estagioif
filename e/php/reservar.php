<?php

session_start();

require_once('../php/vendaDao.php');    
require_once('../php/venda.php');
require_once('../php/usuarioDao.php');    
require_once('../php/usuario.php');



if ($_SESSION['autenticado']){

    $udao = New usuarioDAO();
    $vdao = New vendaDAO();

    $u=$udao->buscar($_POST['vendedor']);
    $v=$vdao->buscar($_POST['produto']);

    $quantia=$_POST['quantia'];

    //vendedor
    $nomevendedor=$u->get_nome();
    $codvendedor=$u->get_codUsuario();
    $telvendedor=$u->get_telefone();

    //comprador(eu)
    $codcomprador=intval($_SESSION['cod_usuario']);
    $telcomprador=$_SESSION['telefone'];
    $nomecomprador=$_SESSION['nome_usuario'];

    //produto
    $produto=$v->get_nome();
    $preco=$v->get_preco();
    $codproduto=$v->get_cod();
    $unidade=$v->get_unidade();
    $cidade=$v->get_cidade();
    $bairro=$v->get_bairro();
    $rua=$v->get_rua();
    $complemento=$v->get_complemento();

    
    $codreservac=$vdao->minhasReservas($codproduto, $codvendedor, $codcomprador, $quantia,$_POST['preco']);
    
    $vdao->meusClientes($codproduto, $codvendedor, $codcomprador, $quantia,$_POST['preco'],intval($codreservac));

    header("Location: ../minhasReservas.php");

}
else{
    header("Location: login.php");
}




?>