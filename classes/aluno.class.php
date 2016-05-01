<?php

class Aluno extends Funcoes {

  public function gravaAluno($itens) {
    $objetoSql = new Database();
    $objetoSql1 = new Database();
    $objetoSql2 = new Database();
    $objetoSql3 = new Database();
    $aluno = array(
  		'matricula' => $itens['matricula'],
  		'cd_turma' => $itens['cd_turma'],
  		'razao_social' => $itens['usuario']
  	);
    $objetoSql->insert('cadaluno', $aluno);
    $cd_aluno = $objetoSql1->query('select max(cd_aluno) as last_id from cadaluno')->row();
    $usuario = array(
    	'login' => $itens['usuario'],
    	'senha' => $itens['senha'],
      'cd_aluno' => (Int)$cd_aluno->last_id,
    	'foto' => $itens['foto']
  	);
    $objetoSql2->insert('seg_usuario', $usuario);
    $notificacao = array(
    	'cd_usuario' => $_SESSION["cd_usuario"],
    	'tp_notificacao' => 'Alunos',
    	'desc_notificacao' => 'Aluno '.  $itens['usuario'] . ' adicionado por '.$_SESSION['nome'].''
  	);
    $objetoSql3->insert('notificacoes', $notificacao);
  }

  public function getAlunos() {
    $objetoSql = new Database();
    $result = $objetoSql->query('select * from cadaluno')->result();
    return $result;
  }
}