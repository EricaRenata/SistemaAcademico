<?php 
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
 <div class="panel panel-primary">
  <div class="panel-heading">Design</div>
  <div class="panel-body">
  <ol><li> Introdução
      <li> Operações básicas
      <li> Utilizando recursos básicos
      <ul> Linhas curvas
      <li> Figuras geométricas
      <li> Preenchimentos e contornos
      <li>Ferramenta forma
      <li>Girando e inclinando objetos
      <li>Espelhando objetos
      <li>Agrupando e desagrupando objetos
      <li>Alinhando e distribuindo
      <li>Ordenando objetos
      <li>Combinando objetos</ul>
      <li> Editando textos
      <li> Efeitos
      <li> Imprimindo páginas</li>
  </ol>
    Carga Horária: 40 horas
  </div>
 </div>
  <div class="row">
  <div class="col-md-4">
  <input type="button" name="imprimir" class="btn btn-primary btn-lg btn-block" value="Imprimir" onclick="window.print();">
  </div>
  </div>
  </form>
 <?php Funcoes::geraFooter(); ?>