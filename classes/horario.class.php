<?php

Class Horario extends Funcoes {

  public function gravaHorario($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('cad_horario', $itens);
  }

  public function getHorarios($cd_curso) {
  	$objetoSql = new Database();
  	$resuldado = $objetoSql->query('select * from cad_horario where cd_curso = '.$cd_curso.'')->result();
    return $resultado;
  }

    public function getHorariosPorAluno($cd_aluno) {
    $objetoSql = new Database();
    $resultado = $objetoSql->query('select * from cad_horario inner join cad_turma using(cd_curso) inner join cadaluno using(cd_turma) inner join cad_curso using(cd_curso) where cd_aluno = '.$cd_aluno.'')->result();
    return $resultado;
  }
}