<?php
session_start();

require_once('php/vendaDao.php');    
require_once('php/venda.php');
require_once('php/usuarioDao.php'); 
require_once('php/usuario.php'); 

$vdao = New vendaDAO();
$udao = New usuarioDAO();
$lista = $vdao->buscarClientes(intval($_SESSION['cod_usuario']));

?>

<?php require_once('inc/inicio.php'); ?>

<br>

<h2 class="fonteg textocentro cor"><b>Meus Clientes</b></h2>
<br>

<?php  
  foreach($lista as $r){
    $u=$udao->buscar($r->get_meucod());

    $p=$vdao->buscar($r->get_codproduto()); 
?>

<br>
<br>
<div class="alert alert-danger" role="alert">
    <h5 class="text-center">O Cliente <b><?php echo " ".$u->get_nome()." ";?></b> comprou:</h5>
</div>

<h5 class="text-center"><b><?php echo $r->get_quantia()." "; echo " ".$p->get_unidade()." de ";  echo $p->get_nome(); ?></b></h5>
<hr style="border-top: 1px solid grey;">
<h5 class="text-center"><b><?php echo "Para ser pego em ".$p->get_cidade().", "; echo $p->get_rua().", "; echo "Bairro ".$p->get_bairro().", "; echo $p->get_complemento(); ?></b></h5>
<hr style="border-top: 1px solid grey;">
<h5 class="red text-center"><?php echo "PREÇO TOTAL: R$ ".$r->get_preco(); ?> </h5>
<hr style="border-top: 1px solid grey;">
<h5 class="text-center"><b>
    <?php 
        if (($u->get_telefone())!= Null or ($u->get_telefone()) != ""){
            echo "Telefone para contato do cliente: ".$u->get_telefone();
        }
        else{
          echo "Este cliente não informou o telefone";
        }
    ?>
    <?php 
        

    ?>
</b></h5>
<br>

<div class="text-center">
<a href="php/excluirReserva.php?cod=<?php echo $r->get_codreserva(); ?>&cliente=0" class="btn btn-danger">CANCELAR/EXCLUIR PEDIDO</a>	


</div>
<br>
<br>



<?php } ?>


<?php require_once('inc/fim.php'); ?>