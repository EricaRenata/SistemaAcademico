<?php 
  include '../classes/funcoes.class.php';
  include '../classes/aluno.class.php'; 
  include '../classes/curso.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;

  if(count($_POST) && $dados->acao == "Salvar") {
    $objetoAluno = new Aluno(); 
    $itens['matricula'] = (isset($dados->matricula)) ? (Int)$dados->matricula : null;
    $itens['cd_curso']     = (isset($dados->curso)) ? (Int)$dados->curso : null;
    $itens['usuario']   = (isset($dados->usuario)) ? $dados->usuario : null;
    $itens['senha']     = (isset($dados->senha)) ? $dados->senha : null;
    $objetoAluno->gravaAluno($itens);
  }
?>
  <form action="addAluno.php" method="post">
    <div class="row">
      <div class="col-md-3">
        <img src="../assets/imagens/img.svg" alt="" class="img-thumbnail">
      </div>
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">Matricula</label>
          <input type="number" class="form-control" id="inputSuccess1" value="" name="matricula" aria-describedby="helpBlock2">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group has-success">
          <label class="control-label" for="inputWarning1">Curso</label>
          <select class="form-control" name="curso">
              <?php
              $objetoCurso = new Curso();
                $listaCurso = $objetoCurso->getCursos();
                foreach ($listaCurso as $curso) :
                  if($dados->cd_curso == $curso->cd_curso) :
            ?>
                    <option value="<?= $curso->cd_curso ?>" selected><?= $curso->nome_curso; ?></option>
            <?php 
                  else :
            ?>
                  <option value="<?= $curso->cd_curso ?>"><?= $curso->nome_curso; ?></option>
            <?php 
                  endif; 
                endforeach; 
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputError1">Usúario</label>
          <input type="text" class="form-control" value="" name="usuario" id="inputError1" >
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group has-success">
          <label class="control-label" for="inputError1">Senha</label>
          <input type="password" value="" class="form-control" id="inputError1" name="senha">
        </div>
      </div>  
    </div>
    <div class="row margin-10">
      <div class="col-md-12">
        <div>
          <label class="control-label" for="inputError1">Permissões:</label>
        </div>
          <select class="caixa form-control" multiple="multiple">
            <option value="1">Administrador</option>
            <option value="2">Aluno</option>
          </select>
          <select class="caixa form-control" multiple="multiple">
            <option value="1">Administrador</option>
            <option value="2">Aluno</option>
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