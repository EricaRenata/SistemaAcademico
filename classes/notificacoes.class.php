<?php
Class Notificacoes {
	public function getUltimasNoticias() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select * from noticias order by cd_noticias DESC')->result();
		return $resultado;
	}

	public function getNotificacao() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select * from notificacoes order by cd_notificacao DESC')->result();
		return $resultado;
	}

	public function getUltimaNotificacao() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select * from notificacoes order by cd_notificacao DESC limit 1')->result();
		return $resultado;
	}

	public function getUltimaNoticia() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select * from noticias order by cd_noticias DESC limit 1')->result();
		return $resultado;
	}

	public function countNotificacao() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select count(cd_notificacao) as qtdeNotifica from notificacoes')->row();
		return $resultado->qtdeNotifica;
	}

	public function countNoticia() {
		$objetoSql = new Database();
		$resultado = $objetoSql->query('select count(cd_noticias) as qtdeNoticia from noticias')->row();
		return $resultado->qtdeNoticia;
	}

}