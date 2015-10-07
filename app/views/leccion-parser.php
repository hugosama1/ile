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
                                    <h3>Parser</h3>
                                    <p> El parser es el programa que funciona como núcleo del compilador. Alrededor del parser funcionan los demás programas como el escáner, el analizador semántico y el generador de código intermedio. De hecho se podría decir que el parser comienza el proceso de compilación y su primer tarea es pedir al escáner que envíe los tokens necesarios para llevar a cabo el análisis sintáctico, del estatuto, expresión o declaración dentro de un programa. También el parser llama rutinas del análisis semántico para revisar si el significado del programa es el correcto. Por ultimo el parser genera código intermedio para los estatutos y expresiones si no se encontraron errores en ellos.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>Descripción gráfica</h3>
                                    <img src="img/parser.jpg" data-src="img/parser.jpg" alt="Imagen Parser">
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>El parser dentro del tutor</h3>    
                                    La gram&aacute;tica presentada en BNF:                       
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
                                    Contiene los elementos que el parser tiene que tomar en cuenta a la hora de evaluar los token que devuelve el escaner y asi poder determinar si el texto ingresado es correcto sintácticamente.
                                </div>
                            </div>
                        </div>  
                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>Ejemplo</h3>                     
                                    <pre>
void Program() throws ParseException {
    switch ((jj_ntk==-1)?jj_ntk_f():jj_ntk) {
    case SYSTEM_OUT:{
      Print();
      break;
      }
    case IF:{
      If();
      break;
      }
    case EOF:{
      jj_consume_token(0);
      break;
      }
    default:
      jj_la1[0] = jj_gen;
      jj_consume_token(-1);
      throw new ParseException();
    }
  }
                                    </pre>
                                    Se puede observar en una pequeña parte de la implementación del parser, como la sentencia "Program" es representada en un switch con 3 casos: "print","if","EOF"(archivo vacio). Tal y como es indicado en la gramática.
                                </div>
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