<?php
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
  <div class="row margin-top">
    <?php if(isset($_SESSION['super']) && $_SESSION['super']) : ?>
      <?php
        $objetoModulos1 = new Database();
        $submodulos = $objetoModulos1->query("select * from cad_submodulo where permissao = 1")->result();
        foreach ($submodulos as $submodulo) : ?>
         <div class="col-sm-6 col-md-3">
            <a href="<?= $submodulo->fonte; ?>" class="thumbnail modulos">
              <span class="glyphicon <?= $submodulo->icone; ?>"></span>
              <h4><?= $submodulo->nome_submodulo; ?></h4>
            </a>
          </div>
      <?php endforeach; ?>
    <?php endif; ?>
    <?php if(isset($_SESSION['cd_prof']) && $_SESSION['cd_prof'] != 0) : ?>
       <?php
        $objetoModulos1 = new Database();
        $submodulos = $objetoModulos1->query("select * from cad_submodulo where permissao LIKE '%2%'")->result();
        foreach ($submodulos as $submodulo) : ?>
         <div class="col-sm-6 col-md-3">
            <a href="<?= $submodulo->fonte; ?>" class="thumbnail modulos">
              <span class="glyphicon <?= $submodulo->icone; ?>"></span>
              <h4><?= $submodulo->nome_submodulo; ?></h4>
            </a>
          </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if(isset($_SESSION['aluno'])) : ?>
      <?php
        $objetoModulos1 = new Database();
        $submodulos = $objetoModulos1->query("select * from cad_submodulo where permissao LIKE '%3%'")->result();
        foreach ($submodulos as $submodulo) : ?>
         <div class="col-sm-6 col-md-3">
            <a href="<?= $submodulo->fonte; ?>" class="thumbnail modulos">
              <span class="glyphicon <?= $submodulo->icone; ?>"></span>
              <h4><?= $submodulo->nome_submodulo; ?></h4>
            </a>
          </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
 <?php Funcoes::geraFooter(); ?>