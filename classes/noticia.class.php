<?php

Class Noticia extends Funcoes {
  public function gravaNoticia($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('noticias', $itens);
  }

  public function getNoticias() {
    $objetoSql = new Database();
    $resultado = $objetoSql->query('select * from noticias order by cd_noticias DESC limit 3')->result(); 
    if(count($resultado) > 0) {
      return $resultado;
    }else {
      return false;
    }
  }

  public function geraNoticia() {
    $noticias = $this->getNoticias();
    foreach ($noticias as $itens) { ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="assets/imagens/noticias.jpg" alt="...">
          <div class="caption">
            <h3><?= $itens->tit_noticia;?></h3>
            <p><?= $itens->desc_noticia;?></p>
            <p><a href="#" class="btn btn-primary" role="button">Ler Mais</a></p>
          </div>
        </div>
      </div>
    <?php
    }
  }
}