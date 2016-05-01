<?php 
  include '../classes/funcoes.class.php';  
  include '../classes/curso.class.php'; 
  include '../classes/disciplina.class.php'; 
  include '../classes/turma.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
?>
<div>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= (!isset($dados->acao)) ? 'active' : ''; ?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Pesquisa</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?= (!isset($dados->acao)) ? 'active' : ''; ?>" id="home">
	    <form method="POST" action="verFrequencia.php" name="consulta">
		    <div class="form-group">
			    <label for="exampleInputEmail1">Selecione o curso:</label>
			    <select class="form-control" name="cd_curso" onchange="submit()">
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
        <div class="form-group">
          <label class="control-label" for="inputWarning1">Turma</label>
          <select class="form-control" name="cd_turma">
            <?php
              if(isset($dados->cd_curso) && $dados->cd_curso) :
                $objetoTurma = new Turma();
                $listaTurma = $objetoTurma->getTurmasPorCurso($dados->cd_curso);
                foreach ($listaTurma as $turma) :
                  if(isset($dados->cd_turma) && $dados->cd_turma == $turma->cd_turma) :
            ?>
                    <option value="<?= $turma->cd_turma ?>" selected><?= $turma->cd_turma . ' - ' . $turma->turno; ?></option>
            <?php
              else :
            ?>
              <option value="<?= $turma->cd_turma ?>"><?= $turma->cd_turma . ' - '. $turma->turno; ?></option>
            <?php
              endif;
              endforeach;
            endif;
          ?>
          </select>
        </div>
        <div class="row">
   	      <div class="form-group">
            <div class="col-md-12">
          		<label for="exampleInputEmail1">Selecione a data desejada:</label>
              <input type="date"  class="form-control" name="data_inicial" >
            </div>  
  	     </div>	
        </div>
        <div class="row margin-10">
      		<div class="col-md-12">
            <input class="btn btn-primary btn-sm" name="acao" type="submit" value="Consultar">
            
          </div>
          
        </div>
	    </form>
    </div>
    <div role="tabpanel" class="tab-pane <?= (isset($dados->acao) && $dados->acao == 'consultar') ? 'active' : ''; ?>" id="home">
    fdfdfdf
    </div>
  </div>
<?php Funcoes::geraFooter("frequencia"); ?>