<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<form action="verNotas.php" method="post">

  <div class="row">
    <div class="col-md-12">
      <h4> <strong> Curso:</strong> Administrador de Redes e SQL Server com Assistência Técnica e Design </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
  <table class="table table-hover">
    <thead>
      <tr>
        <td class="text-left"> Disciplina </td> 
        <td class="text-center"> Nota 1 </td> 
        <td class="text-center"> Nota 2 </td> 
        <td class="text-center"> Status </td> 
      </tr>
    </thead>
      <tbody>
      <?php for($i = 0; $i < 12; $i++) : ?>
        <tr>
          <td>&nbsp;</td>  
          <td>&nbsp;</td>
          <td>&nbsp;</td> 
          <td>&nbsp;</td> 
        </tr>
      <?php endfor; ?>
      </tbody>
  </table>
    </div>
    <div class="col-md-6">
      <input type="hidden" value="Salvar" name="acao"></input>
      <button type="submit" class="btn btn-primary btn-block">Imprimir</button>
    </div>
  </div>


</form>
<?php Funcoes::geraFooter("notas"); ?>