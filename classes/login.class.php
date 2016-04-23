<?php
Class LoginUsuario extends Funcoes {
	
	public function verificaLogin ($matricula, $senha){
		$profissional = $this->verificaProfissional($matricula, $senha);
		if(!count($profissional) || $profissional == NULL) {
			$objetoSqln = new Database();
			$getadmin = $objetoSqln->query('select * from cad_admin where login = '.$matricula.' AND senha = 123456 ')->row();
			if(count($getadmin) > 0) {
				$this->iniciaSessao($getadmin['0']);
				header("Location: admin");
			}else {
				$objetoSql = new Database();
			$getaluno = $objetoSql->query("select * from seg_usuario inner join cadaluno using(cd_aluno) where login = {$matricula}	AND senha = {$senha}")->result();
				if(count($getaluno) > 0) {
					$this->iniciaSessao($getaluno['0']);
				}else {
					Self::setMensagem('Usuário ou Senha Inválido');	
				}
			}
		} else {
			$this->iniciaSessao($profissional, true);
			header("Location: admin");
		}
	}

	public function verificaProfissional($matricula, $senha) {
		$objetoSql = new Database();
		$getlogin = $objetoSql->query("select * from seg_usuario inner join cad_prof using(cd_usuario) where login = {$matricula}	AND senha = {$senha}")->result();
		return (count($getlogin) > 0 ) ? $getlogin[0] : false;
	}

	public function iniciaSessao($dados, $profissional = false) {
		session_start();
		if($profissional) {
			$_SESSION['login'] = $dados->login;
			$_SESSION['logado'] = true;
			$_SESSION['cd_usuario'] = $dados->cd_usuario;
			$_SESSION['cd_prof'] = $dados->cd_prof;
			$_SESSION['nome'] = $dados->razao_social;	
			$_SESSION['super'] = false;	
		}else {
			$_SESSION['login'] = $dados->login;
			$_SESSION['logado'] = true;
			$_SESSION['cd_usuario'] = $dados->cd_usuario;
			$_SESSION['cd_aluno'] = ($dados->cd_aluno) ? $dados->cd_usuario : null;
			$_SESSION['nome'] = $dados->razao_social;
			$_SESSION['super'] = true;	
		}
	}
}