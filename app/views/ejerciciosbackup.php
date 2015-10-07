<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Web Based Intelligent Learning Enviroment</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/ile.css">
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/live.js"></script>
    <script type="text/javascript" src="js/interface.js"></script>
</head>
<body>
        <!-- Brand and toggle get grouped for better mobile display -->
<?php
include_once("globals.php");
echo NAVIGATION_BAR;
?>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="pull-left circle-image col-sm-1"></div> 
             <div class="black-color  col-sm-8">
                 <h2 id="txtNombre"></h2>
                 <div class=" hidden-xs">
                    <p>Avance en el ejercicio:</p>   
                    <div class="progress">
                      <div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                        0% 
                      </div>
                    </div>
                </div>  
            </div>
        </div>        
    </div>   
        <div class="col-md-6">
            <a href="#" id="btnExplicacion"><i class="fa fa-exclamation-circle"></i></a>
            <h3> Elija la respuesta correcta: </h3>
            <div class="list-group " id="answers">
            </div>
        </div>
        <div class="black-color  col-md-6">
            <h3> Avance incremental de la clase </h3>
            <textarea id="txtLecciones" title="TUTOR" data-content="" rows="20" readonly="readonly"class="form-control"></textarea>
        </div>
    </div>      
        <div class="alert alert-danger alert-block fade col-md-3 col-md-offset-3" role="alert">
            <button type="button" class="close" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
<div class="modal fade" id="explicacionModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1 class="modal-title" id="exampleModalLabel">Apoyo</h4>
      </div>
      <div class="modal-body">        
        <h3> Toma en cuenta que el lenguaje formal para el compilador es el siguiente: </h1>
                                                <pre>
&lt;program&gt; ::= &lt;Print&gt; |                 
              &lt;IF&gt; |
              &lt;EOF&gt;
&lt;print&gt; ::= System.out.println ( &lt;Exp&gt; ) ;
&lt;Exp&gt; ::= &lt;TRUE&gt; |                 
          &lt;FALSE&gt; |
          &lt;IDENTIFIER&gt;
&lt;IF&gt; ::=   if ( &lt;IDENTIFIER&gt; ) &lt;TRUE&gt; else &lt;FALSE&gt;
&lt;TRUE&gt; ::= true
&lt;FALSE&gt; ::= false
</pre>
    </div>
  </div>
</div>
</body>
</html>