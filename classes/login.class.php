<?php
Class LoginUsuario extends Funcoes {
	
	public function verificaLogin ($matricula, $senha){
		$profissional = $this->verificaProfissional($matricula, $senha);
		if(!count($profissional)) {
			$objetoSql = new Database();
			$getlogin = $objetoSql->query("select *, cad_admin.razao_social as administrador from seg_usuario left join cad_admin using(cd_usuario) left join cadaluno using(cd_aluno) where login = {$matricula}	AND senha = {$senha}")->result();
			if(count($getlogin) > 0) {
				$this->iniciaSessao($getlogin['0']);
				header("Location: admin");
			}else {
				Self::setMensagem('Usuário ou Senha Inválido');	
			}
		} else {
			$this->iniciaSessao($profissional, true);
			header("Location: admin");
		}
	}

	public function verificaProfissional($matricula, $senha) {
		$objetoSql = new Database();
		$getlogin = $objetoSql->query("select * from seg_usuario inner join cad_prof using(cd_usuario) where login = {$matricula}	AND senha = {$senha}")->row();
		return $getlogin;
	}

	public function iniciaSessao($dados, $profissional = false) {
		session_start();
		if($profissional) {
			$_SESSION['login'] = $dados->login;
			$_SESSION['logado'] = true;
			$_SESSION['cd_usuario'] = $dados->cd_usuario;
			$_SESSION['cd_prof'] = $dados->cd_prof;
			$_SESSION['nome'] = $dados->razao_social;	
			$_SESSION['super'] = $dados->super;	
		}else {
			$_SESSION['login'] = $dados->login;
			$_SESSION['logado'] = true;
			$_SESSION['cd_usuario'] = $dados->cd_usuario;
			$_SESSION['nome'] = $dados->razao_social;
			$_SESSION['super'] = $dados->super;	
			$_SESSION['administrador'] = $dados->administrador;	
		}
	}
}