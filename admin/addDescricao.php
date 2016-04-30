<?php 
  include '../classes/funcoes.class.php';  
  include '../classes/curso.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<form action="addDescricao.php" method="post">
	<div class="col-md-4">
		<label for="exampleInputEmail1">Selecione o curso</label>
					    <select class="form-control" name="cd_curso" >
								<?php
		              $objetoCurso = new Curso();
		                $listaCurso = $objetoCurso->getCursos();
		                foreach ($listaCurso as $curso) :
		                  if($dados->cd_curso == $curso->cd_curso) :
		            ?>
		                    <option value="<?= $curso->cd_curso ?>" selected><?= $curso->nome_curso; ?></option>
		            <?php 
		                  else :
		            ?>
		                  <option value="<?= $curso->cd_curso ?>"><?= $curso->nome_curso; ?></option>
		            <?php 
		                  endif; 
		                endforeach; 
		            ?>
							</select>
	</div>
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">Disciplina:</label>
          <input type="text" class="form-control" id="inputSuccess1" value="" placeholder="Disciplina" name="disciplina" aria-describedby="helpBlock2">
        </div>
      </div>
   <div class="row margin-10">
      <div class="col-md-12">
        <div>
          <label class="control-label" for="inputError1">Descrição da Disciplina:</label>
        </div>
          <textarea class="form-control" rows="10" name="desc_disciplina"> </textarea>
      </div>
    </div>
    <div class="row margin-10">
      <div class="col-md-3">
        <button type"submit" value="Salvar" name="acao" class="btn btn-primary form-control">Salvar</button>
      </div>
    </div>
    </div>
  </form>
<?php Funcoes::geraFooter(); ?>