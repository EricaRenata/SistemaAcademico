<?php 
  include '../classes/funcoes.class.php'; 
  include '../classes/aluno.class.php'; 
  include '../classes/notas.class.php'; 
   include '../classes/curso.class.php'; 
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
      <table class="table table-bordered">
        <thead>
          <tr>
            <td width="200" class="text-center"> Data </td> 
            <td width="150" class="text-center"> Horário </td> 
            <td width="450" class="text-center"> Componente </td> 
          </tr>
        </thead>
        <tbody>
          <?php for($i = 0; $i < 12; $i++) : ?>
            <tr>
               <td>&nbsp;</td>  
               <td>&nbsp;</td>
               <td>&nbsp;</td> 
            </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div>  
    <div class="col-md-6"> 
      <input type="button"  name="imprimir"   class="btn btn-primary btn-block" value="Imprimir" onclick="window.print()";>
    </div>
  </div>
</form>
<?php Funcoes::geraFooter("notas"); ?>