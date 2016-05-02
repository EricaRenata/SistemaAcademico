<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
  include '../classes/turma.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<form action="verNotas.php" method="post">
  <div class="row">
    <div class="col-md-12">
  <table class="table table-hover">
   <thead>
    <tr>
      <td class="text-left"> Disciplina </td> 
      <td class="text-center"> Nota 1 </td> 
      <td class="text-center"> Nota 2 </td> 
      <td class="text-center"> Status </td> 
   </thead>
    </tr>
      <tbody>
      <?php
      $objetoNotas = new Notas();
     $resultado = $objetoNotas->getNotas($_SESSION['cd_aluno']);
      ?>
      <?php foreach ($resultado as $notas): ?>
      <tr>
        <td><?= $notas->nome_disciplina; ?></td>  
        <td class="text-center"><?= $notas->nota1; ?></td>
        <td class="text-center"><?= $notas->nota2; ?></td> 
        <td class="text-center"><?= ($notas->status == 0) ? 'Reprovado' : 'Aprovado'; ?></td> 
      </tr>
      <?php endforeach; ?>
      </tbody>
  </table>
    </div>
    <div class="col-md-6">
      <input type="button"  name="imprimir"   class="btn btn-primary btn-block imprimi-notas" value="Imprimir" onclick="window.print()";>
    </div>
</form>
<?php Funcoes::geraFooter(); ?>