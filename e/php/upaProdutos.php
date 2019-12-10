<?php

session_start();

require_once('../php/vendaDao.php');    
require_once('../php/venda.php');



if ($_SESSION['autenticado']){

    $cod = $_POST['cod'];



    $p1 = new Venda($_POST['nome'], $_POST["quantidade"], $_POST["unidade"], $_POST["cidade"], $_POST["bairro"], $_POST["rua"], $_POST["preco"]);


        $p1->set_codVendedor(intval($_SESSION['cod_usuario']));

        
        $p1->set_complemento($_POST["complemento"]);

        
        $p1->set_descricao($_POST["descricao"]);
        

        


        if($_FILES['fileUpload']){
            date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
        
            $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); 
            $n = $_FILES['fileUpload']['name']; 
            if ($ext==".png" || $ext==".jpg" || $ext==".JPG" || $ext==".PNG"){
                $new_name =$n;
                $dir = 'foto_item/'; 
                $caminho=$dir.$new_name; 
                

                $p1->set_foto($caminho);

                move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../'.$dir.$new_name); //Fazer upload do arquivo
            }
            else{
                echo "isso não é uma imagem";
            }
        
        }

    if($cod!==null){
        
        $p1->set_cod(intval($cod));
        $vdao = New vendaDAO();
        $vdao->editar($p1);
        header("Location: ../minhasVendas.php");
    }

    else{
        echo "nao pode se";
        $vdao = New vendaDAO();
        $vdao->inserir($p1);
        header("Location: ../minhasVendas.php");

    }


}
else{
    header("Location: login.php");
}




?>