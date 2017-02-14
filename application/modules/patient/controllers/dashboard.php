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
		$query = $this->db->get('sources_count_view');

		$result=$query->result();

		$json_data = [];
		if($result){
			foreach ($result as $res) {
				$json_data['main'][] = [
					'name'	=> $res->name,
					'y'		=>	$res->number_of_patients,
					'drilldown'	=>	true
				];

				$sql = "SELECT gender, count(*) AS No FROM tbl_patient WHERE source_id = $res->source_id GROUP BY gender;";
				
				$source_query = $this->db->query($sql);
				$source_result = $source_query->result();

				$source_data = [];
				foreach ($source_result as $something) {
					$inner_data =[];

					$inner_data[] = $something->gender;
					$inner_data[] = $something->No;
					array_push($source_data, $inner_data);
				}

				$json_data['drilldown'][$res->name] = [
					'name'	=>	$res->name,
					'data'	=>	$source_data
				];
				
			}
		}

		$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode($json_data, JSON_NUMERIC_CHECK));
	}
}
