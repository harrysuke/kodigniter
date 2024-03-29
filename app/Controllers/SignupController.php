<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class SignupController extends Controller{

    public function index(){
        helper(['from']);
        $data = [];
        return view('signup', $data);
    }

    public function store(){
        helper(['from']);
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmedPassword' => 'matches[password]'
        ];

        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to(site_url('signin'));
        }else{
            $data['validation'] = $this->validator;
            return view('signup', $data);
        }
    }
}
?>