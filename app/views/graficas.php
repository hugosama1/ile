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
    <script type="text/javascript" src="js/interface.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>
    <script type="text/javascript" src="js/legend.js"></script>
</head>
<body>
<?php
include_once("globals.php");
echo NAVIGATION_BAR;
?>  
    <div class="container">
        <canvas id="myChart" width="800" height="400" ></canvas>
       <div id="myLegend">
        </div>
    </div>      
</div>
</body>
</html>