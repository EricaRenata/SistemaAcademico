<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/horario.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $objetoHorario = new Horario();
  $dados = (Object) $_POST;

  if(count($dados) && isset($dados->acao) && $dados->acao == "Consultar") {
   $objetoHorario = new Horario(); 
    $itens['data'] = (isset($dados->data)) ? $dados->data : null;
    $itens['horario']     = (isset($dados->horario)) ? $dados->horario : null;
    $itens['cd_curso']     = (isset($dados->cd_curso)) ? $dados->cd_curso : null;
    $itens['componente']   = (isset($dados->componente)) ? $dados->componente : null;
  }
?>
<form action="verHorario.php" method="post">

  <div class="row">
    <div class="col-md-6">
      <select class="form-control" name="cd_curso">
        <option value="1"> Eletricista</option>
        <option value="2"> Administrador de Redes</option>
        <option value="3"> Costura</option>
        <option value="4"> Gastronomia</option>
        <option value="5"> Programador Web</option>

      </select>
    </div>
    <div class="col-md-2">
        <button type"submit" value="Consultar" name="acao" class="btn btn-primary form-control">Consultar</button>
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
         <td>&nbsp;</td>  
         <td>&nbsp;</td>
         <td>&nbsp;</td> 
      </tr>
      <tr>
         <td>&nbsp;</td>  
         <td>&nbsp;</td>
         <td>&nbsp;</td> 
      </tr>
      <tr>
         <td>&nbsp;</td>  
         <td>&nbsp;</td>
         <td>&nbsp;</td> 
      </tr>
      </tbody>
  </table>
  
  <input type="button"  name="imprimir"   class="btn btn-primary" value="Imprimir" onclick="window.print()";>
    
</form>
<?php Funcoes::geraFooter("horario"); ?>