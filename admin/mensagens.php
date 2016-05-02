<?php
  include '../classes/funcoes.class.php';
  include '../classes/curso.class.php';
  include '../classes/disciplina.class.php';
  Funcoes::geraHeader();
  Funcoes::geraMenus();
?>
<div class="row">
  <div class="col-sm-12 col-md-12">
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Nova Mensagem">
      <span class="glyphicon glyphicon-refresh"></span> Nova Mensagem  
    </button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Atualizar">
      <span class="glyphicon glyphicon-refresh"></span>   
    </button>
    <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Mais <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Marcar Todas Como Lida</a></li>
      </ul>
    </div>
    <div class="pull-right">
      <span class="text-muted"><b>1</b>–<b>50</b> de <b>80</b></span>
      <div class="btn-group btn-group-sm">
        <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </button>
        <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<hr />
<div class="row">
  <div class="col-sm-12 col-md-12">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#home" data-toggle="tab">
          <span class="glyphicon glyphicon-inbox"></span>
          Caxa de Entrada
        </a>
      </li>
      <li>
        <a href="#profile" data-toggle="tab">
          <span class="glyphicon glyphicon-user"></span>Enviadas</a>
      </li>
      <li>
        <a href="#messages" data-toggle="tab">
          <span class="glyphicon glyphicon-tags"></span>
          Salvas
        </a>
      </li>
      <li>
        <a href="#settings" data-toggle="tab">
          <span class="glyphicon glyphicon-plus no-margin"></span>
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in active" id="home">
        <div class="list-group">
          <a href="#" class="list-group-item">
            <div class="checkbox">
                <label>
                    <input type="checkbox">
                </label>
            </div>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="name" style="min-width: 120px;display: inline-block;">Eliseu dos Santos</span>
            <span class="">Titulo da Mensagem</span>
            <span class="text-muted" style="font-size: 11px;">- Descrição</span>
            <span class="badge">12:10 AM</span>
            <span class="pull-right">
              <span class="glyphicon glyphicon-paperclip"></span>
            </span>
            </a>
        </div>
      </div>
      <div class="tab-pane fade in" id="profile">
        <div class="list-group">
          <div class="list-group-item">
              <span class="text-center">Descrição da mensagem.</span>
          </div>
        </div>
      </div>
      <div class="tab-pane fade in" id="messages"></div>
      <div class="tab-pane fade in" id="settings">This tab is empty.</div>
    </div>
  </div>
</div>

<?php Funcoes::geraFooter(); ?>