<?php

class Frequencia extends Funcoes {

  public function setFrequencia($itens) {
    $objetoSql = new Database();
    unset($itens->acao);
    foreach ($itens as $alunos) {
	    if(is_array($alunos)) {
	    	$objetoSql->insert('frequencia', $alunos);
	    }
	    
    }
  }

}