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
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="pull-left circle-image col-sm-1"></div> 
             <div class="black-color  col-sm-8">
                 <h2 id="txtNombre"></h2>
                 <div class=" hidden-xs">
                    <p>Ejercicios completados : 0</p>     
                    <p>Porcentaje de avance: 0%</p>   
                    <p>Comentarios : 0</p>    
                </div>  
            </div>
        </div>        
    </div>      
    <div class="list-group ">
        <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-star"></span> Favoritos <span class="badge">0</span>
        </a>
        <a href="lecciones" class="list-group-item">
            <span class="glyphicon glyphicon-book"></span> Lecciones <span class="badge">3</span>
        </a>
        <a href="ejercicios-menu" class="list-group-item">
            <span class="glyphicon glyphicon-exclamation-sign"></span> Ejercicios <span class="badge">5</span>
        </a>
        <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-comment"></span> Comentarios <span class="badge">0</span>
        </a>
    </div>
</div>
</body>
</html>