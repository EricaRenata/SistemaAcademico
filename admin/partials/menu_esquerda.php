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
            $permissoes = $_SESSION['permissao'];
            $query_parts = array();
            foreach ($permissoes as $val) {
              $query_parts[] = "'%".mysql_real_escape_string($val)."%'";
            }

            $string = implode(' OR cd_modulo LIKE ', $query_parts);

            $modulos = $objetoModulos->query("select * from cad_modulo where cd_modulo LIKE {$string}")->result();
            $query_parts = array();
            foreach ($permissoes as $val) {
                $query_parts[] = "'%".mysql_real_escape_string($val)."%'";
            }

            $string = implode(' OR permissao LIKE ', $query_parts);
            $submodulos = $objetoModulos1->query("select * from cad_submodulo where permissao LIKE {$string}")->result();
            foreach ($modulos as $modulo) {
              foreach ($submodulos as $submodulo) {
                $permissoes = explode(',',$submodulo->permissao);
                if(in_array($modulo->cd_modulo, $permissoes)) {
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
                      <a href="<?= $submodulo->fonte; ?>"><span class="glyphicon glyphicon-option-horizontal"></span><?= $submodulo->nome_submodulo; ?></a>
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