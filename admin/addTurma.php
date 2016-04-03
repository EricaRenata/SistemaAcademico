<?php 
include '../classes/funcoes.class.php';
  include '../classes/turma.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;

  if(count($_POST) && $dados->acao == "Salvar") {
    $itens['cod'] = $dados->codigo;
    $itens['descricao'] = $dados->descricao;
    $objetoTurma = new Turma();
    $objetoTurma->gravaTurma($itens); 
    
  }
?>
  <form action="addTurma.php" method="post">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">Código</label>
          <input type="text" class="form-control" id="inputSuccess1" value="" name="codigo" aria-describedby="helpBlock2">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputWarning1">Descrição</label>
          <input type="text" class="form-control" id="inputSuccess1" value="" name="descricao" aria-describedby="helpBlock2">
        </div>
      </div>
    </div>
    <div class="row margin-10">
      <div class="col-md-12">
        <div>
          <label class="control-label" for="inputError1">Alunos:</label>
        </div>
          <select class="caixa form-control" multiple="multiple">
            <option value="1">Erica</option>
            <option value="2">Romário</option>
            <option value="1">Eliseu</option>
            <option value="2">Tamara</option>
            <option value="1">Eduardo</option>
            <option value="2">Rafael</option>
            <option value="1">Marta</option>
            <option value="2">Eduarda</option>
            <option value="1">Elizangela</option>
            <option value="2">Renata</option>
            <option value="1">Gabriel</option>
            <option value="2">Diego</option>
          </select>
      </div>
    </div>
    <div class="row margin-10">
      <div class="col-md-3">
        <button type"submit" value="Salvar" name="acao" class="btn btn-primary form-control">Salvar</button>
      </div>
    </div>
  </form>
 <?php Funcoes::geraFooter(); ?>