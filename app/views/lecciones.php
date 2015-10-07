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
    <script type="text/javascript" src="js/live.js"></script>
</head>
<body>
<?php
include_once("globals.php");
echo NAVIGATION_BAR;
?>
    <div class="container">
        <div class="list-group ">
            <a href="leccion-bnf" class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span> BNF 
            </a>
            <a href="leccion-scanner" class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span> Scanner
            </a>
            <a href="leccion-parser" class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span> Parser
            </a>
        </div>  
    </div>      
</div>
</body>
</html>