<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index()
	{
		$this->load->model(['ItemsModel']);		
		$data = $this->ItemsModel->getItem(1);
		$this->load->view('welcome_message');
	}
}
