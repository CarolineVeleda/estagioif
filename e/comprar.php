<?php require_once('inc/inicio.php'); ?> 

<?php

session_start();

require_once('php/usuarioDao.php');  
require_once('php/vendaDao.php');    
require_once('php/venda.php');

$udao= New usuarioDAO();


if ($_POST['filtro']){

    $p=$_POST['pesquisa'];

    $filtro=$_POST['filtro'];

    $vdao = New vendaDAO();

    $_SESSION['pesquisa']=true;
    $_SESSION['filtro']=$filtro;

    if ($filtro=='vendedor'){
        $lista=$vdao->pesquisar($p,$filtro);

    }

    if ($filtro=='produtos'){
        //echo "sjiodajsijda";
        $lista=$vdao->pesquisar($p,$filtro);
    }

    if ($filtro=='local'){
        $lista=$vdao->pesquisar($p,$filtro);
    }


    
    //header("Location: ../vender.php");

}
else{
  $mdao = New vendaDAO();
  $lista = $mdao->listarTudo();
  
  $udao = New usuarioDAO();
}


?>

<div class="cor" style="background-color: #F0FFF0">

<br>


<h3 class="fonteg textocentro cor"><b>Pesquisar Produtos</b></h3>

<br>
<br>

<form action="" method="post">
    <input style="padding-left: 20px; border-radius: 30px; border: 2px solid #458B74;" class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="PESQUISAR" aria-label="Search">
    <br>


<div class="textocentro">
<select name="filtro" style="border-radius: 40px; width: 60%; background-color: black; color:white;" class="custom-select" id="inputGroupSelect01">
    <option value="produtos">FILTRAR POR PRODUTOS</option>
    <option value="vendedor">FILTRAR POR VENDEDOR</option>
    <option value="local">FILTRAR POR LOCAL</option>
  </select>
  </div>

    <br>

    <div class="text-center">
        <button style="border-radius: 15px;" class="btn btn-danger my-2 my-sm-0" type="submit">Pesquisar</button>
    </div>
</form>

<br>
<br>
</div>
<hr>
<br>

<h4 class="fonte text-center cor">Produtos à Venda</h4>

<br>

<?php  
  foreach($lista as $p){
?>

<br>

<div class="card-group">
  <div class="card text-center">
    <img class="card-img-top" src="<?php echo $p->get_foto(); ?>">
    <div class="card-body">
      <h4 class="red fonte"> <b> <?php echo $p->get_nome(); ?> </b> </h4>

    <br>
      <h4 class="cor"> <b> Vendedor : </b> </h4>
      <h5><?php $u=$udao->buscar($p->get_codVendedor()); echo $u->get_nome(); ?></h5>
    
    <br>

    <a href="ver.php?cod=<?php echo $p->get_cod(); ?>" class="btn btn-danger"> VER PRODUTO</a>	

    </div>
    <div class="card-footer">
      <small class="text-muted"> <b>  </b> </small>
    </div>
  </div>
  
</div>


<?php } ?>




<?php require_once('inc/fim.php'); ?>