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
        <div id="carousel-lesson" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="carousel-content">
                                <div>
                                    <h3>BNF</h3>
                                    <p> Es un acrónimo de "Backus Naur Form". John Backus y Peter Naur introdujeron por primera vez una notación formal para describir la sintaxis de un lenguaje determinado. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>Meta-Simbolos</h3>
                                    <dl compact="">
                                    <dt><b>::=</b></dt><dd>que significa "definido como"
                                    </dd><dt><b>|</b></dt><dd>  significa "o"
                                    </dd><dt><b>&lt; &gt;</b></dt><dd>usados para rodear nombres de categor&iacute;as
                                    </dd></dl>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>Ejemplo</h3>                            
                                    <pre>&lt;program&gt; ::=  program
                   &lt;declaration_sequence&gt;
               begin
                   &lt;statements_sequence&gt;
               end ;
</pre>

Esto muestra como un mini-lenguaje consiste de la palabra clave programa
seguido de la secuencia de declarac&iacute;on, continuando con "begin" y estatutos de secuencia,
terminando finalmente con la palabra "end" y punto y coma.
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <h3>Lenguaje Micro Java</h3>                            
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