<?php namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\Catalogos\UsuariosModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController {
    public function login(){
        $this->_loadDefaultView([],'login');
        return $this->_redirectAuth();
    }


    public function login_post(){
        $user = new UsuariosModel();
        helper('user');
        $usuario       = $this->request->getPost('usuario');
        $clave         = $this->request->getPost('clave');
        $estado        = 'ACTIVO';
        $buscarUsuario = $user->select('usuarioId,usuario,clave,rolId,estado')->where('usuario',$usuario)->first();
        $buscarUsuarioActivo = $user->select('usuarioId,usuario,clave,rolId,estado')->where('usuario',$usuario)->first();

        $recaptcha        =  $this->request->getPost('g-recaptcha-response');
        $url              =  'https://www.google.com/recaptcha/api/siteverify';

        $data             =  array(
            'secret'      => '6LdcxugUAAAAADv3rAg8lU368QFsn1Fm7UQdalJ6',
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
                return redirect()->back()->with('message','Lo sentimos, el usuario es incorrecto.');
            }
            // else if(!$buscarUsuarioActivo){
            //     return redirect()->back()->with('message','Usuario Inactivo, contacta con administración');
            // }
            if (verifyKey($clave,$buscarUsuario['clave'])) {
                unset($buscarUsuario['clave']);
                $session = session();
                $session->set($buscarUsuarioActivo);
                return $this->_redirectAuth();
            }else{
                return redirect()->back()->with('message','Lo sentimos, su contraseña es incorrecta.');
            }
        }else{
            return redirect()->back()->with('message','ERES UN ROBOT.');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to("/login");

    }

    private function _redirectAuth(){
        $session = session();
        if ($session->rolId=='1' && $session->estado=='ACTIVO') {
            return redirect()->to("/SeleccionarCiclo")->with('message','Bienvenido: '.$session->usuario);
        }else if ($session->estado=='EN PROCESO') {
            return redirect()->to("/CambioClave")->with('message','Bienvenido: '.$session->usuario);
        }
    }

    private function _loadDefaultView($data,$view){
        echo view("user/templates/header");
        echo view("user/control/$view",$data);
        echo view("user/templates/footer");
    }
}