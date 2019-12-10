<?php
session_start();

include_once('php/usuarioDao.php');
include_once('php/foto_perfil.php');

if(isset($_FILES['fileUpload'])){
   date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

   $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); 
   if ($ext==".png" || $ext==".jpg" || $ext==".JPG" || $ext==".PNG"){
        $new_name = $_SESSION['cod_usuario'] . $ext;
        $dir = 'uploads/'; 
        $caminho=$dir.$new_name; 
        
        if ($_SESSION['autenticado']){
            $f= new fotoPerfil($new_name,$caminho);
            $f->set_codUser(intval($_SESSION['cod_usuario']));
            $fdao = new usuarioDao();
            $fdao->inserirFoto($f);
        }
        else{
            echo "vai te logar parcero";
        }
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   }
   else{
       echo "isso não é uma imagem";
   }

}



//listar os ngc
$udao = new usuarioDao();
$u=$udao->buscar(intval($_SESSION['cod_usuario']));
$foto=$udao->buscarFoto(intval($_SESSION['cod_usuario']));

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="manifest" href="https://carolveleda.github.io/e/manifest.json">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

<style>

    .circular--square {
        border-radius: 50%;
    }


    .circular--square {
        border-top-left-radius: 50% 50%;
        border-top-right-radius: 50% 50%;
        border-bottom-right-radius: 50% 50%;
        border-bottom-left-radius: 50% 50%;
    }


    .circular--landscape {
        display: inline-block;
        position: relative;
        width: 200px;
        height: 200px;
        overflow: hidden;
        border-radius: 50%;
    }

    .circular--landscape {
        width: auto;
        height: 100%;
        margin-left: -50px;
    }

    .circular--portrait {
        position: relative;
        width: 200px;
        height: 200px;
        overflow: hidden;
        border-radius: 50%;
    }

    .circular--portrait img {
        width: 100%;
        height: auto;
    }

    .circle-img {
  width: 250px;
  height: 250px;
  overflow: hidden;
}

.circle-img img {
  height: 100%;
  transform: translateX(-50%);
  margin-left: 50%;
}

.fundinho{
    background-image: url("f6.jpg");
    background-size:100% 100%;
    padding: 35px;
    background-repeat: no-repeat;
}



</style>

</head>

<body>


<nav style="color:white;" class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2"
        aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.html">
        <img src="logo.png" width="65" height="60" alt="Logo">
    </a>

    <div  class="collapse navbar-collapse justify-content-between" id="navbar2">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php" aria-haspopup="true" aria-expanded="false">
                    Início
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="perfil.php" aria-haspopup="true" aria-expanded="false">
                    Meu Perfil
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="vender.php" aria-haspopup="true" aria-expanded="false">
                    Vender Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="comprar.php" aria-haspopup="true" aria-expanded="false">
                    Comprar Produtos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="minhasVendas.php" aria-haspopup="true" aria-expanded="false">
                    Minhas Vendas Criadas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="minhasReservas.php" aria-haspopup="true" aria-expanded="false">
                    Minhas Reservas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="meusClientes.php" aria-haspopup="true" aria-expanded="false">
                    Meus Clientes
                </a>
            </li>
        </ul>
    </div>
</nav>



<div class="fundinho">

<h3 class="fonteg textocentro cor"><b>Meu Perfil</b></h3>


<div class="text-center">
    <img width="250" height="236" src="<?php echo $foto; ?>" class="img-circle rounded-circle">
    <br>
</div>

<br>

<div class="d-flex justify-content-center">
    <a href="php/excluirFotoPerfil.php?codfoto=<?php echo $_SESSION['cod_usuario']; ?>" class="btn btn-danger">
        <button type="button" class="btn btn-danger">X APAGAR FOTO</button>
    </a>
</div>




<br>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="d-flex justify-content-center btn_foto">
        <button class="btn_foto_perfil">Alterar Foto</button>
        <input id="foto_perfil" type="file" name="fileUpload" />
        <br>
        <br>
        <br>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success">SALVAR FOTO</button>
    </div>
</form>


</div>
<br>
<br>
<h4 class="fonte cor textocentro"><b> SEUS DADOS :</b></h4>
<br>
<br>
<h3 class="fonte cor">NOME</h3>
<h5> <?php echo $u->get_nome(); ?> </h5>
<br>
<br>

<h3 class="fonte inlineblock cor">EMAIL</h3>

<button type="button" class="inlineblock btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Editar</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div style="color:white;background-color: red; background-image: linear-gradient(#008B45, #009ACD);" class="modal-content">
      <div class="modal-header">
        <h5 class="cor modal-title textocentro" id="exampleModalLabel">MUDAR EMAIL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <br>
      <div class="modal-body">
          <div class="form-group input-group-lg">
          <form action="php/cadastraUsuarios.php" method="post">
            <label for="recipient-name" class="col-form-label">Novo Email :</label>
            <input type="text" name="email" aria-label="Large" class="form-control" id="recipient-name">
            <input name="nome" value="<?php echo $u->get_nome(); ?>" type="hidden">
            <input name="telefone" value="<?php echo $u->get_telefone(); ?>" type="hidden">
            <input name="senha" value="<?php echo $u->get_senha(); ?>" type="hidden">
            <input name="cod" value="<?php echo $u->get_codUsuario(); ?>" type="hidden">
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


<h5> <?php echo $u->get_email(); ?> </h5>
<br>
<br>


<h3 class="fonte inlineblock cor">TELEFONE</h3>

<button type="button" class="inlineblock btn btn-success" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Editar</button>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div style="color:white;background-color: red; background-image: linear-gradient(#008B45, #009ACD);" class="modal-content">
      <div class="modal-header">
        <h2 class="cor modal-title textocentro" id="exampleModalLabel2">MUDAR TELEFONE</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <br>
      <div class="modal-body">
          <div class="form-group input-group-lg">
          <form action="php/cadastraUsuarios.php" method="post">
            <label for="recipient-name" class="col-form-label">Novo Número :</label>
            <input type="text" name="telefone" aria-label="Large" class="form-control" id="recipient-name">
            <input name="nome" value="<?php echo $u->get_nome(); ?>" type="hidden">
            <input name="email" value="<?php echo $u->get_email(); ?>" type="hidden">
            <input name="senha" value="<?php echo $u->get_senha(); ?>" type="hidden">
            <input name="cod" value="<?php echo $u->get_codUsuario(); ?>" type="hidden">
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

<h5> <?php echo $u->get_telefone(); ?> </h5>
<br>
<br>






















    <script async src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script asyc src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script async src="js/main.js"></script>




</body>

</html>