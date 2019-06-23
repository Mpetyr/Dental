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
          <a class="dropdown-toggle rango nombreHallazgo" id="dropdownOortoFijo" data-hallazgo="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Aparato Orto. Fijo
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownOortoFijo">
            <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
            <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <img src="<?= base_url() ?>assets/odontograma/images/AparatoOrtodonticoRemovibleIcono.png">
          <a class="dropdown-toggle rango nombreHallazgo" data-hallazgo="2" id="dropdownOrtoRemovible" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Aparato Orto. Removible
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownOrtoRemovible">
            <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
            <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
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
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="3" data-sigla="CM" href="#"><b>CM:</b> Corona Metálica</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="3" data-sigla="CF"  href="#"><b>CF:</b> Corona Fenestrada</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="3" data-sigla="CMC" href="#"><b>CMC:</b> Corona Metal Cerámica</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="3" data-sigla="CV" href="#"><b>CV:</b> Corona Veneer</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="3" data-sigla="CJ" href="#"><b>CJ:</b> Corona Jacket</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo"  class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo" id="dropdownCoronaTemporal" data-hallazgo="37" data-sigla="CT" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Corona Temporal
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownCoronaTemporal">
            <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
            <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle" id="dropdownCoronaDefinitiva" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Defectos de Desarrollo del Esmalte
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="5" data-sigla="HP" href="#"><b>HP:</b> Hipoplasia</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="5" data-sigla="HM"  href="#"><b>HM:</b> Hipo Mineralización</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="5" data-sigla="O" href="#"><b>O:</b> Opacidades del Esmalte</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="5" data-sigla="D" href="#"><b>D:</b> Decoloración del Esmalte</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a tabindex="-1" class="nombreHallazgo" data-hallazgo="5" data-sigla="Fluorosis" href="#"><b>Fluorosis:</b> Fluorosis</a>
              <ul class="dropdown-menu">
                <li><a href="#" data-estado="bueno" class="odontograma-item"><i class="fa fa-thumbs-o-up buen"></i>Buen Estado</a></li>
                <li><a href="#" data-estado="malo" class="odontograma-item"><i class="fa fa-thumbs-o-down mal"></i>Mal Estado</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo odontograma-item" data-hallazgo="17">
            Diastema
          </a>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo odontograma-item" data-hallazgo="9">
            Pieza Dentaria Ausente
          </a>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo odontograma-item" data-hallazgo="21" data-sigla="E">
            Pieza Dentaria Ectópica
          </a>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo odontograma-item" data-hallazgo="20">
            Pieza Dentaria en Clavija
          </a>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo odontograma-item" data-hallazgo="10">
            Pieza Dentaria en Erupción
          </a>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo odontograma-item" data-hallazgo="15">
            Pieza Dentaria  Extruida
          </a>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle nombreHallazgo odontograma-item" data-hallazgo="16">
            Pieza Dentaria Intruida
          </a>
        </li>
        <li>
          <img src="<?= base_url() ?>assets/odontograma/images/interrogacion.png">
          <a class="dropdown-toggle rango nombreHallazgo odontograma-item" data-hallazgo="13">
            Edentulo Total
          </a>
        </li>
      </ul>
      <br>
      <button id="BotonNombreSeleccionado" class="btn btn-flat btn-block" style="display: none"></button>
      <button id="BotonSeleccion" class="btn btn-flat btn-lg btn-info btn-block">Seleccione</button>
      <br>
    </div>
    <div role="tabpanel" class="tab-pane" id="GP">GP</div>
    <div role="tabpanel" class="tab-pane" id="RT">RT</div>
    <div role="tabpanel" class="tab-pane" id="Detalle">Dtalle</div>
  </div>
</div>