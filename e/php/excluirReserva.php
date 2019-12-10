<?php

session_start();

require_once('../php/vendaDao.php');    
require_once('../php/venda.php');


if ($_SESSION['autenticado']){
    $vdao = New vendaDAO();
    $vdao->excluirReserva($_GET['cod']);
    $vdao->excluirCliente($_GET['cod']);
    header("Location: ../minhasReservas.php");
    
    /*$vdao = New vendaDAO();
    if ($_GET['cliente']==1){
        $vdao->excluirReserva($_GET['cod']);
        $vdao->excluirCliente($_GET['cod']);
        header("Location: ../minhasReservas.php");
        
    }
    else{
        $vdao->excluirCliente($_GET['cod']);
        $vdao->excluirReserva($_GET['cod']);
        header("Location: ../meusClientes.php");
    }*/

}
else{
    header("Location: login.php");
}




?>