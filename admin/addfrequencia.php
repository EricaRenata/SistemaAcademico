<?php
  include '../classes/funcoes.class.php';
  include '../classes/frequencia.class.php';
  include '../classes/curso.class.php';
  include '../classes/turma.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
  $cd_curso = (isset($dados->cd_curso)) ? $dados->cd_curso : null;
  $cd_turma = (isset($dados->cd_turma)) ? $dados->cd_turma : null;
?>
<div>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= (!isset($dados->acao)) ? 'active' : ''; ?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Pesquisa</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?= (!isset($dados->acao) || $dados->acao == 'salvaF') ? 'active' : ''; ?>" id="home">
	    <form method="POST" action="addfrequencia.php" name="consulta">
		    <div class="form-group">
			    <label for="exampleInputEmail1">Selecione o curso</label>
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
              if(isset($cd_curso) && $cd_curso) :
              $objetoTurma = new Turma();
                $listaTurma = $objetoTurma->getTurmasPorCurso($cd_curso);
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
		  	<input class="btn btn-primary btn-sm" name="acao" type="submit" value="Cadastrar">
	    </form>
    </div>

    <div role="tabpanel" class="tab-pane <?= (isset($dados->acao) && $dados->acao == 'Cadastrar') ? 'active' : ''; ?>" id="profile">
			<?php
        $data = date("d/m/Y");
        $objetoFrequencia = new Frequencia();
        $alunos = $objetoFrequencia->getFrequencia($cd_turma);
				if(isset($dados->acao) && $dados->acao == 'salvaF') {
					$objetoFrequencia->setFrequencia($dados);
				}
			?>
			<form method="post" action="addfrequencia.php" name="lista">
			<input type="hidden" value="salvaF" name="acao" class="salvaf">
			<h3>Registro de chamada do dia: <?= $data; ?><span id="salva-freq" class="salva-frequencia glyphicon glyphicon-floppy-saved pull-right"></span></h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="text-center">Matricula</th>
						<th class="text-center">Aluno</th>
						<th class="text-center">Status</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($alunos as $aluno) : ?>
							<tr class="<?= ($aluno->presenca == 1) ? 'success' : ''; ?>">
								<input type="hidden" value="<?= $cd_curso; ?>" name="cd_curso">
								<input type="hidden" value="<?= $cd_curso; ?>" name="<?= $aluno->razao_social; ?>[cd_curso]" class="salvaf">
								<input type="hidden" name="<?= $aluno->razao_social; ?>[cd_aluno]" value="<?php echo $aluno->cd_aluno; ?>">
								<input type="hidden" name="<?= $aluno->razao_social; ?>[presenca]" value="<?= ($aluno->presenca == 1) ? true : false; ?>" class="data">
								<input type="hidden" name="<?= $aluno->razao_social; ?>[data]" value="<?= $data; ?>" class="data">
		 						<td class="text-center"><?php echo $aluno->matricula; ?></td>
		 						<td class="text-center"><?php echo $aluno->razao_social; ?></td>
								<td class="text-center"><span class="presente glyphicon <?= ($aluno->presenca == 1) ? 'glyphicon-ok' : 'glyphicon-thumbs-up'; ?>" <?= ($aluno->presenca == 1) ? 'style="color: green;"' : ''; ?>></span></td>
		 					</tr>
						<?php endforeach; ?>
					</tbody>
			</table>

			</form>
		</div>

</div>
<?php Funcoes::geraFooter("frequencia"); ?>