<?php
Class Curso {
  public function getCursos() {
    $objetoSql = new Database();
    $resultado = $objetoSql->query('select * from cad_curso')->result();
    return $resultado;
  }
}