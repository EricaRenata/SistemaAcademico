<?php 
  include '../classes/funcoes.class.php';
  $post = (object) $_POST;
  $objetonotificacoes = new Notificacoes();
	$notificacoes = $objetonotificacoes->countNotificacao();
	$noticias = $objetonotificacoes->countNoticia();
	switch ($post->acao) {
		case 'getUltimaNotificacao':
			$resultado = $objetonotificacoes->getUltimaNotificacao();
			echo json_encode($resultado);
			break;
		case 'getUltimaNoticia':
			$resultado = $objetonotificacoes->getUltimaNoticia();
			echo json_encode($resultado);
			break;
		
		default:
			echo json_encode(
		  	array(
		  		'notificacoes' => $notificacoes,
		  		'noticias' => $noticias
				)
			);
			break;
	}
  