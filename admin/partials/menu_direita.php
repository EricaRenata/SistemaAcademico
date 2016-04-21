<?php
$objetonotificacoes = new Notificacoes();
$noticias = $objetonotificacoes->getUltimasNoticias();
$notificacoes = $objetonotificacoes->getNotificacao();
?>

<div class="navbar-default sidebar-right" role="navigation">
  <div class="list-group">
  	<a href="#" class="list-group-item active">
	    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-globe"></span> Últimas Notificações</h4>
	  </a>
    <?php 
      foreach ($notificacoes as $notificacao) : ?>
      	<a href="#" class="list-group-item notificacao">
      		<h4 class="list-group-item-heading"><?= $notificacao->tp_notificacao; ?> 
            <span class="label label-success data-notificacao pull-right">
              <span class="glyphicon glyphicon-calendar"> <?= date('d/m/Y', strtotime($notificacao->dt_sistema)) . ' - '. date('H:m', strtotime($notificacao->dt_sistema)); ?></span> 
          </h4>
      		<p class="list-group-item-text"><?= $notificacao->desc_notificacao; ?>
      		</p>
    		</a>
      <?php endforeach; ?>
	   <?php 
      foreach ($noticias as $noticia) : ?>
      	<a href="#" class="list-group-item noticia">
      		<h4 class="list-group-item-heading"><?= $noticia->tit_noticia; ?></h4>
      		<p class="list-group-item-text"><?= $noticia->desc_noticia; ?>
      		</p>
    		</a>
      <?php endforeach; ?>
	</div>
  
  <ul>  
     
  </ul>
</div>