<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand">Sistema de Gestao Academica</a>
</div>
<ul class="nav navbar-top-links navbar-right">
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="glyphicon glyphicon-envelope"></i> Mensagens
    </a>
    <ul class="dropdown-menu dropdown-messages">
      <li>
        <a href="#">
          <div>
              <strong>Erica Gomes</strong>
              <span class="pull-right text-muted">
                  <em>Hoje</em>
              </span>
          </div>
          <div>Descricao de mensagem...</div>
        </a>
      </li>
      <li class="divider"></li>
    </ul>
  </li>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <i class="glyphicon glyphicon-list-alt"></i> Provas
    </a>
    <ul class="dropdown-menu dropdown-tasks">
      <li>
        <a href="#">
          <div>
            <p>
                <strong>Prova DB</strong>
                <span class="pull-right text-muted">7</span>
            </p>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%">
                    <span class="sr-only">7</span>
                </div>
            </div>
          </div>
        </a>
      </li>
      <li class="divider"></li>
    </ul>
  </li>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <i class="glyphicon glyphicon-globe"></i> Notificacoes
    </a>
    <ul class="dropdown-menu dropdown-alerts">
      <li>
        <a href="#">
          <div>
            <i class="glyphicon glyphicon-user"></i> Turma Adicionada
            <span class="pull-right text-muted small">4 minutos atraz</span>
          </div>
        </a>
      </li>
      <li class="divider"></li>
    </ul>
  </li>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <i class="glyphicon glyphicon-user"></i> <?= $_SESSION['nome']; ?>
    </a>
    <ul class="dropdown-menu dropdown-user">
      <li><a href="#"><i class="glyphicon glyphicon-user"></i> Ver Perfil</a></li>
      <li><a href="logout.php"><i class="glyphicon glyphicon-user"></i> Sair</a></li>
    </ul>
  </li>
</ul>