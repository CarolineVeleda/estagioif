<?php

session_start();

require_once('../php/vendaDao.php');    
require_once('../php/venda.php');


if ($_SESSION['autenticado']){

    
    $vdao = New vendaDAO();
    $vdao->deletar($_GET['cod']);
    header("Location: ../minhasVendas.php");

}
else{
    header("Location: login.php");
}




?>