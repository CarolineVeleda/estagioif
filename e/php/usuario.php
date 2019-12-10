<?php

include_once('usuarioDao.php');


class Usuario{
    private $nome;
    private $email;
    private $senha;
    private $telefone;

   
    public function __construct($nome,$email,$senha,$telefone){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;       
    }

    public function get_nome(){
        return $this->nome;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_senha(){
        return $this->senha;
    }

    public function get_codUsuario(){
        return $this->codUsuario;
    }

    public function get_telefone(){
        return $this->telefone;
    }

    public function set_nome($n){
        $this->nome = $n;
    }

    public function set_email($e){
        $this->email = $e;
    }

    public function set_senha($s){
        $this->senha = $s;
    }

    public function set_codUsuario($c){
        $this->codUsuario = $c;
    }

    public function set_telefone($t){
        $this->telefone = $t;
    }

}







?>