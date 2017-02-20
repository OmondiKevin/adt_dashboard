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

	function getData(){
		$json_data = array();
		$json_data['main'] = $this->enrolled_care_model->get_source_total();
		$json_data['drilldown'] = $this->enrolled_care_model->get_source_drilldown_gender();
		$this->output->set_content_type('application/json')->set_output(json_encode($json_data, JSON_NUMERIC_CHECK));
	}
	function getOptions(){
		
	}
}
