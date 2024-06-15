<?php namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
class AuthController extends Controller {
    public function login() {
        helper(['form', 'url']);
        echo view('auth/login');
    }
    public function doLogin() {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $model->where('username', $username)->first();
        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/books')->with('success', 'Login berhasil.');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
    public function logout() {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil.');
    }
    public function register() {
        helper(['form', 'url']);
        echo view('auth/register');
    }
    public function doRegister() {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $userModel->insert($data);
        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }
}