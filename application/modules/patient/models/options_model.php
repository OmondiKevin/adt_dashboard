<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options_model extends CI_Model {
	var $drilldown_data = array();
	public function get_source_total(){
		$sql = "SELECT LOWER(REPLACE(source, ' ', '_')) name, COUNT(*) y, LOWER(REPLACE(source, ' ', '_')) drilldown
				FROM patients_enrolled_in_care
				GROUP BY name";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_source_drilldown_gender(){
		$count = 0;
		$formatted_data = array();
		$tmp_data = array();
		$sql = "SELECT
					LOWER(REPLACE(source, ' ', '_')) source,
					COUNT(IF(gender = 'male', 1, NULL)) as male,
					COUNT(IF(gender = 'female', 1, NULL)) as female
				FROM patients_enrolled_in_care
				GROUP BY source";
		$totals = $this->db->query($sql)->result_array();
		//Loop through sources
		foreach($totals as $total){
			$formatted_data[$count]['id'] = $total['source'];
			$formatted_data[$count]['name'] = $total['source'];
			$formatted_data[$count]['colorByPoint'] = true;
			//Loop through gender data
			foreach (array('male','female') as $gender){
				$formatted_data[$count]['data'][] = array(
					'name' => ucwords($gender),
					'y' => $total[$gender],
					'drilldown' => $total['source'].'_'.$gender
				);
				//Get age data
				$this->drilldown_data[] = $this->get_source_drilldown_age($total['source'], $gender);
			}
			$count++;
		}

		$formatted_data = array_merge($formatted_data, $this->drilldown_data);
		return $formatted_data;
	}

	public function get_source_drilldown_age($source, $gender){
		$tmp_data = array();
		$formatted_age_data = array();
		$sql = "SELECT
					COUNT(IF(age_category = 'adult', 1, NULL)) as adult,
					COUNT(IF(age_category = 'child', 1, NULL)) as child
				FROM patients_enrolled_in_care
				WHERE LOWER(REPLACE(source, ' ', '_')) = ?
				AND gender = ?";
		$totals = $this->db->query($sql, array($source, $gender))->result_array();
		//Loop through totals
		foreach($totals as $total){
			$formatted_age_data['id'] = $source.'_'.$gender;
			$formatted_age_data['name'] = $source.'_'.$gender;
			$formatted_age_data['colorByPoint'] = true;
			//Loop through age_category data
			foreach (array('adult','child') as $age){
				$formatted_age_data['data'][] = array(
					'name'=> ucwords($age),
					'y' => $total[$age],
					'drilldown' => $source.'_'.$gender.'_'.$age
				);
				$this->drilldown_data[] = $this->get_source_drilldown_service($source, $gender, $age);
			}
		}
		return $formatted_age_data;
	}

	public function get_source_drilldown_service($source, $gender, $age){
		$formatted_service_data = array();
		$sql = "SELECT
					LOWER(REPLACE(service, ' ', '_')) service,
					COUNT(*) as total
				FROM patients_enrolled_in_care
				WHERE LOWER(REPLACE(source, ' ', '_')) = ?
				AND gender = ?
				AND age_category = ?";
		$totals = $this->db->query($sql, array($source, $gender, $age))->result_array();
		//Format data
		$formatted_service_data['id'] = $source.'_'.$gender.'_'.$age;
		$formatted_service_data['name'] = $source.'_'.$gender.'_'.$age;
		$formatted_service_data['colorByPoint'] = true;
		//Loop through totals
		foreach($totals as $total){
			$formatted_service_data['data'][] = array(
				'name'=> strtoupper($total['service']),
				'y' => $total['total']
			);
		}
		return $formatted_service_data;
	}


}