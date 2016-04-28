<?php 
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
 <div class="panel panel-primary">
  <div class="panel-heading">Segurança da Informação</div>
  <div class="panel-body">
  <ol><li> Dados e Informação
      <li> Conceitos de segurança
      <li> Mecanismos de segurança
      <li> Ameaças à segurança
      <li> Nível de segurança
      <ul><li> Segurança física
      <li> Segurança lógica</ul>
      <li> Políticas de segurança
      <ul><li> Políticas de Senhas</ul>
      <li> Resumo
      <li> Bibliografia e Referências</li>
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