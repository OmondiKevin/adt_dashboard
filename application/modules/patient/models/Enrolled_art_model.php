<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrolled_art_model extends CI_Model {
	var $drilldown_data = array();

	public function get_service_total(){
		$sql = "SELECT 
				    LOWER(REPLACE(service, ' ', '_')) service,
				    COUNT(*) y,
				    LOWER(REPLACE(service, ' ', '_')) drilldown
				FROM
				    vw_patients_data
				GROUP BY service";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_service_drilldown_gender(){
		$count = 0;
		$formatted_data = array();
		$tmp_data = array();
		$sql = "SELECT
					LOWER(REPLACE(service, ' ', '_')) service,
					COUNT(IF(gender = 'male', 1, NULL)) as male,
					COUNT(IF(gender = 'female', 1, NULL)) as female
				FROM vw_patients_data
				GROUP BY service";
		$totals = $this->db->query($sql)->result_array();
		//Loop through sources
		foreach($totals as $total){
			$formatted_data[$count]['id'] = $total['service'];
			$formatted_data[$count]['name'] = $total['service'];
			$formatted_data[$count]['colorByPoint'] = true;
			//Loop through gender data
			foreach (array('male','female') as $gender){
				$formatted_data[$count]['data'][] = array(
					'name' => ucwords($gender),
					'y' => $total[$gender],
					'drilldown' => $total['service'].'_'.$gender
				);
				//Get age data
				$this->drilldown_data[] = $this->get_service_drilldown_age($total['service'], $gender);
			}
			$count++;
		}

		$formatted_data = array_merge($formatted_data, $this->drilldown_data);
		return $formatted_data;
	}

	public function get_service_drilldown_age($service, $gender){
		$tmp_data = array();
		$formatted_age_data = array();
		$sql = "SELECT
					COUNT(IF(age_category = 'adult', 1, NULL)) as adult,
					COUNT(IF(age_category = 'child', 1, NULL)) as child
				FROM vw_patients_data
				WHERE LOWER(REPLACE(service, ' ', '_')) = ?
				AND gender = ?";
		$totals = $this->db->query($sql, array($service, $gender))->result_array();
		//Loop through totals
		foreach($totals as $total){
			$formatted_age_data['id'] = $service.'_'.$gender;
			$formatted_age_data['name'] = $service.'_'.$gender;
			$formatted_age_data['colorByPoint'] = true;
			//Loop through age_category data
			foreach (array('adult','child') as $age){
				$formatted_age_data['data'][] = array(
					'name'=> ucwords($age),
					'y' => $total[$age],
					'drilldown' => $service.'_'.$gender.'_'.$age
				);
				$this->drilldown_data[] = $this->get_service_drilldown_service($service, $gender, $age);
			}
		}
		return $formatted_age_data;
	}

	public function get_source_drilldown_regimen($service, $gender, $age){
		$formatted_regimen_data = array();
		$sql = "SELECT
					LOWER(REPLACE(service, ' ', '_')) service,
					COUNT(*) as total
				FROM vw_patients_data
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













	// public function get_source_drilldown_service($source, $gender, $age){
	// 	$formatted_service_data = array();
	// 	$sql = "SELECT
	// 				LOWER(REPLACE(service, ' ', '_')) service,
	// 				COUNT(*) as total
	// 			FROM vw_patients_data
	// 			WHERE LOWER(REPLACE(source, ' ', '_')) = ?
	// 			AND gender = ?
	// 			AND age_category = ?";
	// 	$totals = $this->db->query($sql, array($source, $gender, $age))->result_array();
	// 	//Format data
	// 	$formatted_service_data['id'] = $source.'_'.$gender.'_'.$age;
	// 	$formatted_service_data['name'] = $source.'_'.$gender.'_'.$age;
	// 	$formatted_service_data['colorByPoint'] = true;
	// 	//Loop through totals
	// 	foreach($totals as $total){
	// 		$formatted_service_data['data'][] = array(
	// 			'name'=> strtoupper($total['service']),
	// 			'y' => $total['total']
	// 		);
	// 	}
	// 	return $formatted_service_data;
	// }


}