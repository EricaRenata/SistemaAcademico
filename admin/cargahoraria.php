<?php 
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
  <div>
      <form action="verDescricao.php" method="post">
      <ul class="nav nav-tabs">
        <li role="radio" class="active"><a href="">Ementa</a></li>
        <li role="presentation"><a href="#">Carga Hoária</a></li>
        <li role="presentation"><a href="#">Messages</a></li> 
    <div class="col-md-6"> 
      <input type="button"  name="imprimir"   class="btn btn-primary btn-block" value="Imprimir" onclick="window.print()";>
    </div>
      </ul>
  </div>


  </form>
 <?php Funcoes::geraFooter(); ?>