<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index()
	{
		$data['page_title'] = "ADT Dashboard";
		$this->load->view('dashboard_view', $data);
		$this->load->view('enrolled_in_care'); // load the chart of patients enrolled in care
		$this->load->view('enrolled_in_art'); // load the chart of the patients enrolled in art
	}

	function getData(){
		$json_data = array();
		$json_data['main'] = $this->enrolled_care_model->get_source_total();
		$json_data['drilldown'] = $this->enrolled_care_model->get_source_drilldown_gender();
		$this->output->set_content_type('application/json')->set_output(json_encode($json_data, JSON_NUMERIC_CHECK));
	}

	public function getART(){
		$json_data = array();
		$json_data['main'] = $this->enrolled_art_model->get_service_total();
		$json_data['drilldown'] = $this->enrolled_art_model->get_service_drilldown_gender();
		$this->output->set_content_type('application/json')->set_output(json_encode($json_data, JSON_NUMERIC_CHECK));
	}

}
