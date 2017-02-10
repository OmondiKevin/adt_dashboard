<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends MX_Controller {

	public function index()
	{
		$data['page_title'] = "ADT Dashboard";
		$this->load->view('dashboard_view', $data);
		

	}

	function enrolled_in_art()
	{
		$this->load->view('enrolled_in_art');
	}

	function enrolled_in_care()
	{
		$this->load->view('enrolled_in_care');
	}
}
