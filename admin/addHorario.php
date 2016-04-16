<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/horario.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;

  if(count($dados) && isset($dados->acao) && $dados->acao == "Salvar") {
   $objetoHorario = new Horario(); 
    $itens['data'] = (isset($dados->data)) ? $dados->data : null;
    $itens['cd_curso']     = (isset($dados->cd_curso)) ? $dados->cd_curso : null;
    $itens['horario']     = (isset($dados->horario)) ? $dados->horario : null;
    $itens['componente']   = (isset($dados->componente)) ? $dados->componente : null;
    $objetoHorario->gravaHorario($itens);
  }
?>
<form action="addHorario.php" method="post">

  <div class="row">
    <div class="col-md-6">
      <select class="form-control" name="cd_curso">
        <option value="1"> Administrador de redes</option>
      </select>
    </div>
    <table class="table table-hover">
  <tbody>
    <div>
    <tr>
      <td class="text-center"> Data </td> 
      <td class="text-center"> Horário </td> 
      <td class="text-center"> Componente </td> 
    </tr>
   </div>
  </div>
  
      <tr>
        <td class="col-md-2 text-center">
          <input type="date"  class="form-control" name="data"   value="">
        </td>  
        <td class="col-md-2 text-center">
          <input type="time" class="form-control" name="horario"  value="">
        </td> 
        <td class="col-md-2 text-center">
          <input type="text" class="form-control"  name="componente"  value="">
        </td> 
      </tr>
      </tbody>
  </table>
  <input type="submit" class="btn btn-primary pull-right" name="acao" value="Salvar">
</form>
<?php Funcoes::geraFooter("horario"); ?>