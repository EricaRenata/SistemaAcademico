<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search">
        <div class="input-group custom-search-form">
          <input type="text" class="form-control" placeholder="Pesquisa...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </span>
        </div>
      </li>
      <li>
        <a href="#"><i class="glyphicon glyphicon-tasks"></i> Módulos</a>
        <ul class="nav nav-second-level">
          <?php
            $objetoModulos = new Database();
            $objetoModulos1 = new Database();
            $modulos = $objetoModulos->query("select * from cad_modulo")->result();
            $submodulos = $objetoModulos1->query("select * from cad_submodulo")->result();
            foreach ($modulos as $modulo) {
              foreach ($submodulos as $submodulo) {
                if($modulo->cd_modulo == $submodulo->cd_modulo) {
                  $modulo->submodulos[] = $submodulo;
                }
              }
            }
            foreach ($modulos as $modulo) : ?>
              <li>
                <a href="#"><span class="glyphicon glyphicon-modal-window"></span> <?= $modulo->nome_modulo; ?></a>
                <?php if(isset($modulo->submodulos) && count($modulo->submodulos)) : ?>
                  <ul class="nav nav-third-level">
                  <?php foreach ($modulo->submodulos as $submodulo) : ?>
                    <li>
                      <a href="#"><span class="glyphicon glyphicon-option-horizontal"></span><?= $submodulo->nome_submodulo; ?></a>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </li>

          <?php endforeach; ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>