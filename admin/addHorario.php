<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/horario.class.php'; 
  include '../classes/curso.class.php'; 
  include '../classes/disciplina.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;

  if(count($dados) && isset($dados->acao) && $dados->acao == "Salvar") {
   $objetoHorario = new Horario(); 
    $itens['data_inicial'] = (isset($dados->data_inicial)) ? $dados->data_inicial : null;
    $itens['data_final'] = (isset($dados->data_final)) ? $dados->data_final : null;
    $itens['cd_curso']     = (isset($dados->cd_curso)) ? $dados->cd_curso : null;
    $itens['horario_inicial']     = (isset($dados->horario_inicial)) ? $dados->horario_inicial : null;
    $itens['horario_final']     = (isset($dados->horario_final)) ? $dados->horario_final : null;
    $itens['observacao']   = (isset($dados->observacao)) ? $dados->observacao : null;
    $objetoHorario->gravaHorario($itens);
  }
?>
<form action="addHorario.php" method="post">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Selecione o curso:</label>
          <select class="form-control" name="cd_curso" onchange="submit()">
            <option>Selecione o Curso</option>
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
    <div class="col-md-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Selecione a Disciplina:</label>
          <select class="form-control" name="cd_disciplina" onchange="submit()">
            <option>Selecione a Disciplina</option>
          <?php 

            if(isset($dados->cd_curso) && $dados->cd_curso != 0) {
              $objetoDisciplina = new Disciplina();
              $listaDisciplina = $objetoDisciplina->getDisciplinas($dados->cd_curso);
              foreach ($listaDisciplina as $disciplina) :
                if($dados->cd_disciplina == $curso->cd_disciplina) : ?>
                    <option value="<?= $curso->cd_curso ?>" selected><?= $disciplina->nome_disciplina; ?></option>
          <?php else : ?>
                  <option value="<?= $curso->cd_curso ?>"><?= $disciplina->nome_disciplina; ?></option>
          <?php 
                endif; 
              endforeach; 
            }
          ?>
        </select>
      </div>
    </div>
    <?php if(isset($dados->cd_disciplina) && $dados->cd_disciplina != 0) : ?> 
      <table class="table table-hover">
        <thead>
          <tr>
            <td class="text-center"> Data Inicial </td> 
            <td class="text-center"> Horário Inicial </td> 
            <td class="text-center"> Data Final </td> 
            <td class="text-center"> Horário Final </td> 
            <td class="text-center"> Observação </td> 
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="col-md-2 text-center">
              <input type="date"  class="form-control" name="data_inicial" >
            </td>  
            <td class="col-md-2 text-center">
              <input type="time" class="form-control" name="horario_inicial">
            </td>
            <td class="col-md-2 text-center">
              <input type="date"  class="form-control" name="data_final" >
            </td>  
            <td class="col-md-2 text-center">
              <input type="time" class="form-control" name="horario_final">
            </td> 
            <td class="col-md-2 text-center">
              <input type="text" class="form-control"  name="observacao">
            </td> 
          </tr>
        </tbody>
      </table>
  <input type="submit" class="btn btn-primary pull-right" name="acao" value="Salvar">
    <?php endif; ?>
</form>
<?php Funcoes::geraFooter(); ?>