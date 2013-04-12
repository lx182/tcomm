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
     
      var id;
    function logIcon(confirmar) {
        $.mobile.loading('show', {
            text: 'Inciando sesión ...',
            textVisible: confirmar,
            theme: 'c',
            html: ""
        });

    }
    
            


    $(function () {
        
        $("#propiedad").submit(function () {
                
                
                $.ajax({
                    
                
                    type: 'POST',
                    url: 'http://tcommdev.tesconmedia.com/server.php/unidadesMoviles/unidadMovil',
                    crossDomain: true,
                    data: $('#propiedad').serialize(),
                    dataType: 'json',
                    success: function (responseData, textStatus, jqXHR) {
                        alert('Registro de unidad móvil satisfactoria');
                        $("#descripcionMovil").val("");
                        $("#placas").val("");
                    },
                    error: function (responseData, textStatus, errorThrown) {
                        alert('Ha fallado el registro de unidad móvil');
                        $("#descripcionMovil").val("");
                        $("#placas").val("");
                        
                        
                    }
                });
                return false;
            }
            );//
         $(".btn_notify").click(function (){
             
                    $.mobile.loading( 'show', {
                            text: 'foo',
                            textVisible: false,
                            theme: 'z',
                            html: ""
                    });
                    $("#notify").empty();
                    $.getJSON("http://tcommdev.tesconmedia.com/server.php/mensajes/contenido/"+id, function(data){
                        
                        $.each(data, function(i,item){
                           var ii = i+1; 
                           var idn = item.id;
                           var uno = $('<li />').attr("data-theme","c").attr("data-filtertext",item.nombre+" "+item.mensaje);
                           var dos = $("<a />").attr("data-transition","slide").html(item.nombre).appendTo(uno).on('click',function(){
                                $("#nombren").html(item.nombre);
                                $("#nombrep").html(item.nombre);
                                $("#fecha").html(item.fecha);
                                $("#cuerpo").html(item.mensaje);

                            }).attr("href","#page9");
                           var tres = $("<span />").attr("class","ui-li-count").html(item.mensaje).appendTo(dos);

                        $("#notify").append(uno).listview('refresh');
                        $.mobile.hidePageLoadingMsg();
                         });
                        
                     });
                     
        });//Termino de Notificaciones
        $(".btn_employ").click(function (){
                     $.mobile.loading( 'show', {
                            text: 'foo',
                            textVisible: false,
                            theme: 'z',
                            html: ""
                    });
                    $("#ls_employs").empty();
                    $.getJSON("http://tcommdev.tesconmedia.com/server.php/empleados/empleado", function(data){
                        
                        $.each(data, function(i,item){
                           var ii = i+1; 
                           var idn = item.id;
                           var uno = $('<li />').attr("data-theme","c").attr("data-filtertext",item.nombreEmpresa+" "+item.nombrePersona+" "+item.apellidoPatPersona+" "+item.apellidoMatPersona);
                           var dos = $("<a />").attr("data-transition","slide").html(item.nombreEmpresa).appendTo(uno).on('click',function(){
                                $("#nomemp").html(item.nombrePersona);
                                $("#nomempf").html(item.nombrePersona+" "+item.apellidoPatPersona+" "+item.apellidoMatPersona);
                                $("#tel").html(item.telefonoPersona+" ext"+item.extensionPersona+" / "+item.celularPersona);
                                $("#mailem").html(item.correoPersona);
                                $("#diremp").html(item.direccionPersona);
                                $("#datemp").html(item.fechaNacimiento);

                            }).attr("href","#page6");
                           var tres = $("<span />").attr("class","ui-li-count").html(item.nombrePersona+" "+item.apellidoPatPersona+" "+item.apellidoMatPersona).appendTo(dos);
                           $.mobile.hidePageLoadingMsg(); 
                        $("#ls_employs").append(uno).listview('refresh');
                         });
                        
                     });
                     
        });//Termino de Notificaciones
        
        $(".btn_prop").click(function (){
            
                     $.mobile.loading( 'show', {
                            text: 'foo',
                            textVisible: false,
                            theme: 'z',
                            html: ""
                    });
                    $("#prop").empty();
                    $.getJSON("http://tcommdev.tesconmedia.com/server.php/unidadesMoviles/unidadMovil?idUsuario="+id, function(data){
                        
                        $.each(data, function(i,item){
                           var ii = i+1; 
                           var idn = item.id;
                           var uno = $('<li />').attr("data-theme","c").attr("data-filtertext",item.descripcionMovil+" "+item.placas);
                           var dos = $("<a />").attr("data-transition","slide").html(item.descripcionMovil).appendTo(uno).on('click',function(){
                                $("#propn").html(item.placa);
                                $("#propplac").html(item.placa);
                                $("#propdes").html(item.descripcionMovil);

                            }).attr("href","#detalles");
                           var tres = $("<span />").attr("class","ui-li-count").html(item.placas).appendTo(dos);
                           $.mobile.hidePageLoadingMsg(); 
                        $("#prop").append(uno).listview('refresh');
                         });
                        
                     });
                     
        });//Termino de Notificaciones
        
        $("#cerrar").click(function(){
            window.localStorage.clear();
            
        });
        
        $("#login").submit(function () {

            logIcon("true");
            
            $.post('http://tcommdev.tesconmedia.com/server.php/usuarios/idUsuario_nombreUsuario', $("#login").serialize(), function (response) {
                //Guardar resultado de servidor (id o false)
				
                if (response == false) {
                    alert("Error usuario o contraseña erroneos");
                    $.mobile.hidePageLoadingMsg(); 
                }
                else {
                    
                    window.localStorage.setItem("id", response[0].idUsuario);
                    window.localStorage.setItem("tipo", response[0].tipoUsuario);
                    window.localStorage.setItem("nombre", response[0].usuario);
                    window.location = "#page3";
                    $('#nombre').html(window.localStorage.getItem("nombre"));
                    id = window.localStorage.getItem("id");
                    $('#idUsuario').attr('value', id);
                    
                }

                
            }, 'json');
            
            return false;
        });
        
       
        
        function Empleados(){
        
        };//Termino de Empleados
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
  <!-- Reservaciones -->
  <div data-role="page" id="page4">
      <div data-theme="c" data-role="header">
          <a data-role="button" data-theme="c" href="#page3" data-icon="home" data-iconpos="left"
          class="ui-btn-right">
              Home
          </a>
          <h3>
              Tcomm
          </h3>
          <div data-role="navbar" data-iconpos="left">
              <ul>
                  <li>
                      <a href="#page4" data-transition="fade" data-theme="" data-icon="" class="ui-btn-active ui-state-persist">
                          Reservaciones
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div data-role="content">
          <ul data-role="listview" data-divider-theme="d" data-inset="false">
              <li data-role="list-divider" role="heading">
                  Amenidades
              </li>
              <li data-theme="c">
                  <a href="#page7" data-transition="slide">
                      Alberca
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Área de snack
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Salón de juegos
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Gimnasio
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Sala de juntas
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Salón social
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Actividades recreativas
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page1" data-transition="slide">
                      Vapor y baños
                  </a>
              </li>
          </ul>
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
                  <a href="#page4" data-transition="slide">
                      Reservaciones
                  </a>
              </li>
              <li data-theme="c">
                  <a class="btn_notify" href="#page8" data-transition="slide">
                      Notificaciones
                  </a>
              </li>
              <li data-theme="c">
                  <a class="btn_employ" href="#page5" data-transition="slide">
                      Empleados
                  </a>
              </li>
              <li data-theme="c">
                  <a class="btn_prop" href="#propiedades" data-transition="slide">
                      Unidades móviles
                  </a>
              </li>
          </ul>
      </div>
      <div data-theme="c" data-role="footer" data-position="fixed">
          <span class="ui-title">
          </span>
      </div>
  </div>
  <!-- Buscar empleados -->
  <div data-role="page" id="page5">
      <div data-theme="c" data-role="header" data-position="fixed">
          <a data-role="button" href="#page3" data-icon="home" data-iconpos="notext"
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
          <a class="btn_employ" data-role="button" href="#">
              Actualizar lista
          </a>
          <br>
          <ul id="ls_employs"  data-role="listview" data-filter="true" data-divider-theme="b" data-inset="false">
              
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
          <h3 id="nomemp">
              
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
                  <span id="nomempf"></span>
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
                  <span id="tel"></span>
              </div>
          </div>
          <div>
              <div class="label">
                  <strong>
                      <label>
                          Correo Electrónico:&nbsp;
                      </label>
                  </strong>
                  <span id="mailem"></span>
              </div>
          </div>
          <div>
              <div class="label">
                  <strong>
                      <label>
                          Dirección:&nbsp;
                      </label>
                  </strong>
                  <span id="diremp"></span>
              </div>
          </div>
          <div>
              <div class="label">
                  <strong>
                      <label>
                          Fecha de nacimiento:&nbsp;
                      </label>
                  </strong>
                  <span id="datemp"></span>
              </div>
          </div>
      </div>
  </div>
  <!-- Alberca -->
  <div data-role="page" id="page7">
      <div data-theme="c" data-role="header">
          <a data-role="button" href="#page3" data-icon="home" data-iconpos="left"
          class="ui-btn-right">
              Home
          </a>
          <h3>
              Tcomm
          </h3>
          <div data-role="navbar" data-iconpos="top">
              <ul>
                  <li>
                      <a href="#page4" data-transition="fade" data-theme="c" data-icon="">
                          Reservaciones
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div data-role="content">
          <div data-role="fieldcontain">
              <fieldset data-role="controlgroup" data-type="vertical">
                  <legend>
                      Artículos de Alberca
                  </legend>
                  <input id="radio1" name="Articulos" value="1" type="radio">
                  <label for="radio1">
                      Alberca
                  </label>
              </fieldset>
          </div>
          <div data-role="fieldcontain">
              <fieldset data-role="controlgroup">
                  <label for="textinput1">
                  </label>
                  <input name="" id="textinput1" placeholder="Fecha" value="" type="text">
              </fieldset>
          </div>
          <div data-role="fieldcontain">
              <fieldset data-role="controlgroup">
                  <label for="textinput2">
                  </label>
                  <input name="" id="textinput2" placeholder="Hora" value="" type="text">
              </fieldset>
          </div>
          <input type="submit" data-theme="c" value="Enviar solicitud">
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
          <a class="btn_notify" data-role="button" href="#">
              Actualizar
          </a>
          <br>
          <ul id="notify" data-role="listview" data-filter="true" data-divider-theme="b" data-inset="false">
              
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
          <a class="btn_notify" data-role="button" href="#page8" data-icon="arrow-l" data-iconpos="left"
          class="ui-btn-left">
              Volver
          </a>
          <h3 id="nombren">
              
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
                      <span id="nombrep"></span>
                  </span>
              </p>
          </div>
          <div>
              <p>
                  <span style="font-size: small;">
                      <b>
                          Fecha:
                      </b>
                      <span id ="fecha"></span>
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
              <p id="cuerpo" style="text-align: justify;">
                  
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
  <!-- Reservaciones_idusuario -->
  <div data-role="page" id="page13">
      <div data-theme="c" data-role="header">
          <h3>
              Tcomm
          </h3>
          <div data-role="navbar" data-iconpos="top">
              <ul>
                  <li>
                      <a href="#page4" data-transition="fade" data-theme="" data-icon="" class="ui-btn-active ui-state-persist">
                          Reservaciones
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div data-role="content">
          <div data-role="collapsible-set">
              <div data-role="collapsible" data-collapsed="false">
                  <h3>
                      Hoy
                  </h3>
              </div>
              <div data-role="collapsible" data-collapsed="false">
                  <h3>
                      Mañana
                  </h3>
                  <a data-role="button" data-theme="c" href="#page13" data-icon="minus"
                  data-iconpos="notext">
                      Cancelar
                  </a>
              </div>
          </div>
          <a data-role="button" data-theme="c" href="#page13" data-icon="gear" data-iconpos="left">
              Editar
          </a>
          <a data-role="button" href="#page13" data-icon="plus" data-iconpos="left">
              Nueva Reservacion
          </a>
      </div>
  </div>

  
  
    <!-- propiedades0 -->
  <div data-role="page" id="propiedades">
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
              Unidades
          </h3>
          <h3>
              Moviles
          </h3>
      </div>
      <div data-role="content">
          <ul id="prop" data-role="listview"  data-filter="true" data-divider-theme="b" data-inset="false">
              
          </ul>
      </div>
      <div data-role="tabbar" data-iconpos="top" data-theme="c">
          <ul>
              <li>
                  <a class="btn_prop" href="#propiedades" data-transition="fade" data-theme="" data-icon="search">
                      Consultar
                  </a>
              </li>
              <li>
                  <a href="#agregar" data-transition="fade" data-theme="" data-icon="plus">
                      Agregar
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <!-- agregar -->
  <div data-role="page" id="agregar">
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
              Agregar
          </h3>
          <h2>
              Unidad Movil
          </h2>
      </div>
      <div data-role="content">
          <form id="propiedad">
              <input name="idUsuario" id="idUsuario" placeholder="idUsuario" 
                  value="" type="hidden">
              <div data-role="fieldcontain" id="descripcionMovil">
                  <label for="descripcionMovil">
                      Descripcion
                  </label>
                  <input name="descripcionMovil" id="descripcionMovil" placeholder="Descripcion"
                  value="" type="text">
              </div>
              <div data-role="fieldcontain" id="placas">
                  <label for="placas">
                      Placa
                  </label>
                  <input name="placas" id="placas" placeholder="Placa" value="" type="text">
              </div>
              <input id="enviar" type="submit" data-inline="true" data-theme="d" data-icon="plus"
              data-iconpos="bottom" value="Agregar">
          </form>
      </div>
      <div data-role="tabbar" data-iconpos="top" data-theme="c">
          <ul>
              <li>
                  <a class="btn_prop" href="#propiedades" data-transition="fade" data-theme="" data-icon="search">
                      Consultar
                  </a>
              </li>
              <li>
                  <a href="#agregar" data-transition="fade" data-theme="" data-icon="plus">
                      Agregar
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <!-- detalles -->
  <div data-role="page" id="detalles">
      <div data-theme="c" data-role="header">
          <a data-role="button" href="#page3" data-icon="home" data-iconpos="notext"
          class="ui-btn-right">
              Inicio
          </a>
          <a class="" data-role="button" href="#propiedades" data-icon="arrow-l" data-iconpos="left"
          class="ui-btn-left">
              Volver
          </a>
          <h3 id="propn">
              
          </h3>

      </div>
      <div data-role="content">
          <div>
              <p>
                  <strong>
                      Placa:&nbsp;
                  </strong>
                  <span id="propplac"></span>
              </p>
          </div>
          <div>
              <p>
                  <b>
                      Descripcion:
                  </b>
                  <span id="_mce_caret" data-mce-bogus="true" style="">
                      <span id="propdes"></span>
                  </span>
              </p>
          </div>
      </div>
      <div data-role="tabbar" data-iconpos="top" data-theme="c">
          <ul>
              <li>
                  <a href="#propiedades" data-transition="fade" data-theme="c" data-icon="search">
                      Consultar
                  </a>
              </li>
              <li>
                  <a href="#agregar" data-transition="fade" data-theme="c" data-icon="plus">
                      Agregar
                  </a>
              </li>
          </ul>
      </div>
  </div>
  
</body>
</html>
