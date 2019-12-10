<?php

include_once('usuarioDao.php');

class fotoPerfil{
    private $nomeFoto;
    private $caminho;

   
    public function __construct($nomeFoto,$caminho){
        $this->nomeFoto = $nomeFoto;
        $this->caminho = $caminho;       
    }

    public function get_nomeFoto(){
        return $this->nomeFoto;
    }

    public function get_codFoto(){
        return $this->codFoto;
    }

    public function get_caminho(){
        return $this->caminho;
    }

    public function get_codUser(){
        return $this->codUser;
    }

    public function set_nomeFoto($n){
        $this->nomeFoto = $n;
    }

    public function set_caminho($e){
        $this->caminho = $e;
    }

    public function set_codUser($c){
        $this->codUser = $c;
    }

    public function set_codFoto($c){
        $this->codFoto = $c;
    }

}







?>