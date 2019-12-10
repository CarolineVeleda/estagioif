<?php

include_once('venda.php');
include_once('usuarioDAO.php');
include_once('reserva.php');
include_once('usuario.php');


class vendaDAO{

	private function conexao(){
		$scon="port=5432 dbname=estagio user=postgres password=postgres";
		return pg_connect($scon);
    }
    
    public function inserir($p){
		$conn = $this->conexao();
		$sql ="INSERT INTO venda (nomeItem,quantidade,unidade,descricao,cidade,bairro,rua,complemento,preco,codvendedor,foto,datai) VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,now()) RETURNING codproduto"; 
		$vetor = array($p->get_nome(), $p->get_quantidade(), $p->get_unidade(),$p->get_descricao(),$p->get_cidade(),$p->get_bairro(),$p->get_rua(),$p->get_complemento(),intval($p->get_preco()),intval($p->get_codVendedor()), $p->get_foto());
		
		$res = pg_query_params($conn, $sql, $vetor);
		$linha = pg_fetch_assoc($res);
    	$p->set_cod(intval($linha['codproduto']));
		pg_close($conn);
    }
    
    public function deletar($cod){
		$conn = $this->conexao();
		$sql = "DELETE FROM venda WHERE codproduto = $1";
		$res = pg_query_params($conn, $sql, array($cod));
		pg_close($conn);
    }
    
    public function editar($p){
		$conn = $this->conexao();
		$sql="UPDATE venda SET nomeItem=$1,quantidade=$2,unidade=$3,descricao=$4,cidade=$5, foto=$6, bairro=$7,rua=$8,complemento=$9,preco=$10, codvendedor=$11, datai=now() WHERE codproduto = $12 ";
        $v = array($p->get_nome(), $p->get_quantidade(), $p->get_unidade(),$p->get_descricao(),$p->get_cidade(),$p->get_foto(),$p->get_bairro(),$p->get_rua(),$p->get_complemento(),$p->get_preco(),intval($p->get_codVendedor()),$p->get_cod());
		$res = pg_query_params($conn, $sql,$v);
	}


	function listar($c){
		$conn = $this->conexao();
		$sql = 'SELECT * from venda where codvendedor=$1';
		$v=array(intval($c));
		$res=pg_query_params($conn,$sql,$v);
		$lista = array();
		while ($linha = pg_fetch_assoc($res)){
			$p = new Venda($linha['nomeitem'], $linha["quantidade"], $linha["unidade"], $linha["cidade"], $linha["bairro"], $linha["rua"], $linha["preco"]);

			$p->set_complemento($linha['complemento']);
			$p->set_descricao($linha['descricao']);
			$p->set_foto($linha['foto']);
			$p->set_cod(intval($linha['codproduto']));

			array_push($lista,$p);
		}
		pg_close($conn);
		return $lista;
}


	function listarTudo(){
		$conn = $this->conexao();
		$sql = 'SELECT * from venda';
		$res=pg_query($conn,$sql);
		$lista = array();
		while ($linha = pg_fetch_assoc($res)){
			$p = new Venda($linha['nomeitem'], $linha["quantidade"], $linha["unidade"], $linha["cidade"], $linha["bairro"], $linha["rua"], $linha["preco"]);

			$p->set_complemento($linha['complemento']);
			$p->set_descricao($linha['descricao']);
			$p->set_cod(intval($linha['codproduto']));
			$p->set_foto($linha['foto']);
			$p->set_codVendedor(intval($linha['codvendedor']));

			array_push($lista,$p);
		}
		pg_close($conn);
		return $lista;
	}



	public function buscar($cod){
		$conn = $this->conexao();
		$sql = "SELECT * FROM venda WHERE codproduto = $1";
		$res = pg_query_params($conn, $sql, array($cod));
		$linha = pg_fetch_assoc($res);
		$p = new Venda($linha['nomeitem'], $linha["quantidade"], $linha["unidade"], $linha["cidade"], $linha["bairro"], $linha["rua"], $linha["preco"]);

		$p->set_complemento($linha['complemento']);
		$p->set_descricao($linha['descricao']);
		$p->set_foto($linha['foto']);
		$p->set_cod(intval($linha['codproduto']));
		$p->set_codVendedor(intval($linha['codvendedor']));

		pg_close($conn);
		return $p;
	}


	public function pesquisar($p,$filtro){
		$conn = $this->conexao();

		if ($filtro=="produtos"){
			$sql = "SELECT * FROM venda WHERE nomeitem like $1 or descricao like $1";
		}
		if ($filtro=="vendedor"){
			$sql = "SELECT * from venda as v inner join usuario as u on v.codvendedor=u.codusuario WHERE nomeusuario like $1";
		}
		if ($filtro=="local"){
			$sql = "SELECT * FROM venda WHERE cidade like $1 or rua like $1 or bairro like $1 or complemento like $1";
		}
		
		$res = pg_query_params($conn, $sql, array('%'.$p.'%'));
		$lista = array();
		while ($linha = pg_fetch_assoc($res)){
			$pt = new Venda($linha['nomeitem'], $linha["quantidade"], $linha["unidade"], $linha["cidade"], $linha["bairro"], $linha["rua"], $linha["preco"]);

			$pt->set_complemento($linha['complemento']);
			$pt->set_descricao($linha['descricao']);
			$pt->set_cod(intval($linha['codproduto']));
			$pt->set_foto($linha['foto']);
			$pt->set_codVendedor(intval($linha['codvendedor']));

			array_push($lista,$pt);
		}
		pg_close($conn);
		return $lista;
	}
	



	public function minhasReservas(int $codproduto,int $codvendedor, int $meucod,int $quantia,int $preco){

		$conn = $this->conexao();
		$sql ="INSERT INTO minhas_reservas (codproduto, codvendedor, meucod, quantia,preco) VALUES ($1,$2,$3,$4,$5) RETURNING codreserva"; 
		$vetor = array($codproduto, $codvendedor, $meucod, $quantia,($preco*$quantia));
		
		$res = pg_query_params($conn, $sql, $vetor);
		$linha = pg_fetch_assoc($res);
		$r = new Reserva($codproduto, $meucod, $codvendedor, $quantia/*, $linha["codreserva"]*/);
		
		$r->set_preco($preco*$quantia);

		$r->set_codreserva($linha["codreserva"]);

		$linha = pg_fetch_assoc($res);
		pg_close($conn);
		return $r->get_codreserva();

	}


	public function meusClientes(int $codproduto, int $meucod, int $codcomprador, int $quantia,int $preco,$codreservac){

		$conn = $this->conexao();
		$sql ="INSERT INTO meus_clientes (codproduto, meucod, codcomprador, quantia,preco,codreservac) VALUES ($1,$2,$3,$4,$5,$6) RETURNING cod";
		
		$vetor = array($codproduto, $meucod, $codcomprador, $quantia,$preco*$quantia,$codreservac);
		
		$res = pg_query_params($conn, $sql, $vetor);
		$linha = pg_fetch_assoc($res);
		pg_close($conn);
	}

	public function buscarReservas($meucod){
		$conn = $this->conexao();
		$sql = "SELECT * FROM minhas_reservas WHERE meucod = $1";
		$res = pg_query_params($conn, $sql, array($meucod));
		$lista = array();
		while ($linha = pg_fetch_assoc($res)){
		$r = new Reserva($linha['codproduto'], $linha["meucod"], $linha["codvendedor"], $linha["quantia"]/*, $linha["codreserva"]*/);
			$r->set_preco($linha['preco']);
			$r->set_codreserva($linha['codreserva']);
			
			array_push($lista,$r);
		}
		pg_close($conn);
		
		return $lista;
	}

	public function buscarClientes($meucod){
		$conn = $this->conexao();
		$sql = "SELECT * FROM meus_clientes WHERE meucod = $1";
		$res = pg_query_params($conn, $sql, array($meucod));
		$lista = array();
		while ($linha = pg_fetch_assoc($res)){
		$r = new Reserva($linha['codproduto'], $linha["codcomprador"], $linha["meucod"], $linha["quantia"]/*, $linha["codreserva"]*/);
		$r->set_codreserva($linha['codreservac']);
		$r->set_preco($linha['preco']);
		array_push($lista,$r);
		}
		pg_close($conn);
		return $lista;
	}

	public function excluirReserva($cod){
		$conn = $this->conexao();
		$sql = "DELETE FROM minhas_reservas WHERE codreserva = $1";
		$res = pg_query_params($conn, $sql, array($cod));


		pg_close($conn);
	}

	public function excluirCliente($cod){
		$conn = $this->conexao();
		$sql = "DELETE FROM meus_clientes WHERE codreservac = $1";
		$res = pg_query_params($conn, $sql, array($cod));

		pg_close($conn);
	}
	






}


//$mdao = New vendaDAO();
//$lista = $mdao->listar();
//print_r($lista);

?>