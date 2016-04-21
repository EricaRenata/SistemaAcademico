<?php
Class Curso {
  public function getCursos() {
    $objetoSql = new Database();
    $resultado = $objetoSql->query('select * from cad_curso')->result();
    return $resultado;
  }

  public function getCursosPorId($cd_aluno) {
  	$objetoSql = new Database();
  	$resultado = $objetoSql->query('select * from cad_curso inner join cadaluno using(cd_curso) where cd_aluno = '.$cd_aluno.' ') ->result();
    return $resultado;

  }
}