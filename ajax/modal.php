<?php
  include '../classes/funcoes.class.php';
  include '../classes/disciplina.class.php';
  $post = (object) $_POST;
  $dados = array();
  switch ($post->acao) {
    case 'getDescDisciplina':
      $objetoDisciplina = new Disciplina();
      $dados = $objetoDisciplina->getDisciplinaPorId($post->cd_disciplina);
      break;
  }

  $html = modal();
  $data = json_encode($dados);
  $response = array('html'=>$html, 'data'=>$data);
  echo json_encode($response);

function modal() {
  $html = file_get_contents('../admin/partials/templates/modelo-modal.php');
  return $html;
}