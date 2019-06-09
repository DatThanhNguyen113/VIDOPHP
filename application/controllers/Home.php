<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->model('Product_model');
		$pros = $this->Product_model->getBestPrice();
		$data = $this->getProductType();
		$this->load->view('home/index', ['subview' => 'layout/body_layout', 'data' => $pros, 'pt' => $data]);
	}

	public function about()
	{
		$this->load->view('home/index', ['subview' => 'home/about']);
	}

	public function admin()
	{
		$this->load->view('admin/product_list');
	}

	public function product()
	{
		$typeid = $_GET['type'];
		if (isset($typeid)) {
			$this->load->model('Product_model');
			$data = $this->Product_model->getByType($typeid);
			$this->load->view('home/index', ['subview' => 'home/product', 'data' => $data, 'pt' => $this->getProductType()]);
		}
	}

	public function getProductType()
	{
		$this->load->model('Producttype_model');
		$data = $this->Producttype_model->getAll();
		return $data;
	}

	public function addToCart()
	{
		header('Content-type: application/json');
		try {
			//$data = json_decode(file_get_contents('php://input'),true);
			$jsonValue = $this->input->post();
			$cartItems = $this->cart->contents();
			$isExists = false;
			if (count($cartItems) < 1) {
				$this->cart->insert(array(
					'id'      => $jsonValue['id'],
					'qty'     => $jsonValue['amount'],
					'price'   => $jsonValue['price'],
					'name'    => $jsonValue['name'],
					'image'	  => $jsonValue['img']
				));
			} else {
				foreach ($cartItems as $item) {

					if ($item['id'] == $jsonValue['id']) {
						$newCount = $item['qty'] + $jsonValue['amount'];
						$newPrice = $item['price'] + $jsonValue['price'];
						$this->cart->update(array('rowid' => $item['rowid'], 'qty' => $newCount, 'price' => $newPrice));
						$isExists = true;
					}
				}
				if ($isExists == false) {
					$this->cart->insert(array(
						'id'      => $jsonValue['id'],
						'qty'     => $jsonValue['amount'],
						'price'   => $jsonValue['price'],
						'name'    => $jsonValue['name'],
						'image'	  => $jsonValue['img']
					));
				}
			}
			$response = ['message' => 'Ok', 'status' => 1];
			echo json_encode($response);
		} catch (Exception $e) {
			$response = ['message' => $e->getMessage(), 'status' => -1];
			echo json_encode($response);
		}
	}

	public function removeFromCart()
	{
		header('Content-type: application/json');
		try {
			$jsonValue = $this->input->post();
			$cartItems = $this->cart->contents();
			foreach ($cartItems as $item) {

				if ($item['id'] == $jsonValue['id']) {
					$this->cart->remove($item['rowid']);
				}
			}
			$response = ['message' => 'Ok', 'status' => 1];
			echo json_encode($response);
		} catch (Exception $e) {
			$response = ['message' => $e->getMessage(), 'status' => -1];
			echo json_encode($response);
		}
	}

	public function getCartCommonParams()
	{
		$cartItems = $this->cart->contents();
		$totalQty = 0;
		$totalPrice = 0;
		if (!empty($cartItems)) {
			foreach ($cartItems as $item) {
				$totalQty += $item['qty'];
				$totalPrice += $item['price'];
			}
		}
		$CartParams = ['totalQty' => $totalQty, 'totalPrice' => $totalPrice];
		echo json_encode($CartParams);
	}

	public function getDetail()
	{
		$id = $_GET['id'];
		if (isset($id)) {
			$this->load->model('Product_model');
			$data = $this->Product_model->getDetail($id);
			$this->load->view('home/index', ['subview' => 'home/product_detail', 'data' => $data[0], 'pt' => $this->getProductType()]);
		}
	}

	public function cartCheckout()
	{
		if (!empty($this->session->userdata('username'))) {
			$this->load->view('home/index', ['subview' => 'home/cart_checkout', 'pt' => $this->getProductType()]);
		} else {
			redirect(base_url() . 'index.php/account/index');
		}
	}

	public function excuteBill()
	{
		header('Content-type: application/json');
		try {
			$jsonValue = $this->input->post();
			$this->load->model('Bill_model');
			$BillID = $this->Bill_model->createBill($this->session->userdata('id'));
			$TotalPrice = 0;
			$this->db->reconnect();
			$cartItems = $this->cart->contents();
			if (!empty($cartItems)) {
				foreach ($cartItems as $item) {
					$this->Bill_model->insertDetail((int)$BillID, (int)$item['id'], (int)$item['qty'], (int)$item['price']);
					$TotalPrice += $item['price'];
					$this->Bill_model->updateProduct($item['id'], $item['qty']);
				}
			}
			$this->db->reconnect();
			$this->Bill_model->updateBill((int)$BillID, $TotalPrice);
			$this->db->reconnect();
			$this->Bill_model->addShipDetail($jsonValue['receiver_name'], $jsonValue['address'], $jsonValue['city'], $jsonValue['phone'], (int)$BillID);

			$this->cart->destroy();
			$this->load->model('Ultility_model');
			$this->Ultility_model->sendMail($this->session->userdata('email'), 'Electro', 'Cảm ơn quý khách đẫ mua hàng tại Electro shop', '');
			$response = ['message' => 'Ok', 'status' => 1];
			echo json_encode($response);
		} catch (Exception $e) {
			$response = ['message' => $e->getMessage(), 'status' => -1];
			echo json_encode($response);
		}
	}

	function reloadCart()
	{
		foreach ($this->cart->contents() as $items) {
			echo '
											<div class="product-widget">
												<input type="hidden" value="' . $items['id'] . '"/>
												<div class="product-img">
													<img src="' . $items['image'] . '" alt="">
												</div>
												<div class="product-body">
													<h4 class="product-price">' . $items['qty'] . ' X ' . $items['name'] . '</h4>
												</div>
												<button class="delete" onclick="removeCart();"><i class="fas fa-window-close"></i></button>
											</div>

										';
		}
	}

	public function searchProduct()
	{
		$name = $this->input->get('searchname');
		if (isset($name)) {
			$this->load->model('Product_model');
			$data = $this->Product_model->getByName($name);
			if (count($data) > 0) {
				$this->load->view('home/index', ['subview' => 'home/product', 'data' => $data, 'pt' => $this->getProductType()]);
			} else {
				$this->load->view('home/index', ['subview' => 'home/product', 'pt' => $this->getProductType()]);
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'index.php/home/index');
	}

	public function History()
	{
		if (!empty($this->session->userdata('username'))) {
			$this->load->model('Product_model');
			$pros = $this->Product_model->getHisroty($this->session->userdata('id'));
			// die(var_dump($pros));
			if (!empty($pros)) {
				$this->load->view('home/index', ['subview' => 'home/history', 'data' => $pros, 'pt' => $this->getProductType()]);
			} else {
				$this->load->view('home/index', ['subview' => 'home/history', 'pt' => $this->getProductType()]);
			}
		} else {
			redirect(base_url() . 'index.php/account/index');
		}
	}

	
}
