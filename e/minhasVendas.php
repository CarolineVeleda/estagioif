<?php
session_start();

require_once('php/vendaDao.php');    
require_once('php/venda.php');
$mdao = New vendaDAO();
$lista = $mdao->listar($_SESSION['cod_usuario']);

?>

<?php require_once('inc/inicio.php'); ?>

<br>

<h3 class="fonteg textocentro cor"><b>Minhas Vendas</b></h3>
<br>
<h5 class="cor text-center">Clique no nome do item para ver detalhes</h5>

<br>
<br>
<br>

<?php  
  foreach($lista as $p){
?>

<div style="width:100%;" class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="<?php echo '#'.$p->get_cod(); ?>" aria-expanded="true" aria-controls="<?php echo $p->get_cod(); ?>">
          <?php echo $p->get_nome(); ?>
          </button>
          


<button type="button" class="inlineblock btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Editar</button>

<a href="php/excluirProduto.php?cod=<?php echo $p->get_cod(); ?>"><button class="inlineblock btn btn-danger">excluir</button></a>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div style="color:white;background-color: red; background-image: linear-gradient(#008B45, #009ACD);" class="modal-content">
      <div class="modal-header">
        <h5 class="fonteg cor modal-title textocentro" id="exampleModalLabel"><b>EDITAR</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <br>
      <div class="modal-body">
          <div class="form-group input-group-lg">
          <form action="php/upaProdutos.php" method="post" enctype="multipart/form-data">
            <label for="recipient-name" class="col-form-label">Nome :</label>
            <input type="text" value="<?php echo $p->get_nome(); ?>" name="nome" aria-label="Large" class="form-control" id="recipient-name">
            <br>
            <br>
            <label for="recipient-name" class="col-form-label">Quantidade :</label>
            <input type="text" value="<?php echo $p->get_quantidade(); ?>" name="quantidade" aria-label="Large" class="form-control" id="recipient-name">
            <br>
            <br>
            <label for="recipient-name" class="col-form-label">Descrição :</label>
            <input type="text" value="<?php echo $p->get_descricao(); ?>" name="descricao" aria-label="Large" class="form-control" id="recipient-name">
            <br>
            <br>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Unidade :</label>
                <br>
                <select name="unidade" class="custom-select" id="inputGroupSelect01">
                    <option class="textocentro" value="Kg">Quilograma (Kg)</option>
                    <option value="g">Grama (g)</option>
                    <option value="Mg">Miligrama (Mg)</option>
                    <option value="Unidade Única">Unidade Única</option>
                </select>
            </div>
            <br>
            <br>
            <label for="recipient-name" class="col-form-label">Preço :</label>
            <input type="text" value="<?php echo $p->get_preco(); ?>" name="preco" aria-label="Large" class="form-control" id="recipient-name">
            <br>
            <br>
            <label for="recipient-name" class="col-form-label">Cidade :</label>
            <input type="text" value="<?php echo $p->get_cidade(); ?>" name="cidade" aria-label="Large" class="form-control" id="recipient-name">
            <br>
            <br>
            <label for="recipient-name" class="col-form-label">Bairro :</label>
            <input type="text" value="<?php echo $p->get_bairro(); ?>" name="bairro" aria-label="Large" class="form-control" id="recipient-name">
            <br>
            <br>
            <label for="recipient-name" class="col-form-label">Rua :</label>
            <input type="text" value="<?php echo $p->get_rua(); ?>" name="rua" aria-label="Large" class="form-control" id="recipient-name">
            <br>
            <br>
            <label for="recipient-name" class="col-form-label">Complemento :</label>
            <input type="text" value="<?php echo $p->get_complemento(); ?>" name="complemento" aria-label="Large" class="form-control" id="recipient-name">

            <br>
           
            <div class="d-flex justify-content-center btn_foto">
                <button class="btn_foto_perfil">Inserir Foto do Produto</button>
                <input id="foto_perfil" type="file" name="fileUpload" />
            </div>
          
          
            <input type="hidden" name="cod" value="<?php echo $p->get_cod(); ?>">
            <br>
            <br>
            <br>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-success" type="submit">Salvar</button>		
            
            </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>






        </h5>
      </div>
  
      <div id="<?php echo $p->get_cod(); ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <table class="table text-center fontesizeV">
                <thead class="bg-warning">
                  <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Informação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Item</th>
                    <td> <?php echo $p->get_nome(); ?> </td>
                  </tr>
                  <tr>
                    <th scope="row">Quantidade</th>
                    <td> <?php echo $p->get_quantidade(); ?> </td>
                  </tr>
                  <tr>
                    <th scope="row">Unidade</th>
                    <td> <?php echo $p->get_unidade(); ?> </td>
                  </tr>
                  <tr>
                    <th scope="row">Descricao</th>
                    <td> <?php echo $p->get_descricao(); ?> </td>
                  </tr>
                  <tr>
                    <th scope="row">Preço R$</th>
                    <td> <?php echo $p->get_preco(); ?> </td>
                  </tr>
                  
                  <thead class="alert alert-warning">
                    <tr>
                      <th scope="col">Localização</th>
                      <th scope="col">Informação</th>
                    </tr>
                  </thead>
                  <tr>
                    <th class="alert alert-warning" scope="row">Cidade</th>
                    <td> <?php echo $p->get_cidade(); ?> </td>
                  </tr>
                  <tr>
                    <th class="alert alert-warning" scope="row">Bairro</th>
                    <td> <?php echo $p->get_bairro(); ?> </td>
                  </tr>
                  <tr>
                    <th class="alert alert-warning" scope="row">Local</th>
                    <td> <?php echo $p->get_rua(); ?> </td>
                  </tr>
                  <tr>
                    <th class="alert alert-warning" scope="row">Complemento</th>
                    <td> <?php echo $p->get_complemento(); ?> </td>
                  </tr>
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>

<?php } ?>


<?php require_once('inc/fim.php'); ?>