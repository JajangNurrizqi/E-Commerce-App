<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function __construct()
	{
        parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$data['title'] = "Halaman testing";

		$this->load->view("/templates/head", $data);
		$this->load->view('welcome_message');
		$this->load->view("/templates/foot");
	}

	public function listItems(){
		$data['title'] = "Halaman testing";
		//load database model
		$this->load->model("ItemsModel");
		//get all items views.
		$data['listItemArray'] = $this->ItemsModel->getAllItems();

		$this->load->view("/templates/head", $data);
		$this->load->view('/pages/items/list', $data);
		$this->load->view("/templates/foot");

	}
	public function edit($id){
		$data['title'] = "Halaman testing";
		$this->load->model("ItemsModel");
		//get all items views.
		$data['listItemArray'] = $this->ItemsModel->getItem($id);
		
		
		$this->load->view("/templates/head", $data);
		$this->load->view('/pages/items/edit', $data);
		$this->load->view("/templates/foot");
	}
}
