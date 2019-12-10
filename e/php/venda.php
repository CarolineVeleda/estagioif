<?php

include_once('vendaDao.php');

class Venda{
    private $nome;
    private $quantidade;
    private $unidade;
    private $descricao;
    private $cidade;
    private $bairro;
    private $rua;
    private $preco;

   
    public function __construct($nome,$quantidade,$unidade,$cidade,$bairro,$rua,$preco){
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->unidade = $unidade;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->preco = $preco;       
    }

    public function get_nome(){
        return $this->nome;
    }

    public function get_quantidade(){
        return $this->quantidade;
    }

    public function data(){
        return $this->data;
    }

    public function get_unidade(){
        return $this->unidade;
    }

    public function get_descricao(){
        return $this->descricao;
    }

    public function get_cidade(){
        return $this->cidade;
    }

    public function get_bairro(){
        return $this->bairro;
    }

    public function get_rua(){
        return $this->rua;
    }
    
    public function get_complemento(){
        return $this->complemento;
    }

    public function get_preco(){
        return $this->preco;
    }

    public function get_foto(){
        return $this->foto;
    }

    public function get_cod(){
        return $this->cod;
    }

    public function get_codVendedor(){
        return $this->codVendedor;
    }

    public function set_nome($n){
        $this->nome = $n;
    }

    public function set_quantidade($q){
        $this->quantidade = $q;
    }

    public function set_data($d){
        $this->data = $d;
    }

    public function set_unidade($u){
        $this->unidade = $u;
    }

    public function set_descricao($d){
        $this->descricao = $d;
    }

    public function set_foto($f){
        $this->foto = $f;
    }

    public function set_cidade($c){
        $this->cidade = $c;
    }

    public function set_bairro($b){
        $this->bairro = $b;
    }

    public function set_rua($r){
        $this->rua = $r;
    }

    public function set_complemento($cpl){
        $this->complemento = $cpl;
    }

    public function set_preco(int $p){
        $this->preco = $p;
    }

    public function set_cod(int $c){
        $this->cod = $c;
    }


    public function set_codVendedor(int $cv){
        $this->codVendedor = $cv;
    }
   
    
}
    




?>