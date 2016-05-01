<?php

Class Disciplina extends Funcoes {

  public function getDisciplinas($cd_curso) {
    $objetoSql = new Database();
    $curso  = (int)trim($cd_curso);
    $resultado = $objetoSql->query('select * from cad_disciplina where cd_curso = '.$curso.'')->result();
    return $resultado;
  }

  public function getDisciplinaPorId($cd_disciplina) {
    $objetoSql = new Database();
    $disciplina  = (int)trim($cd_disciplina);
    $resultado = $objetoSql->query('select * from cad_disciplina where cd_disciplina = '.$disciplina.'')->result();
    return $resultado;
  }

  public function getTodasDisciplinas() {
    $objetoSql = new Database();
    $resultado = $objetoSql->query('select * from cad_disciplina')->result();
    return $resultado;
  }

  public function setDisciplina($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('cad_disciplina', $itens);
  }

}