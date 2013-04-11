<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>Tcomm</title>
  <link rel="stylesheet" href="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
  <link rel="stylesheet" href="css/tcom.css" />
  <script src="https://s3.amazonaws.com/codiqa-cdn/jquery-1.7.2.min.js"></script>
  <script src="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
  <script src="js/my.js"></script>

  <!-- User-generated css -->
  <style>
    
  </style>
  
  <script>
    function logIcon(confirmar) {
        $.mobile.loading('show', {
            text: 'Inciando sesión ...',
            textVisible: confirmar,
            theme: 'c',
            html: ""
        });

    }

    $(function () {
        $("#btn_reservaciones").click(function(){
        $("#fechas_reservacion").empty();
            $.getJSON("http://tcommdev.tesconmedia.com/server.php/reservaciones/reservacion_by_idUsuario?X-API-KEY=android&idUsuario=" + id + "", 
                function(json){
                    var hoy = new Date();
                    var mes = 0;
                    var dia = 0;
                    if(hoy.getMonth() < 10)
                        mes = '0' + hoy.getMonth();
                    else
                        mes = hoy.getMonth();
                    if(hoy.getDate() < 10)
                        dia = '0' + hoy.getDate();
                    else
                        dia = hoy.getDate();
                    var año = hoy.getFullYear();
                    var today = año + "-" + mes + "-" + dia;
                    var mañana = new Date(hoy.getTime() + 24 * 60 * 60 * 1000);
                    $.each(json, function(i,item){   
                        if($("#" + item.fechaInicio).length === 0){
                            var divcollap = $("<div />").attr("data-role","collapsible").attr("data-collapsed","true").attr("id",item.fechaInicio);
                            var h3 = $("<h3 />");
                            if(divcollap.attr("id") === today)
                                h3.html("Hoy");
                            else if(divcollap.attr("id") === mañana)
                                h3.html("Mañana");
                            else
                                h3.html(item.fechaInicio);
                            h3.appendTo(divcollap);
                            $("#fechas_reservacion").append(divcollap);
                        }
                        alert(today);
                        var reservacion = $("<span />").attr("id","reservacion_" + item.idApartado).html(item.articulo + " De: " + item.horaInicio + " a: " + item.horaFinal);
                        var eliminar = $("<a />").attr("id",item.idApartado).attr("href","#").addClass("eliminar").attr("data-role","button").attr("data-theme","a").attr("data-icon","minus").attr("data-iconpos","notext");
                        reservacion.append("<br />");
                        reservacion.appendTo("#" + item.fechaInicio);
                        eliminar.html("Cancelar Reservacion");
                        eliminar.appendTo(reservacion);
                        $(".eliminar").hide();
                        $(".eliminar").on('click',function(e){
                        e.preventDefault();
                            var idreservacion = $(this).attr("id");
                            if(confirm("¿Seguro que desea cancelar la reservación?")){
                                $.ajax(this.action,{
                                    url: "http://tcommdev.tesconmedia.com/server.php/reservaciones/reservacion/" + idreservacion + "?X-API-KEY=android",
                                    type: "DELETE",
                                    success: function(data){
                                        $("#reservacion_" + idreservacion).remove();
                                    }
                                });
                            }
                        });
                    });
            }).done(function(){
                $("#reservaciones").trigger("create");
            });
        });
        $("#editar").click(function(){
            if($(this).attr("data-icon") === "gear")
                $(this).attr("data-icon","minus");
            else
                $(this).attr("data-icon","gear");
           $(".eliminar").toggle();           
        });
        var amenidades = new Array();
        amenidades[1] = "Alberca";
        amenidades[2] = "Área de snack";
        amenidades[3] = "Salón de juegos";
        amenidades[4] = "Gimnasio";
        amenidades[5] = "Sala de juntas";
        amenidades[6] = "Salón social";
        amenidades[7] = "Actividades recreativas";
        amenidades[8] = "Vapor y baños";
        $.getJSON("http://tcommdev.tesconmedia.com/server.php/amenidades/amenidad", 
        function(json){
            $.each(json, function(i,item){
                //listado de amenidades
                var li = $("<li />").attr("data-theme", "c");
                var a = $("<a />").addClass("amenidad").attr("id", item.idAmenidad).attr("href", "#amenidad").attr("data-transition", "slide").html(item.amenidad);
                li.appendTo("#lista_amenidades");
                a.appendTo(li);
            });
            
                $(".amenidad").on('click',function(e){
                    e.preventDefault();
                    $("#field").empty();
                    $("#fechas").hide();
                    var idamenidad = $(this).attr("id");
                    $("<legend />").html("Articulos de " + amenidades[idamenidad]).appendTo("#field");
                    $.getJSON("http://tcommdev.tesconmedia.com/server.php/articulosAmenidad/articulosamenidad_by_idAmenidad?X-API-KEY=android&idAmenidad=" + idamenidad + "", 
                    function(json){
                        $("#fechas").show();
                        $.each(json, function(i,item){                  
                            $("<input />").attr("id","idArticulo").attr("name","idArticulo").attr("value",item.idArticulo).attr("type","radio").appendTo("#field");
                            $("<label />").attr("for",item.articulo).html(item.articulo).appendTo("#field");
                        });
                    });
                });
        }).done(function(){
            $("#amenidad").trigger("create");
        });;
        $("#form-reservacion").submit(function(){
           $.ajax(this.action,{
               url: "http://tcommdev.tesconmedia.com/server.php/reservaciones/reservacion",
               data: $(this).serialize(),
               type: "POST",
               success: function(data){
                   if(data){
                       alert("Su reservación se hizo con éxito");
                   }
               }
           });
           return false;
        });
        $("#btn_camaras").click(function(){
            $.getJSON("http://tcommdev.tesconmedia.com/server.php/camaras/camaras_by_idUsuario?X-API-KEY=android&idUsuario="+ id, 
            function(json){
                $.each(json, function(i,item){
                    //listado de camaras
                    var aCamara = $("<a />").attr("href","#popupCamara_" + item.idCamara).attr("data-rel","popup").addClass("open_camera");
                    aCamara.appendTo("#lista_camaras");
                    var imgCamara = $("<img />").addClass("camara").attr("src", "http://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Upa-river.jpg/220px-Upa-river.jpg");//.attr("src","http://tcommdev.tesconmedia.com/camaras/camara_"+item.idCamara);
                    imgCamara.appendTo(aCamara);
                    var divVideo = $("<div />").attr("data-role","popup").attr("id","popupCamara_" + item.idCamara).attr("data-overlay-theme","a").attr("data-theme","d").attr("data-tolerance","15,15").addClass("ui-content");
                    divVideo.appendTo("#lista_camaras");
                    var frameCamara = $("<iframe />").attr("src","http://player.vimeo.com/video/41135183").attr("width","100%").attr("height","100%").attr("seamless", '').appendTo(divVideo);
                });
            }).done(function(){
                $("#camaras").trigger("create");
            });;
        });
        $(".open_camera").click(function(){
            $.mobile.loading("show",{
                text: "",
                textVisible: false,
                theme: "a",
                html: ""
            });
        });

        $("#cerrar").click(function(){
            window.localStorage.clear();
            
        });
        $("#login").submit(function () {

            logIcon("true");
            
            $.post('http://tcommdev.tesconmedia.com/server.php/usuarios/idUsuario_nombreUsuario', $("#login").serialize(), function (response) {
                //Guardar resultado de servidor (id o false)
				
                if (response == false) {
                    alert("Error usuario o contraseña erroneos");
                    logIcon("false");
                }
                else {
                    
                    window.localStorage.setItem("id", response[0].idUsuario);
                    window.localStorage.setItem("tipo", response[0].tipoUsuario);
                    window.localStorage.setItem("nombre", response[0].usuario);
                    window.location = "#page3";
                    $('#nombre').html(window.localStorage.getItem("nombre"));
                    id = window.localStorage.getItem("id");
                    $.getJSON("http://tcommdev.tesconmedia.com/server.php/mensajes/contenido/"+id, function(data){
                        alert("Worl");
                        $.each(data, function(i,item){
                           var ii = i+1; 
                           var uno = $('<li />').attr("data-theme","c").attr("data-filtertext",item.mensaje).appendTo("#notify");
                           var dos = $("<a />").attr("data-transition","slide").attr("href","#page9").html(item.nombre).appendTo(uno);
                           var tres = $("<span />").attr("class","ui-li-count").html(item.mensaje).appendTo(dos);

                         });
                        
                     });
                }

                
            }, 'json').done(function(){
            $("#notify").trigger("create");
            });
            
            return false;
        });
    });
</script>
  <!-- User-generated js -->
  <script>

    $(function() {
        
    });

  </script>
</head>
<body>
  <!-- Home -->
  <div data-role="page" id="page1">
      
      <div data-role="content">
          
                <div style="">
                    <img style="width: 100%; height: px" src="http://assets.codiqa.com/N1XPbQDmaAluuGuX3YgS_logo.png">
                </div>
          <form id="login">
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="correo">
                        </label>
                        <input name="correo" id="correo" placeholder="Correo" value="" type="text">
                    </fieldset>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="contrasena">
                        </label>
                        <input name="contrasena" id="contrasena" placeholder="Contraseña" value="" type="password">
                    </fieldset>
                </div>
                <input type="submit" value="Entrar" /></form>
             
      </div>
                

  </div>

  <!-- Menu -->
  <div data-role="page" id="page3">
      <div data-theme="c" data-role="header">
          <a id="cerrar" data-role="button" href="#page1" data-icon="delete" data-iconpos="left"
          class="ui-btn-left">
              Salir
          </a>
          <h3>
              <span id="nombre"></span>
          </h3>
      </div>
      <div data-role="content">
          <ul data-role="listview" data-divider-theme="b" data-inset="false">
              <li data-theme="c">
                  <a href="#page10" data-transition="slide">
                      Eventos
                  </a>
              </li>
              <li data-theme="c">
                  <a id="btn_reservaciones" href="#reservaciones" data-transition="slide">
                      Reservaciones
                  </a>
              </li>
              <li data-theme="c">
                  <a id="btn_camaras" href="#camaras" data-transition="slide">
                      Camaras
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page8" data-transition="slide">
                      Notificaciones
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page5" data-transition="slide">
                      Empleados
                  </a>
              </li>
          </ul>
      </div>
      <div data-theme="c" data-role="footer" data-position="fixed">
          <span class="ui-title">
          </span>
      </div>
  </div>
  <!-- Reservaciones -->
  <div data-role="page" id="reservaciones">
      <div data-theme="c" data-role="header">
          <h3>
              Tcomm
          </h3>
          <div data-role="navbar" data-iconpos="top">
              <ul>
                  <li>
                      <a href="#reservaciones" data-transition="fade" class="ui-btn-active ui-state-persist">
                          Reservaciones
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div data-role="content">
          <div id="fechas_reservacion" data-role="collapsible-set">
              
          </div>
          <a id="editar" data-role="button" data-theme="c" data-icon="gear" data-iconpos="left">
              Editar
          </a>
          <a data-role="button" href="#nueva_reservacion" data-icon="plus" data-iconpos="left">
              Nueva Reservacion
          </a>
      </div>
  </div>
  <div data-role="page" id="nueva_reservacion">
      <div data-theme="c" data-role="header">
          <a data-role="button" data-theme="a" href="#menu" data-icon="home" data-iconpos="left"
          class="ui-btn-right">
              Home
          </a>
          <h3>
              Tcomm
          </h3>
          <div data-role="navbar" data-iconpos="left">
              <ul>
                  <li>
                      <a href="#reservaciones" data-transition="fade" data-theme="" data-icon="" class="ui-state-persist">
                          Reservaciones
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div data-role="content">
          <ul id="lista_amenidades" data-role="listview" data-divider-theme="c" data-inset="false">
              <li data-role="list-divider" role="heading">
                  Amenidades
              </li>
          </ul>
      </div>
  </div>
  <!-- Camaras -->
  <div data-role="page" id="camaras">
      <div data-theme="a" data-role="header">
          <h3>
              Tcomm
          </h3>
          <div data-role="navbar" data-iconpos="top">
              <ul>
                  <li>
                      <a href="#camaras" data-transition="fade" class="ui-btn-active ui-state-persist">
                          Camaras
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div id="lista_camaras" data-role="content">
      </div>
  </div>
  <!-- Amenidades -->
  <div data-role="page" id="amenidad">
      <div data-theme="a" data-role="header">
          <a data-role="button" href="#menu" data-icon="home" data-iconpos="left"
          class="ui-btn-right">
              Home
          </a>
          <h3>
              Tcomm
          </h3>
          <div data-role="navbar" data-iconpos="top">
              <ul>
                  <li>
                      <a href="#reservaciones" data-transition="fade" data-theme="a" data-icon="">
                          Reservaciones
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div data-role="content">
          <form id="form-reservacion">
            <div data-role="fieldcontain">
                <fieldset id="field" data-role="controlgroup" data-type="vertical">
                </fieldset>
            </div>
            <div id="fechas" data-role="fieldcontain">
                <fieldset data-role="controlgroup">
                    <input name="fechaHoraInicio" id="fechaHoraInicio" placeholder="Fecha de inicio" type="datetime" /><br /><br />
                    <input name="fechaHoraFinal" id="fechaHoraFinal" placeholder="Fecha de finalización" type="datetime" />
                </fieldset>
            </div>
            <input type="submit" data-theme="a" value="Enviar solicitud">
          </form>
      </div>
  </div>
  <!-- Buscar empleados -->
  <div data-role="page" id="page5">
      <div data-theme="c" data-role="header" data-position="fixed">
          <a data-role="button" href="#page1" data-icon="home" data-iconpos="notext"
          class="ui-btn-right">
              Button
          </a>
          <a data-role="button" href="#page3" data-icon="arrow-l" data-iconpos="left"
          class="ui-btn-left">
              Volver
          </a>
          <h5>
              Empleado
          </h5>
      </div>
      <div data-role="content">
          <div data-role="fieldcontain">
              <fieldset data-role="controlgroup" data-mini="true">
                  <label for="searchinput1">
                      Buscar empleado
                  </label>
                  <input name="" id="searchinput1" placeholder="" value="" type="search">
              </fieldset>
          </div>
          <div>
              <p>
                  <b>
                      Resultados:
                  </b>
              </p>
          </div>
          <ul data-role="listview" data-divider-theme="b" data-inset="false">
              <li data-theme="c">
                  <a href="#page6" data-transition="slide">
                      Empleado 1
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page6" data-transition="slide">
                      Empleado 2
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page6" data-transition="slide">
                      Empleado 3
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page6" data-transition="slide">
                      Empleado 4
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page6" data-transition="slide">
                      Empleado 5
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page6" data-transition="slide">
                      Empleado 6
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page6" data-transition="slide">
                      Empleado 7
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <!-- Ficha empleado -->
  <div data-role="page" id="page6">
      <div data-theme="c" data-role="header">
          <a data-role="button" href="#page3" data-icon="home" data-iconpos="notext"
          class="ui-btn-right">
              Inicio
          </a>
          <a data-role="button" href="#page5" data-icon="arrow-l" data-iconpos="left"
          class="ui-btn-left">
              Volver
          </a>
          <h3>
              Empleado XXX
          </h3>
          <div style=" text-align:center">
              <img style="width: 128px; height: 128px" src="http://tcommdev.tesconmedia.com/img/nopicture.png">
          </div>
      </div>
      <div data-role="content">
          <div>
              <p>
                  <b>
                      Nombre:&nbsp;
                  </b>
                  Fernando Ulises Medrano Hernández
              </p>
          </div>
          <div>
              <div class="label">
                  <label>
                      <strong>
                          Teléfono:
                      </strong>
                      &nbsp;
                  </label>
                  524494421400 ext / 524494421400
              </div>
          </div>
          <div>
              <div class="label">
                  <strong>
                      <label>
                          Correo Electrónico:&nbsp;
                      </label>
                  </strong>
                  drbyde@gmail.com
              </div>
          </div>
          <div>
              <div class="label">
                  <strong>
                      <label>
                          Dirección:&nbsp;
                      </label>
                  </strong>
                  Calle Paseo San Gerardo No. 207.
              </div>
          </div>
          <div>
              <div class="label">
                  <strong>
                      <label>
                          Fecha de nacimiento:&nbsp;
                      </label>
                  </strong>
                  1986-01-10
              </div>
          </div>
      </div>
  </div>
  <!-- Notificaciones -->
  <div data-role="page" id="page8">
      <div data-theme="c" data-role="header">
          <a data-role="button" href="#page3" data-icon="home" data-iconpos="notext"
          class="ui-btn-right">
              Button
          </a>
          <a data-role="button" href="#page3" data-icon="arrow-l" data-iconpos="left"
          class="ui-btn-left">
              Volver
          </a>
          <h3>
              Notificaciones
          </h3>
      </div>
      <div data-role="content">
          <div data-role="fieldcontain">
              <fieldset data-role="controlgroup">
                  <label for="searchinput2">
                  </label>
                  <input name="" id="searchinput2" placeholder="Buscar notificaciones" value=""
                  type="search">
              </fieldset>
          </div>
          <div>
              <p>
                  <b>
                      Recientes:
                  </b>
              </p>
          </div>
          <ul id="notify" data-role="listview" data-divider-theme="b" data-inset="false">
              <li data-theme="c">
                  <a href="#page9" data-transition="slide">
                      Notificación 1
                      <span class="ui-li-count">
                          Junta mañana en casa de...
                      </span>
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <!-- Notificación -->
  <div data-role="page" id="page9">
      <div data-theme="c" data-role="header">
          <a data-role="button" href="#page3" data-icon="home" data-iconpos="notext"
          class="ui-btn-right">
              Button
          </a>
          <a data-role="button" href="#page8" data-icon="arrow-l" data-iconpos="left"
          class="ui-btn-left">
              Volver
          </a>
          <h3>
              Notificación X
          </h3>
          <div style=" text-align:center">
              <img style="width: 20%; height: 20%" src="http://images1.wikia.nocookie.net/__cb20101024140345/ratchetandclank/es/images/2/2a/Alerta_Azul.png">
          </div>
          <div>
              <p>
                  <span style="font-size: small;">
                      <b>
                          De:
                      </b>
                      Administrador
                  </span>
              </p>
          </div>
          <div>
              <p>
                  <span style="font-size: small;">
                      <b>
                          Asunto: Reunion de comite general
                      </b>
                  </span>
              </p>
          </div>
          <div>
              <p>
                  <span style="font-size: small;">
                      <b>
                          Fecha:
                      </b>
                      26 de marzo de 2012
                  </span>
              </p>
          </div>
      </div>
      <div data-role="content">
          <div>
              <p>
                  <b>
                      Cuerpo:
                  </b>
              </p>
              <p style="text-align: justify;">
                  Por medio de la presente doy el anuncio &nbsp;de el dia 30 de abril se
                  llevara acabo una reunion e comite general para todos los miembros de este.
              </p>
          </div>
      </div>
  </div>
  <!-- Eventos -->
  <div data-role="page" id="page10">
      <div data-theme="c" data-role="header">
          <a data-role="button" href="#page1" data-icon="home" data-iconpos="left"
          class="ui-btn-right">
              Home
          </a>
          <a data-role="button" data-direction="reverse" data-rel="back" href="#page3"
          data-icon="back" data-iconpos="left" class="ui-btn-left">
              Volver
          </a>
          <h3>
              Eventos
          </h3>
      </div>
      <div data-role="content">
          <div style=" text-align:center">
              <img style="width: 100%; height: px" src="http://assets.codiqa.com/ABaKqIluTHqhbb4gaIEB_jquery-ui-datepicker.jpg">
          </div>
          <ul data-role="listview" data-divider-theme="b" data-inset="false">
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Junta vecinal
                      <span class="ui-li-count">
                          13-05-2013
                      </span>
                  </a>
              </li>
          </ul>
      </div>
      <div data-role="tabbar" data-iconpos="top" data-theme="c">
          <ul>
              <li>
                  <a href="#page10" data-transition="fade" data-theme="" data-icon="">
                      Internos
                  </a>
              </li>
              <li>
                  <a href="#" data-transition="fade" data-theme="" data-icon="">
                      Externos
                  </a>
              </li>
              <li>
                  <a href="#page11" data-transition="fade" data-theme="" data-icon="">
                      Propios
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <!-- Eventos_Privados -->
  <div data-role="page" id="page11">
      <div data-theme="c" data-role="header">
          <a data-role="button" data-direction="reverse" data-rel="back" href="#page1"
          data-icon="home" data-iconpos="left" class="ui-btn-right">
              Home
          </a>
          <a data-role="button" data-direction="reverse" data-rel="back" href="#page3"
          data-icon="back" data-iconpos="left" class="ui-btn-left">
              Volver
          </a>
          <h3>
              Eventos
          </h3>
      </div>
      <div data-role="content">
          <div style=" text-align:center">
              <img style="width: 100%; height: 100%" src="http://assets.codiqa.com/ABaKqIluTHqhbb4gaIEB_jquery-ui-datepicker.jpg">
          </div>
          <a data-role="button" href="#page12" data-icon="plus" data-iconpos="left">
              Crear Evento
          </a>
          <ul data-role="listview" data-divider-theme="b" data-inset="false">
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Pago de servicios
                      <span class="ui-li-count">
                          14-05-2013
                      </span>
                  </a>
              </li>
          </ul>
      </div>
      <div data-role="tabbar" data-iconpos="top" data-theme="c">
          <ul>
              <li>
                  <a href="#page10" data-transition="fade" data-theme="" data-icon="">
                      Internos
                  </a>
              </li>
              <li>
                  <a href="#" data-transition="fade" data-theme="" data-icon="">
                      Externos
                  </a>
              </li>
              <li>
                  <a href="#page11" data-transition="fade" data-theme="" data-icon="">
                      Propios
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <!-- Eventos_Crear -->
  <div data-role="page" id="page12">
      <div data-theme="c" data-role="header">
          <a data-role="button" data-direction="reverse" data-rel="back" href="#page1"
          data-icon="home" data-iconpos="left" class="ui-btn-right">
              Home
          </a>
          <a data-role="button" data-direction="reverse" data-rel="back" href="#page3"
          data-icon="back" data-iconpos="left" class="ui-btn-left">
              Volver
          </a>
          <h3>
              Eventos
          </h3>
          <h1>
              Crear Evento
          </h1>
      </div>
      <div data-role="content">
          <form action="">
              <div data-role="fieldcontain">
                  <fieldset data-role="controlgroup" data-mini="true">
                      <label for="textinput5">
                          Evento
                      </label>
                      <input name="evento" id="textinput5" placeholder="Escriba el nombre del evento"
                      value="" type="text">
                  </fieldset>
              </div>
              <div data-role="fieldcontain">
                  <fieldset data-role="controlgroup" data-mini="true">
                      <label for="textinput6">
                          Inicio
                      </label>
                      <input name="fecha" id="textinput6" placeholder="Seleccione la fecha del evento"
                      value="" type="datetime">
                  </fieldset>
              </div>
              <div data-role="fieldcontain">
                  <fieldset data-role="controlgroup">
                      <label for="textinput7">
                          Fin
                      </label>
                      <input name="" id="textinput7" placeholder="Seleccione la hora del evento"
                      value="" type="datetime">
                  </fieldset>
              </div>
          </form>
      </div>
  </div>
  
  
</body>
</html>
