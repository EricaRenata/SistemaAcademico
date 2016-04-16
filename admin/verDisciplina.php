<?php 
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
  <form action="verDisciplinas.php" method="post">
  <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="../assets/imagens/slide1.png" alt="...">
      <div class="caption">
        <h3>Segurança da Informação</h3>
        <p><a href="verDescricao.php" class="btn btn-primary" role="button">Descrição</a>
      </div>
    </div>
  </div>
</div>
</form>
 <?php Funcoes::geraFooter(); ?>