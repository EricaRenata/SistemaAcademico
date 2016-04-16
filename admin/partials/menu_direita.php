<?php
$objetonotificacoes = new Notificacoes();
$noticias = $objetonotificacoes->getUltimasNoticias();
$notificacoes = $objetonotificacoes->getNotificacao();
?>

<div class="navbar-default sidebar-right" role="navigation">
  <h4><a class="glyphicon glyphicon-globe"></a> Ultimas Notificações</h4>
  <div class="list-group">
	   <?php 
      foreach ($noticias as $noticia) { ?>
      	<a href="#" class="list-group-item">
      		<h4 class="list-group-item-heading"><?= $noticia->tit_noticia; ?></h4>
      		<p class="list-group-item-text"><?= $noticia->desc_noticia; ?>
      		</p>
    		</a>
      <?php }?>
      <?php 
      foreach ($notificacoes as $notificacao) { ?>
      	<a href="#" class="list-group-item">
      		<h4 class="list-group-item-heading"><?= $notificacao->tp_notificacao; ?></h4>
      		<p class="list-group-item-text"><?= $notificacao->desc_notificacao; ?>
      		</p>
    		</a>
      <?php }?>
	</div>
  
  <ul>  
     
  </ul>
</div>