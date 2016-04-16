<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  ?>
<form action="addHorario.php" method="post">

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Selecione o curso:</label>
          <select class="form-control" name="cd_curso" >
          <option value="1">ADM. e SQL com assistência técnica e design</option>
          <option value="2">Costura</option>
          <option value="2">Eletricista</option>
          <option value="2">Gastronomia</option>
          <option value="2">Construção Cívil</option>
          <option value="2">Mecanica</option>
          <option value="2">Eletronica</option>
          <option value="2"></option>
        </select>
        </div>
    </div>
    <table class="table table-hover">
  <tbody>
    <tr>
      <td class="text-center"> Data </td> 
      <td class="text-center"> Horário </td> 
      <td class="text-center"> Componente </td> 
    </tr>
    <?php for($i = 0; $i < 12; $i++) : ?>
      <tr>
        <td class="col-md-2 text-center">
          <input type="date" disabled>
        </td>  
        <td class="col-md-2 text-center">
          <input type="time" disabled>
        </td> 
        <td class="col-md-2 text-center">
          <input type="text" disabled>
        </td> 
      </tr>
    <?php endfor; ?>
      </tbody>
  </table>
  <div class="row">
      <div class="col-md-4 pull-right">
         <input type="reset"  name="botao"  class="btn btn-primary btn-block" value="Limpar"></input> 
      </div>
       <div class="col-md-4 pull-right">
          <input type="hidden" value="Salvar" name="acao"></input>
          <button type="submit" class="btn btn-primary btn-block">Salvar</button>
       </div>
 </div>
</form>
<?php Funcoes::geraFooter("notas"); ?>