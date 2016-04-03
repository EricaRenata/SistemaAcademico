<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
  $objetoNotas = new Notas();
  if(count($dados) && isset($dados->acao) && $dados->acao == "Salvar") {
    $itens['cd_aluno'] = $dados->cd_aluno;
    $itens['cd_turma'] = $dados->cd_turma;
    $itens['nota1'] = $dados->nota1;
    $itens['nota2'] = $dados->nota2;
    $itens['status'] = $dados->status;
    $objetoNotas->insereNotas($itens);
  }
?>
<form action="verNotas.php" method="post">

  <div class="row">
    <div class="col-md-12">
      <h4> <strong> Curso:</strong> Administrador de Redes e SQL Server com Assistência Técnica e Design </h4> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h4> <strong>Professor:</strong> José Souza da Costa de Jesus</h4> 
    </div>
    <div class="col-md-3">
      <h4> <strong>Código:</strong> 13363  </h4> 
    </div>
    <div class="col-md-3">
      <h4> <strong> Carga Horária:</strong> 100  </h4> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h4> <strong> Disciplina:</strong> Web Design I </h4> 
    </div>
  </div>
  <table class="table table-bordered">
    <tr>
      <td> Nome </td> 
      <td class="text-center"> Nota 1 </td> 
      <td class="text-center"> Nota 2 </td> 
      <td class="text-center"> Status </td> 
    </tr>
    <?php
      $objetoAluno = new Aluno();
      $alunos = $objetoAluno->getAlunos();
      foreach ($alunos as $aluno) :
      $notas = $objetoNotas->getNotas($aluno->cd_aluno);
    ?>
      <tr>
        <input type="hidden" name="cd_turma" value="<?= $aluno->cd_aluno; ?>">
        <td class="col-md-6">
          <input type="hidden" name="cd_aluno" value="<?= $aluno->cd_aluno; ?>"><?= $aluno->razao_social; ?>
        </td> 
        <td class="col-md-2 text-center">
          <input type="text" maxlength="3" data-id="<?= $aluno->cd_aluno; ?>" class="form-control notas" name="nota1<?= $aluno->cd_aluno; ?>" value="<?= (isset($notas[0])) ? $notas[0]->nota1 : '' ; ?>">
        </td> 
        <td class="col-md-2 text-center">
          <input type="text" maxlength="3" class="form-control notas" data-id="<?= $aluno->cd_aluno; ?>" name="nota2<?= $aluno->cd_aluno; ?>" value="<?= (isset($notas[0])) ? $notas[0]->nota2 : '' ; ?>">
        </td> 
        <td class="col-md- text-center">
          <label class="label <?= (isset($notas[0]) && $notas[0]->status) ? 'label-success' : ' status-aluno'; ?>" data-id="<?= $aluno->cd_aluno; ?>">
            <?= (isset($notas[0]) && $notas[0]->status) ? 'Aprovado' : ' - '; ?> 
          </label>
          <input type="hidden" name="status" data-id="<?= $aluno->cd_aluno; ?>" value="<?= (isset($notas[0]) && $notas[0]->status) ? 1 : 0; ?>">
        </td> 
      </tr>
    <?php endforeach; ?>
  </table>
  <input type="hidden" value="Salvar" name="acao"></input>
  <button type="submit" class="btn btn-primary btn-block">Salvar</button>
</form>
<?php Funcoes::geraFooter("notas"); ?>