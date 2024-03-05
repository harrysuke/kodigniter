<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class ApiController extends ResourceController{

    use ResponseTrait;

    public function index(){
        $model = new UserModel();
        $data['users'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function api(){
        return view('api');
    }

    public function create(){
        $model = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Record created successfully'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function show($id = null){
        $model = new UserModel();
        $data = $model->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No record found');
        }
    }

    public function update($id = null){
        $model = new UserModel();
        //$id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Record updated succesfully'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null){
        $model = new UserModel();
        $data = $model->where('id', $id)->delete($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'record deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No record found');
        }
    }
}
?>