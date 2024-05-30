<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("cart");
		$this->load->model("ItemsModel");
	}
	public function index()
	{
		$data['title'] = "";
		$data['page_type'] = "shop";
		//get all products
		$products['products'] = $this->ItemsModel->get_all_products();


		$this->load->view("/templates/head", $data);
		$this->load->view('pages/home', $products);
		$this->load->view("/templates/foot");
	}
	public function detail($id = 0, $prodID = "")
	{
		if ($id == 0 || empty($prodID)) {
			show_404();
		} else {
			if ($this->ItemsModel->is_product_exist($id, $prodID)) {
				$data["title"] = "Detail produk";
				$data['page_type'] = "shop";
				$product['product'] = $this->ItemsModel->product_data($id);
				$this->load->view("/templates/head", $data);
				$this->load->view('pages/items/detail', $product);
				$this->load->view("/templates/foot");
			} else {
				show_404();
			}
		}
	}
	public function cart()
    {
		$data['title'] = "Keranjang belanja";
		$data['page_type'] = "cart";
        $cart['carts'] = $this->cart->contents();
        $cart['total_cart'] = $this->cart->total();

        $cart['total_price'] = $cart['total_cart'];
		$this->load->view("/templates/head", $data);
		$this->load->view('pages/items/keranjang', $cart);
		$this->load->view("/templates/foot", $data);
	}
	public function cart_api()
	{
		$action = $this->input->get('action');
		$response;
		switch ($action) {
			case 'add_item':
				$id = $this->input->post('id');
				$qty = $this->input->post('qty');
				$sku = $this->input->post('sku');
				$name = $this->input->post('name');
				$price = $this->input->post('price');

				$item = array(
					'id' => $id,
					'qty' => $qty,
					'price' => $price,
					'name' => $name
				);
				$this->cart->insert($item);
				$total_item = count($this->cart->contents());

				$response = array('code' => 200, 'message' => 'Item dimasukkan dalam keranjang', 'total_item' => $total_item);
				break;
			case 'display_cart':
				$carts = [];

				foreach ($this->cart->contents() as $items) {
					$carts[$items['rowid']]['id'] = $items['id'];
					$carts[$items['rowid']]['name'] = $items['name'];
					$carts[$items['rowid']]['qty'] = $items['qty'];
					$carts[$items['rowid']]['price'] = $items['price'];
					$carts[$items['rowid']]['subtotal'] = $items['subtotal'];
				}

				$response = array('code' => 200, 'carts' => $carts);
				break;
			case 'cart_info':
				$total_price = $this->cart->total();
				$total_item = count($this->cart->contents());

				$data['total_price'] = $total_price;
				$data['total_item'] = $total_item;

				$response['data'] = $data;
				break;
			case 'remove_item':
				$rowid = $this->input->post('rowid');
				$this->cart->remove($rowid);

				$total_price = $this->cart->total();
				$data['code'] = 204;
				$data['message'] = 'Item dihapus dari keranjang';
				$data['total']['subtotal'] = 'Rp ' . format_rupiah($total_price);
				$data['total']['total'] = 'Rp ' . format_rupiah($total_price);

				$response = $data;
				break;
		}
		if($response != null){
			$response = json_encode($response);
			$this->output->set_content_type('application/json')
				->set_output($response);	
		}else{
			show_404();
		}
	}
}
