<?php
  include '../classes/funcoes.class.php';
  include '../classes/disciplina.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<div class="row">
  <?php
    $objetoDisiplina = new Disciplina();
    foreach ($objetoDisiplina->getTodasDisciplinas() as $disciplina) : ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="../assets/imagens/slide1.png" alt="...">
          <div class="caption">
            <h3><?= $disciplina->nome_disciplina; ?></h3>
            <p><button class="btn btn-primary desc-disciplina" data-disciplina="<?= $disciplina->cd_disciplina; ?>" type="button">Descrição</button>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
</div>

 <?php Funcoes::geraFooter(); ?>