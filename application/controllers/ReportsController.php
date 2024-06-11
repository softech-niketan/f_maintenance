<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportsController extends CI_Controller
{



	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->user_name = $this->session->userdata('user_email');
		$this->user_id = $this->session->userdata('user_id');
		$this->current_date = date('Y-m-d');
		$this->current_time =   date("h:i:sa");
		$this->date_time = date('Y-m-d H:i:s');

		$d = date_parse_from_format("Y-m-d", $this->current_date);
		$this->date = $d["day"];
		$this->month = $d["month"];
		$this->year = $d["year"];
	}
	public function asset_master()
	{
		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('asset_master', $data);
		$this->load->view('footer');
	}
	public function monthly_preventive()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			// $data['pm_request'] = $this->Crud_model->get_data_by_id("pm_request", $year_id, "created_year");
			//  print_r($data['pm_request']);

			$data_check = array(
				"crated_month" => $month_id,
				"created_year" => $year_id,
			);
			// print_r($data_check);
			$data['pm_request'] = $this->db->query('SELECT DISTINCT machine_id  FROM pm_request   WHERE crated_month =  ' . $month_id . ' and  created_year =  ' . $year_id . ' ')->result();
		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
			// $data['pm_request'] = $this->Crud_model->get_data_by_id("pm_request", $year_id, "created_year");
			$data_check2 = array(
				"crated_month" => $month_id,
				"created_year" => $year_id,
			);
			// print_r($data_check);
			$data['pm_request'] = $this->db->query('SELECT DISTINCT machine_id  FROM pm_request   WHERE crated_month =  ' . $month_id . ' and  created_year =  ' . $year_id . ' ')->result();
		}

		// print_r($data['pm_request']);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('monthly_preventive', $data);
		$this->load->view('footer');
	}
	public function preventive_performance()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}

		$data_check = array(
			"crated_month" => $month_id,
			"created_year" => $year_id,
		);
		// print_r($data_check);
		$data['pm_request'] = $this->Crud_model->get_data_by_id_multile("pm_request", $data_check);

		// print_r($data['pm_request']);
		// $data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('preventive_performance', $data);
		$this->load->view('footer');
	}

	public function annual_preventive()
	{


		if ($this->input->post('year_id')) {
			// $data['history_instruments'] = $this->Crud_model->get_data_by_id("history_instruments", $instrument_id, "instrument_id");

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');

			$data['pm_request'] = $this->Crud_model->get_data_by_id("pm_request", $year_id, "created_year");

			// print_r($data['pm_request']);

		} else {
			$year_id = $this->year;
			$data['year_id'] = $this->year;

			$data['pm_request'] = $this->Crud_model->get_data_by_id("pm_request", $year_id, "created_year");
		}

		// $data['machines'] = $this->Crud_model->read_data('machines');


		$data['machines'] = $this->Crud_model->read_data('machines');
		$data['assign_pm_group'] = $this->Crud_model->read_data('assign_pm_group');



		$this->load->view('header');


		$this->load->view('annual_preventive', $data);
		$this->load->view('footer');
	}

	//breakdown
	public function breakdown_register()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			"crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		// $data['breakdown_request'] = $this->Crud_model->read_data('breakdown_request');

		$this->load->view('header');

		$this->load->view('breakdown_register', $data);
		$this->load->view('footer');
	}
	public function mtbf()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			"crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('mtbf', $data);
		$this->load->view('footer');
	}
	public function why_why()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			"crated_month" => $month_id,
			"status" => "request_closed"

		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('why_why', $data);
		$this->load->view('footer');
	}
	public function why_why_view()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			"crated_month" => $month_id,
			"status" => "request_closed"

		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('why_why_view', $data);
		$this->load->view('footer');
	}
	public function why_why_details()
	{
		// if ($this->input->post('year_id')) {

		// 	$year_id = $this->input->post('year_id');
		// 	$data['year_id'] = $this->input->post('year_id');
		// 	$month_id = $this->input->post('month_id');
		// 	$data['month_id'] = $this->input->post('month_id');
		// 	//  print_r($data['pm_request']);


		// } else {

		// 	$year_id = $this->year;
		// 	$data['year_id'] = $this->year;
		// 	$month_id = $this->month;
		// 	$data['month_id'] = $this->month;
		// }
		// // echo $year_id;
		// // echo $month_id;



		$bd_id = $this->uri->segment('2');
		$data_check = array(
			"bd_id" => $bd_id,

		);
		// print_r($data_check);
		$data['why_why_analysis'] = $this->Crud_model->get_data_by_id_multile("why_why_analysis", $data_check);
		$data_checkbreakdown_request = array(
			"id" => $bd_id,

		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_checkbreakdown_request);
		$data_checkbreakdown_requestmachine_id = array(
			"id" => $data['breakdown_request'][0]->machine_id,

		);
		// print_r($data_check);
		$data['machines'] = $this->Crud_model->get_data_by_id_multile("machines", $data_checkbreakdown_requestmachine_id);
		$spare_parts_data = array(
			"pm_id" => $bd_id,

		);
		// print_r($data_check);
		$spare_parts = $this->Crud_model->get_data_by_id_multile("spare_parts", $data_checkbreakdown_requestmachine_id);

		$data['used_parts_list'] = array();
		if ($spare_parts) {
			foreach ($spare_parts as $s) {

				$item_master_data = $this->Crud_model->get_data_by_id("item_master", $s->tool_id, "id");
				if ($item_master_data) {
					array_push($data['used_parts_list'], $item_master_data[0]->spare_number . " / " . $item_master_data[0]->spare_description);
				}
			}
		}


		// print_r($data['used_parts_list']);
		$this->load->view('header');

		$this->load->view('why_why_details', $data);
		$this->load->view('footer');
	}
	public function update_why_why()
	{
		$bd_id = $this->input->post('bd_id');
		$why_why_analysis = $this->Crud_model->get_data_by_id("why_why_analysis", $bd_id, "bd_id");
		$data = array(
			"bd_id" => $bd_id,
			"why1" => $this->input->post('why1'),
			"why2" => $this->input->post('why2'),
			"why3" => $this->input->post('why3'),
			"why4" => $this->input->post('why4'),
			"why5" => $this->input->post('why5'),
			"why6" => $this->input->post('why6'),
			"why7" => $this->input->post('why7'),
			"why8" => $this->input->post('why8'),
			"why9" => $this->input->post('why9'),
			"action_plan" => $this->input->post('action_plan'),
		);
		if ($why_why_analysis) {
			$result = $this->Crud_model->update_data_new("why_why_analysis", $data, $bd_id, "bd_id");

			if ($result) {
				// if ($insert) {
				$data = array(
					'success' => 'Updated Successfully !',
				);

				//print_r($data);
				$this->session->set_flashdata($data);

				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			$result = $this->Crud_model->insert_data("why_why_analysis", $data);

			if ($result) {
				$data = array(
					'success' => 'Inserted Successfully !',
				);

				//print_r($data);
				$this->session->set_flashdata($data);

				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function mttr()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			"crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('mttr', $data);
		$this->load->view('footer');
	}
	public function chart_mttr()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			// $month_id = $this->month;
			// $data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('chart_mttr', $data);
		$this->load->view('footer');
	}
	public function chart_mtbf()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			// $month_id = $this->month;
			// $data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('chart_mtbf', $data);
		$this->load->view('footer');
	}
	public function chart_bd_occrance()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			// $month_id = $this->month;
			// $data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('chart_bd_occrance', $data);
		$this->load->view('footer');
	}
	public function chart_bd_hourse()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			// $month_id = $this->month;
			// $data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('chart_bd_hourse', $data);
		$this->load->view('footer');
	}
	public function chart_bd_cost()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			// $month_id = $this->month;
			// $data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('chart_bd_cost', $data);
		$this->load->view('footer');
	}
	public function chart_pm_cost()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			// $month_id = $this->month;
			// $data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('chart_pm_cost', $data);
		$this->load->view('footer');
	}
	public function chart_improvement_cost()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			// $month_id = $this->month;
			// $data['month_id'] = $this->month;
		}
		// echo $year_id;
		// echo $month_id;


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		// print_r($data_check);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);

		$data['machines'] = $this->Crud_model->read_data('machines');

		$this->load->view('header');

		$this->load->view('chart_improvement_cost', $data);
		$this->load->view('footer');
	}


	public function break_down_day_wise()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}


		$data_check = array(
			"created_year" => $year_id,
			"crated_month" => $month_id,
		);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
		$data['machines'] = $this->Crud_model->read_data('machines');

		// $data['breakdown_request'] = $this->Crud_model->read_data('breakdown_request');

		// print_r($data['breakdown_request']);
		$this->load->view('header');

		$this->load->view('break_down_day_wise', $data);
		$this->load->view('footer');
	}
	public function break_down_month_wise()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			// $month_id = $this->input->post('month_id');
			// $data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			//$month_id = $this->month;
			// $data['month_id'] = $this->month;
		}


		$data_check = array(
			"created_year" => $year_id,
			//"crated_month" => $month_id,
		);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
		$data['machines'] = $this->Crud_model->read_data('machines');

		// $data['breakdown_request'] = $this->Crud_model->read_data('breakdown_request');

		// print_r($data['breakdown_request']);
		$this->load->view('header');

		$this->load->view('break_down_month_wise', $data);
		$this->load->view('footer');
	}
	public function breakdown_time_lost_month()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}


		$data_check = array(
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
		$data['machines'] = $this->Crud_model->read_data('machines');

		// $data['breakdown_request'] = $this->Crud_model->read_data('breakdown_request');

		// print_r($data['breakdown_request']);
		$this->load->view('header');

		$this->load->view('breakdown_time_lost_month', $data);
		$this->load->view('footer');
	}
	public function machine_history()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			$data['machine_id'] = $this->input->post('machine_id');
			$machine_id = $this->input->post('machine_id');

			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
			$data['machine_id'] = 0;
			$machine_id = 0;
		}


		$data_check = array(
			"id" => $machine_id,
			// "crated_month" => $month_id,
		);
		$data['machines_data'] = $this->Crud_model->get_data_by_id_multile("machines", $data_check);
		$data_check_pm_request = array(
			"machine_id" => $machine_id,
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		$data['pm_request_data'] = $this->Crud_model->get_data_by_id_multile("pm_request", $data_check_pm_request);
		$data_check_breakdown_request = array(
			"machine_id" => $machine_id,
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		$data['breakdown_request_data'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check_breakdown_request);
		$data_check_breakdown_request = array(
			"machine_id" => $machine_id,
			"created_year" => $year_id,
			// "crated_month" => $month_id,
		);
		$data['improvement_request_data'] = $this->Crud_model->get_data_by_id_multile("improvement_request", $data_check_breakdown_request);
		$data['machines'] = $this->Crud_model->read_data('machines');

		// $data['breakdown_request'] = $this->Crud_model->read_data('breakdown_request');

		// print_r($data['breakdown_request']);
		$this->load->view('header');

		$this->load->view('machine_history', $data);
		$this->load->view('footer');
	}
	public function breakdown_time_lost()
	{
		if ($this->input->post('year_id')) {

			$year_id = $this->input->post('year_id');
			$data['year_id'] = $this->input->post('year_id');
			$month_id = $this->input->post('month_id');
			$data['month_id'] = $this->input->post('month_id');
			//  print_r($data['pm_request']);


		} else {

			$year_id = $this->year;
			$data['year_id'] = $this->year;
			$month_id = $this->month;
			$data['month_id'] = $this->month;
		}


		$data_check = array(
			"created_year" => $year_id,
			"crated_month" => $month_id,
		);
		$data['breakdown_request'] = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
		$data['machines'] = $this->Crud_model->read_data('machines');

		// $data['breakdown_request'] = $this->Crud_model->read_data('breakdown_request');

		// print_r($data['breakdown_request']);
		$this->load->view('header');

		$this->load->view('breakdown_time_lost', $data);
		$this->load->view('footer');
	}
}
