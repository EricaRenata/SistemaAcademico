<?php

Class Turma extends Funcoes {

  public function gravaTurma($itens) {
    $objetoSql = new Database();
    $objetoSql1 = new Database();
    $objetoSql->insert('cad_turma', $itens);
    $notificacao = array(
    	'cd_usuario' => $_SESSION["cd_usuario"],
    	'tp_notificacao' => 'Turma',
    	'desc_notificacao' => 'Turma '.  $itens['descricao'] . ' adicionado por '.$_SESSION['nome'].''
  	);
    $objetoSql1->insert('notificacoes', $notificacao);
  }
}