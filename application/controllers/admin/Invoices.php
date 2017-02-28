<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


Class Invoices extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_order');
	}

	public function index()
	{

		$data['invoices'] = $this->Model_order->all()->result();

		$this->load->view('backend/view_all_invoices', $data);

	}

	public function detail($invoice_id)
	{

		$data['invoice'] = $this->Model_order->get_invoice_by_id($invoice_id);
		$data['orders'] = $this->Model_order->get_orders_by_invoice($invoice_id);
		$this->load->view('backend/view_invoice_detail', $data);

	}

}