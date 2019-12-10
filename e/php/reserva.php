<?php

include_once('vendaDao.php');


class Reserva{
    private $codproduto;
    private $meucod;
    private $codvendedor;
    private $quantia;
    private $codreserva;

   
    public function __construct($codproduto,$meucod,$codvendedor,$quantia /*, $codreserva*/){
        $this->codproduto = $codproduto;
        $this->meucod = $meucod;
        $this->codvendedor = $codvendedor;
        $this->quantia = $quantia;   
        //$this->codreserva = $codreserva;
    }

    public function get_codproduto(){
        return $this->codproduto;
    }

    public function get_preco(){
        return $this->preco;
    }

    public function get_meucod(){
        return $this->meucod;
    }

    public function get_codvendedor(){
        return $this->codvendedor;
    }

    public function get_codreserva(){
        return $this->codreserva;
    }

    public function get_quantia(){
        return $this->quantia;
    }

    public function set_codproduto($n){
        $this->codproduto = $n;
    }

    public function set_meucod($e){
        $this->meucod = $e;
    }

    public function set_codvendedor($s){
        $this->codvendedor = $s;
    }

    public function set_codreserva($c){
        $this->codreserva = $c;
    }

    public function set_quantia($t){
        $this->quantia = $t;
    }

    public function set_preco($p){
        $this->preco = $p;
    }

}







?>