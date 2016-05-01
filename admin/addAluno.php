<?php
  include '../classes/funcoes.class.php';
  include '../classes/turma.class.php';
  include '../classes/aluno.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;

  if(count($_POST) && $dados->acao == "Salvar") {
    $objetoAluno = new Aluno();
    $itens['matricula'] = substr(md5(uniqid($_SESSION['login'], true)), 0, 6);
    $itens['cd_turma']     = (isset($dados->cd_turma)) ? (Int)$dados->cd_turma : null;
    $itens['usuario']   = (isset($dados->usuario)) ? $dados->usuario : null;
    $itens['senha']     = (isset($dados->senha)) ? $dados->senha : null;
    $itens['foto']     = $_FILES['arquivo']['name'];
    $novaPasta = '../uploads/alunos/'.basename($_FILES['arquivo']['name']);
    if(!empty($itens['foto'])) {
      if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $novaPasta)) {
        $objetoAluno->gravaAluno($itens);
      }
    } else {
        $objetoAluno->gravaAluno($itens);
    }

  }
?>
  <form action="addAluno.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-3">
        <input type="file" id="foto" name="arquivo" style="display: none;" onchange="previewUpload(this)"/>
        <img src="../assets/imagens/img.svg" alt="" id="foto-aluno" class="img-thumbnail">
      </div>
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">Matricula</label>
          <input type="text" class="form-control" value="<?= substr(md5(uniqid($_SESSION['login'], true)), 0, 6); ?>" id="inputSuccess1" readonly name="matricula" aria-describedby="helpBlock2">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group has-success">
          <label class="control-label" for="inputWarning1">Turma</label>
          <select class="form-control" name="cd_turma">
              <?php
              $objetoTurma = new Turma();
                $listaTurma = $objetoTurma->getTurmas();
                foreach ($listaTurma as $turma) :
                  if($dados->cd_turma == $turma->cd_turma) :
            ?>
                    <option value="<?= $turma->cd_turma ?>" selected><?= $turma->cd_turma . ' - '. $turma->desc_curso . ' - '. $turma->turno; ?></option>
            <?php
                  else :
            ?>
                  <option value="<?= $turma->cd_turma ?>"><?= $turma->cd_turma . ' - '. $turma->desc_curso . ' - '. $turma->turno; ?></option>
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
      <div class="col-md-3">
        <button type"submit" value="Salvar" name="acao" class="btn btn-primary form-control">Salvar</button>
      </div>
    </div>
  </form>
 <?php Funcoes::geraFooter(); ?>