<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login | EDU</title>
  <?= view("dashboard/partials/_session"); ?>
  <?= view("dashboard/partials/_sessionError"); ?>

  <meta charset='UTF-8'>
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <!-- LOGIN -->
  <div class="login">
    <div class="wrap">
      <!-- TOGGLE -->
      <div id="toggle-wrap">
        <div id="toggle-terms">
          <div id="cross">
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
      <!-- TERMS -->
      <div class="terms">
        <h3>¿Cómo activar su Usuario en EDU?</h3>
        <p class="small">A continuación los pasos para poder registrarse en la plataforma EDU:</p>
        <h3>Docentes y Administrativos</h3>
        <p>Para poder activar su usuario, deberá digitar el correo electrónico que ha brindado en UCAD para tener contacto y que es al correo que tiene acceso, seguidamente deberá ingresar el usuario que se le ha brindado para ingresar a la plataforma Uonline 5. Al enviar la solicitud, el sistema verificará si usted está registrado y enviará a su correo un código para poder ingresar a la plataforma.</p>

        <h3>Estudiantes</h3>
        <p>Si usted es estudiante, debe asegurarse que ha brindado en Registro Académico un correo electrónico personal para que podamos enviar los pasos a seguir para acceder. Debe llenar el formulario con su correo brindado y su número de carnet que será el usuario a utilizar.</p>
      </div>
      <!-- RECOVERY -->
      <div class="recovery">
        <h2>¿Olvidaste tu Contraseña?</h2>
        <p>Por favor, digite su <strong>usuario o carnet y su correo electrónico</strong> para enviar los pasos a seguir y recuperar su contraseña.</p>
        <p><strong>Verifica que los datos de tu correo electrónico sean correctos.</strong></p>
        <form class="login-form" action="<?= route_to("recuperar_clave")?>" method="post">
          <input  type="email" class="input" id="email_r" name="email_r" placeholder="Ingresa tu correo electrónico aquí" required>
          <input  type="text" class="input" id="usuario_r" name="usuario_r" placeholder="Ingresa tu usuario o carnet aquí" required>

          <button type="submit" class="btn btn-secondary source"  style="width:100%;background:#2a3f54 ">ENVIAR SOLICITUD</button>
        </form>
         <p><a style="color: #2a3f54" class="forgot" href="#">¿Cómo recuperar la contraseña? has click aquí</a></p>
      </div>
      <!-- SLIDER -->
      <div class="content" >
        <!-- LOGO -->
        <div class="logo"  style="background:#2a3f54">
          <a href="#"><img src="user/img/ucad.png"   alt=""></a>
        </div>
        <!-- SLIDESHOW -->
        <div id="slideshow">
          <div class="one">
            <h2><span>EDU</span></h2>
            <p>EVALUACIÓN DOCENTE UCAD</p> 
          </div>
          <div class="two">
            <h2><span>UCAD</span></h2>
            <p>UNA UNIVERSIDAD DIFERENTE</p>
          </div>
        </div>
      </div>
      <!-- LOGIN FORM -->
      <div class="user">
        <div class="form-wrap">
          <!-- TABS -->
          <div class="tabs">
            <h4 class="login-tab"><a class="log-in active" href="#login-tab-content"><span >Iniciar Sesión<span></a></h4>
              <h4 class="signup-tab" ><a class="sign-up" href="#signup-tab-content"><span>Activar Usuario</span></a></h4>
            </div>
            
            <!-- TABS CONTENT -->
            <div class="tabs-content">
              <!-- TABS CONTENT LOGIN -->
              
              <div id="login-tab-content" class="active">
               <form class="login-form" action="/web/Post/login_post" method="post">
                <input type="text" class="input" id="usuario" name="usuario" autocomplete="off" placeholder="Usuario / Carnet">
                <input type="password" class="input" id="clave" name="clave" autocomplete="off" placeholder="Contraseña">
                <div class="form-group" style="width: 30px">
                  <div id="example1" class="g-recaptcha"  data-sitekey="6Ld5oeIUAAAAAM9Rql8w-d1HSap5oWJtAQREMGRE" data-callback="onloadCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                  <input class="form-control hidden" id="capcha" name="capcha" value=""  data-recaptcha="true" required data-error="Please complete the Captcha" hidden="" >
                  <div class="help-block with-errors"></div>
                </div>
                <button type="submit" class="btn btn-secondary source" onclick="getCaptcha()"  style="width:100%;background:#2a3f54 ">INGRESAR</button>
              </form>
              <div class="help-action">
                <p><a style="color: #2a3f54"  target="_blank" href="https://www.google.com">¿Cómo iniciar sesión?</a></p>
                <p><a style="color: #2a3f54" class="forgot" href="#">¿Olvidó su Contraseña?</a></p>
              </div>
            </div>
            <!-- TABS CONTENT SIGNUP -->
            <div id="signup-tab-content">
             <form class="signup-form" action="<?= route_to("activar_usuario")?>" method="post">
              <input type="text" class="input" name="carnet" id="carnet" autocomplete="off" placeholder="Usuario / Carnet">
              <input type="email" class="input" name="email" id="email" autocomplete="off" placeholder="Correo Electrónico">
              <div class="form-group">
                <div  class="g-recaptcha"  data-sitekey="6Ld5oeIUAAAAAM9Rql8w-d1HSap5oWJtAQREMGRE
                " data-callback="verifyCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                <input class="form-control hidden" id="capcha2" name="capcha2" value=""  data-recaptcha="true" required data-error="Please complete the Captcha" hidden="">
                <input type="text" name="result" id="result" hidden="">
                <div class="help-block with-errors"></div>
              </div>
              <button type="submit" class="btn btn-secondary source" onclick="verifyCallback()" style="width:100%;background:#2a3f54 ">ENVIAR SOLICITUD</button>
            </form>
            <div class="help-action">
              <p><a style="color: #2a3f54" target="_blank" href="https://www.google.com">¿Cómo activar su usuario?</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script>

  var widgetId1;
  var widgetId2;
  var onloadCallback = function() {
    widgetId1 = grecaptcha.render('example1', {
      'sitekey' : '6Ld5oeIUAAAAAM9Rql8w-d1HSap5oWJtAQREMGRE',
      'theme' : 'light'
    });
    widgetId2 = grecaptcha.render(document.getElementById('example2'), {
      'sitekey' : '6Ld5oeIUAAAAAM9Rql8w-d1HSap5oWJtAQREMGRE'
    });

  };

  function getCaptcha(){
    let usuario = document.getElementById("usuario").value;
    let pass = document.getElementById("clave").value;
    let valueCapcha = grecaptcha.getResponse(widgetId1);
    if(usuario == ""){
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, ingresa tu Usuario.',
       styling: 'bootstrap3'
     })
    }else if(pass == ""){
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, ingresa tu Contraseña.',
       styling: 'bootstrap3'
     })
    }else if (valueCapcha == "") {
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, comprueba que no eres un Robot.',
       type:'error',
       styling: 'bootstrap3'
     })
    }else{
      document.getElementById("capcha").value= valueCapcha;
    }
  }

  var verifyCallback = function(response) {
    document.getElementById("result").value= response;
    var comprobarCapcha = document.getElementById("result").value;
    var input = document.getElementById("capcha2").value;
    let email = document.getElementById("email").value;
    let carnet = document.getElementById("carnet").value;
    var valueCapcha = response;
    
    if(carnet == ""){
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, ingresa tu usuario o carnet.',
       styling: 'bootstrap3'
     })
    }else if(email == ""){
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, ingresa tu correo electrónico',
       styling: 'bootstrap3'
     })
    }else if (comprobarCapcha == "undefined" && input =="") {
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, comprueba que no eres un Robot.',
       type:'error',
       styling: 'bootstrap3'
     })
    }else{
      document.getElementById("capcha2").value= response;
    }
  };
  
  function validar(){
    let usuario = document.getElementById("usuario_r").value;
    let email = document.getElementById("email_r").value;
    if(usuario == ""){
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, ingresa tu Usuario.',
       styling: 'bootstrap3'
     })
    }else if(email == ""){
      new PNotify({
       title: '¡ALERTA!',
       text: 'Por favor, ingresa tu correo electrónico.',
       styling: 'bootstrap3'
     })
    }else{

    }
  }

</script>