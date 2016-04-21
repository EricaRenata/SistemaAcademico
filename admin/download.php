<?php  
	include '../classes/funcoes.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
?>
<div>

<?php foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator('../uploads/cursos/')) as $filename) : 
  if ($filename->isDir()) continue;
?>
  <div class="row">
  <?php 
    $diretorio = explode("/", $filename)[2];
    $arquivo = explode("\\", $diretorio)[2]; 
    $extensao = explode(".", $diretorio)[1]; 
    ?>
		  <div class="col-sm-6 col-md-4 arquivos">
		    <div class="thumbnail">
		  		<?php if($extensao == 'pdf') : ?>
		      	<img src="../assets/imagens/pdf.png" height="10">
		    	<?php elseif($extensao == 'png' || $extensao == 'gif' || $extensao == 'jpg' || $extensao == 'jpeg') : ?>  	
		      	<img src="../uploads/<?= $diretorio; ?>" height="10">
		    	<?php endif; ?>  	
		      <div class="caption">
		        <h4><?= $arquivo; ?></h4>
		        <p>
		        	<a href="../uploads/<?= $diretorio; ?>" class="btn btn-default" role="button">Visualizar</a>
		        	<a href="../uploads/<?= $diretorio; ?>" class="btn btn-primary" role="button" download>Baixar</a>
	        	</p>
		      </div>
		    </div>
		  </div>

<?php endforeach; ?>
		</div>

</div>







<?php Funcoes::geraFooter(); ?>