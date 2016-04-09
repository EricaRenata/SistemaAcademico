<?php

class Aluno extends Funcoes {

  public function gravaAluno($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('cadaluno', $itens);
  }

  public function getAlunos($cd_curso) {
    $objetoSql = new Database();
    if(isset($cd_curso) && $cd_curso != '') {
	    $result = $objetoSql->query('select * from cadaluno where cd_curso = '.$cd_curso.'')->result();
	    return $result;
    } else {
    	$result = $objetoSql->query('select * from cadaluno')->result();
	    return $result;
    }
  }
}