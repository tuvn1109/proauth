<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (!session('user')) {
			return redirect()->to('/auth');
		} elseif (session('user')['role'] != 'admin') {
			return redirect()->to('/error');
		}
	}

	//--------------------------------------------------------------------

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		// Do something here
	}
}