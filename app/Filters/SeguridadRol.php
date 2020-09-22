<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SeguridadRol implements FilterInterface{
    public function before(RequestInterface $request)
    {
       $session = session();
       if ($session->seguridad =="") {
       	return redirect('login');
       }
    }
    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}


?>