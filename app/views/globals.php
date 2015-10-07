<?php
$nav =<<<Q
    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="menu-principal">ITC</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li ><a href="menu-principal"  >Home</a></li>
                    <li><a href="menu-principal" >About</a></li>
                    <li><a href="#" id="btnPostRedSocial"  data-toggle="modal" data-target="#exampleModal">Red Social</a></li>
                </ul>
            </div>
        </div>
    </nav>   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Red Social</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">T&iacute;tulo del tema:</label>
            <input type="text" class="form-control" id="txtTemaRedSocial">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Mensaje:</label>
            <textarea class="form-control" id="txtMensajeRedSocial"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnEnviarPost">Enviar</button>
      </div>
    </div>
  </div>
</div>
Q;
define("NAVIGATION_BAR",$nav);