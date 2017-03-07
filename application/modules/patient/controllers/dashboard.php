<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index()
	{
		$data['page_title'] = "ADT Dashboard";
		$this->load->view('dashboard_view', $data);

	}

	function load_views($name){
		$data['chart_text'] = $this->config->item($name.'_text');
		$data['chart_name'] = $name;
		$data['chart_type'] = $this->config->item($name.'_chart_type');
		$this->load->view('charts_view',$data); // load the charts views from the js

	}

	function get_chart($type = NULL){
		$first_item = $this->config->item($type.'_first_item');
		$last_item = $this->config->item($type.'_last_item');
		$json_data = array();
		$json_data['main'] = $this->dashboard_model->get_initial_total($first_item);
		$json_data['drilldown'] = $this->dashboard_model->get_drilldown_gender($first_item, $last_item);
		$this->output->set_content_type('application/json')->set_output(json_encode($json_data, JSON_NUMERIC_CHECK));
	}
}
