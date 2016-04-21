<?php  
  include '../classes/funcoes.class.php';
  include '../classes/upload.class.php';
  include '../classes/aluno.class.php';
  include '../classes/curso.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
?>

<div>
	<form method="post" action="addArquivo.php" enctype="multipart/form-data">
		<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= (isset($dados->acao) && $dados->acao != 'Cadastrar') ? 'active' : ''; ?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Adicionar material de aula</a></li>
  	</ul>

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
  		<br>
			<input type="file" class="btn btn-primary btn-sm" name="arquivo"/>
			<br>
			<br>
			<input type="submit" class="btn btn-primary btn-sm" name="acao" value="Enviar Arquivo" />
		</form>
  </div>
	<?php
		if (isset($dados->acao) && $dados->acao == "Enviar Arquivo") { ?>
	<?php 
	 $rand =  $dados->cd_curso;
    mkdir('../uploads/cursos/'.$rand);
    $novaPasta = '../uploads/cursos/'.$rand.'/'.basename($_FILES['arquivo']['name']);
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $novaPasta)) :
			$itens['cd_usuario']=$_SESSION['cd_usuario'];
			$itens['cd_curso'] = $dados->cd_curso;
			$itens['nome'] =  $_FILES['arquivo']['name'];
			$objetoUpload = new Upload();
			$objetoUpload->setArquivos($itens);
	?>
			<div class="alert alert-success" role="alert">
				<a href="#" class="alert-link glyphicon glyphicon-ok"></a>
				Arquivo válido <?= $_FILES['arquivo']['name']; ?> enviado com sucesso!!
			</div>
  <?php else: ?>
  	Possível ataque de upload de arquivo!
  <?php endif;
}?>
<?php Funcoes::geraFooter(); ?>