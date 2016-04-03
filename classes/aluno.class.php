<?php

class Aluno extends Funcoes {

  public function gravaAluno($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('cadaluno', $itens);
  }

  public function getAlunos() {
    $objetoSql = new Database();
    $result = $objetoSql->query('select razao_social, cd_aluno from cadaluno')->result();
    return $result;
  }
}