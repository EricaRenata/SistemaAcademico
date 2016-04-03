
<?php  
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
  
  <div class="row margin-top">
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
    <div class="col-sm-6 col-md-3">
      <a class="thumbnail modulos">
        <span class="glyphicon glyphicon-folder-open"></span>
        <h4>Material Aula </h4>
      </a>
    </div>
     <div class="col-sm-6 col-md-3">
      <a href='addNotas.php' class="thumbnail modulos">
        <span class="glyphicon glyphicon-education"></span>
        <h4>Adicionar Notas</h4>
      </a>
  </div>
  <div class="col-sm-6 col-md-3">
    <a href='verNotas.php' class="thumbnail modulos">
      <span class="glyphicon glyphicon-education"></span>
      <h4>Visualizar Notas</h4>
    </a>
  </div>
 <?php Funcoes::geraFooter(); ?>