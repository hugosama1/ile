    //facebook init
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '165874483497773',
          xfbml      : true,
          version    : 'v2.1'
        });   
                Interface.login();           
        
      };
    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/es_LA/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

var Interface =
{
    excerciseNumber:0,
    excercises:null,
    userID: null,
    accessToken: null,
    userName: null,
    exercise_id:null,
    exercise_progress:0,
    api_url:'/laravelile/public/api/',
    exercise_time:0,
    start_time:null,
    accepted_video:false,
    init: function(){
        this.events();
        this.setCarouselHeight('#carousel-lesson');
        this.loadExcercise();

    },
    events:function()
    {
        $(".close").click(function(){
            $(".alert").removeClass("in");
        });
        $("#btnExplicacion").click(function(){
            $("#explicacionModal").modal("toggle");
        });
        /*$(".opcion").click(function(){              
            $(".alert").contents().filter(function(){ return this.nodeType != 1; }).remove();
            $.get( "http://localhost:8080/tutor/query",  { "input": $(this).text() },function( data ) {
                $(".alert").append(data.mensaje).addClass("in").alert();
            });
        });*/
        $("#btnEnviar").click(function(){             
            $(".alert").contents().filter(function(){ return this.nodeType != 1; }).remove();
             $.post( Interface.api_url + "get_bnf_response",  { "input": $("#txtEntrada").val() },function( data ) {
                console.log(data);
                if( data.mensaje === "Parse Success") {
                    $(".alert").append(data.mensaje).addClass("in alert-success").removeClass("alert-danger").alert();
                    Interface.exercise_progress = Interface.exercise_progress == 66 ? 100 : Interface.exercise_progress+33;
                    if( Interface.exercise_progress <= 100) {
                        Interface.increaseProgress(Interface.exercise_progress);                        
                    }
                }else {
                    
                    $(".alert").append(data.mensaje).addClass("in alert-danger").removeClass("alert-success").alert();
                }
             });
        });
/*
        // Get context with jQuery - using jQuery's .get() method.
        var ctx = $("#myChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var myNewChart = new Chart(ctx);
        var options =  {
             multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
        }
        var data = {
            labels: ["paso 1", "paso 2", "paso 3", "paso 4", "paso 5", "paso 6", "paso 7"],
            datasets: [
                {
                    label: "Interfaz de Constantes",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Parser",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var myLineChart = new Chart(ctx).Line(data, options);
        legend(document.getElementById('myLegend'), data);*/

        if($("#ejercicios_menu").length) {
            Interface.get("finished_exercises");
        }
        $("#btnEnviarPost").click(function(){
            Interface.postSubjectToSocialNetwork($("#txtTemaRedSocial").val(),$("#txtMensajeRedSocial").val());
        });

        $("#btnSiguiente").click(function(){
            Interface.nextExercise();
        });

        $("#btnFacebook").click(function(){    
             Interface.login(true);
        });
        //cuando llegue al final del scroll continuar al menu principal en la introducciòn
        if( window.location.pathname.indexOf("introduccion")  > -1 )
        {
            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() == $(document).height()) {
                    window.location.href = 'menu-principal';
                }
            });            
        }


    },get: function(id,callback) {
        switch(id) {
            case 'picture':
                    FB.api(
                        "/me/picture",
                        {
                            "redirect": false,
                            "height": "100",
                            "type": "normal",
                            "width": "100"
                        },
                        function (response) {
                          if (response && !response.error) {
                            $(".circle-image").css("background-image","url("+response.data.url+")");
                          }                          
                        }
                    );
                break;
            case 'email':
                if( !Interface.userEmail) 
                {
                    FB.api(
                        "/me",
                        function (response) {
                          if (response && !response.error) {
                            Interface.first_name  = response.first_name;
                            Interface.last_name = response.last_name;
                            Interface.userName = response.name;
                            $("#txtNombre").html(response.name);
                            Interface.userEmail = response.email;
                            callback(response.email);                            
                          }                          
                        }
                    );
                } else {
                    callback(Interface.userEmail);
                }
                break;
            case 'finished_exercises':
                $.post( Interface.api_url + "finished_exercises",  {user_id:Interface.userID},function(data){
                    console.log(data);
                    if(data) {
                        $.each(data,function(k,v){
                            $("#ejercicio"+v.exercise_id).addClass("glyphicon glyphicon-ok").removeClass("glyphicon-asterisk")
                        });
                    }
                });
        }
    },login: function(button){       
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                Interface.userID = uid;
                Interface.accessToken = accessToken;
                Interface.get("picture");
                Interface.get("email",function(){Interface.save("login")});
            }  else {    
                if ( ! $("#btnFacebook").length )
                window.location.href = '/laravelile/public';
            }
            Interface.init();
        });
        if(button) {
            FB.login(function(response) {
                if (response.authResponse) {    
                    window.location.href = 'introduccion';
                } else {    
                   alert("Es necesario autorizar con facebook");
                }
             },{scope: 'email'}); 
        }
    },
    takepicture :function () {
        if( !Interface.accepted_video ) {
            alert("POR FAVOR ACEPTE EL USO DE LA WEBCAM");
            return;
        }
      canvas.width = 500;
      canvas.height = 500;
      canvas.getContext('2d').drawImage(document.querySelector('#video'), 0, 0, 500, 500);
      var data = canvas.toDataURL('image/png');
      Interface.save("picture",data);
    },
    loadEmotionDetection: function(){
        navigator.getMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia);
        navigator.getMedia(
        // constraints
        {video:true, audio:false},
        // success callback
        function (mediaStream) {
            Interface.accepted_video = true;
            var video = document.getElementsByTagName('video')[0];
            video.src = window.URL.createObjectURL(mediaStream);
            video.play();
        },   
        //handle error
        function (error) {
            alert("POR FAVOR ACEPTE EL USO DE LA WEBCAM");
        });  
    },
    loadExcercise: function() {
        var ejercicio = Interface.getUrlParameter("ejercicio");
        Interface.exercise_id = ejercicio;
        if( ejercicio) {
            $.getJSON( "js/ejercicio"+ejercicio+".json", function( data, textStatus, jqxhr ) {
                Interface.excercises = data.excercises;
                console.log(data);
                $.post( Interface.api_url + "last_exercise",  {user_id:Interface.userID ,exercise_id:Interface.exercise_id},function(data) {
                    Interface.loadEmotionDetection();
                    Interface.excerciseNumber = data.step_number;
                    Interface.start_time = (new Date()).getTime();
                    Interface.cont = 0;
                    Interface.interval = window.setInterval(function(){
                      Interface.takepicture();
                      Interface.cont++;
                      if( Interface.cont == 20) {
                        window.clearInterval(Interface.interval);
                      }
                    }, 5000);
                    if(Interface.excerciseNumber == 0 ) {
                        Interface.getNextAnswers();
                    } else {
                        Interface.nextExercise();
                    }
                });
            });   
            if( ejercicio == 0)  {
                Interface.loadEmotionDetection();
                Interface.start_time = (new Date()).getTime();
                Interface.cont = 0;
                Interface.interval = window.setInterval(function(){
                  Interface.takepicture();
                  Interface.cont++;
                  if( Interface.cont == 20) {
                    window.clearInterval(Interface.interval);
                  }
                }, 5000);
            }       
        }
    },
    postSubjectToSocialNetwork: function(subject,description){
        Interface.get("email",function(email){
            var datos = {"email":email,"tema":subject,"descripcion":description};
            $.getJSON("http://192.168.1.88:8080/pruebas/RedSocial/public_html/webserviceforo.php?callback=?",datos,function(data){
                $('#exampleModal').modal('toggle');
            });            
        });
    },
    loadToolTips:function(){ 
        $.getJSON("http://192.168.1.88:8080/pruebas/RedSocial/public_html/webservice.php?callback=?","opcion=wile",function(data){
            $.each(data.words,function(k,v){
                $('div.popover-content').html($('div.popover-content').html().replace(new RegExp(eval('/'+v.word+'/g')), '<a href="#" data-toggle="tooltip" title="'+v.descripcion+'">'+v.word+'</a>'));  
                $('[data-toggle="tooltip"]').tooltip({
                    'placement': 'top'
                });   
            });
        });
    },
    clearError:function() {
        $(".alert").contents().filter(function(){ return this.nodeType != 1; }).remove();
        $(".alert").removeClass("in");
    },
    getError:function(error) {
        this.clearError();
        $(".alert").append(error).addClass("in").alert();
        Interface.save("time",false);
    },
    getNextAnswers: function() {  
        //regresando y guardando en caso de ser el ultimo
        if( this.excerciseNumber > Interface.excercises.length -1 )  {
            console.log("paso");
            Interface.save("finished_exercise",Interface.getUrlParameter("ejercicio"))
            return;            
        }
        //en caso de haber ejercicio dificil, ponerlo, esto es temporal!
        /*if( Interface.excercises[this.excerciseNumber].answer_hard) {
            var answer = Interface.excercises[this.excerciseNumber].answer_hard;
           $("#answers").append( '<a  class="list-group-item">' +answer.text.join("\n") +'</a>');
           $("#answers").append('<input type="text" id="txtAnswer" class="col-md-8" style="margin-right: 15px;"></button>');
           $("#answers").append('<button class="btn btn-primary">Enviar</button>');
           return;
        }*/

        //limpiando
        $("#answers").html("");
        this.clearError();    
        $.each(Interface.excercises[this.excerciseNumber].answers,function(k,v) {
            if( v.rightAnswer) {
               $("#answers").append( '<a href="#" onClick="Interface.nextExercise(true)" class="list-group-item">' +v.text.join("\n") +'</a>');
            } else {
                $("#answers").append( '<a href="#" onClick="Interface.getError(\''+ (v.error || "Respuesta Incorrecta")+'\')" class="list-group-item">' +v.text.join("\n") +'</a>');
            }
        });
        //Re ordenando la lista para que sea aleatoria la respuesta correcta
        var ul = document.querySelector('#answers');
        for (var i = ul.children.length; i >= 0; i--) {
            ul.appendChild(ul.children[Math.random() * i | 0]);
        }     
    },
    increaseProgress:function(progress) {
        $(".progress-bar").attr("aria-valuenow",progress).text(progress + "%").css("width",progress + "%");    
    },
    nextExercise: function(answer)
    {
        var txt="",progress="0",explanation="";
        console.log(this.excercises);
        progress = this.excercises[this.excerciseNumber].progress 
        explanation = this.excercises[this.excerciseNumber].explanation;
        //no salvar el tiempo a menos que respondiera correcto
        if(answer) {
            Interface.save("time",true);
            Interface.start_time = (new Date()).getTime();
            Interface.takepicture();
        }
        txt = Interface.excercises[this.excerciseNumber].incrementalText.join("\n");
        $("#txtLecciones").text(txt).attr("data-content",explanation).popover({container: 'body'}).popover('show');
        this.increaseProgress(progress);
        this.excerciseNumber++;
        this.getNextAnswers();
        this.loadToolTips();
    },
    setCarouselHeight : function(id)
    {
        var slideHeight = [];
        $(id+' .item').each(function()
        {
            // add all slide heights to an array
            slideHeight.push($(this).height());
        });

        // find the tallest item
        max = Math.max.apply(null, slideHeight);
        // set the slide's height
        $(id+' .carousel-content').each(function()
        {
            $(this).css('height',max+'px');
        });
    },save:function(id,data){
        switch(id) {
            case 'login': 
                $.post( Interface.api_url + "login",  { "id": Interface.userID,"email": Interface.userEmail,"first_name": Interface.first_name ,"last_name": Interface.last_name  });
                break;
            case 'excercise':
                $.post( Interface.api_url + "save_exercise",  {user_id:Interface.userID ,exercise_id:Interface.exercise_id,correct:data,step_number:Interface.excerciseNumber});
                break;
            break;
            case 'finished_exercise':
                $.post( Interface.api_url + "save_finished_exercise",  {user_id:Interface.userID ,exercise_id:Interface.exercise_id});
                break;
            break;
            case 'time':
                console.log(Interface.excerciseNumber);
                var endTime = (new Date()).getTime();
                var time = Math.round( (endTime - Interface.start_time ) / 1000 );
                $.post( Interface.api_url + "save_time",  {user_id:Interface.userID ,exercise_id:Interface.exercise_id,correct:data,step_number:Interface.excerciseNumber,time:time});
                break;
            break;
            case 'picture':
                var endTime = (new Date()).getTime();
                var time = Math.round( (endTime - Interface.start_time ) / 1000 );
                $.post( Interface.api_url + "save_picture",  {user_id:Interface.userID ,exercise_id:Interface.exercise_id,correct:true,step_number:Interface.excerciseNumber,time:time,image:data});
                break;
            break;
        }
    },
    getUrlParameter: function (sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) 
            {
                return sParameterName[1];
            }
        }
        return false;
    }  
}
