<?php

class Hello extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('model_hello');
	}

	public function index()
	{
		$this->load->view('view_hello');
	}


}