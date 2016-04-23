<?php  
	include '../classes/funcoes.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;
?>
<div>

<?php 
$root = '../uploads/cursos';

$iter = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST,
    RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
);

$arquivos = array($root);
foreach ($iter as $arquivo => $dir) :
  if (!$dir->isDir()) : ?>
  <div class="row">
  <?php
    $extensao = explode(".", $arquivo)[3]; 
    ?>
		   <div class="col-sm-6 col-md-4 arquivos">
		    <div class="thumbnail">
		  		<?php if($extensao == 'pdf') : ?>
		      	<img src="../assets/imagens/pdf.png" height="10">
		    	<?php elseif($extensao == 'png' || $extensao == 'gif' || $extensao == 'jpg' || $extensao == 'jpeg') : ?>  	
		      	<img src="<?= $arquivo; ?>" height="10">
		    	<?php endif; ?>  	
		      <div class="caption">
		        <h4><?= $arquivo; ?></h4>
		        <p>
		        	<a href="<?= $arquivo; ?>" class="btn btn-default" role="button">Visualizar</a>
		        	<a href="<?= $arquivo; ?>" class="btn btn-primary" role="button" download>Baixar</a>
	        	</p>
		      </div>
		    </div>
		  </div>
    <?php 
    endif;
    endforeach; ?>
  </div>

</div>
<?php Funcoes::geraFooter(); ?>