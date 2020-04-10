</div>
</div>
<div class="top_nav">
  <?= view("dashboard/partials/_session"); ?>


</div>
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel" style="border: 60%">
        <div class="x_title">
          <h2>Bienvenido a EDU </h2>
          <div class="clearfix"></div>
          Para tu primer ingreso deberas asignar una nueva contraseña
          <div class="clearfix"></div>
        </div>
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="clearfix"></div>
                      <br>
                      <div class="limiter">
                        <div class="container-login100">
                          <div class="wrap-login100">
                            <form action="/CambioClave/update/<?php  $session = session(); 
            echo $session->usuarioId?>" method="POST" enctype="multipart/form-data">
                 
                              <div class="wrap-input100 "  data-validate="Enter password">
                                <span class="btn-show-pass">
                                  <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" name="nClave" id="nClave" required="">
                                <span class="focus-input100" data-placeholder="Nueva contraseña"></span>
                              </div>

                              <div class="wrap-input100 " data-validate="Enter password">
                                <span class="btn-show-pass">
                                  <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" name="cClave" id="cClave" required="">
                                <span class="focus-input100" data-placeholder="Confirmar contraseña"></span>
                              </div>
                              <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                  <div class="login100-form-bgbtn"></div>
                                  <button type="submit" class="login100-form-btn">
                                    Guardar
                                  </button>
                                </div>
                              </div>
                              <div class="text-center p-t-115">
                                <span class="txt1">
                                  Regresar a 
                                </span>

                                <a class="txt2" href="/logout">
                                  inicio de sesión
                                </a>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <br>
                      <div id="dropDownSelect1"></div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br><br><br>
    </div>
  </div>
</div>
</div>
</div>
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script src="/js/pnotify/dist/pnotify.js"></script>
<script src="/js/pnotify/dist/pnotify.buttons.js"></script>
<script src="/js/pnotify/dist/pnotify.nonblock.js"></script>
<script src="/js/main.js"></script>
<script>
  function comprobarClave(id){
   var nuevaClave = document.getElementById("nClave").value;
   var confirmarClave = document.getElementById("cClave").value;
   if (nuevaClave == confirmarClave) {
       window.location.href = "/CambioClave/update/"+id;
   }else{
        new PNotify({
      title: '¡ALERTA!',
      text: 'Las contraseñas no son iguales',
      type:'error',
      styling: 'bootstrap3'
    })

   }
 }

</script>



