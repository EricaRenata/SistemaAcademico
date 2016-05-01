<?php

Class Notas extends Funcoes {
  public function insereNotas($itens) {
    $objetoSql = new Database();
    $objetoSql1 = new Database();
    foreach ($itens as $valor) {
      if(is_array($valor) && !empty($valor['nota1']) &&  !empty($valor['nota2'])) {
        $verificanota = count($this->getNotas($valor['cd_aluno']));
        if($verificanota) {
          $objetoSql->query('update cad_notas set nota1 = '.$valor["nota1"].', nota2 = '.$valor["nota2"].', status = '.$valor["status"].' where cd_aluno = '.$valor["cd_aluno"].'');
        }else {
          $objetoSql1->insert('cad_notas', $valor);
        }
      }
    }
  }

  public function getNotas($cd_aluno) {
    $objetoSql = new Database();
    $result = $objetoSql->query('select distinct * from cad_notas inner join cad_turma using(cd_turma) inner join cad_disciplina using(cd_curso) where cd_aluno = '.$cd_aluno.' group by cd_aluno ')->result();
    return $result;
  }

}