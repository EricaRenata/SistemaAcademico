<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<form action="verHorario.php" method="post">

  <div class="row">
    <div class="col-md-12">
      <h4> <strong> Curso:</strong> Administrador de Redes e SQL Server com Assistência Técnica e Design </h4> 
    </div>
  </div>

  <table class="table table-bordered">
  <tbody>
    <tr>
      <td width="200" class="text-center"> Data </td> 
      <td width="150" class="text-center"> Horário </td> 
      <td width="450" class="text-center"> Componente </td> 
    </tr>
      <tr>
         <td>&nbsp;</td>  
         <td>&nbsp;</td>
         <td>&nbsp;</td> 
      </tr>
      <tr>
         <td >&nbsp;</td>  
         <td>&nbsp;</td>
         <td>&nbsp;</td> 
      </tr>
      <tr>
         <td >&nbsp;</td>  
         <td>&nbsp;</td>
         <td>&nbsp;</td> 
      </tr>
      <tr>
         <td >&nbsp;</td>  
         <td>&nbsp;</td>
         <td>&nbsp;</td> 
      </tr>
      </tbody>
  </table>
  
  <input type="button"  name="imprimir"   class="btn btn-primary btn-block" value="Imprimir" onclick="window.print()";>
    
</form>
<?php Funcoes::geraFooter("notas"); ?>