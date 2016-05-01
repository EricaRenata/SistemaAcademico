<?php

Class Turma extends Funcoes {

  public function gravaTurma($itens) {
    $objetoSql = new Database();
    $objetoSql1 = new Database();
    $objetoSql2 = new Database();
    $objetoSql3 = new Database();
    $turma = array(
      'cd_turma' => $itens['cd_turma'],
      'cd_curso' => $itens['cd_curso'],
      'turno' => $itens['turno']
    );
    $objetoSql->insert('cad_turma', $turma);
    for ($i=0; $i < count($itens["alunos"]); $i++) {
      $objetoSql2->query('update cadaluno set cd_turma = '.$itens["cd_turma"].' where cd_aluno = '.$itens["alunos"][$i].'');
    }

    $descricao = $objetoSql3->query("select desc_curso from cad_curso where cd_curso = ".$itens['cd_curso']."")->row();


    $notificacao = array(
    	'cd_usuario' => $_SESSION["cd_usuario"],
    	'tp_notificacao' => 'Turma',
    	'desc_notificacao' => 'Turma '.  $descricao->desc_curso . ' adicionado por '.$_SESSION['nome'].''
  	);
    $objetoSql1->insert('notificacoes', $notificacao);
  }

   public function getTurmasPorCurso($cd_curso) {
    $objetoSql = new Database();
    $result = $objetoSql->query('select * from cad_turma where cd_curso = '.$cd_curso.'')->result();
    return $result;
  }

  public function getTurmas() {
    $objetoSql = new Database();
    $result = $objetoSql->query('select * from cad_turma left join cad_curso using(cd_curso)')->result();
    return $result;
  }
}