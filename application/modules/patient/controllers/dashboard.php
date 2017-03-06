<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

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
	public function load_chart()
	{	
		$titles = array('desc'=>'Top','asc'=>'Bottom');
		$chart_name = "dashboard";
		$metric ='quantity';
		$selectedfilters = null;	
		$order = "name";
		$limit = 5;

		#Load chart config
		$chart_type = $this->config->item($chart_name.'_chart_type');
		$metric_title = $this->config->item($chart_name.'_'.$metric.'_chart_metric_title');
		$metric_units = $this->config->item($chart_name.'_'.$metric.'_metric_prefix');
		$view_name = $this->config->item($chart_name.'_view_name');
		$color_point = $this->config->item($chart_name.'_color_point');

		#Get view data                                                                             
		$view_data = $this->dashboard_model->get_view_data($view_name, $chart_name, $metric_title, $selectedfilters, $order, $limit);
		echo "<pre>";print_r($view_data);die;
		$chart_columns = array();
		$chart_data = array();
		foreach ($view_data as $row) {
			foreach ($row as $i => $v) {
				if ($i == $chart_name){
					$chart_columns[] = $v;
				}else{
					if($chart_type == 'pie'){
						$chart_data[] = array('name' => $row[$chart_name], 'y' => floatval($v));
					}else{
						$chart_data[] = floatval($v);
					}
				}
			}
		}
		#Build chart
		$data['chart_name'] = $chart_name;
		$data['chart_type'] = $chart_type;
		$data['chart_title'] = ucwords(str_replace('_', ' ', $chart_name)).' '.$titles[$order].' '.$limit.' Summary';
		$data['chart_metric_title'] = ucwords($metric.$metric_units);
		$data['chart_columns'] = json_encode($chart_columns);
		$data['chart_data'] = json_encode(array(array('name' => $chart_name, 'colorByPoint' => $color_point, 'data' => array_values($chart_data))));

		$this->load->view('chartview', $data);
	}
	// function getOptions(){
	// }
}
