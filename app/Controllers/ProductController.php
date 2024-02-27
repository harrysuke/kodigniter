<?php
namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller{

    public function index(){
        $productModel = new ProductModel();
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $query = $productModel->query($sql);
        $data['products'] = $query->getResult();
        return view('product_list', $data);
    }

    public function productForm(){
        return view('product_form');
    }

    public function storeProduct(){
        $name = $this->request->getVar('name');
        $price = $this->request->getVar('price');
        $quantity = $this->request->getVar('quantity');

        $sql = "INSERT INTO product (name, price, quantity) VALUES (?,?,?)";
        $binds = [$name, $price, $quantity];

        $db = \Config\Database::connect();
        $query = $db->query($sql, $binds);

        return redirect()->to(site_url('product-list'));
    }

    public function singleProduct($id = null){
        $db = \Config\Database::connect();

        $sql = "SELECT * FROM product WHERE id = ?";
        $query = $db->query($sql, [$id]);
        $user_obj = $query->getRow();
        $data['user_obj'] = $user_obj;

        return view('edit_product', $data);
    }

    public function updateProduct(){
        $id = $this->request->getVar('id');
        $name = $this->request->getVar('name');
        $price = $this->request->getVar('price');
        $quantity = $this->request->getVar('quantity');

        $sql = "UPDATE product SET name=?, price=?, quantity=? WHERE id=?";
        $binds = [$name, $price, $quantity, $id];

        $db = \Config\Database::connect();
        $db->query($sql, $binds);

        return redirect()->to(site_url('product-list'));
    }

    public function deleteProduct($id = null){
        $db = \Config\Database::connect();

        $sql = "DELETE FROM product WHERE id=?";
        $params = [$id];
        $db->query($sql,$params);

        return redirect()->to(site_url('product-list'));
    }
}
?>