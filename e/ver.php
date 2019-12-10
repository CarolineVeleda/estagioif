<?php require_once('inc/inicio.php'); ?> 

<?php

session_start();

require_once('php/usuarioDao.php');  
require_once('php/vendaDao.php');    
require_once('php/venda.php');
$vdao = New vendaDAO();
$p = $vdao->buscar($_GET['cod']);

$udao = New usuarioDAO();


$u=$udao->buscar($p->get_codVendedor());
 
$foto=$udao->buscarFoto(intval($u->get_codUsuario()));
?>


<div class="card-group">
  <div class="card text-center">
  <img class="card-img-top" src="<?php echo $p->get_foto(); ?>">
   </div>
</div>

<div class="alert alert-warning text-center" role="alert">
  <h5 class="fonte"> Vendedor </h5>
</div>
<br>
<div class="text-center">
    <img width="190" height="190" src="<?php echo $foto; ?>" class="img-circle rounded-circle">
    <br>
</div>

<table style="font-size: 21px;" class="table">
  <thead>
    <tr class="d-flex justify-content-center">
      <th scope="col">Vendedor</th>
      <th scope="col"><?php echo $u->get_nome(); ?></th>
    </tr>
  </thead>
  <tbody>
    <tr class="d-flex justify-content-center">
      <td><b>Telefone</b></td>
      <td>
      <?php 
        if (($u->get_telefone())!== Null or ($u->get_telefone()) !== ""){
          echo $u->get_telefone();
        }
        else{
          echo "Usuário sem Telefone";
        }
      ?></td>
    </tr>
  </tbody>
</table>

<br>
<br>
<div class="alert alert-danger text-center" role="alert">
  <h5 class="fonte"> Local da Venda </h5> 
</div>

<table style="font-size: 23px;" class="table">
  <thead>
    <tr class="d-flex justify-content-center">
      <th scope="col">Cidade</th>
      <th scope="col"><?php echo $p->get_cidade(); ?></th>
    </tr>
  </thead>
  <tbody>
    <tr class="d-flex justify-content-center">
      <td> <b>Bairro</b></td>
      <td><?php echo $p->get_bairro(); ?> </td>
    </tr>
    <tr class="d-flex justify-content-center">
      <td><b>Rua</b></td>
      <td><?php echo $p->get_rua(); ?></td>
    </tr>
    <tr class="d-flex justify-content-center">
      <td><b>Complemento</b></td>
      <td>
      <?php 
        if (($p->get_complemento())!== Null or ($p->get_complemento()) !== ""){
          echo $p->get_complemento(); 
        }
        else{
          echo "Não há complemento";
        }
      ?></td>
    </tr>
  </tbody>
</table>

<br>
<br>


<div class="alert alert-success text-center" role="alert">
  <h4 class="fonte"> Informações do Produto </h4> 
</div>
<h3 class="text-center"> <?php echo $p->get_nome(); ?> </h3> 

<br>

<div class="alert alert-success text-center" role="alert">
  <h4 class="fonte">Descrição do Item</h4>
</div>
<h3 class="text-center"> <?php echo $p->get_descricao(); ?> </h3> 

<br>

<div class="alert alert-success text-center" role="alert">
  <h4 class="fonte">Unidade a ser Vendida</h4>
</div>
<h3 class="text-center"> <?php echo $p->get_unidade(); ?> </h3> 

<br>

<div class="alert alert-success text-center" role="alert">
  <h4 class="fonte">Preço por <?php echo $p->get_unidade(); ?> </h4>
</div>
<h3 class="text-center"> <?php echo $p->get_preco(); ?> </h3> 

<br>
<br>

<script>
function addAtribute(index) {
  if (document.getElementById(index).value < <?php echo $p->get_quantidade(); ?>) {
    document.getElementById(index).value = Number(document.getElementById(index).value) + 0.5;
  }
}

function subAtribute(index) {
  if (document.getElementById(index).value > 0.5) {
    document.getElementById(index).value = Number(document.getElementById(index).value) - 0.5;
  }
}
</script>



<br>
<br>

<div class="textocentro">
<button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
  RESERVAR
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center modal-title red" id="exampleModalLongTitle"><b>NÃO ESQUEÇA!</b></h5>
      </div>
      <br>
      <div class=" text-center modal-body red">
        * O aplicativo não permite que você reserve uma quantia de produtos que seja superior à que o vendedor tiver no estoque. 
      </div>
      <br>
      <br>
      <br>
      <form action="php/reservar.php" method="post">
        <div class="text-center modal-content modal-body">
        <h3><b>Quantos(as) <?php echo $p->get_unidade(); ?> você quer de <?php echo $p->get_nome(); ?> : </b></h3>
        <br>
        <br>
        <input type="hidden" name="vendedor" value="<?php echo $p->get_codVendedor(); ?>">
        <input type="hidden" name="produto" value="<?php echo $p->get_cod(); ?>">
        <input type="hidden" name="preco" value="<?php echo $p->get_preco(); ?>">
          
        <br>
        <div class="text-center d-flex justify-content-center">
        <button class="btn btn-secondary" type="button" style="height: 80px; width: 70px;" onclick="subAtribute('exemplo')" ;>-----</button>

        <input class="text-center" style="font-size:50px;height: 80px; width: 150px;" type="number" name="quantia" id="exemplo" value="0.5" min="1" max="20"> 

        <button style="height: 80px; width: 70px;" class="btn btn-secondary" type="button" onclick="addAtribute('exemplo')" ;>--|--</button>
        </div>

        <br>
        <br>
        <br>
        <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-success">RESERVAR AGORA</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
        function process(quant){
            var value = parseInt(document.getElementById("quant").value);
            value+=quant;
            if(value < 1){
            document.getElementById("quant").value = 1;
            }else{
            document.getElementById("quant").value = value;
            }
        }
    </script>



<?php require_once('inc/fim.php'); ?>