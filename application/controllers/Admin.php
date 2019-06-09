<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function product_list()
	{
		$this->load->model('Product_model');
		$data = $this->Product_model->getAllProduct();
		$data2 = json_encode($this->Product_model->getAllCategory());
		$this->load->view('admin/product_list', ['subview' => 'admin/product_list', 'data' => $data, 'data2' => $data2]);
	}

	public function bill_list(){
		$this->load->model('Product_model');
		$data = $this->Product_model->getAllBill();
		$data2 = json_encode($this->Product_model->getAllCategory());
		$this->load->view('admin/bill/bill_list', ['subview' => 'admin/bill/bill_list', 'data' => $data, 'data2' => $data2]);
	}

	public function product_add(){
		$id = $_GET['id'];
		if(isset($id)){
			$this->load->view('admin/product/add_product');
		}
		
	}

	public function getProductDetail(){
		$id = $_GET['id'];
		if(isset($id)){
			$this->load->model('Product_model');
			$data = $this->Product_model->getDetail($id);
			$this->load->view('admin/product/edit_product',['subview'=>'admin/product/edit_product','data'=>$data[0],'pt'=>$this->getProductType()]);
		}
	}

	function detail($id)
	{
		$this->load->model('Product_model');
		$row = $this->Product_model->detail($id);
		echo json_encode($row);
	}

	// public function getDetail(){
	// 	header('Content-type: application/json');
	// 	 $jsonValue = $this->input->post();
	// 	$id = $_GET['id'];
	// 	if(isset($id)){
	// 		$this->load->model('Product_model');
	// 		$data = $this->Product_model->getDetail($jsonValue['id']);
	// 		echo json_encode($data);
	// 	}
	// }

	public function getProductType(){
		$this->load->model('Producttype_model');
		$data = $this->Producttype_model->getAll();
		return $data;
	}

	// public function AddProduct()
 //    {
 //    	$this->load->model('Product_model');
 //    	$name = $this->input->post("txtName");
 //    	$price = $this->input->post("txtPrice");
 //    	$producer = $this->input->post("txtProducer");
 //    	echo $name;
    	
    	
 //    	$this->Product_model->Add($name,$price,$producer); 
    	
 //    	echo "Successfully";
 //    }

	public function Add() {
        $this->load->model('Product_model');
        $this->Product_model->InsertProduct();
        $data = $this->Product_model->getAllProduct();
        $data2 = $this->Product_model->getAllCategory();
		$this->load->view('admin/product_list', ['subview' => 'admin/product_list','data'=>$data, 'data2' => $data2]);
	}

	// public function Edit(){
	// 	$id = $_GET['id'];
	// 	$this->load->model('Product_model');
	// 	$this->Product_model->UpdateProductById($id);
	// 	$data = $this->Product_model->GetAllProduct();
	// 	$this->load->view('admin/product_list', ['data'=>$data,'subview'=>'admin/product_list']);
	// }

	// public function Delete(){
	// 	$id = $_GET['id'];
	// 	$this->load->model('Product_model');
	// 	$this->Product_model->DeleteProductById($id);
	// 	$data = $this->Product_model->GetAllProduct();
	// 	$this->load->view('admin/product_list', ['data'=>$data,'subview'=>'admin/product_list']);
	// }


	public function insert(){
		$this->load->model('Product_model');
		$data = array(
            'name' => $this->input->post('txtName'),
            'price' => $this->input->post('txtPrice'),
            'producer' => $this->input->post('txtProducer'),
            'description' => $this->input->post('txtDescription'),
            'product_type_id' => $this->input->post('cat_id')
            );
        if (!empty($_FILES['proimg']['name'])) {
            $config['upload_path'] = 'electro/img';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['proimg']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('proimg')) {
                $uploadData = $this->upload->data();
                $filename = (string)$uploadData['file_name'];
                $data["image"] = sprintf("img/%s",$filename);
            }else{
                $data["image"] = '';
            }
        }else{
            $data["image"] = '';   
        }

        echo $this->Product_model->insert($data);
	}

	public function update()
	{
		$this->load->model('Product_model');
		$data = array(
            'name' => $this->input->post('product_name'),
            'price' => $this->input->post('price'),
            'producer' => $this->input->post('producer'),
            'description' => $this->input->post('description'),
            'product_type_id' => $this->input->post('cat_id')
            // 'PubId' => $this->input->post('pubid') 
        );
        if (!empty($_FILES['proimg']['name'])) {
            $config['upload_path'] = 'electro/img';
           	$config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['proimg']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('proimg')) {
                $uploadData = $this->upload->data();
                $filename = (string)$uploadData['file_name'];
                $data["image"] = sprintf("img/%s",$filename);
            	} else{
                	$data["image"] = '';
            	}
            }else{
                $data["image"] = '';   
            }

             // $this->db->where('id', $id);
             // $this->db->update('product', $data);
		echo $this->Product_model->update($this->input->post('product_id'), $data);

	}

	public function delete()
	{
		$this->load->model('Product_model');
		$id = $this->input->post('product_id');
		echo $this->Product_model->delete($id);
	}

}