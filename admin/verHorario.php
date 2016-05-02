<?php
  include '../classes/funcoes.class.php';
  include '../classes/curso.class.php';
  include '../classes/horario.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<form action="verHorario.php" method="post">
  <div class="row">
    <div class="col-md-12 form-group">
     <label for="exampleInputEmail1">Selecione o curso</label>
          <select class="form-control" name="cd_curso" >
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
  <div class="row">
    <div class="col-md-12">
     <?php
        $data = date("d/m/Y");
        $objetoHorari = new Horario();
        $alunos = $objetoHorari->getHorariosPorAluno($_SESSION['cd_aluno']);
      ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <td width="200" class="text-center"> Data </td>
            <td width="250" class="text-center"> Horário </td>
            <td width="450" class="text-center"> Componente </td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($alunos as $aluno) : ?>
            <tr>
              <td class="text-center"><?= date('d/m/Y', strtotime($aluno->data_inicial)) . ' à ' . date('d/m/Y', strtotime($aluno->data_final)); ?></td>
              <td class="text-center"><?= date('H:m', strtotime($aluno->horario_inicial)) . ' à ' . date('H:m', strtotime($aluno->horario_final)); ?></td>
              <td class="text-center"><?= $aluno->desc_curso; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <input type="button"  name="imprimir"   class="btn btn-primary btn-block" value="Imprimir" onclick="window.print()";>
    </div>
  </div>
</form>
<?php Funcoes::geraFooter("notas"); ?>