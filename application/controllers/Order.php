<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username'))
		{
			redirect('login');
		}
		$this->load->model('Model_order');
	}

	public function index()
	{
		$is_processed = $this->Model_order->process();
		if ($is_processed)
		{
			$this->cart->destroy();
			redirect('order/success');
		} else {
			$this->session->set_flashdata('error', 'Failed to processed your order');
			redirect('welcome/cart');
		}
	}

	public function success()
	{
		$this->load->view('order_success');
	}

}