<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  
  $dados = (Object) $_POST;
  $objetoNotas = new Notas();
  if(count($dados) && isset($dados->acao) && $dados->acao == "Salvar") {
    $objetoNotas->insereNotas($dados);
  }
?>
<form action="addNotas.php" method="post">

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
      <tr class="notas" data-aluno="<?= $aluno->cd_aluno; ?>">
        <input type="hidden" name="<?= $aluno->razao_social; ?>" value="<?= $aluno->cd_aluno; ?>">
        <input type="hidden" name="<?= $aluno->razao_social; ?>[cd_aluno]" value="<?= $aluno->cd_aluno; ?>">
        <td class="col-md-6">
          <?= $aluno->razao_social; ?>
        </td> 
        <td class="col-md-2 text-center">
          <input type="text" maxlength="3" name="<?= $aluno->razao_social; ?>[nota1]" data-id="<?= $aluno->cd_aluno; ?>" class="form-control" value="<?= (isset($notas[0])) ? $notas[0]->nota1 : '' ; ?>">
        </td> 
        <td class="col-md-2 text-center">
          <input type="text" maxlength="3" class="form-control" data-id="<?= $aluno->cd_aluno; ?>" name="<?= $aluno->razao_social; ?>[nota2]" value="<?= (isset($notas[0])) ? $notas[0]->nota2 : '' ; ?>">
        </td> 
        <td class="col-md- text-center">
          <label class="label <?= (isset($notas[0]) && $notas[0]->status) ? 'label-success' : ' status-aluno'; ?>" data-id="<?= $aluno->cd_aluno; ?>">
            <?= (isset($notas[0]) && $notas[0]->status) ? 'Aprovado' : ' - '; ?> 
          </label>
          <input type="hidden" name="<?= $aluno->razao_social; ?>[status]" data-id="<?= $aluno->cd_aluno; ?>" value="<?= (isset($notas[0]) && $notas[0]->status) ? 1 : 0; ?>">
        </td> 
      </tr>
    <?php endforeach; ?>
  </table>
  <input type="hidden" value="Salvar" name="acao"></input>
  <button type="submit" class="btn btn-primary btn-block">Salvar</button>
</form>
<?php Funcoes::geraFooter("notas"); ?>