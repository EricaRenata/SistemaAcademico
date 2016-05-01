<?php
Class LoginUsuario extends Funcoes {

	public function verificaLogin ($matricula, $senha){
		$aluno = $this->verificaAluno($matricula, $senha);
		$profissional = $this->verificaProfissional($matricula, $senha);
		$administrador = $this->verificaAdministrador($matricula, $senha);

		if($aluno) {
			$this->iniciaSessao($aluno);
			header("Location: admin");
		} else if($profissional) {
			$this->iniciaSessao($profissional);
			header("Location: admin");
		} else if($administrador) {
			$this->iniciaSessao($administrador);
			header("Location: admin");
		} else {
			Self::setMensagem('Usuário ou Senha Inválido');
		}
	}

	public function verificaAluno($matricula, $senha) {
		$objetoSql = new Database();
		$getlogin = $objetoSql->query("select * from seg_usuario inner join cadaluno using(cd_aluno) where login = {$matricula}	AND senha = {$senha}")->result();
		return (count($getlogin) > 0 ) ? $getlogin[0] : false;
	}


	public function verificaAdministrador($matricula, $senha) {
		$objetoSql1 = new Database();
		$getlogin = $objetoSql1->query("select * from cad_admin where login = '".$matricula."' AND senha = {$senha}")->result();
		return (count($getlogin) > 0 ) ? $getlogin[0] : false;
	}

	public function verificaProfissional($matricula, $senha) {
		$objetoSql = new Database();
		$getlogin = $objetoSql->query("select * from seg_usuario inner join cad_prof using(cd_usuario) where login = {$matricula}	AND senha = {$senha}")->result();
		return (count($getlogin) > 0 ) ? $getlogin[0] : false;
	}

	public function iniciaSessao($dados) {
		session_start();
		$_SESSION['login'] = $dados->login;
		$_SESSION['logado'] = true;
		$_SESSION['aluno'] = (!isset($dados->cd_admin) && (!isset($dados->cd_prof) || $dados->cd_prof == 0)) ? true : false;
		$_SESSION['cd_aluno'] = (isset($dados->cd_aluno)) ? $dados->cd_aluno : false;
		$_SESSION['cd_usuario'] = $dados->cd_usuario;
		$_SESSION['cd_prof'] = (isset($dados->cd_prof)) ? $dados->cd_prof : false;
		$_SESSION['nome'] = $dados->razao_social;
		$_SESSION['super'] = (isset($dados->cd_admin)) ? $dados->cd_admin : false;
		$_SESSION['foto'] = (isset($dados->foto) && $dados->foto != '') ? $dados->foto : false;
		if(isset($dados->cd_admin) && $dados->cd_admin) {
			$permissao = array(1,2,3);
		} else if(isset($dados->cd_prof) && $dados->cd_prof) {
			$permissao = array(2,3);
		} else {
			$permissao = array(3);
		}
		$_SESSION['permissao'] = $permissao;
	}
}