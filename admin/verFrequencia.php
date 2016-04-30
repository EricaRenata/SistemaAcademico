<?php 
  include '../classes/funcoes.class.php';  
  include '../classes/curso.class.php'; 
  include '../classes/disciplina.class.php'; 
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
		  	<label for="exampleInputEmail1">Selecione a Disciplina:</label>
          <select class="form-control" name="cd_disciplina" onchange="submit()">
            <option>Selecione a Disciplina</option>
          <?php 

            if(isset($dados->cd_curso) && $dados->cd_curso != 0) {
              $objetoDisciplina = new Disciplina();
              $listaDisciplina = $objetoDisciplina->getDisciplinas($dados->cd_curso);
              foreach ($listaDisciplina as $disciplina) :
                if($dados->cd_disciplina == $curso->cd_disciplina) : ?>
                    <option value="<?= $curso->cd_curso ?>" selected><?= $disciplina->nome_disciplina; ?></option>
          <?php else : ?>
                  <option value="<?= $curso->cd_curso ?>"><?= $disciplina->nome_disciplina; ?></option>
          <?php 
                endif; 
              endforeach; 
            }
          ?>
        </select>
    </div>
 	<div class="form-group">
		<label for="exampleInputEmail1">Selecione a data desejada:</label>
		<tbody>
	      <tr>
	         <td class="col-md-2 text-center">
	           <input type="date"  class="form-control" name="data_inicial" >
	         </td>  
				</tr>
		</tbody>
	</div>	
		<input class="btn btn-primary btn-sm" name="acao" type="submit" value="Consultar">
	    </form>
    </div>
<?php Funcoes::geraFooter("frequencia"); ?>