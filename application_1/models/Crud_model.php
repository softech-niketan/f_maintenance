<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{





	public function insert_data($table_name, $array)
	{
		if ($this->db->insert($table_name, $array)) {
			// redirect('index');
			return true;
		} else {
			return false;
		}
	}
	public function update_data($table_name, $array, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($table_name, $array)) {
			// redirect('index');
			return true;
		} else {
			return false;
		}
	}
	public function update_data_new($table_name, $array, $id, $column_name)
	{
		$this->db->where($column_name, $id);
		if ($this->db->update($table_name, $array)) {
			// redirect('index');
			return true;
		} else {
			return false;
		}
	}
	public function delete($table_name, $array)
	{

		// $this->db->where($array);
		if ($this->db->delete($table_name, $array)) {
			// redirect('index');
			return true;
		} else {
			return false;
		}
	}
	public  function get_all_data($table_name)
	{
		if ($this->db->field_exists('priority', $table_name)) {
			$this->db->order_by("priority", "ASC");
		}
		if ($this->db->field_exists('deleted', $table_name)) {
			$this->db->where("deleted", 0);
		} else {
			$this->db->order_by("id", "desc");
		}

		return $this->db->get($table_name)->result();
	}
	public function read_data($table_name)
	{
		// $this->db->where($array);
		$q_data = $this->db->get($table_name)->result();
		if ($q_data) {
			// redirect('index');
			return $q_data;
		} else {
			return false;
		}
	}
	public function get_data_by_id($table_name, $name, $column_name)
	{
		$this->db->order_by("id", "desc");

		if ($query = $this->db->get_where($table_name, array($column_name => $name))->result()) {
			return $query;
		} else {
			return false;
		}
	}
	public function get_data_by_id_asc($table_name, $name, $column_name)
	{
		// $this->db->order_by("id", "ASC");

		if ($query = $this->db->get_where($table_name, array($column_name => $name))->result()) {
			return $query;
		} else {
			return false;
		}
	}
	public function  weekOfMonth($date)
	{
		//Get the first day of the month.
		$firstOfMonth = strtotime(date("Y-m-01", $date));
		//Apply above formula.
		return intval(date("W", $date)) - intval(date("W", $firstOfMonth)) + 1;
	}
	public function select_one_with_where($table_name, $column_name, $where)
	{;
		// print_r($query->result());
		if ($query =  $this->db->query('SELECT DISTINCT ' . $column_name . ' FROM ' . $table_name . ' ' . $where . '')->result()) {
			return $query;
		} else {
			return false;
		}
	}
	public function weekOfMonth2($date)
	{
		// estract date parts
		list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));

		// current week, min 1
		$w = 1;

		// for each day since the start of the month
		for ($i = 1; $i <= $d; ++$i) {
			// if that day was a sunday and is not the first day of month
			if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
				// increment current week
				++$w;
			}
		}

		// now return
		return $w;
	}
	public function get_data_by_id_count_new($table_name, $name, $column_name)
	{
		$this->db->order_by("id", "desc");
		$query = $this->db->get_where($table_name, array($column_name => $name))->num_rows();
		// if () 
		// {
		return $query;
		// } else {
		// 	return 0;
		// }
	}
	// public function query($table_name, $name, $column_name)
	// {
	// 	$this->db->order_by("id", "desc");
	// 	$query = $this->db->get_where($table_name, array($column_name => $name))->num_rows();
	// 	// if () 
	// 	// {
	// 	return $query;
	// 	// } else {
	// 	// 	return 0;
	// 	// }
	// }
	public function get_data_by_id_multile($table_name, $array)
	{
		$this->db->order_by("id", "desc");
		// echo $array['email'];
		// print_r($array);
		// echo "<br>";
		$query1 = 0;
		$query = 0;
		$result = $this->db->get_where($table_name, $array);
		// print_r($result);
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
	public function return_number($id2,$created_month,$created_year,$table_name){
		// $id = $id;

		$role_management_data = $this->db->query('SELECT *   FROM ' . $table_name . ' WHERE crated_month = '.$created_month.' and created_year = '.$created_year.' ORDER BY id ASC');
		$data = $role_management_data->result();

		$key_main = "";
		foreach($data as $key=>$row)
		{
			if($row->id == $id2)
			{
			$key_main = $key+1;
			}
		}

		$month ="";
		if ($created_month == 1) {
			$month = "JAN";
		} else if ($created_month == 2) {
			$month = "FEB";
		} else if ($created_month == 3) {
			$month = "MAR";
		} else if ($created_month == 4) {
			$month = "APR";
		} else if ($created_month == 5) {
			$month = "MAY";
		} else if ($created_month == 6) {
			$month = "JUN";
		} else if ($created_month == 7) {
			$month = "JUL";
		} else if ($created_month == 8) {
			$month = "AUG";
		} else if ($created_month == 9) {
			$month = "SEP";
		} else if ($created_month == 10) {
			$month = "OCT";
		} else if ($created_month == 11) {
			$month = "NOV";
		} else if ($created_month == 12) {
			$month = "DEC";
		}

		 $return_value = $id2."-".$month."-".$key_main;
		return $return_value;
	}
	public function get_data_by_id_multile_asc($table_name, $array)
	{
		// $this->db->order_by("id", "desc");
		// echo $array['email'];
		// print_r($array);
		// echo "<br>";
		$query1 = 0;
		$query = 0;
		$result = $this->db->get_where($table_name, $array);
		// print_r($result);
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return $result->num_rows();
		}
	}
	public function query_sinegle_count($query)
	{

		$result = $this->db->query($query);

		if ($result->num_rows() > 0) {
			return $result->num_rows();
		} else {
			return $result->num_rows();
		}
	}
	public function query_sinegle($query)
	{

		$result = $this->db->query($query);

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
	public function get_data_by_id_multile_count($table_name, $array)
	{


		$result = $this->db->get_where($table_name, $array);

		if ($result->num_rows() > 0) {
			return $result->num_rows();
		} else {
			return $result->num_rows();
		}
	}
	public function get_days($pm_type)
	{
		if ($pm_type == "1 Monthly") {
			return 30;
		} else if ($pm_type == "3 Monthly") {
			return 90;
		} else if ($pm_type == "4 Monthly") {
			return 120;
		} else if ($pm_type == "6 Monthly") {
			return 180;
		} else if ($pm_type == "8 Monthly") {
			return 240;
		} else if ($pm_type == "9 Monthly") {
			return 270;
		} else if ($pm_type == "12 Monthly") {
			return 360;
		}
	}
	public function get_month($get_month)
	{
		if ($get_month == 1) {
			return "JAN";
		} else if ($get_month == 2) {
			return "FEB";
		} else if ($get_month == 3) {
			return "MAR";
		} else if ($get_month == 4) {
			return "APR";
		} else if ($get_month == 5) {
			return "MAY";
		} else if ($get_month == 6) {
			return "JUN";
		} else if ($get_month == 7) {
			return "JUL";
		} else if ($get_month == 8) {
			return "AUG";
		} else if ($get_month == 9) {
			return "SEP";
		} else if ($get_month == 10) {
			return "OCT";
		} else if ($get_month == 11) {
			return "NOV";
		} else if ($get_month == 12) {
			return "DEC";
		}
	}
	public function get_data_by_id_count($table_name, $array)
	{
		$this->db->order_by("id", "desc");
		// echo $array['email'];
		$query1 = 0;
		$query = 0;
		$result = $this->db->get_where($table_name, $array)->num_rows();
		if ($result) {
			return $result;
		} else {
			return 0;
		}
	}
	public function unique_count($table_name, $array)
	{
		// $this->db->order_by("id", "desc");
		// echo $array['email'];

		// $result = $this->db->get_where($table_name, $array)->select_sum('spare_number');
		// print_r($result);
		$query = $this->db->select_sum('actual_stock')->get_where($table_name, $array)->result();
		//  = $this->db->;

		// $query = $this->db->get('spare_grn')->result();
		// print_r($query);
		// $sum = $this->$result->select_sum('spare_number');
		// print_r($sum);
		// if ($result) {
		// 	$i = 0;
		// 	$count = 0;
		// 	// echo $result[0]->actual_stock;
		// 	foreach ($result as $r) {
		// 		$count = $r[$i]->actual_stock + $count;
		// 		$i++;
		// 	}
		// 	echo $count;
		// 	return $count;
		// } else {
		// 	return false;
		// }
		return $query;
	}
	public function grn_qty($spare_id)
	{
	
		$array = array(
			"spare_id" => $spare_id
		);

		$query = $this->db->select_sum('grn_qty')->get_where("spare_grn", $array)->result();
		
		return $query;
	}
	public function grn_qty_new($spare_id)
	{
	
		$array = array(
			"spare_id" => $spare_id
		);

		$query = $this->db->select_sum('on_hand_stock')->get_where("spare_grn", $array)->result();
		
		return $query;
	}
	public function days_count($date)
	{
		$current_date = date("Y-m-d");
		// $result = $this->days_count();
		// $gauges_list = $this->crud_model->read_data("rgauges");
		// $calibrdate = $gauges_list[$i]->CalibrationDate;
		$date = date_create($date);
		$current_date = date_create($current_date);

		// return ($current_date);
		// echo "<script>alert(' uploaded Sucessfully');document.location='relation'</script>";
		$diff = date_diff($current_date, $date);
		$diff = $diff->format("%r%a");
		if ($diff > 30) {
			$style = "bg-success ";
			$status = "Green";
		} else if ($diff <= 15 && $diff > 0) {
			$style = "bg-danger";
			$status = "Orange";
		} else if ($diff < 0) {
			$style = "bg-black text-white ";
			$status = "Over Due";
		} else {
			$style = " bg-warning ";
			$status = "Yellow";
		}
		return ([$style, $status, $diff]);
	}
	public function days_count_diff_date($date, $date2)
	{
		$current_date = $date2;
		// $result = $this->days_count();
		// $gauges_list = $this->crud_model->read_data("rgauges");
		// $calibrdate = $gauges_list[$i]->CalibrationDate;
		$date = date_create($date);
		$current_date = date_create($current_date);

		// return ($current_date);
		// echo "<script>alert(' uploaded Sucessfully');document.location='relation'</script>";
		$diff = date_diff($current_date, $date);
		$diff = $diff->format("%r%a");
		if ($diff > 30) {
			$style = "bg-success ";
			$status = "Green";
		} else if ($diff <= 15 && $diff > 0) {
			$style = "bg-orange";
			$status = "Orange";
		} else if ($diff < 0) {
			$style = "bg-danger ";
			$status = "Over Due";
		} else {
			$style = " bg-warning ";
			$status = "Yellow";
		}
		return ([$style, $status, $diff]);
	}
	public function days_add($date, $days)
	{
		$current_date = date("Y-m-d");
		// $result = $this->days_count();
		// $gauges_list = $this->crud_model->read_data("rgauges");
		// $calibrdate = $gauges_list[$i]->CalibrationDate;
		$date = date_create($date . '+' . $days . ' days');
		return $date;
		// $current_date = date_create($current_date);

		// // return ($current_date);
		// // echo "<script>alert(' uploaded Sucessfully');document.location='relation'</script>";
		// $diff = date_diff($current_date, $date);
		// $diff = $diff->format("%a");
		// if ($diff > 30) {
		// 	$style = "bg-success ";
		// 	$status = "Green";
		// } else if ($diff <= 15 && $diff > 0) {
		// 	$style = "bg-orange ";
		// 	$status = "Orange";
		// } else if ($diff < 0) {
		// 	$style = "bg-danger ";
		// 	$status = "Over Due";
		// } else {
		// 	$style = " bg-warning ";
		// 	$status = "Yellow";
		// }
		// return ([$style, $status]);
	}
}
