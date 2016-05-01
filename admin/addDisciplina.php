<?php
  include '../classes/funcoes.class.php';
  include '../classes/curso.class.php';
  include '../classes/disciplina.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
  if(isset($dados->acao) && $dados->acao == 'Salvar') {
      $objetoDisciplina = new Disciplina();
      $itens['cd_curso'] = $dados->cd_curso;
      $itens['nome_disciplina'] = $dados->nome_disciplina;
      $itens['desc_disciplina'] = $dados->desc_disciplina;
      $objetoDisciplina->setDisciplina($itens);
  }
?>
<form action="addDisciplina.php" method="post">
	<div class="row">
    <div class="col-md-6">
  		<label for="exampleInputEmail1">Selecione o curso</label>
      <select class="form-control" name="cd_curso" >
  			<?php
          $objetoCurso = new Curso();
            $listaCurso = $objetoCurso->getCursos();
            foreach ($listaCurso as $curso) :
        ?>
              <option value="<?= $curso->cd_curso ?>"><?= $curso->nome_curso; ?></option>
        <?php endforeach; ?>
  		</select>
  	</div>
    <div class="col-md-6">
      <div class="form-group has-success">
        <label class="control-label" for="inputSuccess1">Disciplina:</label>
        <input type="text" class="form-control" id="inputSuccess1" required="required" value="" placeholder="Disciplina" name="nome_disciplina" aria-describedby="helpBlock2">
      </div>
    </div>
    <div class="col-md-12">
      <label class="control-label" for="inputError1">Descrição da Disciplina:</label>
      <textarea class="form-control" rows="10" name="desc_disciplina" required="required"> </textarea>
    </div>
    <div class="col-md-3 margin-10">
      <button type"submit" value="Salvar" name="acao" class="btn btn-primary form-control">Salvar</button>
    </div>
  </div>
</form>
<?php Funcoes::geraFooter(); ?>