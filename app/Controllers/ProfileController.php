<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class ProfileController extends Controller{

    public function index(){
        $session = session();
        echo "Hello ".$session->get('name');
        echo " <a href='".site_url('/signout')."'>Sign out</a>";
    }

    public function signout(){
        $session = session();
        $session->destroy();
        return redirect()->to(site_url('/signin'));
    }

}
?>