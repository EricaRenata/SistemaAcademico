<?php 
  include '../classes/funcoes.class.php';  
  include '../classes/aluno.class.php'; 
  include '../classes/frequencia.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
  $objetoFrequencia = new Frequencia(); 
  $cd_curso = (isset($dados->cd_curso)) ? $dados->cd_curso : null;
  if(count($_POST) && $dados->acao == "Salvar" || !isset($dados->acao)) {
    $itens['cd_aluno'] = (isset($dados->cd_aluno)) ? $dados->cd_aluno : null;
    $itens['matricula']     = (isset($dados->matricula)) ? $dados->matricula : null;
    $itens['cd_curso']   = (isset($dados->cd_curso)) ? $dados->cd_curso : null;
    $itens['data']     = (isset($dados->data)) ? $dados->data : null;
    $itens['presenca']     = (isset($dados->presenca)) ? $dados-> presenca : null;
    // $objetoFrequencia->getfrequencia($itens);
?>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= (isset($dados->acao) && $dados->acao != 'Cadastrar') ? 'active' : ''; ?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Pesquisa</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
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

	<?php } else { ?>
    <div role="tabpanel" class="tab-pane active" id="profile">
			<?php
			 $data = date("d/m/Y");
				$objetoAluno = new Aluno();
				$alunos = $objetoAluno->getAlunos($cd_curso);
				if($dados->acao == 'salvaF') {

					$objetoFrequencia->setFrequencia($dados);
				}
			?>
			<form method="post" action="frequencia.php" name="lista">	
			<input type="hidden" value="salvaF" name="acao" class="salvaf">
			<h2>Registro de chamada do dia: <button class="salva-frequencia glyphicon glyphicon-floppy-saved pull-right" type="submit"></button></h2>
			<table class="table table-hover"> 
				<thead> 
					<tr> 
						<th class="text-center">Matricula</th> 
						<th class="text-center">Aluno</th> 
						<th class="text-center">Status</th> 
					</tr> 
					</thead> 
					<tbody> 
						<?php foreach ($alunos as $valor) : ?>
							<tr>
								<input type="hidden" value="<?= $cd_curso; ?>" name="<?= $valor->razao_social; ?>[cd_curso]" class="salvaf">
								<input type="hidden" name="<?= $valor->razao_social; ?>[cd_aluno]" value="<?php echo $valor->cd_aluno; ?>">
								<input type="hidden" name="<?= $valor->razao_social; ?>[presenca]" value="0" class="data">
								<input type="hidden" name="<?= $valor->razao_social; ?>[matricula]" value="<?= $valor->matricula; ?>">
		 						<td class="text-center"><?php echo $valor->matricula; ?></td>
		 						<td class="text-center"><?php echo $valor->razao_social; ?></td>
								<td class="text-center"><span class="presente glyphicon glyphicon-thumbs-up"></span></td>
		 					</tr>
						<?php endforeach; ?>
					</tbody> 
			</table>

			</form>
		</div>
<?php } ?>
 

</div>



<?php Funcoes::geraFooter("frequencia"); ?>