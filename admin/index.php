<?php  
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
  <div class="row margin-top">
    <?php if($_SESSION['super'] == true || $_SESSION['super'] == 1) : ?>
      <div class="col-sm-6 col-md-3">
        <a href="addAluno.php" class="thumbnail modulos">
          <span class="glyphicon glyphicon-user"></span>
          <h4>Adicionar Aluno</h4>
        </a>
      </div>
      <div class="col-sm-6 col-md-3">
        <a href='addTurma.php' class="thumbnail modulos">
          <span class="glyphicon glyphicon-education"></span>
          <h4>Adicionar Turma</h4>
        </a>
      </div>
      <div class="col-sm-6 col-md-3">
        <a href="addNoticias.php" class="thumbnail modulos">
          <span class="glyphicon glyphicon-globe"></span>
          <h4>Adicionar Noticias</h4>
        </a>
      </div>
    <?php endif; ?>
    <div class="col-sm-6 col-md-3">
      <a class="thumbnail modulos">
        <span class="glyphicon glyphicon-folder-open"></span>
        <h4>Material Aula </h4>
      </a>
    </div>
    <?php if(isset($_SESSION['cd_prof'])) : ?>
      <div class="col-sm-6 col-md-3">
        <a href='addNotas.php' class="thumbnail modulos">
          <span class="glyphicon glyphicon-list-alt"></span>
          <h4>Adicionar Notas</h4>
        </a>
      </div>
    <?php endif; ?>
    <?php if($_SESSION['super']) : ?>
      <div class="col-sm-6 col-md-3">
          <a href='addHorario.php' class="thumbnail modulos">
            <span class="glyphicon glyphicon-calendar"></span>
            <h4>Adicionar Horário</h4>
          </a>
      </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['cd_prof']) && $_SESSION['cd_prof'] != 0) : ?>
      <div class="col-sm-6 col-md-3">
        <a href='frequencia.php' class="thumbnail modulos">
          <span class="glyphicon glyphicon-calendar"></span>
          <h4>Frequência</h4>
        </a>
      </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['cd_aluno']) && $_SESSION['cd_aluno'] != 0) : ?>
      <div class="col-sm-6 col-md-3">
        <a href='verHorario.php' class="thumbnail modulos">
          <span class="glyphicon glyphicon-calendar"></span>
          <h4>Visualizar Horário</h4>
        </a>
      </div>
      <div class="col-sm-6 col-md-3">
        <a href='verNotas.php' class="thumbnail modulos">
          <span class="glyphicon glyphicon-calendar"></span>
          <h4>Visualizar Notas</h4>
        </a>
      </div>
    <?php endif ?>
    <?php if(!isset($_SESSION['cd_prof'])) : ?>
      <div class="col-sm-6 col-md-3">
        <a href='verDisciplina.php' class="thumbnail modulos">
          <span class="glyphicon glyphicon-qrcode"></span>
          <h4>Disciplinas</h4>
        </a>
      </div>
    <?php endif ?>
  </div>
 <?php Funcoes::geraFooter(); ?>