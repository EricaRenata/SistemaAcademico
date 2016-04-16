<?php

Class Disciplina extends Funcoes {

  public function getDisciplinas($cd_curso) {
    $objetoSql = new Database();
    $curso  = (int)trim($cd_curso);
    $resultado = $objetoSql->query('select * from cad_disciplina where cd_curso = '.$curso.'')->result();
    return $resultado;
  }

}