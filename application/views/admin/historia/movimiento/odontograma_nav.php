<style>
.odontograma-navegacion{
  list-style: none;
  padding: 0;
  margin: 0;
  margin-top: 10px;
  cursor: pointer;
}

.odontograma-navegacion a,.dropdown-menu>li>a{
  color: #333;
}



.odontograma-navegacion>li{
  padding: 2px;
  background: none;
}

.odontograma-navegacion>li button{
  border: none;
  background: none;
  padding: 0;
}

.odontograma-navegacion .dropdown-menu{
  padding: 0;
}

.odontograma-navegacion .dropdown-menu li{
  padding: 0;
}

.odontograma-navegacion .dropdown-menu li>a>i.buen{
  color: #00D900;
}
.odontograma-navegacion .dropdown-menu li>a>i.mal{
  color: #FF0000;
}

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: -160px;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: left;
    width: 0;
    height: 0;
    left: 10px;
    top: 3px;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 5px 5px 0;
    border-right-color: #333;
    margin-top: 5px;
    margin-right: -10px;
    position: absolute;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #333;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>
<script src="<?= base_url() ?>assets/odontograma/js/main.js?v=<?= time() ?>"></script>
<div id="odontograma-navegacion">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#AF" aria-controls="AF" role="tab" data-toggle="tab">A-F</a></li>
    <li role="presentation"><a href="#GP" aria-controls="GP" role="tab" data-toggle="tab">G-P</a></li>
    <li role="presentation"><a href="#RT" aria-controls="RT" role="tab" data-toggle="tab">R-T</a></li>
    <li role="presentation"><a href="#Detalle" aria-controls="Detalle" role="tab" data-toggle="tab">Detalle</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="AF">
      <ul class="odontograma-navegacion">
        <li class="dropdown">
          <img src="<?= base_url() ?>assets/odontograma/images/AparatoOrtoIcono.png">
          <a class="dropdown-toggle" id="dropdownOortoFijo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Aparato Orto. Fijo
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownOortoFijo">
            <li><a href="#" data-hallazgo="1" data-estado="1" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
            <li><a href="#" data-hallazgo="1" data-estado="2" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <img src="<?= base_url() ?>assets/odontograma/images/AparatoOrtodonticoRemovibleIcono.png">
            <a class="dropdown-toggle" id="dropdownOrtoRemovible" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Aparato Orto. Removible
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownOrtoRemovible">
              <li><a href="#" data-hallazgo="2" data-estado="1" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
              <li><a href="#" data-hallazgo="2" data-estado="2" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
            </ul>
        </li>
        <li class="dropdown">
          <img src="<?= base_url() ?>assets/odontograma/images/CoronaDefinitivaIcono.png">
            <a class="dropdown-toggle" id="dropdownCoronaDefinitiva" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Corona
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><b>CM:</b> Corona Metálica</a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-hallazgo="3" data-estado="1" data-sigla="CM" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                  <li><a href="#" data-hallazgo="3" data-estado="2" data-sigla="CM" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><b>CF:</b> Corona Fenestrada</a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-hallazgo="3" data-estado="1" data-sigla="CF" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                  <li><a href="#" data-hallazgo="3" data-estado="2" data-sigla="CF" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><b>CMC:</b> Corona Metal Cerámica</a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-hallazgo="3" data-estado="1" data-sigla="CMC" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                  <li><a href="#" data-hallazgo="3" data-estado="2" data-sigla="CMC" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><b>CV:</b> Corona Veneer</a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-hallazgo="3" data-estado="1" data-sigla="CV" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                  <li><a href="#" data-hallazgo="3" data-estado="2" data-sigla="CV" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><b>CJ:</b> Corona Jacket</a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-hallazgo="3" data-estado="1" data-sigla="CJ" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                  <li><a href="#" data-hallazgo="3" data-estado="2" data-sigla="CJ" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
                </ul>
              </li>
            </ul>
        </li>
      </ul>
      <br>
      <button id="BotonNombreSeleccionado" class="btn btn-flat btn-default btn-block" style="display: none"></button>
      <button id="BotonSeleccion" class="btn btn-flat btn-lg btn-default btn-block">Seleccione</button>
      <br>
    </div>
    <div role="tabpanel" class="tab-pane" id="GP">GP</div>
    <div role="tabpanel" class="tab-pane" id="RT">RT</div>
    <div role="tabpanel" class="tab-pane" id="Detalle">Dtalle</div>
  </div>

</div>