<?php

Class Horario extends Funcoes {

  public function gravaHorario($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('cad_horario', $itens);
  }

  public function getHorarios($cd_curso) {
  	$objetoSql = new Database();	
  	$objetoSql->query('select * from cad_horario where cd_curso = {$cd_curso}');
  }
}