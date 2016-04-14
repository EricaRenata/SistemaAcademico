<?php
  session_start();

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  include 'classes/funcoes.class.php';
  include_once 'classes/login.class.php';
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Login - SGA</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body data-alert="<?= (isset($_SESSION['mensagem'])) ? $_SESSION['mensagem'] : ''; ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 form-signin">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Login SGA</h3>
          </div>
          <div class="panel-body">
            <p>Bem-vindo ao SGA faça login para continuar</p>
            <form action="login.php" role="form" method="post">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Matricula" name="matricula" type="text">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                </div>
                <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Lembre-me"> Lembre-me
                  </label>
                </div>
                <button type="submit" class="btn btn-lg btn-success btn-block">Entrar</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
    $post = (Object) $_POST;
    if (count($_POST)) {
      $matricula = $post->matricula;
      $senha = $post->senha;
      $objetologin = new LoginUsuario();
      $objetologin->verificaLogin($matricula, $senha);
    }
  ?>
</body>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    if(document.querySelector('body').dataset.alert != '') {
      alert(document.querySelector('body').dataset.alert);
    }
  });
</script>
</html>