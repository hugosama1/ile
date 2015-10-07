<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Web Based Intelligent Learning Environment</title>
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
            <h1>Web Based Intelligent Learning Environment</h1>
            <p>Aprende en un ambiente diseñado especialmente para ti</p>
            <a id="btnFacebook" class="btn btn-block btn-md btn-social btn-facebook">
                 <i class="fa fa-facebook"></i> Log in con Facebook
                </a>
        </div>
        <div class="row">
            <div class=" black-color  col-sm-6">
               <div class="pull-left circle-image3"></div> <h2>Hugo G&oacute;mez</h2>
                <p>Web designer</p>
            </div>
            <div class=" black-color text-right  col-sm-6">
                <div class="pull-right circle-image2"></div><h2>Jos&eacute; Mej&iacute;a</h2>
                <p>Template Designer</p>
            </div>        
        </div>
        <hr>
        <div class="row">
            <div class="black-color  col-xs-12">
                <footer>
                    <p>&copy; INSTITUTO TECNOLÓGICO DE CULIACÁN</p>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>