<?php
Class Notificacoes {
	public function getUltimasNoticias() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select * from noticias')->result();
		return $resultado;
	}

	public function getNotificacao() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select * from notificacoes')->result();
		return $resultado;
	}

}