<?php

Class Turma extends Funcoes {

  public function gravaTurma($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('cad_turma', $itens);
  }
}