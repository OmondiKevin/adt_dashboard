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
		$query = $this->db->query('SELECT COUNT(source) AS counted , source from patients_enrolled_in_care Group by source;');

		$result=$query->result();

		$json_data = []; // initialize a json array
		if($result){
			foreach ($result as $res) {
				$json_data['main'][] = [
					'name'	=> $res->source, //x axis
					'y'		=>	$res->counted, // y axis
					'drilldown'	=>	$res->source 
				];

				$sql = "SELECT
							source,
							SUM(IF(gender = 'male', 1, 0)) as male,
							SUM(IF(gender = 'female', 1, 0)) as female
						FROM patients_enrolled_in_care
						GROUP BY source";
				$drilldown = $this->db->query($sql)->result();
				foreach ($drilldown as $drill) {
					$json_data['drilldown'][$drill->source] = [
						'name'	=>	$drill->source,
						'id'	=>	$drill->source,
						'data'	=>	[
							['male', $drill->male],
							['female', $drill->female]
						]
					];
				}
				
			}
		}

		$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode($json_data, JSON_NUMERIC_CHECK));
	}
}
