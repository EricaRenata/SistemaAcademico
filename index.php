<?php  
  include 'classes/funcoes.class.php'; 
  include 'classes/noticia.class.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SGA - Sistema de Gestao Acadêmica</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Sistema</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">SGA - Sistema de Gestao Acadêmica</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <a class="btn btn-danger pull-right margin-login" href="login.php"><span class="glyphicon glyphicon-user"></span> Fazer Login</a>
            </div>
          </div>
        </nav>

      </div>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="assets/imagens/ela.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Exemplo Noticia.</h1>
              <p>Descricao NoticiaDescricao NoticiaDescricao NoticiaDescricao NoticiaDescricao Noticia</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="first-slide" src="assets/imagens/news1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Exemplo Noticia.</h1>
              <p>Descricao NoticiaDescricao NoticiaDescricao NoticiaDescricao NoticiaDescricao Noticia</p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Proxima</span>
      </a>
    </div>
    <div class="container">
      <div class="row">
        <?php
          $objetoNoticia = new Noticia();
          $objetoNoticia->geraNoticia();
        ?>
      </div>
    </div>
    <footer class="text-center">
      <p>&copy; 2016 SGA, Inc. &middot; <a href="#">Privacidade</a> &middot; <a href="#">Termos</a></p>
    </footer>

    </div>
    <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
