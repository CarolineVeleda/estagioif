<?php

include_once('usuario.php');
include_once('foto_perfil.php');

class usuarioDAO{

	private function conexao(){
		$scon="port=5432 dbname=estagio user=postgres password=postgres";
		return pg_connect($scon);
    }
    
    public function inserir($u){
        $conn = $this->conexao();
        
        $verifica_email="SELECT * FROM Usuario WHERE email = $1";
        $res1 = pg_query_params($conn, $verifica_email,array($u->get_email));
        $n1 = pg_num_rows($res1);

        if ($n1==0){
            //registrar
            $sql ="INSERT INTO usuario (nomeusuario,email,senha,telefone) VALUES ($1,$2,$3,$4) RETURNING codusuario"; 
            $vetor = array($u->get_nome(), $u->get_email(), $u->get_senha(),$u->get_telefone());
            $res = pg_query_params($conn, $sql, $vetor);
            $linha = pg_fetch_assoc($res);
            $u->set_codUsuario(intval($linha['codusuario']));
        }

        if ($n1==1){
            echo "tu ja ta registrado anjo";
            //fazer
            //já está registrado
        }

		pg_close($conn);
    }
    
    public function deletar($cod){
		$conn = $this->conexao();
		$sql = "DELETE FROM usuario WHERE codusuario = $1";
		$res = pg_query_params($conn, $sql, array($cod));
		pg_close($conn);
    }


    public function buscar($cod){
		$conn = $this->conexao();
		$sql = "SELECT * FROM usuario WHERE codusuario = $1";
		$res = pg_query_params($conn, $sql, array($cod));
		$linha = pg_fetch_assoc($res);
		$u = new Usuario($linha['nomeusuario'],$linha['email'],$linha['senha'],$linha['telefone']);
		$u->set_codUsuario(intval($linha['codusuario']));
		pg_close($conn);
		return $u;
    } 


    public function buscarFoto($cod){
		$conn = $this->conexao();
		$sql = "SELECT * FROM foto_perfil WHERE coduser = $1";
		$res = pg_query_params($conn, $sql, array($cod));
		$linha = pg_fetch_assoc($res);
		$f= new fotoPerfil($linha['nomefoto'],$linha['caminho']);
        $f->set_codUser(intval($linha['coduser']));
		pg_close($conn);
		return $f->get_caminho();
    } 


    public function nome($nome){
		$conn = $this->conexao();
		$sql = "SELECT * FROM usuario WHERE nomeusuario like $1";
        $res = pg_query_params($conn, $sql, array('%'.$nome.'%'));
        
        $lista = array();
		while ($linha = pg_fetch_assoc($res)){
			$u = new Usuario($linha['nomeusuario'],$linha['email'],$linha['senha'],$linha['telefone']);

            $u->set_codUsuario(intval($linha['codusuario']));

			array_push($lista,$u);
		}
		pg_close($conn);
		return $lista;
    } 
    

    public function alterar($u){
		$conn = $this->conexao();
		$sql="UPDATE usuario SET nomeusuario=$1, email=$2, senha=$3, telefone=$4 WHERE codusuario = $5 ";
		$vet = array($u->get_nome(), $u->get_email(), $u->get_senha(),$u->get_telefone(),$u->get_codUsuario());
		$res = pg_query_params($conn, $sql,$vet);
		
	}



    
    public function login($email,$senha){
        $conn = $this->conexao();
        //$sql="SELECT * FROM Usuario WHERE email = $1 and senha= $2";
        
        $verifica_email="SELECT * FROM Usuario WHERE email = $1";
        $verifica_senha="SELECT * FROM Usuario WHERE senha = $1";

        $res1 = pg_query_params($conn, $verifica_email,array($email));
        $res2 = pg_query_params($conn, $verifica_senha,array($senha));
        $n1 = pg_num_rows($res1);
        $n2 = pg_num_rows($res2);


        if ($n1==0){
            //email errado, não está registrado
            $u=0;
        }
        if ($n1==1 && $n2==0){
            //senha errada
            $u=1;
        }
        if ($n1==1 and $n2>=1){
            //login correto
            $linha = pg_fetch_assoc($res1);
            $u= new Usuario($linha['nomeusuario'], $linha['email'],$linha['senha'],$linha['telefone']);
            $u->set_codUsuario(intval($linha['codusuario']));
            $v=array();
            array_push($v,$u);
        }


        return $u;

    }

    public function inserirFoto($f){

        $conn = $this->conexao();

        $verifica_foto='SELECT * FROM foto_perfil WHERE coduser = $1';
        
        $v=array($f->get_codUser());
		$res=pg_query_params($conn,$verifica_foto,$v);
        $n1 = pg_num_rows($res);
        
        
        if ($n1>=1){
            $sql="UPDATE foto_perfil SET nomefoto=$1,caminho=$2,coduser=$3 WHERE coduser = $4 ";
            $v1 = array($f->get_nomeFoto(), $f->get_caminho(),$f->get_codUser(),$f->get_codUser());
        
            $res = pg_query_params($conn, $sql,$v1);
        }

        if ($n1==0){
            $sql ="INSERT INTO foto_perfil (nomefoto,caminho,coduser) VALUES ($1,$2,$3) RETURNING codfoto"; 
            $vetor = array($f->get_nomeFoto(), $f->get_caminho(), intval($f->get_codUser()));
            
            $res = pg_query_params($conn, $sql, $vetor);
            $linha = pg_fetch_assoc($res);
            $f->set_codFoto(intval($linha['codfoto']));
            pg_close($conn);
        }
        

    }


    public function deletarFoto($cod){
        $conn = $this->conexao();
        print($cod);
		$sql = "DELETE FROM foto_perfil WHERE coduser = $1";
		$res = pg_query_params($conn, $sql, array($cod));
		pg_close($conn);
    }



}



?>