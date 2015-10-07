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
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/interface.js"></script>
</head>
<body>
<?php
include_once("globals.php");
echo NAVIGATION_BAR;
?>  
    <div id="ejercicios_menu" class="container">
        <div class="list-group ">
            <a id="ejercicio0" href="ejercicio-bnf?ejercicio=0" class="list-group-item glyphicon glyphicon-asterisk"> Gram&aacute;tica BNF
            </a>
            <a id="ejercicio1" href="ejercicios?ejercicio=1" class="list-group-item glyphicon glyphicon-asterisk"> Interfaz de Constantes
            </a>
            <a id="ejercicio3"href="ejercicios?ejercicio=3" class="list-group-item glyphicon glyphicon-asterisk"> Token
            </a>
            <a id="ejercicio2"href="ejercicios?ejercicio=2" class="list-group-item glyphicon glyphicon-asterisk"> Scanner 
            </a>
            <a id="ejercicio4" href="ejercicios?ejercicio=4" class="list-group-item glyphicon glyphicon-asterisk"> Parser
            </a>
        </div>  
    </div>      
</div>
</body>
</html>