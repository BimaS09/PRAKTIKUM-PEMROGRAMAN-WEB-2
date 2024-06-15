<?php namespace App\Controllers;
use CodeIgniter\Controller;
class BaseController extends Controller {
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.
        helper('form');
        if (!session()->get('user_id') && !in_array($request->uri->getSegment(1), ['login', 'auth'])) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu!');
        }
    }
}