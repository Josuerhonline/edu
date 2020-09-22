</div>
</div>
<?php 
helper("bitacora");
cerrar_session();
session_unset();
session_destroy(); ?>
<div class="right_col" role="main" >
  <link rel="stylesheet" href="/build/css/selects.css">
  <link rel="stylesheet" href="/build/css/select2.css">
  <div class="clearfix"></div>
  <div class="row" >
    <div class="col-md-12 col-sm-12 " >
      <div class="x_panel" style="border: 1px solid #e1e1e1;" >
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
          <center><img style="width: 12%;" src="/user/img/ucad-logo.png" alt="..." ></center>
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="col-middle">
                <div class="text-center text-center">
                  <h1>Su sesión ha expirado.</h1>
                  <h2>El sistema ha detectado inactividad mayor a 5 minutos.</h2>
                  <p>Para acceder de nuevo <a href="/login">Inicie sesión</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


