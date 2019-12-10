<?php

include_once('usuario.php');
include_once('foto_perfil.php');
include_once('usuarioDao.php');

print("djldjaskldjalkjdkasljdklsajdlkjs");
$codfoto = intval($_GET['codfoto']);

$udao = new usuarioDao();
$udao->deletarFoto($codfoto);

header("Location: ../perfil.php");

?>