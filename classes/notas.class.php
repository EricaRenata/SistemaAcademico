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
    $result = $objetoSql->query('select * from cad_notas where cd_aluno = '.$cd_aluno.' limit 1')->result();
    return $result;
  }

}