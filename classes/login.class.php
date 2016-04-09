<?php
Class LoginUsuario extends Funcoes {
	
	public function verificaLogin ($matricula, $senha){
		$objetoSql = new Database();
		$getlogin = $objetoSql->query("select * from seg_usuario inner join cadaluno using(cd_aluno) where login = {$matricula}	AND senha = {$senha}")->result();
		if(count($getlogin) > 0) {
			$this->iniciaSessao($getlogin['0']);
			header("Location: admin");
		}else {
			Self::setMensagem('Usuário ou Senha Inválido');	
		}
	}

	public function iniciaSessao($dados) {
		session_start();
		$_SESSION['login'] = $dados->login;
		$_SESSION['logado'] = true;
		$_SESSION['cd_usuario'] = $dados->cd_usuario;
		$_SESSION['nome'] = $dados->razao_social;
	}
}