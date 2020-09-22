<?php namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\Catalogos\UsuariosModel;
use App\Models\Catalogos\PersonaModel;
use App\Models\Catalogos\UsuarioPersonaModel;
use \CodeIgniter\Exceptions\PageNotFoundException;
use SoapClient;
use SoapFault;

class Post extends BaseController {

    public function login_post(){
        $user = new UsuariosModel();
        helper('user');
        $usuario       = $this->request->getPost('usuario');
        $clave         = $this->request->getPost('clave');
        $estado        = '1';
        $buscarUsuario = $user->asObject()->select()->where('usuario',$usuario)->findAll();

        foreach ($buscarUsuario as $key => $us) {
            $session                      = session();
            $_SESSION["usuarioSession"]   = $us->usuario;
            $_SESSION["usuarioIdSession"] = $us->usuarioId;
            $_SESSION["estadoSession"]    = $us->estado;

            $newdata = [
                'usuarioId'  => $us->usuarioId,
                'estado'  => $us->estado,
                'usuario' => $us->usuario,
                'personaId' => $us->personaId,
                'rolId'   => $us->rolId,
                'claveU'   => $us->clave
            ];

            $session->set($newdata);
        }

        $buscarUsuarioActivo = $user->select('usuarioId,usuario,clave,rolId,estado')->where('usuario',$usuario)->where('estado','1')->orWhere('estado','2')->orWhere('estado','3')->first();
        $buscarUsuarioParaActivar = $user->select()->where('usuario',$usuario)->where('estado','2')->where('clave','')->first();

        $recaptcha        =  $this->request->getPost('g-recaptcha-response');
        $url              =  'https://www.google.com/recaptcha/api/siteverify';

        $data             =  array(
            'secret'      => '6Ld5oeIUAAAAAGBCFuQVMPm0DuZNI8EIPbBDLKu0',
            'response'    => $recaptcha
        );

        $options          =  array(
            'http'        => array (
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                "Content-Length: ".strlen(http_build_query($data))."\r\n".
                "User-Agent:MyAgent/1.0\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context          =  stream_context_create($options);
        $verify           =  file_get_contents($url, false, $context);
        $captcha_success  =  json_decode($verify);

        if($captcha_success->success){
            if (!$buscarUsuario) {
                return redirect()->back()->with('messageError','Lo sentimos, el usuario es incorrecto.');
            }else if(!$buscarUsuarioActivo){
                return redirect()->back()->with('messageError','Usuario Inactivo, contacta con administración');
            }else if ($buscarUsuarioParaActivar) {
                return redirect()->back()->with('messageError','Usuario Pendiente, Por favor activa tu usuario para acceder');
            }

            $session = session();

            if (verifyKey($clave,$session->claveU)) {
                unset($session->claveU);
                return $this->_redirectAuth();
            }else{
                return redirect()->back()->with('messageError','Lo sentimos, su contraseña es incorrecta.');
            }
        }else{
            return redirect()->back()->with('messageError','ERES UN ROBOT.');
        }
    }

    public function activar_usuario(){
        //Generar clave aleatoria
        function ClaveAleatoria($longitud = 10, $opcLetra = TRUE, $opcNumero = TRUE, $opcMayus = TRUE, $opcEspecial = FALSE){
            $letras      = "abcdefghijklmnopqrstuvwxyz";
            $numeros     = "1234567890";
            $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $especiales  = "|@#~$%()=^*+[]{}-_";
            $listado     = "";
            $password    = "";

            if ($opcLetra   == TRUE) $listado .= $letras;
            if ($opcNumero  == TRUE) $listado .= $numeros;
            if($opcMayus    == TRUE) $listado .= $letrasMayus;
            if($opcEspecial == TRUE) $listado .= $especiales;

            for( $i=1; $i<=$longitud; $i++) {
                $caracter = $listado[rand(0,strlen($listado)-1)];
                $password.=$caracter;
                $listado = str_shuffle($listado);
            }

            return $password;
        }

        //Verificar capcha
        $recaptcha        =  $this->request->getPost('g-recaptcha-response');
        $url              =  'https://www.google.com/recaptcha/api/siteverify';

        $data             =  array(
            'secret'      => '6Ld5oeIUAAAAAGBCFuQVMPm0DuZNI8EIPbBDLKu0',
            'response'    => $recaptcha
        );

        $options          =  array(
            'http'        => array (
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n".
                "Content-Length: ".strlen(http_build_query($data))."\r\n".
                "User-Agent:MyAgent/1.0\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context          =  stream_context_create($options);
        $verify           =  file_get_contents($url, false, $context);
        $captcha_success  =  json_decode($verify);

        //Modelos
        $user           = new UsuariosModel();
        $persona        = new PersonaModel();
        $usuarioPersona = new UsuarioPersonaModel();

        //Obtener credenciales
        helper('user');
        $usuario = $this->request->getPost('carnet');
        $email   = $this->request->getPost('email');

        //Consultar si el usuario ya esta activo en EDU
        $UsuarioActivo = $usuarioPersona->asObject()->select()->where('usuario',$usuario)->where('email',$email)->where('estado','1')->findAll();

        $UsuarioPendiente = $usuarioPersona->asObject()->select()->where('usuario',$usuario)->where('email',$email)->where('estado','2')->findAll();

        if ($captcha_success->success) {
            if ($UsuarioActivo) {
                return redirect()->back()->with('messageError','Lo sentimos, su usuario ya se encuentra activo.');
            }else if($UsuarioPendiente){//SI EL USUARIO YA ESTÁ TRASLADADO Y SIGUE SIN ACTIVAR
                //Consultar ID de Usuario
                $resultado = $usuarioPersona->asObject()->select()->where('usuario',$usuario)->where('email',$email)->findAll();

                foreach ($resultado as $key => $u) {
                    $session               = session();
                    $_SESSION["usuarioId"] = $u->usuarioId;
                }

                $session = session();

                //Enviar correo electrónico
                $generarContraseña = ClaveAleatoria();
                helper('email');
                enviarEmail($email,$generarContraseña);

                $id = $_SESSION["usuarioId"];

                $user->update($id, [
                    'clave'  => hashClave($generarContraseña),
                ]);

                return redirect()->to("/login")->with('message','Se ha enviado de nuevo una contraseña temporal a tu correo electrónico.');
            }else{
                $urlWS = 'http://localhost/EduWS/directorioWSDL/eduWS.wsdl';//URL DE WEB SERVICE

                //OPCIONES SSL
                $opts = array(
                    'ssl' => array(
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                        'allow_self_signed' => true
                    )
                );

                //SOAP
                $params = array(
                    'login'              => base64_encode('EDU_UCAD'),
                    'password'           => base64_encode('PlataformaEvaluacionEDU2020$*'),
                    'encoding'           => 'UTF-8',
                    'verifypeer'         => false,
                    'verifyhost'         => false,
                    'Content-Type'       => 'text/xml',
                    'trace'              => 1,
                    'exceptions'         => 1,
                    'connection_timeout' => 60,
                    'stream_context'     => stream_context_create($opts)
                );

                $clienteSOAP = new SoapClient($urlWS, $params);//CONEXIÓN A WS

                try {
                    $datosUsuario = [
                        [
                            "usuario" => $usuario,
                            "email"   => $email,
                        ]
                    ];

                    // Convert Array to JSON String
                    $dataJSON = json_encode($datosUsuario);

                    $request  =  array(
                        'datausuario'  => $dataJSON
                    );

                    $response        = $clienteSOAP->trasladoUsuario($request); //LLAMADA A MÉTODO
                    $responseToArray = (array)$response;
                    $responseConvert = json_decode(base64_decode($responseToArray["responseusuario"]), true);

                    if($responseConvert){//DATOS ENCONTRADOS
                        $personIdUonline = $responseConvert[1]["personaId"];
                        $buscarPersona   = $persona->asObject()->select('personaIdUonline')->where('personaIdUonline',$personIdUonline)->first();

                        if(!$buscarPersona){//NO EXISTE LA PERSONA EN DB_EDU
                            //INSERTAR DATOS DE PERSONA
                            $persona->insert([
                                'DUI'              => $responseConvert[1]["DUI"],
                                'carnet'           => $responseConvert[1]["carnet"],
                                'nombres'          => $responseConvert[1]["nombres"],
                                'apellidos'        => $responseConvert[1]["apellidos"],
                                'tipoPersona'      => $responseConvert[1]["tipoPersona"],
                                'estadoCivil'      => $responseConvert[1]["estadoCivil"],
                                'sexo'             => $responseConvert[1]["sexo"],
                                'telefono'         => $responseConvert[1]["telefono"],
                                'email'            => $responseConvert[1]["email"],
                                'fechaNacimiento'  => $responseConvert[1]["fechaNacimiento"],
                                'fechaIngreso'     => $responseConvert[1]["fechaIngreso"],
                                'anioIngreso'      => $responseConvert[1]["anioIngreso"],
                                'estado'           => '1',
                                'fechaTraslado'    => $responseConvert[1]["fechaTraslado"],
                                'usuarioTraslado'  => 'EDUWS',
                                'personaIdUonline' => $personIdUonline,
                            ]);

                            $personaId = $persona->select('personaId')->where('personaIdUonline',$personIdUonline)->first();
                            
                            $generarContraseña = ClaveAleatoria();

                            //INSERTAR DATOS DE USUARIO
                            $user->insert([
                                'personaId'       => $personaId,
                                'usuario'         => $responseConvert[0]["usuario"],
                                'clave'           => hashClave($generarContraseña),
                                'rolId'           => $responseConvert[0]["rolId"],
                                'estado'          => '2',
                                'fechaTraslado'   => $responseConvert[1]["fechaTraslado"],
                                'usuarioTraslado' => 'EDUWS',
                            ]);

                            //ENVIAR CORREO DE NOTIFICACIÓN
                            helper('email');
                            enviarEmail($email,$generarContraseña);

                            return redirect()->to("/login")->with('message','Se ha enviado una contraseña temporal a tu correo electrónico.');
                        }else{

                        }
                    }else{//DATOS ERRÓNEOS
                        if(base64_decode($responseToArray["responseusuario"])=="USUARIO_INCORRECTO"){
                            return redirect()->back()->with('messageError','Lo sentimos, no se ha encontrado el Usuario ingresado. Por favor contacta con administración académica.');
                        }else if(base64_decode($responseToArray["responseusuario"])=="EMAIL_INCORRECTO"){
                            return redirect()->back()->with('messageError','Lo sentimos, el Correo Electrónico ingresado no coincide con tu Usuario. Por favor contacta con administración académica.');
                        }else{
                            return redirect()->back()->with('messageError','Lo sentimos, ha ocurrido un problema con el sistema. Contacta con el administrador. '.base64_decode($responseToArray["responseusuario"]));
                        }
                    }
                } catch (SoapFault $e) {
                    var_dump($clienteSOAP->__getLastResponse());
                }
            }
        }else{
            return redirect()->back()->with('messageError','ERES UN ROBOT.');
        }
    }

    public function recuperar_clave(){
        $usuarioPersona = new UsuarioPersonaModel();
        $user           = new UsuariosModel();

        //Obtener credenciales
        helper('user');
        $usuario = $this->request->getPost('usuario_r');
        $email   = $this->request->getPost('email_r');

        $UsuarioActivo = $usuarioPersona->asObject()->select()->where('usuario',$usuario)->where('email',$email)->where('estado','1')->orWhere('estado','3')->findAll();

        foreach ($UsuarioActivo as $key => $u) {
         $session               = session();
         $_SESSION["usuario_r"] = $u->usuario;$_SESSION["email_r"]=$u->email;$_SESSION["usuarioId_r"] = $u->usuarioId;
         $session->set($u->usuario);
     }

     if ($UsuarioActivo) {
        function ClaveAleatoria($longitud = 10, $opcLetra = TRUE, $opcNumero = TRUE, $opcMayus = TRUE, $opcEspecial = FALSE){
            $letras         ="abcdefghijklmnopqrstuvwxyz";
            $numeros        = "1234567890";
            $letrasMayus    = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $especiales     ="|@#~$%()=^*+[]{}-_";
            $listado        = "";
            $password       = "";

            if ($opcLetra   == TRUE) $listado .= $letras;
            if ($opcNumero  == TRUE) $listado .= $numeros;
            if($opcMayus    == TRUE) $listado .= $letrasMayus;
            if($opcEspecial == TRUE) $listado .= $especiales;

            for( $i=1; $i<=$longitud; $i++) {
                $caracter = $listado[rand(0,strlen($listado)-1)];
                $password.=$caracter;
                $listado = str_shuffle($listado);
            }

            return $password;
        }

            //Enviar correo electrónico
        $generarContraseña = claveAleatoria();
        helper('email');
        recuperarEmail($email,$generarContraseña);
        
        $id = $_SESSION["usuarioId_r"];
        $user->update($id, [
           'clave'  => hashClave($generarContraseña),
           'estado'  => '3',
       ]);
        return redirect()->to("/login")->with('message','Se ha enviado tu nueva contraseña temporal, revisa tu correo electrónico');
    }else{
        return redirect()->back()->with('messageError','No se han encontrado tus datos, verifica tu información.');
    }
}

public function logout(){
    $session = session();
    helper("bitacora");
    cerrar_session();
    $session->seguridad = "";
    $session->destroy();
    return redirect()->to("/login");
}

public function _redirectAuth(){
    $session = session();

    $sesionSeguridad = [
        'seguridad'  => '1',
    ];

    $session->set($sesionSeguridad);
    helper("bitacora");  
    insert_session($session->usuarioId);

    if ($session->estado == '1') {
        return redirect()->to("/SeleccionarCiclo")->with('message','Bienvenido: '.$session->usuario);
    }else if ($session->estado == '2' || $session->estado == '3') {
        return redirect()->to("/CambioClave")->with('message','Bienvenido: '.$session->usuario);
    }
}

private function _loadDefaultView($data,$view){
    echo view("user/templates/header");
    echo view("user/control/$view",$data);
    echo view("user/templates/footer");
}
}