<?php 
  include '../classes/funcoes.class.php';  
  include '../classes/frequencia.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
  $cd_curso = (isset($dados->cd_curso)) ? $dados->cd_curso : null;
?>
<div>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= (!isset($dados->acao)) ? 'active' : ''; ?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Pesquisa</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?= (!isset($dados->acao)) ? 'active' : ''; ?>" id="home">
	    <form method="POST" action="frequencia.php" name="consulta">
		    <div class="form-group">
			    <label for="exampleInputEmail1">Selecione o curso</label>
			    <select class="form-control" name="cd_curso" >
					<option value="1">ADM. e SQL com assistência técnica e design</option>
					<option value="2">Costura</option>
				</select>
		  	</div>
		  	<input class="btn btn-primary btn-sm" name="acao" type="submit" value="Cadastrar">
	    </form>
    </div>

    <div role="tabpanel" class="tab-pane <?= (isset($dados->acao) && $dados->acao == 'Cadastrar') ? 'active' : ''; ?>" id="profile">
			<?php
        $data = date("d/m/Y");
        $objetoFrequencia = new Frequencia();
        $alunos = $objetoFrequencia->getFrequencia($cd_curso);
				if(isset($dados->acao) && $dados->acao == 'salvaF') {
					$objetoFrequencia->setFrequencia($dados);
				}
			?>
			<form method="post" action="frequencia.php" name="lista">	
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