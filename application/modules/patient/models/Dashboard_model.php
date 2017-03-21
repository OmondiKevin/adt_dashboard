<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	var $drilldown_data = array();

	public function get_initial_total($first_column_name){
		$sql = "SELECT 
				    LOWER(REPLACE($first_column_name, ' ', '_')) name,
				    COUNT(*) y,
				    LOWER(REPLACE($first_column_name, ' ', '_')) drilldown
				FROM
				    vw_patients_data
				GROUP BY $first_column_name";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_drilldown_gender($first_column_name, $last_column_name){
		$count = 0;
		$formatted_data = array();
		$tmp_data = array();
		$sql = "SELECT
					LOWER(REPLACE($first_column_name, ' ', '_')) name,
					COUNT(IF(gender = 'male', 1, NULL)) as male,
					COUNT(IF(gender = 'female', 1, NULL)) as female
				FROM vw_patients_data
				GROUP BY $first_column_name";
		$totals = $this->db->query($sql)->result_array();
		//Loop through items
		foreach($totals as $total){
			$formatted_data[$count]['id'] = $total['name'];
			$formatted_data[$count]['name'] = $total['name'];
			$formatted_data[$count]['colorByPoint'] = true;
			//Loop through gender data
			foreach (array('male','female') as $gender){
				$formatted_data[$count]['data'][] = array(
					'name' => ucwords($gender),
					'y' => $total[$gender],
					'drilldown' => $total['name'].'_'.$gender
				);
				//Get age data
				$this->drilldown_data[] = $this->get_drilldown_age($first_column_name, $last_column_name, $total['name'], $gender);
			}
			$count++;
		}

		$formatted_data = array_merge($formatted_data, $this->drilldown_data);
		return $formatted_data;
	}

	public function get_drilldown_age($first_column_name, $last_column_name, $first_column_value, $gender){
		$tmp_data = array();
		$formatted_age_data = array();
		$sql = "SELECT
					COUNT(IF(age_category = 'adult', 1, NULL)) as adult,
					COUNT(IF(age_category = 'child', 1, NULL)) as child
				FROM vw_patients_data
				WHERE LOWER(REPLACE($first_column_name, ' ', '_')) = ?
				AND gender = ?";
		$totals = $this->db->query($sql, array($first_column_value, $gender))->result_array();
		//Loop through totals
		foreach($totals as $total){
			$formatted_age_data['id'] = $first_column_value.'_'.$gender;
			$formatted_age_data['name'] = $first_column_value.'_'.$gender;
			$formatted_age_data['colorByPoint'] = true;
			//Loop through age_category data
			foreach (array('adult','child') as $age){
				$formatted_age_data['data'][] = array(
					'name'=> ucwords($age),
					'y' => $total[$age],
					'drilldown' => $first_column_value.'_'.$gender.'_'.$age
				);
				$this->drilldown_data[] = $this->get_last_total($first_column_name, $first_column_value,$last_column_name,  $gender, $age);
			}
		}
		return $formatted_age_data;
	}

	public function get_last_total($first_column_name, $first_column_value, $last_column_name, $gender, $age){
		$formatted_total_data = array();
		$sql = "SELECT
					LOWER(REPLACE($last_column_name, ' ', '_')) $last_column_name,
					COUNT(*) as total
				FROM vw_patients_data
				WHERE LOWER(REPLACE($first_column_name, ' ', '_')) = ?
				AND gender = ?
				AND age_category = ?";

		$totals = $this->db->query($sql, array($first_column_value, $gender, $age))->result_array();
		//Format data
		$formatted_total_data['id'] = $first_column_value.'_'.$gender.'_'.$age;
		$formatted_total_data['name'] = $first_column_value.'_'.$gender.'_'.$age;
		$formatted_total_data['colorByPoint'] = true;
		//Loop through totals
		foreach($totals as $total){
			$formatted_total_data['data'][] = array(
				'name'=> strtoupper($total[$last_column_name]),
				'y' => $total['total']
			);
		}
		return $formatted_total_data;
	}

	// getAll the facilities
	public function get_facilities($sub_county, $county){
		$filter = "";
		
		if($sub_county!='0' && $county!='0'){
			$filter.=" WHERE sub_county_id = '$sub_county' and county_id='$county'";
		}else if($sub_county!='0'){
			$filter.=" WHERE sub_county_id = '$sub_county'";
		}else if($county!='0'){
			$filter.=" WHERE county_id='$county'";
		}
		$sql = "SELECT DISTINCT
				   facility_id, facility_name
				FROM
				    vw_facilities_data $filter";	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	// getAll the sub_counties
	public function get_sub_counties(){
		$sql = "SELECT DISTINCT
				    sub_county_id, sub_county_name
				FROM
				    vw_facilities_data;";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	// getAll the counties
	public function get_counties(){
		$sql = "SELECT DISTINCT
				    county_id, county_name
				FROM
				    vw_facilities_data;";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
}