<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>Tcomm</title>
  <link rel="stylesheet" href="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
  <link rel="stylesheet" href="css/my.css" />
  <script src="https://s3.amazonaws.com/codiqa-cdn/jquery-1.7.2.min.js"></script>
  <script src="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
  <script src="js/my.js"></script>

  <!-- User-generated css -->
  <style>
    
  </style>

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
          <div data-role="fieldcontain">
              <fieldset data-role="controlgroup">
                  <label for="textinput3">
                  </label>
                  <input name="" id="textinput3" placeholder="Correo" value="" type="text">
              </fieldset>
          </div>
          <div data-role="fieldcontain">
              <fieldset data-role="controlgroup">
                  <label for="textinput4">
                  </label>
                  <input name="" id="textinput4" placeholder="Contraseña" value="" type="password">
              </fieldset>
          </div>
          <a data-role="button" href="#page3">
              Entrar
          </a>
      </div>
  </div>
  <!-- Reservaciones -->
  <div data-role="page" id="page4">
      <div data-theme="a" data-role="header">
          <a data-role="button" data-theme="a" href="#page3" data-icon="home" data-iconpos="left"
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
      <div data-theme="a" data-role="header">
          <a data-role="button" href="#page3" data-icon="delete" data-iconpos="left"
          class="ui-btn-left">
              Salir
          </a>
          <h3>
              Tcomm
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
      <div data-theme="a" data-role="footer" data-position="fixed">
          <span class="ui-title">
          </span>
      </div>
  </div>
  <!-- Buscar empleados -->
  <div data-role="page" id="page5">
      <div data-theme="a" data-role="header" data-position="fixed">
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
      <div data-theme="a" data-role="header">
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
  <!-- Alberca -->
  <div data-role="page" id="page7">
      <div data-theme="a" data-role="header">
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
                      <a href="#page4" data-transition="fade" data-theme="a" data-icon="">
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
          <input type="submit" data-theme="a" value="Enviar solicitud">
      </div>
  </div>
  <!-- Notificaciones -->
  <div data-role="page" id="page8">
      <div data-theme="a" data-role="header">
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
          <ul data-role="listview" data-divider-theme="b" data-inset="false">
              <li data-theme="c">
                  <a href="#page9" data-transition="slide">
                      Notificación 1
                      <span class="ui-li-count">
                          Junta mañana en casa de...
                      </span>
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page9" data-transition="slide">
                      Notificación 2
                      <span class="ui-li-count">
                          Venta de lotes en ...
                      </span>
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page9" data-transition="slide">
                      Notificación 3
                      <span class="ui-li-count">
                          Cuidado con los visit...
                      </span>
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page9" data-transition="slide">
                      Notificación 4
                      <span class="ui-li-count">
                          XV años de Rita
                      </span>
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page9" data-transition="slide">
                      Notificación 5
                      <span class="ui-li-count">
                          Comite ejecutivo
                      </span>
                  </a>
              </li>
              <li data-theme="c">
                  <a href="#page9" data-transition="slide">
                      Notificación 6
                      <span class="ui-li-count">
                          Aguascalientes
                      </span>
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <!-- Notificación -->
  <div data-role="page" id="page9">
      <div data-theme="a" data-role="header">
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
      <div data-theme="a" data-role="header">
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
      <div data-role="tabbar" data-iconpos="top" data-theme="a">
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
      <div data-theme="a" data-role="header">
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
      <div data-role="tabbar" data-iconpos="top" data-theme="a">
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
      <div data-theme="a" data-role="header">
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
      <div data-theme="a" data-role="header">
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
                  <a data-role="button" data-theme="a" href="#page13" data-icon="minus"
                  data-iconpos="notext">
                      Cancelar
                  </a>
              </div>
          </div>
          <a data-role="button" data-theme="a" href="#page13" data-icon="gear" data-iconpos="left">
              Editar
          </a>
          <a data-role="button" href="#page13" data-icon="plus" data-iconpos="left">
              Nueva Reservacion
          </a>
      </div>
  </div>

  
</body>
</html>
