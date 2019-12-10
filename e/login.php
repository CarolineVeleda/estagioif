<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

    <style>
    
    body{
        /*background: linear-gradient(to bottom right, #54f4af 20%, #66CDAA 60%);*/
        background-image: url("bt.png");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .fundocor{
        opacity: 0.8;
    }

    .fonteg{
        font-family: 'Amatic SC', cursive;
        font-size: 70px;
    }

    .fonte{
        font-family: 'Amatic SC', cursive;
        font-size: 50px;
    }

    </style>
</head>

<body>


<br>

<h1 style="color:white;" class="fonteg textocentro fundocor"><b>Login</b></h1>

<br>
<br>
<br>
<br>
<br>

<form action="php/logar.php" method="post">

    <h1 class="fonte text-center" style="color:white;"><b>Email</b></h1>
    <div class="input-group input-group-lg">
    
        <span>
            <button style="border-radius: 20px;" type="button" class="btn btn-dark">
                <i class="fas fa-envelope"></i>
            </button>
        </span>
        <input name="email" style="border-radius: 30px;" type="text" placeholder="Seu email" class="form-control text-center" aria-describedby="inputGroup-sizing-lg">
    </div>

    <br>
    <br>
    <br>
    <h1 class="fonte text-center" style="color:white;"><b>Senha</b></h1>
    <div class="input-group input-group-lg">
        <span>
            <button style="border-radius: 20px;" type="button" class="btn btn-dark">
                <i class="fas fa-key"></i>
            </button>
        </span>
        <input name="senha" style="border-radius: 30px;" type="password" placeholder="Senha" class="form-control text-center" aria-describedby="inputGroup-sizing-lg">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
        <button type="submit" class="btn btn-dark btn-lg btn-block">Entrar</button>

</form>
<a href="cadastrar.php">
<button type="button" class="btn btn-info btn-lg btn-block">Não possui Login? Cadastre-se</button>
</a>










<script src="https://kit.fontawesome.com/b1dd51af73.js"></script>
    <script async src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script asyc src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script async src="js/main.js"></script>




</body>

</html>