<?php namespace App\Controllers;
use App\Models\BookModel;
use CodeIgniter\Controller;
class BookController extends Controller {
    public function index() {
        $model = new BookModel();
        $data['books'] = $model->findAll();
        echo view('books/index', $data);
    }
    public function create() {
        // Pengecekan login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu!');
        }
        helper('form');
        echo view('books/create');
    }
    public function store() {
        // Pengecekan login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu!');
        }
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $model = new BookModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];
        $model->save($data);
        return redirect()->to('/books')->with('success', 'Buku berhasil ditambahkan.');
    }
    public function edit($id) {
        // Pengecekan login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu!');
        }
        helper('form');
        $model = new BookModel();
        $data['book'] = $model->find($id);
        if (!$data['book']) {
            return redirect()->to('/books')->with('error', 'Buku tidak ditemukan.');
        }
        echo view('books/edit', $data);
    }
    public function update($id) {
        // Pengecekan login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu!');
        }
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $model = new BookModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];
        $model->update($id, $data);
        return redirect()->to('/books')->with('success', 'Buku berhasil diperbarui.');
    }
    public function delete($id) {
        // Pengecekan login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu!');
        }
        $model = new BookModel();
        $model->delete($id);
        return redirect()->to('/books')->with('success', 'Buku berhasil dihapus.');
    }
}