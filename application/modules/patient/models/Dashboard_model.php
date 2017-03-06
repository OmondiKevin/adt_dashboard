<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function get_view_data($view_name, $chart_name, $metric, $filter_array, $order, $limit)
	{	
		//Build custom view query
		$this->db->select("$chart_name,SUM($metric) $metric", FALSE);
		if(!empty($filter_array)){
			foreach ($filter_array as $category => $filter_data) {
				$this->db->where_in($category, $filter_data);
			}
		}
		$this->db->where($chart_name." IS NOT ", NULL);
		$this->db->where($metric." IS NOT ", NULL);
		$this->db->group_by($chart_name);
		$this->db->order_by($metric, $order);
		$this->db->limit($limit);
		$query = $this->db->get($view_name);
        return $query->result_array();
	}
	
}