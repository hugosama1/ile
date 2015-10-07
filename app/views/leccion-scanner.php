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
    <script type="text/javascript" src="js/live.js"></script>
</head>
<body>

<?php
include_once("globals.php");
echo NAVIGATION_BAR;
?>

    <div class="container">
        <div id="carousel-lesson" class="carousel slide" data-interval="0" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="carousel-content">
                                <div>
                                    <h3>Scanner</h3>
                                    <p> El analizador de léxico (scanner) toma una cadena de caracteres que forman la entrada y produce una cadena de nombres o identificadores, palabras claves o reservadas (PC) signos o marcas de puntuación, operadores aritméticos y lógicos, constantes (números, cadenas, etc.) y otros. También el scanner tiene como función desechar espacios en blanco y comentarios entre los tokens, otra función podría ser crear la tabla de símbolos.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>Tokens</h3>
                                    <p>Es una secuencia de caracteres tratados como una unidad en la gramática del Lenguaje de Programación. Un lenguaje de programación clasifica a los tokens en un conjunto finito de tipos de tokens.</p>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>Ejemplo</h3>    
                                    Dado un programa como:                      
                                    <pre>
Float match 0 (char * 5) /* encuentra un cero */
{
    If (!strncmp (5, “ 0.0” ,3))
        Return 0;
}
                                    </pre>
                                    El analizador de lexico retornara la cadena de tokens:  
<pre>
Float (pc), 
match0 (id), 
LPAREN, 
char(pc), 
star, 
S (id), 
RPAREN, 
LBRACE,
etc..
</pre>
                                </div>
                            </div>
                        </div>  
                </div>
            </div>
            <!-- Controls --> <a class="left carousel-control" href="#carousel-lesson" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
         <a class="right carousel-control" href="#carousel-lesson" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
    </div>

</body>
</html>