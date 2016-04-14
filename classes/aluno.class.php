<?php

class Aluno extends Funcoes {

  public function gravaAluno($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('cadaluno', $itens);
  }

  public function getAlunos() {
    $objetoSql = new Database();
    $result = $objetoSql->query('select * from cadaluno')->result();
    return $result;
  }
}