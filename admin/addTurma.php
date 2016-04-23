<?php 
include '../classes/funcoes.class.php';
  include '../classes/turma.class.php'; 
  include '../classes/curso.class.php'; 
  include '../classes/aluno.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;

  if(count($_POST) && $dados->acao == "Salvar") {
    $itens['cd_turma'] = $dados->cd_turma;
    $itens['cd_curso'] = $dados->cd_curso;
    $itens['turno'] = $dados->turno;
    $itens['alunos'] = $dados->alunos;
    $objetoTurma = new Turma();
    $objetoTurma->gravaTurma($itens); 
    
  }
?>
  <form action="addTurma.php" method="post">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">Código</label>
          <input type="text" class="form-control" id="inputSuccess1" value="" name="cd_turma" aria-describedby="helpBlock2">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group has-success">
          <select name="cd_curso" class="form-control">
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
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group has-success">
          <select name="turno" class="form-control">
            <option value="manha">Manha</option>
            <option value="tarde">Tarde</option>
            <option value="noite">Noite</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row margin-10">
      <div class="col-md-12">
        <div>
          <label class="control-label" for="inputError1">Alunos:</label>
        </div>
          <select class="caixa form-control" name="alunos[]" multiple="multiple">
           <?php
              $objetoAluno = new Aluno();
                $listaAlunos = $objetoAluno->getAlunos();
                foreach ($listaAlunos as $aluno) : ?>
                  <option value="<?= $aluno->cd_aluno ?>"><?= $aluno->razao_social; ?></option>
            <?php endforeach; ?>
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