<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index()
	{
		$data['page_title'] = "ADT Dashboard";
		$this->load->view('dashboard_view', $data);
	}

	function load_views($name){
		$data['chart_text'] = strtoupper($this->config->item($name.'_text'));
		$data['chart_name'] = $name;
		$data['chart_type'] = $this->config->item($name.'_chart_type');
		$data['chart_metric_title'] = $this->config->item($name.'_chart_metric_title');
		$data['chart_metric_prefix'] = $this->config->item($name.'_chart_metric_prefix');
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

	function getFacilitiesJson($sub_county = 0, $county = 0){
		$facilities = $this->dashboard_model->get_facilities($sub_county,$county);	
		$option ="";
		foreach ($facilities as $key => $value) {
			$name = $value['facility_name'];
			$name = str_replace("'", "\'", $name);
			$option.='<option value="'.$value['facility_id'].'">'.$name.'</option>';
		}	
		echo json_encode($option);
	}

	function getSub_countyJson($county = 0){
		$sub_counties = $this->dashboard_model->get_sub_counties($county);	
		$option ="";
		foreach ($sub_counties as $key => $value) {
			$name = $value['sub_county_name'];
			$name = str_replace("'", "\'", $name);
			$option.='<option value="'.$value['sub_county_id'].'">'.$name.'</option>';
		}	
		echo json_encode($option);
	}
	function getCountyJson(){
		$county = $this->dashboard_model->get_counties();	
		$option ="";
		foreach ($county as $key => $value) {
			$name = $value['county_name'];
			$name = str_replace("'", "\'", $name);
			$option.='<option value="'.$value['county_id'].'">'.$name.'</option>';
		}	
		echo json_encode($option);
	}
}
