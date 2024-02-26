<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller{
	
	public function index(){
		$userModel = new UserModel();
		$data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
		return view('user_view', $data);
	}
	
	public function create(){
		return view('add_user');
	}
	
	public function store(){
		$userModel = new UserModel();
		$data = [
			'name' => $this->request->getVar('name'),
			'email' => $this->request->getVar('email'),
		];
		$userModel->insert($data);
		return $this->response->redirect(site_url('/user-list'));
	}
	
	public function singleUser($id = null){
		$userModel = new UserModel();
		$data['user_obj'] = $userModel->where('id', $id)->first();
		return view('edit_view', $data);
	}
	
	public function update(){
		$userModel = new UserModel();
		$id = $this->request->getVar('id');
		$data = [
			'name' => $this->request->getVar('name'),
			'email' => $this->request->getVar('email'),
		];
		$userModel->update($id, $data);
		return $this->response->redirect('site_url'('/user-list'));
	}
	
	public function delete($id = null){
		$userModel = new UserModel();
		$data['user'] = $userModel->where('id', $id)->delete($id);
		return $this->response->redirect(site_url('/user-list'));
	}
}