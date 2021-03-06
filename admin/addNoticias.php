
<?php
  include '../classes/funcoes.class.php';
  include '../classes/noticia.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
  $dados = (Object) $_POST;

  if(count($_POST) && $dados->acao == "Salvar") {
    $itens['tit_noticia'] = (isset($dados->tit_noticia)) ? $dados->tit_noticia : null;
    $itens['posicao']     = (isset($dados->posicao)) ? $dados->posicao : null;
    $itens['categoria']   = (isset($dados->categoria)) ? $dados->categoria : null;
    $itens['permissao']     = (isset($dados->permissao)) ? $dados->permissao : null;
    $itens['desc_noticia']     = (isset($dados->desc_noticia)) ? $dados->desc_noticia : null;
    $itens['foto']     = $_FILES['arquivo']['name'];
    $novaPasta = '../uploads/noticias/'.basename($_FILES['arquivo']['name']);
    $objetoNoticia = new Noticia();
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $novaPasta)) {
      $objetoNoticia->gravaNoticia($itens);
    }
  }
?>
  <form action="addNoticias.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-3">
        <input type="file" id="noticia" name="arquivo" style="display: none;" onchange="previewUpload(this)" />
        <img src="../assets/imagens/img.svg" alt="" class="img-thumbnail foto-noticia">
      </div>
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">Título de Notícias</label>
          <input type="text" class="form-control" id="inputSuccess1" value="" placeholder="Titulo da Noticia" name="tit_noticia" aria-describedby="helpBlock2">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group has-success">
          <label class="control-label" for="inputError1">Categoria</label>
           <select class="form-control" name="categoria" placeholder="Categoria">
            <option value="1">Vagas </option>
            <option value="2">Cursos</option>
            <option value="3">Extra</option>
            <option value="4">Urgente</option>
          </select>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group has-success">
          <label class="control-label" for="inputError1">Permissão</label>
           <select class="form-control" name="permissao" placeholder="Permissão">
            <option value="1">Aluno</option>
            <option value="2">Professor</option>
            <option value="3">Visitante</option>
            <option value="4">Todos</option>
          </select>
        </div>
      </div>
    <div class="row margin-10">
      <div class="col-md-12">
        <div>
          <label class="control-label" for="inputError1">Descrição da Notícias:</label>
        </div>
          <textarea class="form-control" rows="10" name="desc_noticia"> </textarea>
      </div>
    </div>
    <div class="row margin-10">
      <div class="col-md-3">
        <button type"submit" value="Salvar" name="acao" class="btn btn-primary form-control">Salvar</button>
      </div>
    </div>
    </div>
  </form>
 <?php Funcoes::geraFooter(); ?>