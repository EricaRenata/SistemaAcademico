<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
  include '../classes/curso.class.php'; 
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<form action="verNotas.php" method="post">
  <div class="row">
    <div class="col-md-12 form-group">
     <label class="labelcurso" for="exampleInputEmail1">Selecione o curso:</label>
     <select class="form-control" name="cd_curso" onchange="submit()">
            <?php
              $objetoCurso = new Curso();
                $listaCurso = $objetoCurso->getCursosPorId($_SESSION['cd_aluno']);
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
  <table class="table table-hover">
   <thead>
    <tr>
      <td class="text-left"> Disciplina </td> 
      <td class="text-center"> Nota 1 </td> 
      <td class="text-center"> Nota 2 </td> 
      <td class="text-center"> Status </td> 
   </thead>
    </tr>
      <tbody>
      <?php
      $objetoNotas = new Notas();
     $resultado = $objetoNotas->getNotas($_SESSION['cd_aluno']);
      ?>
      <?php foreach ($resultado as $notas): ?>
      <tr>
        <td><?= $notas->descricao; ?></td>  
        <td class="text-center"><?= $notas->nota1; ?></td>
        <td class="text-center"><?= $notas->nota1; ?></td> 
        <td class="text-center"><?= ($notas->status == 0) ? 'Reprovado' : 'Aprovado'; ?></td> 
      </tr>
      <?php endforeach; ?>
      </tbody>
  </table>
    </div>
    <div class="col-md-6">
      <input type="button"  name="imprimir"   class="btn btn-primary btn-block imprimi-notas" value="Imprimir" onclick="window.print()";>
    </div>
</form>
<?php Funcoes::geraFooter(); ?>