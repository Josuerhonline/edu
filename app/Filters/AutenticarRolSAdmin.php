<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AutenticarRolSAdmin implements FilterInterface{
    public function before(RequestInterface $request)
    {
       $session = session();
       if ($session->rolId =='2' || $session->rolId =='3') {
       	return redirect('logout');
       }
    }
    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}