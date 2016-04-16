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
<form action="addHorario.php" method="post">

  <div class="row">
    <div class="col-md-12">
      <h4> <strong> Curso:</strong> Administrador de Redes e SQL Server com Assistência Técnica e Design </h4>
    </div>
    <table class="table table-hover">
  <tbody>
    <div>
    <tr>
      <td class="text-center"> Data </td> 
      <td class="text-center"> Horário </td> 
      <td class="text-center"> Componente </td> 
    </tr>
   </div>
  </div>
    <?php
      $objetoAluno = new Aluno();
      $alunos = $objetoAluno->getAlunos();
      foreach ($alunos as $aluno) :
      $notas = $objetoNotas->getNotas($aluno->cd_aluno);
    ?>
      <tr>
        <td class="col-md-2 text-center">
          <input type="text" maxlength="3" class="form-control notas" data-id="<?= $aluno->cd_aluno; ?>" name="nota2<?= $aluno->cd_aluno; ?>"   value="<?= (isset($notas[0])) ? $notas[0]->nota2 : '' ; ?>">
        </td>  
        <td class="col-md-2 text-center">
          <input type="text" maxlength="3" data-id="<?= $aluno->cd_aluno; ?>" class="form-control notas" name="nota1<?= $aluno->cd_aluno; ?>"  value="<?= (isset($notas[0])) ? $notas[0]->nota1 : '' ; ?>">
        </td> 
        <td class="col-md-2 text-center">
          <input type="text" maxlength="3" class="form-control notas" data-id="<?= $aluno->cd_aluno; ?>" name="nota2<?= $aluno->cd_aluno; ?>"  value="<?= (isset($notas[0])) ? $notas[0]->nota2 : '' ; ?>">
        </td> 
      </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
  <input type="hidden" value="Salvar " name="acao"></input>
  <button type="submit" class="btn btn-primary btn-block">Salvar</button>
</form>
<?php Funcoes::geraFooter("notas"); ?>