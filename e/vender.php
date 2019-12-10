<?php

require_once('php/vendaDao.php');    
require_once('php/venda.php');




?>


<?php require_once('inc/inicio.php'); ?>

<div class="cor" style="background-color: #F0FFF0">

<h3 class="fonteg textocentro">Vender</h3>
<br>
<br>
<p class="textocentro">Preencha corretamente os campos abaixo</p>
<p class="textocentro">( Você pode editar Depois )</p>
<br>
<br>
</div>
<br>


<form action="php/upaProdutos.php" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <h3 class="cor textocentro"><b>Nome do Produto</b></h3>
        <br>
        <input type="text" name="nome" class="form-control textocentro" id="formGroupExampleInput" placeholder="NOME DO ITEM">
    </div>

    <br>
    <br>

    <div class="form-group">
         <h3 class="cor textocentro"><b>Quantidade No Estoque</b></h3>
        <p class="cor textocentro">( Informe a quantidade que há no seu estoque para evitar que compradores reservem uma quantia maior que a que você tem )</p>
        <br>
        <input type="number" name="quantidade" class="form-control textocentro" id="formGroupExampleInput" placeholder="QUANTIDADE NO ESTOQUE">
    </div>

    <br>
    <br>

    <div class="form-group">
        <h3 class="cor textocentro"><b>Unidade a Ser Vendida</b></h3>
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

    <div class="form-group">
    <h3 class="cor textocentro"><b>Preço por Unidade</b></h3>
    <br>
        <input type="number" name="preco" class="form-control textocentro" id="formGroupExampleInput" placeholder="Preço">
    </div>

    <br>
    <br>

    <div class="form-group">
    <h3 class="cor textocentro"><b>Descrição do Produto</b></h3>
    <br>
        <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div>

    
    <br>

    <br>

    <div class="d-flex justify-content-center btn_foto">
        <button class="btn_foto_perfil">Inserir Foto do Produto</button>
        <input id="foto_perfil" type="file" name="fileUpload" />
    </div>
    
    <br>
    <br>


    <div class="form-group">
        <h3 class="cor textocentro"><b>Cidade</b></h3>
        <br>
        <input type="text" name="cidade" class="form-control textocentro" id="formGroupExampleInput" placeholder="cidade">
    </div>

    <br>
    <br>

    <div class="form-group">
    <h3 class="cor textocentro"><b>Bairro</b></h3>
    <br>
        <input type="text" name="bairro" class="form-control textocentro" id="formGroupExampleInput" placeholder="Bairro">
    </div>

    <br>
    <br>

    <div class="form-group">
    <h3 class="cor textocentro"><b>Rua e/ou Nº do Local</b></h3>
    <br>
        <input type="text"  name="rua" class="form-control textocentro" id="formGroupExampleInput" placeholder="Rua e/ou Nº">
    </div>

    <br>
    <br>

    <div class="form-group">
    <h3 class="cor textocentro"><b>Complemento</b></h3>
        <p class="cor textocentro">( Feira, horário e data)</p>
        <br>
        <input type="text" name="complemento" class="form-control textocentro" id="formGroupExampleInput" placeholder="Complemento">
    </div>

    <br>
    <br>

    <div class="textocentro">
    <button type="submit" class="btn btn-success">Salvar e Enviar minha venda</button>
    </div>

    <br>
    <br>

</form>



 <?php require_once('inc/fim.php'); ?>