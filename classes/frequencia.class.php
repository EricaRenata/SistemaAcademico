<?php
class Frequencia extends Funcoes {

  public function setFrequencia($itens) {
    $objetoSql = new Database();
    unset($itens->acao);
    foreach ($itens as $alunos) {
	    if(is_array($alunos)) {
        $verifica = $this->verificaFrequencia($alunos['cd_curso'], $alunos['cd_aluno'], $alunos['data']);
       if(count($verifica)) {
         echo 'existe';
       }else {
        $presenca = (!$alunos["presenca"]) ? '0' : '1';
         $objetoSql->query("INSERT INTO frequencia (cd_curso, cd_aluno, presenca) VALUES ({$alunos["cd_curso"]}, {$alunos["cd_aluno"]},{$presenca},".$alunos["data"].")");
       }
      }

    }
  }

  public function verificaFrequencia($cd_curso, $cd_aluno, $data) {
    $objetoSql = new Database();
    echo 'SELECT * FROM frequencia where cd_aluno = '.$cd_aluno.' AND cd_curso = '.$cd_curso.'';
    // $verifica = $objetoSql->query('SELECT * FROM frequencia where cd_aluno = {$cd_aluno} AND cd_curso = $cd_curso')->result();
    return $verifica;
  }

  public function getFrequencia($cd_curso) {
    $objetoSql = new Database();
    $result = $objetoSql->query('select * from cadaluno left join frequencia using(cd_aluno) where cadaluno.cd_curso = '.$cd_curso.'')->result();
    return $result;
  }

}