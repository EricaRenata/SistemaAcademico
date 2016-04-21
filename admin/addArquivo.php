<?php  
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
  $_session 
?>

<div>
 
<form method="post" action="addArquivo.php" enctype="multipart/form-data">
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= (isset($dados->acao) && $dados->acao != 'Cadastrar') ? 'active' : ''; ?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Adicionar material de aula</a></li>
  </ul>

  <label for="exampleInputEmail1">Selecione o curso</label>
			    <select class="form-control" name="cad_curso" >
					<option value="1">ADM. e SQL com assistência técnica e design</option>
					<option value="2">Costura</option>

				</select>
  <br>
<input type="file" class="btn btn-primary btn-sm" name="arquivo"/>
<br>
<br>
<input type="submit" class="btn btn-primary btn-sm" name="acao" value="Enviar Arquivo" />

</form>

 </div>

 <br>
 <br>

<?php
if (isset($dados->acao) && $dados->acao == "Enviar Arquivo") { ?>

<?php 
$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['arquivo']['name']);

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) :?>
<div class="alert alert-success" role="alert">
<a href="#" class="alert-link glyphicon glyphicon-ok"></a>
	Arquivo válido <?= $_FILES['arquivo']['name']; ?>e enviado com sucesso!!
</div>
    
 <?php else: ?>
  Possível ataque de upload de arquivo!
<?php endif;
}?>

 <?php Funcoes::geraFooter(); ?>

