<!DOCTYPE html>
<html>
<head>
  <title>Login - SGA</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 form-signin">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Login SGA</h3>
          </div>
          <div class="panel-body">
            <p>Bem-vindo ao sga faca login para continuar</p>
            <form accept-charset="UTF-8" role="form">
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
                <a class="btn btn-lg btn-success btn-block" href="admin/">Entrar</a>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>