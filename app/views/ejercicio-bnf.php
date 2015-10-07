<!DOCTYPE html>
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

    <script type="text/javascript" src="js/interface.js"></script>
</head>
<body>
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

    <div class="col-md-12">
        <h3> Dada la siguiente gramática, escribir 3 estatutos aceptados por el lenguaje formal: </h3>
    </div>
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
        <textarea id="txtEntrada" class="form-control"></textarea>
        <button id ="btnEnviar" type="submit" class="btn btn-default"> ENVIAR</button>
        <div class"clearfix"></div>
        <div class="alert  alert-block fade" role="alert">
            <button type="button" class="close" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
    </div>

<video id = "video" width = "500px" height = "500px"></video>
<canvas id="canvas"></canvas>

</div>
</body>
</html>