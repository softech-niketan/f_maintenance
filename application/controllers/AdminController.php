<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');

		$this->user_name = $this->session->userdata('user_email');
		$this->user_id = $this->session->userdata('user_id');
		$this->current_date = date('Y-m-d');
		$this->current_time =  date("h:i:sa");
		$this->date_time = date('Y-m-d H:i:s');

		$d = date_parse_from_format("Y-m-d", $this->current_date);
		$this->date = $d["day"];
		$this->month = $d["month"];
		$this->year = $d["year"];
	}
	public function index()
	{
		// $dashboard_master = $this->Crud_model->get_all_data("dashboard_master");
		// if ($this->input->post('year_id')) {

		// 	$year_id = $this->input->post('year_id');
		// 	$data['year_id'] = $this->input->post('year_id');
		// 	$month_id = $this->input->post('month_id');
		// 	$data['month_id'] = $this->input->post('month_id');
		// } else {

		// 	$year_id = $this->year;
		// 	$data['year_id'] = $this->year;
		// 	$month_id = $this->month;
		// 	$data['month_id'] = $this->month;
		// }
		// $data_check = array(
		// 	"crated_month" => $month_id,
		// 	"created_year" => $year_id,
		// );
		// // print_r($data_check);
		// $pm_request = $this->Crud_model->get_data_by_id_multile("pm_request", $data_check);
		// $data['pm_performance'] = "0";
		// if ($pm_request) {
		// 	$actual_counter = 0;
        //                                     $i = 1;
        //                                     $plan_date = "";


        //                                     foreach ($pm_request as $p) {
        //                                         $jj = 0;
        //                                         $failure = "";
        //                                         // 
        //                                         $machines_data = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");
        //                                         $pm_history_data = $this->Crud_model->get_data_by_id("pm_history", $p->id, "pm_id");
        //                                         $data_check = array(
        //                                             "machine_id" => $p->machine_id,
        //                                             "group_id" => $p->pm_group_id,
        //                                         );
        //                                         $plan_date = "";
        //                                         // print_r($data_check);
        //                                         $assign_pm_group_data = $this->Crud_model->get_data_by_id_multile("assign_pm_group", $data_check);

        //                                         if ($assign_pm_group_data) {

        //                                             foreach ($assign_pm_group_data as $a) {
        //                                                 if ($a->planeed_pm_date) {
        //                                                     $new_year = substr($a->planeed_pm_date, 0, 4);
        //                                                     // echo "<br>";

        //                                                     if ($month_id == substr($a->planeed_pm_date, 5, 2) && $year_id == $new_year) {
        //                                                         $jj = 1;
        //                                                         $plan_date = $a->planeed_pm_date;
        //                                                         $days_ago = date('Y-m-d', strtotime('+5 days', strtotime($plan_date)));
        //                                                         $actual_date = $a->last_pm_date;

        //                                                         if ($days_ago < $actual_date) {
        //                                                             $failure = "yes";
        //                                                         }
        //                                                     }
        //                                                 }
        //                                             }
        //                                             $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $assign_pm_group_data[0]->group_id, "id");
        //                                             $date1 = new DateTime($assign_pm_group_data[0]->last_due_date);
        //                                             $date2 = new DateTime(date('Y-m-d'));

        //                                             $date = date_create($assign_pm_group_data[0]->last_due_date);
        //                                             $current_date = date_create(date('Y-m-d'));
        //                                             $diff_new = date_diff($current_date, $date);
        //                                             $final_date_new = $diff_new->format("%r%a");
        //                                             $feedback = "";
        //                                             $foundry_dept   = "";
        //                                             $machineshop_dept   = "";


        //                                             if ($failure == "yes") {
        //                                                 $actual_counter++;
        //                                             }
        //                                             if ($jj == 1) {   $i++;
        //                                             }
        //                                         }
        //                                     }



		// 									if ($i > 0) {


		// 										$mul =  $actual_counter * 100;
		// 										$abc = $i - 1;

		// 										$data['pm_performance']= 100 - round($mul / $abc, 2);
		// 									} else {
		// 										$data['pm_performance']= 0;
		// 									}
		// }

		// //mtbf start
		// $data['mtbf'] = "0";
		// $data['mttr'] = "0";

		// // $breakdown_request = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
		// $machines = $this->Crud_model->read_data('machines');
		// $data['iwr'] = $this->Crud_model->read_data('improvement_request');
		// $i = 1;
		// $total_hours_bcount = 0;
		// $total_faliure_count = 0;
		// $total_mtfb = 0;

		// $total_mttr = 0;
		// $total_bd_hours = 0;
		// $total_bd_failure  = 0;
		// foreach ($machines as $p) {

		// 	$data_check = array(
		// 		"created_year" => $year_id,
		// 		"crated_month" => $month_id,
		// 		"machine_id" => $p->id,
		// 	);
		// 	$breakdown_request_data = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
		// 	$bd_hours = 0;
		// 	$no_of_failures = 0;
		// 	$ava_hours = 624;
		// 	$mtbf = 0;



		// 	if ($breakdown_request_data) {

		// 		foreach ($breakdown_request_data as $b) {

		// 			if ($b->status == "request_closed") {
						
		// 				$min = (float) substr($b->complete_time_maintaince, 15, 3);
		// 				$min = round($min, 2);
		// 				$hour = (float) substr($b->complete_time_maintaince, 6, 3);
		// 				$hour = round($hour, 2);
		// 				$days = (float) substr($b->complete_time_maintaince, 0, 2);
		// 				$total_hours = ($days * 24) + $hour + ($min / 60);
		// 				$total_hours = round($total_hours, 2);
		// 				// $total_min = ($days * 24) * 60 + ($hour) * 60 + ($min);
		// 				// $total_min = round($total_min, 2);


		// 				$bd_hours = $bd_hours + $total_hours;


		// 				// $bd_hours = (float)substr($b->complete_time_maintaince, 6, 3);
		// 				$no_of_failures++;
		// 			}
		// 		}



		// 		$total_hours_bcount =  $total_hours_bcount + $bd_hours;
		// 		$total_faliure_count =  $total_faliure_count + $no_of_failures;

		// 		if ($no_of_failures != 0) {
		// 			$mtbf = round(($ava_hours - $bd_hours) / $no_of_failures, 2);
		// 			$total_mtfb = $total_mtfb + $mtbf;


		// 			$total_bd_hours = $total_bd_hours + $bd_hours;
		// 			$total_bd_failure = $total_bd_failure + $no_of_failures;
	
	
		// 			$i++;
		// 			$total_mttr = $total_mttr + $mtbf;

		// 			// echo $mtbf;
		// 			// echo "<br>";
		// 		}

			
		// 	}
		// }

		// if ($i != 1 && $total_bd_failure != 0) {
		// 	// $data['mtbf'] = round($total_mtfb / ($i - 1), 2);
		// 	$data['mtbf'] = round((($total_bd_failure * 624) - $total_bd_hours) / $total_bd_failure, 2);
		// 	$data['mttr'] = round($total_bd_hours / ($total_bd_failure),2);
		// }





		// // echo $data['mtbf'];
		// // echo "<br>";
		// // echo $data['mttr'];
		// //mtbf stop
		// $data['maintance_cost'] = "0";
		// $data['gas_consumption'] = "0";
		// $data['MSEB'] = "0";

		// $sum_main =  $this->Crud_model->query_sinegle("SELECT SUM(grn_1_actual_price) AS SUM1 , SUM(grn_2_actual_price) as SUM2  FROM spare_parts WHERE created_year = $year_id AND created_month = $month_id ");
		// $data['Maintaince_cost'] = $sum_main[0]->SUM1 + $sum_main[0]->SUM2;
		// foreach ($dashboard_master as $d) {
		// 	if ($d->name == "Maintance cost") {
		// 		$data['maintance_cost'] = $d->percentage;
		// 	}
		// 	if ($d->name == "Gas consumption") {
		// 		$data['gas_consumption'] = $d->percentage;
		// 	}
		// 	if ($d->name == "MSEB") {
		// 		$data['MSEB'] = $d->percentage;
		// 	}
		// }

		// $sum_main =  $this->Crud_model->query_sinegle("SELECT id  FROM pm_request ");

		// $count=0;
		// if($sum_main)
		// {
		// 	foreach($sum_main as $s)
		// 	{
		// 		$data_check_pm_history = array(
		// 			"pm_id" => $s->id,
		// 		);
		// 		$data_check_pm_history2 = array(
		// 			"pm_id" => $s->id,
		// 			"status" => "Maintance Feedback A"
		// 		);
		// 		$new_data_check_pm_history = $this->Crud_model->get_data_by_id_multile("pm_history", $data_check_pm_history);
		// 		if($new_data_check_pm_history)
		// 		{
		// 			if($new_data_check_pm_history[0]->status == "Maintance Feedback A" || $new_data_check_pm_history[0]->status == "Maintenance Feedback Added")
		// 			{
		// 				$count = $count+1;
		// 			}
		// 		}
				
		// 	}
		// }
		// $data['PM_pending'] = $count;
		// $sum_main2 =  $this->Crud_model->query_sinegle("SELECT COUNT(id) AS SUM  FROM breakdown_request WHERE status = 'action_taken' ");
		// $data['BD_pending'] = $sum_main2[0]->SUM;


		// $role_management_data = $this->db->query('SELECT *   FROM pm_request WHERE status !="checksheet_completed"');
		// $data['pm_request_pending'] = $role_management_data->result();

		// $role_management_data = $this->db->query('SELECT *   FROM breakdown_request WHERE status !="FeedBack"');
		// $data['breakdown_pending'] = $role_management_data->result();
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('index');
		$this->load->view('footer');
	}
	public function dashboard()
	{
		$dashboard_master = $this->Crud_model->get_all_data("dashboard_master");
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
		$pm_request = $this->Crud_model->get_data_by_id_multile("pm_request", $data_check);
		$data['pm_performance'] = "0";
		if ($pm_request) {
			$actual_counter = 0;
                                            $i = 1;
                                            $plan_date = "";


                                            foreach ($pm_request as $p) {
                                                $jj = 0;
                                                $failure = "";
                                                // 
                                                $machines_data = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");
                                                $pm_history_data = $this->Crud_model->get_data_by_id("pm_history", $p->id, "pm_id");
                                                $data_check = array(
                                                    "machine_id" => $p->machine_id,
                                                    "group_id" => $p->pm_group_id,
                                                );
                                                $plan_date = "";
                                                // print_r($data_check);
                                                $assign_pm_group_data = $this->Crud_model->get_data_by_id_multile("assign_pm_group", $data_check);

                                                if ($assign_pm_group_data) {

                                                    foreach ($assign_pm_group_data as $a) {
                                                        if ($a->planeed_pm_date) {
                                                            $new_year = substr($a->planeed_pm_date, 0, 4);
                                                            // echo "<br>";

                                                            if ($month_id == substr($a->planeed_pm_date, 5, 2) && $year_id == $new_year) {
                                                                $jj = 1;
                                                                $plan_date = $a->planeed_pm_date;
                                                                $days_ago = date('Y-m-d', strtotime('+5 days', strtotime($plan_date)));
                                                                $actual_date = $a->last_pm_date;

                                                                if ($days_ago < $actual_date) {
                                                                    $failure = "yes";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $assign_pm_group_data[0]->group_id, "id");
                                                    $date1 = new DateTime($assign_pm_group_data[0]->last_due_date);
                                                    $date2 = new DateTime(date('Y-m-d'));

                                                    $date = date_create($assign_pm_group_data[0]->last_due_date);
                                                    $current_date = date_create(date('Y-m-d'));
                                                    $diff_new = date_diff($current_date, $date);
                                                    $final_date_new = $diff_new->format("%r%a");
                                                    $feedback = "";
                                                    $foundry_dept   = "";
                                                    $machineshop_dept   = "";


                                                    if ($failure == "yes") {
                                                        $actual_counter++;
                                                    }
                                                    if ($jj == 1) {   $i++;
                                                    }
                                                }
                                            }



											if ($i > 0) {


												$mul =  $actual_counter * 100;
												$abc = $i - 1;

												$data['pm_performance']= 100 - round($mul / $abc, 2);
											} else {
												$data['pm_performance']= 0;
											}
		}

		//mtbf start
		$data['mtbf'] = "0";
		$data['mttr'] = "0";

		// $breakdown_request = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
		$machines = $this->Crud_model->read_data('machines');
		$data['iwr'] = $this->Crud_model->read_data('improvement_request');
		$i = 1;
		$total_hours_bcount = 0;
		$total_faliure_count = 0;
		$total_mtfb = 0;

		$total_mttr = 0;
		$total_bd_hours = 0;
		$total_bd_failure  = 0;
		foreach ($machines as $p) {

			$data_check = array(
				"created_year" => $year_id,
				"crated_month" => $month_id,
				"machine_id" => $p->id,
			);
			$breakdown_request_data = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
			$bd_hours = 0;
			$no_of_failures = 0;
			$ava_hours = 624;
			$mtbf = 0;



			if ($breakdown_request_data) {

				foreach ($breakdown_request_data as $b) {

					if ($b->status == "request_closed") {
						
						$min = (float) substr($b->complete_time_maintaince, 15, 3);
						$min = round($min, 2);
						$hour = (float) substr($b->complete_time_maintaince, 6, 3);
						$hour = round($hour, 2);
						$days = (float) substr($b->complete_time_maintaince, 0, 2);
						$total_hours = ($days * 24) + $hour + ($min / 60);
						$total_hours = round($total_hours, 2);
						// $total_min = ($days * 24) * 60 + ($hour) * 60 + ($min);
						// $total_min = round($total_min, 2);


						$bd_hours = $bd_hours + $total_hours;


						// $bd_hours = (float)substr($b->complete_time_maintaince, 6, 3);
						$no_of_failures++;
					}
				}



				$total_hours_bcount =  $total_hours_bcount + $bd_hours;
				$total_faliure_count =  $total_faliure_count + $no_of_failures;

				if ($no_of_failures != 0) {
					$mtbf = round(($ava_hours - $bd_hours) / $no_of_failures, 2);
					$total_mtfb = $total_mtfb + $mtbf;


					$total_bd_hours = $total_bd_hours + $bd_hours;
					$total_bd_failure = $total_bd_failure + $no_of_failures;
	
	
					$i++;
					$total_mttr = $total_mttr + $mtbf;

					// echo $mtbf;
					// echo "<br>";
				}

			
			}
		}

		if ($i != 1 && $total_bd_failure != 0) {
			// $data['mtbf'] = round($total_mtfb / ($i - 1), 2);
			$data['mtbf'] = round((($total_bd_failure * 624) - $total_bd_hours) / $total_bd_failure, 2);
			$data['mttr'] = round($total_bd_hours / ($total_bd_failure),2);
		}



		// echo $data['mtbf'];
		// echo "<br>";
		// echo $data['mttr'];
		//mtbf stop
		$data['maintance_cost'] = "0";
		$data['gas_consumption'] = "0";
		$data['MSEB'] = "0";

		$sum_main =  $this->Crud_model->query_sinegle("SELECT SUM(grn_1_actual_price) AS SUM1 , SUM(grn_2_actual_price) as SUM2  FROM spare_parts WHERE created_year = $year_id AND created_month = $month_id ");
		$data['Maintaince_cost'] = $sum_main[0]->SUM1 + $sum_main[0]->SUM2;
		foreach ($dashboard_master as $d) {
			if ($d->name == "Maintance cost") {
				$data['maintance_cost'] = $d->percentage;
			}
			if ($d->name == "Gas consumption") {
				$data['gas_consumption'] = $d->percentage;
			}
			if ($d->name == "MSEB") {
				$data['MSEB'] = $d->percentage;
			}
		}

		$sum_main =  $this->Crud_model->query_sinegle("SELECT id  FROM pm_request ");

		$count=0;
		if($sum_main)
		{
			foreach($sum_main as $s)
			{
				$data_check_pm_history = array(
					"pm_id" => $s->id,
				);
				$data_check_pm_history2 = array(
					"pm_id" => $s->id,
					"status" => "Maintance Feedback A"
				);
				$new_data_check_pm_history = $this->Crud_model->get_data_by_id_multile("pm_history", $data_check_pm_history);
				if($new_data_check_pm_history)
				{
					if($new_data_check_pm_history[0]->status == "Maintance Feedback A" || $new_data_check_pm_history[0]->status == "Maintenance Feedback Added")
					{
						$count = $count+1;
					}
				}
				
			}
		}
		$data['PM_pending'] = $count;
		$sum_main2 =  $this->Crud_model->query_sinegle("SELECT COUNT(id) AS SUM  FROM breakdown_request WHERE status = 'action_taken' ");
		$data['BD_pending'] = $sum_main2[0]->SUM;


		$role_management_data = $this->db->query('SELECT *   FROM pm_request WHERE status !="checksheet_completed"');
		$data['pm_request_pending'] = $role_management_data->result();

		$role_management_data = $this->db->query('SELECT *   FROM breakdown_request WHERE status !="FeedBack"');
		$data['breakdown_pending'] = $role_management_data->result();
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
	public function store_pending_request()
	{
		$data['pending_request'] = $this->Crud_model->query_sinegle("SELECT DISTINCT pm_id,type type FROM spare_parts");

		// print_r(count($data['pending_request']));
		$this->load->view('header');

		$this->load->view('store_pending_request', $data);
		$this->load->view('footer');
	}
	public function store_complete_request()
	{
		$data['pending_request'] = $this->Crud_model->query_sinegle("SELECT DISTINCT pm_id,type FROM spare_parts");

		// print_r($data['pending_request']);
		$this->load->view('header');

		$this->load->view('store_complete_request', $data);
		$this->load->view('footer');
	}
	public function employee()
	{
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('employee');
		$this->load->view('footer');
	}
	public function pm_request()
	{

		$data['pm_request'] = $this->Crud_model->read_data('pm_request');
		$data['user'] = $this->Crud_model->read_data('user');

		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('pm_request', $data);
		$this->load->view('footer');
	}
	public function predictive_request()
	{


		$data['predictive_request'] = $this->Crud_model->read_data('predictive_request');
		$data['user'] = $this->Crud_model->read_data('user');

		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('predictive_request', $data);
		$this->load->view('footer');
	}
	public function main_page()
	{


		$data['main_page'] = $this->Crud_model->read_data('predictive_request');
		$data['user'] = $this->Crud_model->read_data('user');
		$data['machines'] = $this->Crud_model->read_data('machines');

		$role_management_data = $this->db->query('SELECT *   FROM breakdown_request WHERE status !="FeedBack"');
		$data['breakdown_pending'] = $role_management_data->result();


		// print_r($data['machines']);
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('main_page', $data);
		$this->load->view('footer');
	}
	public function asset_master()
	{


		$data['main_page'] = $this->Crud_model->read_data('predictive_request');
		$data['user'] = $this->Crud_model->read_data('user');
		$data['machines'] = $this->Crud_model->read_data('machines');

		$role_management_data = $this->db->query('SELECT *   FROM breakdown_request WHERE status !="FeedBack"');
		$data['breakdown_pending'] = $role_management_data->result();


		// print_r($data['machines']);
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('asset_master_new', $data);
		$this->load->view('footer');
	}

	public function show_history_instrument()
	{
		$instrument_id = $this->uri->segment('2');

		$data['history_instruments'] = $this->Crud_model->get_data_by_id("history_instruments", $instrument_id, "instrument_id");

		// print_r($data['utility_list']);

		$this->load->view('header');
		$this->load->view('show_history_instrument', $data);
		$this->load->view('footer');
	}
	public function dies()
	{
		$data['dies_list'] = $this->Crud_model->read_data('dies1');
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('dies', $data);
		$this->load->view('footer');
	}
	public function instruments()
	{

		$q_data['instruments_list'] = $this->Crud_model->read_data("instruments");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('instruments', $q_data);
		$this->load->view('footer');
	}
	public function machines()
	{

		$data['machines'] = $this->Crud_model->read_data("machines");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('machines', $data);
		$this->load->view('footer');
	}
	public function realtion_gauges()
	{
		// echo "hi";

		$data['realtion_gauges'] = $this->Crud_model->read_data("realtion_gauges");
		$this->load->view('header');
		$this->load->view('realtion_gauges', $data);
		$this->load->view('footer');
	}
	public function jigs()
	{
		$q_data['jigs_list'] = $this->Crud_model->read_data("jigs");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('jigs', $q_data);
		$this->load->view('footer');
	}
	public function pm_type()
	{
		$pm_types = urldecode($this->uri->segment('2'));
		$data['pm_types'] = urldecode($this->uri->segment('2'));
		$machine_id = urldecode($this->uri->segment('3'));
		$data['machine_id'] = urldecode($this->uri->segment('3'));
		$data['user'] = $this->Crud_model->read_data("user");

		$data['assign_pm_group'] = $this->Crud_model->get_data_by_id("assign_pm_group", $machine_id, "machine_id");
		//  print_r($data['assign_pm_group']);
		$data_check = array(
			"machine_id" => $machine_id,
			"pm_frequency" => $pm_types,
		);
		$data['pm_request'] = $this->Crud_model->get_data_by_id_multile("pm_request", $data_check);
		//  print_r($data['pm_request']);


		$this->load->view('header');
		$this->load->view('pm_type', $data);
		$this->load->view('footer');
	}
	public function predective_maintaince()
	{

		$machine_id = urldecode($this->uri->segment('2'));
		$data['machine_id'] = urldecode($this->uri->segment('2'));
		$data['user'] = $this->Crud_model->read_data("user");

		//  print_r($data['assign_pm_group']);
		$data_check = array(
			"machine_id" => $machine_id,
		);
		$data['predictive_request'] = $this->Crud_model->get_data_by_id_multile("predictive_request", $data_check);
		//  print_r($data['assign_pm_group']);


		$this->load->view('header');
		$this->load->view('predective_maintaince', $data);
		$this->load->view('footer');
	}
	public function pending()
    {

		$type = urldecode($this->uri->segment(2));
		$data['type'] = $type;
		
		$search = $this->input->post('search');
		$data['search'] = $search;

		
		//print_r($search_term);die();	

        // $type = urldecode($this->uri->segment('2'));
        // $data['type'] = urldecode($this->uri->segment('2'));

        // $role_management_data = $this->db->query('SELECT *   FROM ' . $type . ' WHERE status !="FeedBack" ORDER BY id DESC');
        // $data['data'] = $role_management_data->result();
		if(!$search){
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('Crud_model');
        $page = $this->uri->segment(3, 0); // Default to 0 if no segment is provided
		$data['pageee'] = $page;
       

        $config['base_url'] = base_url() . 'pending/' . $type;
        $config['total_rows'] = $this->Crud_model->count_type_pending($type);
		//print_r( $config['total_rows']);die();
        $config['per_page'] = 100;
        $config['uri_segment'] = 3;
	
        $config['first_url'] = $config['base_url'] . '/0'; // Explicitly set the first URL

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

      //  $data['data'] = $this->Crud_model->get_data_paged_pending($type, $config['per_page'], $page);
	
	  $data['data'] = $this->Crud_model->get_data_paged_pending($type, $config['per_page'], $page);

	}else{
		
			$role_management_data = $this->db->query('SELECT *   FROM ' . $type . ' WHERE status !="FeedBack" ORDER BY id DESC');
		$data['data'] = $role_management_data->result();
		
		//$data['data'] = $this->Crud_model->get_data_paged412_search('pm_request');
	}




         //print_r($data); die();
        // print_r($data['data']);
        $this->load->view('header');
        $this->load->view('pending', $data);
        $this->load->view('footer');





    }
	// public function pending()
	// {
		
    //     $this->load->library('pagination');
    //     $this->load->helper('url');
    //     $this->load->model('Crud_model');
    //     $page = $this->uri->segment(3, 0); // Default to 0 if no segment is provided

    //     $type = urldecode($this->uri->segment(2));
    //     $config['base_url'] = base_url() . 'pending/' . $type;
    //     $config['total_rows'] = $this->Crud_model->count_type3($type);
	// 	//print_r( $config['total_rows']);die();
    //     $config['per_page'] = 10;
    //     $config['uri_segment'] = 3;
    //     $config['first_url'] = $config['base_url'] . '/0'; // Explicitly set the first URL

    //     // Bootstrap Pagination Customization
    //     $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
    //     $config['full_tag_close'] = '</ul></nav>';
    //     $config['num_tag_open'] = '<li class="page-item">';
    //     $config['num_tag_close'] = '</li>';
    //     $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    //     $config['cur_tag_close'] = '</a></li>';
    //     $config['next_tag_open'] = '<li class="page-item">';
    //     $config['next_tag_close'] = '</li>';
    //     $config['prev_tag_open'] = '<li class="page-item">';
    //     $config['prev_tag_close'] = '</li>';
    //     $config['first_tag_open'] = '<li class="page-item">';
    //     $config['first_tag_close'] = '</li>';
    //     $config['last_tag_open'] = '<li class="page-item">';
    //     $config['last_tag_close'] = '</li>';
    //     $config['attributes'] = array('class' => 'page-link');

    //     $this->pagination->initialize($config);

    //     $data1['type'] = $type;
    //     $data1['data1'] = $this->Crud_model->get_data_paged3($type, $config['per_page'], $page);

					
	
	// 	//$role_management_data = $this->db->query('SELECT *   FROM ' . $type . ' WHERE status !="FeedBack" ORDER BY id DESC');
		// $data['data'] = $role_management_data->result();


	// 	$this->load->view('header');
	// 	$this->load->view('pending', $data1);
	// 	$this->load->view('footer');
	// }

	public function completed()
    {
		$type = urldecode($this->uri->segment(2));
		$data['type'] = $type;
		
		$search = $this->input->post('search');
		$data['search'] = $search;

if(!$search){
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('Crud_model');
        $page = $this->uri->segment(3, 0); // Default to 0 if no segment is provided

        $type = urldecode($this->uri->segment(2));
        $config['base_url'] = base_url() . 'completed/' . $type;
        $config['total_rows'] = $this->Crud_model->count_type($type);
		//print_r( $config['total_rows']);die();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_url'] = $config['base_url'] . '/0'; // Explicitly set the first URL

        // Bootstrap Pagination Customization
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

       
      //  $data['data'] = $this->Crud_model->get_data_paged($type, $config['per_page'], $page);
       $data['data'] = $this->Crud_model->get_data_paged($type, $config['per_page'], $page);

	}else{
		//$data['data'] = $this->Crud_model->get_data_paged411_search('pm_request');
		$role_management_data = $this->db->query('SELECT *   FROM ' . $type . ' WHERE status !="FeedBack" ORDER BY id DESC');
		 $data['data'] = $role_management_data->result();
	}
        $this->load->view('header');
        $this->load->view('completed', $data);
        $this->load->view('footer');

    }
// 	public function completed()
// 	{
// 		$data['search'] = $this->input->post('search');

		
// 		$config['full_tag_open'] ="<ul class='pagination'>";
// 		$config['full_tag_close'] ="</ul>";
		
// 		$config['next_tag_open'] ="<li class='page-item disable'>";
// 		$config['next_tag_close'] ="</li>";
		
// 		$config['prev_tag_open'] ="<li class='page-item'>";
// 		$config['prev_tag_close'] ="</li>";
		
// 		$config['num_tag_open'] ="<li class='page-item'>";
// 		$config['num_tag_close'] ="</li>";
		
// 		$config['cur_tag_open'] ="<li class='page-item active'><a class='page-link'>";
// 		$config['cur_tag_close'] ="<span class='sr-only'>(current)</span></a></li>";
// 		$config['attributes'] =array ('class' =>'page-link');
		
		


// 		$type = urldecode($this->uri->segment('2'));
// 		$data['type'] = urldecode($this->uri->segment('2'));

// 		$data11 = $this->uri->segment(3);
// 		$seg = ($data11) ? (int)$data11 : 0;
		
// 			$this->load->library('pagination');
// 			$config['base_url'] =base_url('completed/pm_request');
// 			//$config['total_rows'] = $this->Crud_model->get_all_row("pm_request");
// 			$search_term = '%' . $data['search'] . '%';
			
// 			// $count_query = 'SELECT COUNT(*) as total FROM ' . $type . ' WHERE status != "FeedBack"';
// 			// $count_result = $this->db->query($count_query)->row();

// 			// $config['total_rows'] = $count_result->total;
// 			$count_query = 'SELECT COUNT(*) as total FROM ' . $type . ' WHERE status != "FeedBack" AND pm_frequency LIKE ?';
// $count_result = $this->db->query($count_query, array($search_term))->row();
// $config['total_rows'] = $count_result->total;
// 			// print_r($config['total_rows'])	;die();
// 			$config['per_page'] = 10;
			
			
				  
// 						   $this->pagination->initialize($config);
// 						   $data['pagination_links'] = $this->pagination->create_links();
						  
// 						$limit = 10; 
// 						$offset = $seg;
					
// 						//print_r($search_term);die();

// 		// $role_management_data = $this->db->query('SELECT *   FROM ' . $type . ' WHERE status !="FeedBack" ORDER BY id DESC');
// 		// $data['data'] = $role_management_data->result();

// 		// $query = 'SELECT * FROM ' . $type . ' WHERE status != "FeedBack" LIMIT ? OFFSET ?';
// 		// $role_management_data = $this->db->query($query, array((int)$limit, (int)$offset));

// 		// $data['data'] = $role_management_data->result();

// 		$query = 'SELECT * FROM ' . $type . ' WHERE status != "FeedBack" AND pm_frequency LIKE ? LIMIT ? OFFSET ?';
// $role_management_data = $this->db->query($query, array($search_term, $limit, $offset));

// // Fetching the results
// $data['data'] = $role_management_data->result();

// 		$this->load->view('header');
// 		$this->load->view('completed', $data);
// 		$this->load->view('footer');
// 	}
	public function breakdown_pending()
	{
		$search = $this->input->post('search');
		$data['search'] = $search;
		$type = urldecode($this->uri->segment(2));
		$data['type'] = $type;

		if(!$search){
		$this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('Crud_model');
        $page = $this->uri->segment(2, 0); // Default to 0 if no segment is provided

       

        $config['base_url'] = base_url() . 'breakdown_pending/';
        $config['total_rows'] = $this->Crud_model->count_type('breakdown_request');
		//print_r( $config['total_rows']);die();
        $config['per_page'] = 10;
        $config['uri_segment'] = 2;
        $config['first_url'] = $config['base_url'] . '/0'; // Explicitly set the first URL

        // Bootstrap Pagination Customization
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

		
			$data['breakdown_pending'] = $this->Crud_model->get_data_paged('breakdown_request', $config['per_page'], $page);

		}else{
			$data['breakdown_pending'] = $this->Crud_model->get_data_paged411_search('breakdown_request');

		}
		// $role_management_data = $this->db->query('SELECT *   FROM breakdown_request WHERE status !="FeedBack" ORDER BY id DESC');
		// $data['breakdown_pending'] = $role_management_data->result();

	// $query = 'SELECT * FROM breakdown_request WHERE status != "FeedBack" LIMIT ? OFFSET ?';
	// 	 $role_management_data = $this->db->query($query, array((int)$limit, (int)$offset));

	// 	 $data['breakdown_pending'] = $role_management_data->result();

		$this->load->view('header');
		$this->load->view('breakdown_pending', $data);
		$this->load->view('footer');
	}
	public function i_work_request_pending()
	{

		$this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('Crud_model');
        $page = $this->uri->segment(3, 0); // Default to 0 if no segment is provided

        $type = urldecode($this->uri->segment(2));
        $config['base_url'] = base_url() . 'i_work_request_pending/';
        $config['total_rows'] = $this->Crud_model->count_type1('improvement_request');
		//print_r( $config['total_rows']);die();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['first_url'] = $config['base_url'] . '/0'; // Explicitly set the first URL

        // Bootstrap Pagination Customization
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['type'] = $type;
        $data['breakdown_pending'] = $this->Crud_model->get_data_paged1('improvement_request', $config['per_page'], $page);


		// $role_management_data = $this->db->query('SELECT * FROM improvement_request WHERE status !="completed" ORDER BY id DESC');
		// $data['breakdown_pending'] = $role_management_data->result();


		$this->load->view('header');
		$this->load->view('i_work_request_pending', $data);
		$this->load->view('footer');
	}
	public function i_work_request_complete()
	{

		$this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('Crud_model');
        $page = $this->uri->segment(3, 0); // Default to 0 if no segment is provided

        $type = urldecode($this->uri->segment(2));
        $config['base_url'] = base_url() . 'i_work_request_pending/';
        $config['total_rows'] = $this->Crud_model->count_type2('improvement_request');
		//print_r( $config['total_rows']);die();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['first_url'] = $config['base_url'] . '/0'; // Explicitly set the first URL

        // Bootstrap Pagination Customization
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['type'] = $type;
        $data['breakdown_pending'] = $this->Crud_model->get_data_paged2('improvement_request', $config['per_page'], $page);




		// $role_management_data = $this->db->query('SELECT * FROM improvement_request WHERE status = "completed" ORDER BY id DESC');
		// $data['breakdown_pending'] = $role_management_data->result();


		$this->load->view('header');
		$this->load->view('i_work_request_complete', $data);
		$this->load->view('footer');
	}
	public function breakdown_complete()
	{
		$type = urldecode($this->uri->segment(2));
		$data['type'] = $type;
		$search = $this->input->post('search');
		$data['search'] = $search;
	
	if(!$search){
	$this->load->library('pagination');
	$this->load->helper('url');
	$this->load->model('Crud_model');
        $page = $this->uri->segment(2, 0); // Default to 0 if no segment is provided
      
        $config['base_url'] = base_url() . 'breakdown_complete/';
        $config['total_rows'] = $this->Crud_model->count_type4('breakdown_request');
		//print_r( $config['total_rows']);die();
        $config['per_page'] = 10;
        $config['uri_segment'] = 2;
		
		$config['first_url'] = $config['base_url'] . '0'; // Explicitly set the first URL

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="0">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
		

        $this->pagination->initialize($config);
       
		
			$data['breakdown_pending'] = $this->Crud_model->get_data_paged4('breakdown_request', $config['per_page'], $page);

		}else{
			$data['breakdown_pending'] = $this->Crud_model->get_data_paged411_search('breakdown_request');

		}
		
		
		// $config['full_tag_open'] ="<ul class='pagination'>";
		// $config['full_tag_close'] ="</ul>";
		
		// $config['next_tag_open'] ="<li class='page-item disable'>";
		// $config['next_tag_close'] ="</li>";
		
		// $config['prev_tag_open'] ="<li class='page-item'>";
		// $config['prev_tag_close'] ="</li>";
		
		// $config['num_tag_open'] ="<li class='page-item'>";
		// $config['num_tag_close'] ="</li>";
		
		// $config['cur_tag_open'] ="<li class='page-item active'><a class='page-link'>";
		// $config['cur_tag_close'] ="<span class='sr-only'>(current)</span></a></li>";
		// $config['attributes'] =array ('class' =>'page-link');
		


// 		$data11 = $this->uri->segment(2);
// $seg = ($data11) ? (int)$data11 : 0;
// 		//print_r($seg);die();
// 		//$this->session->set_userdata($data11);
// 			$this->load->library('pagination');
// 			$config['base_url'] =base_url('breakdown_complete');
// 			$config['total_rows'] = $this->Crud_model->get_all_row("breakdown_request");
// 			//print_r($config['total_rows']);die();
// 			$config['per_page'] = 10;
			
			
				  
// 						   $this->pagination->initialize($config);
// 						   $data['pagination_links'] = $this->pagination->create_links();
// 						//    $limit = $config['per_page'];  // Number of records to return
// 						//    $offset = $seg;
// 						$limit = 10;  // Number of records to return
// 						$offset = $seg; // Number of records to skip
						


		//$role_management_data = $this->db->query('SELECT *   FROM breakdown_request WHERE status !="FeedBack" ORDER BY id DESC ');

		// $query = 'SELECT * FROM breakdown_request WHERE status != "FeedBack" LIMIT ? OFFSET ?';
		// $role_management_data = $this->db->query($query, array($limit, $offset));
		// $query = 'SELECT * FROM breakdown_request WHERE status != "FeedBack"  LIMIT ? OFFSET ?';
		// $role_management_data = $this->db->query($query, array((int)$limit, (int)$offset));

		//$data['breakdown_pending'] = $role_management_data->result();
// print_r($data['breakdown_pending']);die();

		$this->load->view('header');
		$this->load->view('breakdown_complete', $data);
		$this->load->view('footer');
	}
	public function check_list_groups()
	{
		$data['check_list_groups'] = $this->Crud_model->read_data("check_list_groups");
		$this->load->view('header');

		$this->load->view('check_list_groups', $data);
		$this->load->view('footer');
	}
	public function permission()
	{
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('permission');
		$this->load->view('footer');
	}
	public function relation()
	{
		// $result = $this->days_count();
		$q_data['gauges_list'] = $this->Crud_model->read_data("rgauges");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('relation', $q_data);
		$this->load->view('footer');
	}
	public function software()
	{
		$q_data['software_list'] = $this->Crud_model->read_data("software");
		$q_data['toggle'] = $this->Crud_model->read_data("software");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('software', $q_data);
		$this->load->view('footer');
	}
	public function user_role()
	{
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('user_role');
		$this->load->view('footer');
	}
	public function utility()
	{
		$q_data['utility_list'] = $this->Crud_model->get_data_by_id("utility", "utility", "type");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('utility', $q_data);
		$this->load->view('footer');
	}
	public function spare_parts()
	{
		$pm_id = $this->uri->segment('2');
		$type = $this->uri->segment('3');

		$data_assign_pm_group = array(
			"pm_id" =>  $pm_id,
			"type" => $type
		);

		$data['spare_parts'] = $this->Crud_model->get_data_by_id_multile("spare_parts", $data_assign_pm_group);
		// $data['spare_parts'] = $this->Crud_model->get_data_by_id("spare_parts", $pm_id,"pm_id");
		$data['item_master'] = $this->Crud_model->read_data("item_master");

		// print_r($data['spare_parts']);
		$this->load->view('header');
		$this->load->view('spare_parts', $data);
		$this->load->view('footer');
	}
	public function utilitymachinespares()
	{
		$type = $this->input->post('machine');
		$q_data['utilitymachine_list'] = $this->Crud_model->get_data_by_id("utility", "machine", "type");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('utilitymachinespares', $q_data);
		$this->load->view('footer');
	}
	public function pm_by_machine_id()
	{
		$machine_id = $this->uri->segment('2');
		$data['machines_pm_checklist'] = $this->Crud_model->get_data_by_id("machines_pm_checklist", $machine_id, "machine_id");
		$data['utility'] = $this->Crud_model->get_data_by_id("utility", $machine_id, "AssetNumber");
		// print_r($data['machines_pm_checklist']);
		$this->load->view('header');

		$this->load->view('pm_by_machine_id', $data);
		$this->load->view('footer');
	}
	public function pm_check_list()
	{
		$type = $this->input->post('machine');
		$q_data['pmcheck_list'] = $this->Crud_model->get_data_by_id("utility", "machine", "type");
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('pm_check_list', $q_data);
		$this->load->view('footer');
	}
	public function history()
	{
		$history_type = $this->uri->segment('2');
		$pm_id = $this->uri->segment('3');
		$data['pm_id'] = $this->uri->segment('3');

		if ($history_type == "pm_request") {
			$table_name = "pm_history";
		} else if ($history_type == "predictive_request") {
			$table_name = "predective_history";
		} else {
			$table_name = "breakdown_history";
		}


		$data['history'] = $this->Crud_model->get_data_by_id($table_name, $pm_id, "pm_id");

		//  print_r($data['history']);
		$this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('history', $data);
		$this->load->view('footer');
	}
	public function item_master()
	{
		// $q_data['item_master_list'] = $this->Crud_model->read_data("item_master");

		$sum_main =  $this->Crud_model->query_sinegle("SELECT id,spare_description, spare_number FROM item_master");
		$q_data['item_master_list'] = $sum_main;

		$this->load->view('header');

		$this->load->view('item_master', $q_data);
		$this->load->view('footer');
	}
	public function item_master_details()
	{
		// $q_data['item_master_list'] = $this->Crud_model->read_data("item_master");
		$id = $this->uri->segment('2');

		$sum_main =  $this->Crud_model->query_sinegle("SELECT * FROM item_master WHERE id = $id");
		$q_data['item_master_list'] = $sum_main;

		$this->load->view('header');

		$this->load->view('item_master_details', $q_data);
		$this->load->view('footer');
	}
	public function spare_grn()
	{
		$data['spare_grn_list'] = $this->Crud_model->read_data('spare_grn');

		$data['spare_dropdown'] = $this->Crud_model->read_data("item_master");
		$this->load->view('header');

		$this->load->view('spare_grn', $data);
		$this->load->view('footer');
	}
	public function pm_check_list_by_group()
	{
		$group_id = $this->uri->segment('2');
		$data['pm_check_list_by_group']  = $this->Crud_model->get_data_by_id('pm_check_list_by_group', $group_id, "group_id");

		// print_r($data['pm_check_list_by_group']);

		$this->load->view('header');

		$this->load->view('pm_check_list_by_group', $data);
		$this->load->view('footer');
	}
	public function spare_store()
	{
		$data['item_master_list'] = $this->Crud_model->read_data('item_master');

		$data['spare_dropdown'] = $this->Crud_model->read_data("item_master");
		$this->load->view('header');

		$this->load->view('spare_store', $data);
		$this->load->view('footer');
	}
	public function spare_store_min()
	{
		$data['item_master_list'] = $this->Crud_model->read_data('item_master');

		$data['spare_dropdown'] = $this->Crud_model->read_data("item_master");
		$this->load->view('header');

		$this->load->view('spare_store_min', $data);
		$this->load->view('footer');
	}
	public function breakdown_request()
	{
		$machine_id = $this->uri->segment('2');
		$data['machine_id'] = $this->uri->segment('2');
		$data['breakdown_request']  = $this->Crud_model->get_data_by_id('breakdown_request', $machine_id, "machine_id");

		$this->load->view('header');

		$this->load->view('breakdown_request', $data);
		$this->load->view('footer');
	}
	public function view_checkshit()
	{
		$group_id = $this->uri->segment('2');
		$pm_id = $this->uri->segment('3');
		$data['group_id'] = $this->uri->segment('2');
		// $data['machine_id'] = $this->uri->segment('2');
		$data['check_list_groups']  = $this->Crud_model->get_data_by_id('check_list_groups', $group_id, "id");

		$data_assign_pm_group = array(
			"group_id" =>  $group_id,
			"machine_id" => $this->input->post('machine_id')
		);

		$assign_pm_group = $this->Crud_model->get_data_by_id_multile("assign_pm_group", $data_assign_pm_group);
		$data['pm_check_list_by_group']  = $this->Crud_model->get_data_by_id('pm_check_list_by_group', $group_id, "group_id");

		// print_r($data['pm_check_list_by_group']);
		$this->load->view('header');

		$this->load->view('view_checkshit', $data);
		$this->load->view('footer');
	}
	public function login()
	{
		// $this->load->view('header');
		// $this->load->view('navbar');
		// $this->load->view('sidebar');
		$this->load->view('login');
		// $this->load->view('footer');
	}
	public function register()
	{
		$this->load->view('register');
	}

	public function add_software()
	{
		// echo "hello";
		// $this->load->view('register');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$make = $this->input->post('make');
		$license_exp = $this->input->post('license_exp');
		$renew = $this->input->post('renew');
		$license_no = $this->input->post('license_no');

		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			"LicenseNumber " => $license_no,
			"Location " => $location,
			"Make" => $make,
			"LicenseExpiry" => $license_exp,
			"RenewalDate " => $renew,
			"Remark" => $remark,
		);

		$result = $this->Crud_model->insert_data("software", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_tool_to_pm()
	{
		// echo "hello";
		// $this->load->view('register');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$make = $this->input->post('make');
		$license_exp = $this->input->post('license_exp');
		$renew = $this->input->post('renew');
		$license_no = $this->input->post('license_no');
		$type = $this->input->post('type');

		$data = array(
			"pm_id" => $this->input->post('pm_id'),
			"created_by" => $this->user_id,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year" => $this->year,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
			"tool_id" => $this->input->post('tool_id'),
			"type" => $this->input->post('type'),

		);

		$result = $this->Crud_model->insert_data("spare_parts", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_tool_to_pm()
	{
		$id = $this->input->post('id_main');

		// echo "<br>";
		echo $grn_1_id =  $this->input->post('grn_1_id_amain');

		$grn_1_data = $this->Crud_model->get_data_by_id('spare_grn', $grn_1_id, 'id');
		if ($grn_1_data) {
			// print_r($grn_1_data);
			$on_hand_stock_backend_stock = $grn_1_data[0]->on_hand_stock;
			$on_hand_stock = $on_hand_stock_backend_stock - $this->input->post('grn_1_take');
			$data_update_1 = array(
				"on_hand_stock" => $on_hand_stock,


			);
			$result_new_1 = $this->Crud_model->update_data("spare_grn", $data_update_1, $grn_1_id);
		}

		echo $grn_2_id =  $this->input->post('grn_2_id_amas');

		if (!empty($grn_2_id)) {
			$grn_2_data = $this->Crud_model->get_data_by_id('spare_grn', $grn_2_id, 'id');
			if ($grn_2_data) {
				// print_r($grn_1_data);
				$on_hand_stock_backend_stock_2 = $grn_2_data[0]->on_hand_stock;
				$on_hand_stock_2 = $on_hand_stock_backend_stock_2 - $this->input->post('grn_2_take');
				$data_update_2 = array(
					"on_hand_stock" => $on_hand_stock_2,


				);
				$result_new_2 = $this->Crud_model->update_data("spare_grn", $data_update_2, $grn_2_id);
			}
		}



		$data = array(
			"grn_1_actual" => $this->input->post('grn_1_actual'),
			"grn_1_take" => $this->input->post('grn_1_take'),
			"grn_1_status" => "pending",
			"grn_1_id" => $grn_1_id,
			"grn_2_id" => $grn_2_id,
			"grn_1_actual_price" => $this->input->post('grn_1_actual_price'),
			"grn_2_actual" => $this->input->post('grn_2_actual'),
			"grn_2_take" => $this->input->post('grn_2_take'),
			"grn_2_status" => "pending",
			"grn_2_actual_price" => $this->input->post('grn_2_actual_price'),
			"requested_date" => $this->current_date,
			"requested_time" => $this->current_time,

		);

		$result = $this->Crud_model->update_data("spare_parts", $data, $id);


		if ($result) {
			echo "<script>alert('Update Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Updating ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function accept_request()
	{
		$id = $this->input->post('main_id_new');

		$grn_1_id =  $this->input->post('grn_1_id');
		$grn_1_taken =  $this->input->post('grn_1_taken');
		$grn_2_taken =  $this->input->post('grn_2_taken');

		$grn_1_data = $this->Crud_model->get_data_by_id('spare_grn', $grn_1_id, 'id');
		if ($grn_1_data) {
			// print_r($grn_1_data);
			$grn_qty = $grn_1_data[0]->grn_qty;
			$main_grn_qty = $grn_qty - $grn_1_taken;
			$data_update_1 = array(
				// "on_hand_stock"=>$on_hand_stock,
				"grn_qty" => $main_grn_qty,
				"on_hand_stock" => $main_grn_qty,



			);
			$item_master = $this->Crud_model->get_data_by_id('item_master', $grn_1_data[0]->spare_id, 'id');

			$on_hand_stock_item = $item_master[0]->store_stock - $grn_1_taken;
			$store_stock_item = $item_master[0]->on_hand_stock - $grn_1_taken;
			$item_master_data = array(
				// "on_hand_stock"=>$on_hand_stock,
				"store_stock" => $store_stock_item,
				"on_hand_stock" => $on_hand_stock_item,


			);
			$item_master_count = $this->Crud_model->update_data("item_master", $item_master_data, $item_master[0]->id);

			if ($item_master_count) {
				$result_new_1 = $this->Crud_model->update_data("spare_grn", $data_update_1, $grn_1_id);
				if ($result_new_1) {
					echo "yes";
				} else {
					echo "no";
				}
			} else {
				echo "Please Try Again";
			}
		}

		$grn_2_id =  $this->input->post('grn_2_id');

		if (!empty($grn_2_id)) {
			$grn_2_data = $this->Crud_model->get_data_by_id('spare_grn', $grn_2_id, 'id');
			if ($grn_2_data) {
				// print_r($grn_1_data);
				$grn_qty = $grn_2_data[0]->grn_qty;
				$main_grn_qty = $grn_qty - $grn_2_taken;
				$data_update_2 = array(
					// "on_hand_stock"=>$on_hand_stock,
					"grn_qty" => $main_grn_qty,
					"on_hand_stock" => $main_grn_qty,


				);
				$result_new_1 = $this->Crud_model->update_data("spare_grn", $data_update_2, $grn_2_id);
			}
		}




		$data = array(

			"grn_1_status" => "accepted",
			"grn_2_status" => "accepted",
			"accepted_time" => $this->current_time,
			"accepted_date" => $this->current_date,


		);

		$result = $this->Crud_model->update_data("spare_parts", $data, $id);


		if ($result) {
			echo "<script>alert('Update Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Updating ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_chcecksheet()
	{
		// echo "hello";
		// $this->load->view('register');

		$data = array(
			"created_id" => $this->user_id,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year " => $this->year,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
			"created_day_time" => $this->date_time,
			"pm_id" => $this->input->post('pm_id'),
			"pm_id" => $this->input->post('pm_id'),
			"group_id" => $this->input->post('group_id'),
			"checksheet_id" => $this->input->post('checksheet_id'),
			"particular" => $this->input->post('particular'),
			"observation" => $this->input->post('observation'),
			"remark" => $this->input->post('remark'),
			"pm_id" => $this->input->post('pm_id'),
			"machine_id" => $this->input->post('machine_id'),

		);

		$result = $this->Crud_model->insert_data("checksheet_data", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_checksheet()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');
		$data = array(
			"observation" => $this->input->post('observation'),
			"remark" => $this->input->post('remark'),

		);

		$result = $this->Crud_model->update_data("checksheet_data", $data, $id);

		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_breadkdown_details()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');

		$current_timestamp = $this->input->post('timestamp');

		$new_timestamp = date('Y-m-d H:i:s');

		$datetime1 = new DateTime($current_timestamp); //start time
		$datetime2 = new DateTime($new_timestamp); //end time
		$interval = $datetime1->diff($datetime2);

		$complete_time_maintaince  =  $interval->format('%d days %H hours %i minutes %s seconds'); //00 years 0 months 0 days 08 hours 0 minutes 0 seconds
		//  $date1 = date_create($current_timestamp);

		// $date2 = date_create($new_timestamp);

		// $diff = date_diff($date2,$date1);

		// print_r($diff);
		// $hour = $diff->h;

		// $sec = $diff->i;


		$days_to_maintaince = 0;
		$min_to_maintaince = 0;

		if (!empty($_FILES['breakdown_document']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['breakdown_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('breakdown_document')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				echo "no";
				$picture4 = "";
			}
		} else {
			echo "no2";
			$picture4 = "";
		}


		$data = array(
			"actions_taken" => $this->input->post('actions_taken'),
			"type_of_breakdown" => $this->input->post('type_of_breakdown'),
			"status" => $this->input->post('status'),
			"complete_time_maintaince " => $complete_time_maintaince,
			// "min_to_maintaince" => $min_to_maintaince,
			"breakdown_document" => $picture4,
			"action_taken_person_name" => $this->user_id,
			"breakdown_completed_time" => $this->current_date,
			"breakdown_completed_date" => $this->current_time,


		);

		$result = $this->Crud_model->update_data("breakdown_request", $data, $id);

		if ($result) {
			echo "<script>alert('Details Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_breadkdown_details_team()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');

		$current_timestamp = $this->input->post('timestamp');

		$new_timestamp = date('Y-m-d H:i:s');

		$datetime1 = new DateTime($current_timestamp); //start time
		$datetime2 = new DateTime($new_timestamp); //end time
		$interval = $datetime1->diff($datetime2);

		$complete_time_maintaince  =  $interval->format('%d days %H hours %i minutes %s seconds'); //00 years 0 months 0 days 08 hours 0 minutes 0 seconds
		//  $date1 = date_create($current_timestamp);

		// $date2 = date_create($new_timestamp);

		// $diff = date_diff($date2,$date1);

		// print_r($diff);
		// $hour = $diff->h;

		// $sec = $diff->i;


		$days_to_maintaince = 0;
		$min_to_maintaince = 0;

		$data = array(
			"team" => $this->input->post('details'),

		);

		$result = $this->Crud_model->update_data("breakdown_request", $data, $id);

		if ($result) {
			echo "<script>alert('Details Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_improvement_details()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');

		$current_timestamp = $this->input->post('timestamp');

		$new_timestamp = date('Y-m-d H:i:s');

		$datetime1 = new DateTime($current_timestamp); //start time
		$datetime2 = new DateTime($new_timestamp); //end time
		$interval = $datetime1->diff($datetime2);

		$complete_time_maintaince  =  $interval->format('%d days %H hours %i minutes %s seconds'); //00 years 0 months 0 days 08 hours 0 minutes 0 seconds
		//  $date1 = date_create($current_timestamp);

		// $date2 = date_create($new_timestamp);

		// $diff = date_diff($date2,$date1);

		// print_r($diff);
		// $hour = $diff->h;

		// $sec = $diff->i;


		$days_to_maintaince = 0;
		$min_to_maintaince = 0;

		if (!empty($_FILES['breakdown_document']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['breakdown_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('breakdown_document')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				echo "no";
				$picture4 = "";
			}
		} else {
			echo "no2";
			$picture4 = "";
		}


		$data = array(
			"actions_taken" => $this->input->post('actions_taken'),
			"status" => $this->input->post('status'),
			"complete_time_maintaince " => $complete_time_maintaince,
			// "min_to_maintaince" => $min_to_maintaince,
			"breakdown_document" => $picture4,

		);

		$result = $this->Crud_model->update_data("improvement_request", $data, $id);

		if ($result) {
			echo "<script>alert('Details Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_breadkdown_details_feedback()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');

		$current_timestamp = $this->input->post('timestamp');

		$new_timestamp = date('Y-m-d H:i:s');

		$datetime1 = new DateTime($current_timestamp); //start time
		$datetime2 = new DateTime($new_timestamp); //end time
		$interval = $datetime1->diff($datetime2);

		$complete_time_maintaince  =  $interval->format('%d days %H hours %i minutes %s seconds'); //00 years 0 months 0 days 08 hours 0 minutes 0 seconds

		//  $date1 = date_create($current_timestamp);

		// $date2 = date_create($new_timestamp);

		// $diff = date_diff($date2,$date1);

		// print_r($diff);
		// $hour = $diff->h;

		// $sec = $diff->i;

		if (!empty($_FILES['breakdown_document']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['breakdown_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('breakdown_document')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				echo "no";
				$picture4 = "";
			}
		} else {
			echo "no2";
			$picture4 = "";
		}


		$data = array(

			"complition_date" => $this->current_date,
			"complition_time" => $this->current_time,
			"status" => $this->input->post('status'),
			"feedback_document" => $picture4,
			"feedback" => $this->input->post('feedback'),
			"complete_time_feedback" => $complete_time_maintaince,
			// "time_to_complete_min" => $sec,

		);

		$result = $this->Crud_model->update_data("breakdown_request", $data, $id);

		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_breadkdown_details()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');


		$data = array(
			"details" => $this->input->post('details'),


		);

		$result = $this->Crud_model->update_data("breakdown_request", $data, $id);

		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function create_history()
	{
		$new_pm_date_2 = $this->input->post('new_pm_date_2');
		$new_pm_time_2 = $this->input->post('new_pm_time_2');
		$new_pm_date = $this->input->post('new_pm_date');
		$new_pm_time = $this->input->post('new_pm_time');

		if (empty($new_pm_date)) {
			$new_pm_date = $new_pm_date_2;
		}

		if (empty($new_pm_time)) {
			$new_pm_time = $new_pm_time_2;
		}
		$picture4 = "";

		if ($this->input->post('status') == "Request_Closed") {
			if (!empty($_FILES['file']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['file']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					$picture4 = "";
				}
			} else {
				$picture4 = "";
			}

			$data_assign_pm_group = array(
				"group_id" =>  $this->input->post('pm_group_id'),
				"machine_id" => $this->input->post('machine_id')
			);

			$assign_pm_group = $this->Crud_model->get_data_by_id_multile("assign_pm_group", $data_assign_pm_group);
			// print_r($assign_pm_group);
			if ($assign_pm_group) {
				$check_list_groups = $this->Crud_model->get_data_by_id('check_list_groups', $this->input->post('pm_group_id'), 'id');
				$pm_type = $check_list_groups[0]->pm_type;
				$addition_days = $this->Crud_model->get_days($pm_type);

				$calculate_date = date('Y-m-d', strtotime($this->current_date . ' +' . $addition_days . ' days'));;
				$update_data = array(
					"last_due_date" =>  $calculate_date,
					"last_pm_date" =>  $this->current_date,
				);

				$data = array(
					"machine_id" => $assign_pm_group[0]->machine_id,
					"group_id" => $assign_pm_group[0]->group_id,
					"planeed_pm_date" => $assign_pm_group[0]->last_due_date,
					"last_pm_date" =>  $this->current_date,
					"last_due_date" =>  $calculate_date,
					"created_day" => $this->date,
					"created_month" => $this->month,
					"created_year" => $this->year,
					"created_date" => $this->current_date,
					"created_time" => $this->current_time,
					"created_by" => $this->user_id,
					"created_date_time" => $this->date_time,
					"pm_id" => $this->input->post('pm_id'),
				);


				$result = $this->Crud_model->insert_data("assign_pm_group", $data);
			}
		}




		$data = array(
			"created_id " => $this->user_id,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year" => $this->year,
			"created_date " => $this->current_date,
			"created_time" => $this->current_time,
			"pm_id" => $this->input->post('pm_id'),
			"feedback_document" => $picture4,
			"machine_id" => $this->input->post('machine_id'),
			"pm_group_id" => $this->input->post('pm_group_id'),
			"previous_status" => $this->input->post('previous_status'),
			"status" => $this->input->post('status'),
			"new_pm_date" => $new_pm_date,
			"new_pm_time" => $new_pm_time,
			"feedback" => $this->input->post('feedback'),
			"postpone_feedback" => $this->input->post('postpone_feedback'),
			"checkshit_document" => $this->input->post('checkshit_document'),

		);

		$result = $this->Crud_model->insert_data($this->input->post('table_name'), $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function assign_pm()
	{


		$data = array(
			"request_from" => $this->user_id,
			"crated_day" => $this->date,
			"crated_month" => $this->month,
			"created_year" => $this->year,
			"created_date" => $this->current_date,
			"request_to" => $this->input->post('request_to'),
			"machine_id" => $this->input->post('machine_id'),
			"pm_group_id" =>  $this->input->post('group_id'),
			"pm_frequency" => $this->input->post('pm_frequency'),
			"pm_date" => $this->input->post('pm_date'),
			"pm_time" => $this->input->post('pm_time'),
			"pm_time" => $this->input->post('pm_time'),


		);

		$result = $this->Crud_model->insert_data("pm_request", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding , Please Try Again ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function assign_predective()
	{


		$data = array(
			"request_from" => $this->user_id,
			"crated_day" => $this->date,
			"crated_month" => $this->month,
			"created_year" => $this->year,
			"created_date" => $this->current_date,
			"request_to" => $this->input->post('request_to'),
			"machine_id" => $this->input->post('machine_id'),
			"details" =>  $this->input->post('details'),
			"pm_date" => $this->input->post('pm_date'),
			"pm_time" => $this->input->post('pm_time'),


		);

		$result = $this->Crud_model->insert_data("predictive_request", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding , Please Try Again ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_group()
	{
		$check_data = array(
			"group_name" => $this->input->post('name'),
			"pm_type" => $this->input->post('pm_type'),

		);

		$check_count  = $this->Crud_model->get_data_by_id_count('check_list_groups', $check_data);

		if ($check_count > 0) {
			echo "<script>alert('Group Name  Already Present , Please Enter New Name ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {


			$data = array(
				"group_name" => $this->input->post('name'),
				"pm_type" => $this->input->post('pm_type'),
				"day" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
				"created_date" => $this->current_date,
				"time" => $this->current_time,
				"created_by" => $this->user_id
			);

			$result = $this->Crud_model->insert_data("check_list_groups", $data);

			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_assign_pm_group()
	{
		// $group_id_data = $this->Crud_model->get_data_by_id('check_list_groups', $this->input->post('group_id'), 'id');

		$check_data = array(
			"machine_id" => $this->input->post('machine_id'),
			"group_id" => $this->input->post('group_id'),

		);

		$check_count  = $this->Crud_model->get_data_by_id_count('assign_pm_group', $check_data);

		if ($check_count > 0) {
			echo "<script>alert('Group Already Assign To This Machine , Please Assign New Group ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			$check_list_groups = $this->Crud_model->get_data_by_id('check_list_groups', $this->input->post('group_id'), 'id');


			$addition_days = $this->Crud_model->get_days($check_list_groups[0]->pm_type);
			if ($addition_days >= 30) {
				$last_due_date = date('Y-m-d', strtotime($this->input->post('last_pm_date') . ' +' . $addition_days . ' days'));
				$data = array(
					"machine_id" => $this->input->post('machine_id'),
					"group_id" => $this->input->post('group_id'),
					"last_pm_date" => $this->input->post('last_pm_date'),
					"last_due_date" => $last_due_date,
					"created_day" => $this->date,
					"created_month" => $this->month,
					"created_year" => $this->year,
					"created_date" => $this->current_date,
					"created_time" => $this->current_time,
					"created_by" => $this->user_id,
					"created_date_time" => $this->date_time
				);

				$result = $this->Crud_model->insert_data("assign_pm_group", $data);

				if ($result) {


					echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				echo "<script>alert('Error Please Try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_pm_check_list_by_group()
	{
		$check_data = array(
			"group_id" => $this->input->post('group_id'),
			"particular" => $this->input->post('particular'),

		);

		$check_count  = $this->Crud_model->get_data_by_id_count('pm_check_list_by_group', $check_data);

		if ($check_count > 0) {
			echo "<script>alert('Check List  Already Present , Please Enter New Check List Name ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			if (!empty($_FILES['document']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('document')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					$picture4 = "";
				}
			} else {
				$picture4 = "";
			}


			$data = array(
				"group_id" => $this->input->post('group_id'),
				"particular" => $this->input->post('particular'),
				"actual" => $this->input->post('actual'),
				"remark" => $this->input->post('remark'),
				"spec" => $this->input->post('spec'),
				"type" => $this->input->post('type'),
				"document" => $picture4,
				"created_by" => $this->user_id,
				"created_date" => $this->current_date,
				"created_year" => $this->year,
				"created_day" => $this->date,
				"created_month" => $this->month,
				"created_time" => $this->current_time,

			);

			$result = $this->Crud_model->insert_data("pm_check_list_by_group", $data);

			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error :  Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}

	public function update_pm_check_list_by_group()
	{
		$id = $this->input->post('id');


		if (!empty($_FILES['document']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('document')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				$picture4 = $this->input->post('old_photo');
			}
		} else {
			$picture4 = $this->input->post('old_photo');
		}

		$data = array(
			"particular" => $this->input->post('particular'),
			"actual" => $this->input->post('actual'),
			"spec" => $this->input->post('spec'),
			"type" => $this->input->post('type'),
			"document" => $picture4,

		);


		$result = $this->Crud_model->update_data("pm_check_list_by_group", $data, $id);

		// $result = $this->Crud_model->insert_data("pm_check_list_by_group", $data);

		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_software()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');

		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$make = $this->input->post('make');
		$license_exp = $this->input->post('license_exp');
		$renew = $this->input->post('renew');
		$license_no = $this->input->post('license_no');

		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			"LicenseNumber " => $license_no,
			"Location " => $location,
			"Make" => $make,
			"LicenseExpiry" => $license_exp,
			"RenewalDate " => $renew,
			"Remark" => $remark,
		);

		$result = $this->Crud_model->update_data("software", $data, $id);

		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function change_status_pm_checksheet()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->uri->segment('2');


		$data = array(
			"status" => "checksheet_completed",
			"checksheet_status" => "completed",
		);

		$result = $this->Crud_model->update_data("pm_request", $data, $id);

		if ($result) {

			$pm_request_data  = $this->Crud_model->get_data_by_id('pm_request', $id, 'id');
			// $data['asset_machine_pm'] = $this->Crud_model->get_data_by_id('asset_machine_pm_history', $machine_id, 'machine_id');


			$data = array(
				"created_id " => $this->user_id,
				"created_day" => $this->date,
				"created_month" => $this->month,
				"created_year" => $this->year,
				"created_date " => $this->current_date,
				"created_time" => $this->current_time,
				"pm_id" => $id,
				"feedback_document" => "",
				"machine_id" => $pm_request_data[0]->machine_id,
				"pm_group_id" => $pm_request_data[0]->pm_group_id,
				"previous_status" => "inprocess",
				"status" => "Maintenance Feedback Added",
				"new_pm_date" => "",
				"new_pm_time" => "",
				"feedback" => "",
				"postpone_feedback" => "",
				"checkshit_document" => "",

			);

			$result = $this->Crud_model->insert_data("pm_history", $data);


			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	public function update_group_name()
	{
		// echo "hello";
		// $this->load->view('register');
		$check_data = array(
			"group_name" => $this->input->post('group_name'),
			"pm_type" => $this->input->post('pm_type'),

		);

		$check_count  = $this->Crud_model->get_data_by_id_count('check_list_groups', $check_data);

		if ($check_count > 0) {
			echo "<script>alert('Group Name  Already Present , Please Enter New Name ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			$id = $this->input->post('id');


			$data = array(
				"group_name" => $this->input->post('group_name'),
				"pm_type" => $this->input->post('pm_type'),
			);

			$result = $this->Crud_model->update_data("check_list_groups", $data, $id);

			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error Group Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function update_dashboard()
	{
		// echo "hello";
		// $this->load->view('register');
		// $check_data = array(
		// 	"group_name" => $this->input->post('group_name'),
		// 	"pm_type" => $this->input->post('pm_type'),

		$current = $this->input->post('current');
		$target = $this->input->post('target');

		$percentage = $current * 100 / $target;
		// );

		// $check_count  = $this->Crud_model->get_data_by_id_count('check_list_groups', $check_data);

		if (false) {
			echo "<script>alert('Group Name  Already Present , Please Enter New Name ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			$id = $this->input->post('id');


			$data = array(
				"current" => $this->input->post('current'),
				"max" => $this->input->post('target'),
				"percentage" => $percentage,
			);

			$result = $this->Crud_model->update_data("dashboard_master", $data, $id);

			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error Group Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}





	public function update_utility()
	{
		echo $id = $this->input->post('id');
		// $type=$this->input->post('utility');

		echo $assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$frequency = $this->input->post('frequency');
		$pmdate = $this->input->post('pmdate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Location " => $location,
			"Frequency" => $frequency,
			"PMDate" => $pmdate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"type" => "utility",
		);
		$query_data = $this->Crud_model->update_data("utility", $data, $id);
		if ($query_data) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_utility()
	{
		// echo "hello";
		// $this->load->view('register');
		$type = $this->input->post('utility');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$frequency = $this->input->post('frequency');
		$pmdate = $this->input->post('pmdate');
		// $license_no=$this->input->post('license_no');

		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"type" => $type,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Location " => $location,
			"Frequency" => $frequency,
			"PMDate" => $pmdate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"type" => "utility",
		);

		$result = $this->Crud_model->insert_data("utility", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_machine()
	{
		// echo "hello";

		if (!empty($_FILES['upload_certificate']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['upload_certificate']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('upload_certificate')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				$picture4 = "";
			}
		} else {
			$picture4 = "";
		}
		// $this->load->view('register');
		$type = $this->input->post('machine');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$frequency = $this->input->post('frequency');
		$pmdate = $this->input->post('pmdate');
		$code = $this->input->post('code');
		// $license_no=$this->input->post('license_no');

		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"type" => $type,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Location " => $location,
			"Frequency" => $frequency,
			"PMDate" => $pmdate,
			"code" => $code,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"type" => "machine",
		);

		$result = $this->Crud_model->insert_data("utility", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_machine()
	{
		// echo "hello";

		if (!empty($_FILES['upload_certificate']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['upload_certificate']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('upload_certificate')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				$picture4 = "";
			}
		} else {
			$picture4 = "";
		}
		$id = $this->input->post('id');
		$data = array(

			"document_guide" => $picture4,

		);

		// $result = $this->Crud_model->insert_data("utility", $data);
		$result = $this->Crud_model->update_data("machines", $data, $id);

		if ($result) {
			echo "<script>alert('Update Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Updated Failed !!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}


	// public function update_machine()
	// {
	// 	echo $id = $this->input->post('id');
	// 	// $type=$this->input->post('utility');

	// 	echo $assetnumber = $this->input->post('assetnumber');
	// 	$assetdesc = $this->input->post('assetdesc');
	// 	$purchased_date = $this->input->post('purchased_date');
	// 	$currentvalue = $this->input->post('currentvalue');
	// 	$location = $this->input->post('location');
	// 	$remark = $this->input->post('remark');
	// 	$depreciation = $this->input->post('depreciation');
	// 	$frequency = $this->input->post('frequency');
	// 	$pmdate = $this->input->post('pmdate');
	// 	$data = array(
	// 		"created_by" => $this->user_name,
	// 		"create_id" => $this->user_id,
	// 		"day" => $this->date,
	// 		"month" => $this->month,
	// 		"year" => $this->year,
	// 		"date" => $this->current_date,
	// 		"time" => $this->current_time,
	// 		"AssetNumber" => $assetnumber,
	// 		"AssetDescription " => $assetdesc,
	// 		"PurchasedDate " => $purchased_date,
	// 		// "LicenseNumber "=>$license_no,	
	// 		"CurrentValue " => $currentvalue,
	// 		"Location " => $location,
	// 		"Frequency" => $frequency,
	// 		"PMDate" => $pmdate,
	// 		"Depreciation " => $depreciation,
	// 		"Remark" => $remark,
	// 		"type" => "machine",
	// 	);
	// 	$query_data = $this->Crud_model->insert_data("dies1", $data);
	// 	if ($query_data) {
	// 		echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
	// 	} else {
	// 		echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
	// 	}
	// }






	public function add_dies()
	{
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$tooltype = $this->input->post('tooltype');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$ownership = $this->input->post('ownership');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$customername = $this->input->post('customername');
		$frequency = $this->input->post('frequency');
		$inspectiondate = $this->input->post('inspectiondate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			"ToolType " => $tooltype,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Location " => $location,
			"Frequency" => $frequency,
			"InspectionDate" => $inspectiondate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"customername" => $customername,
			"ownership" => $ownership,

		);

		$result = $this->Crud_model->insert_data("dies1", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_dies()
	{
		$id = $this->input->post('id');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$tooltype = $this->input->post('tooltype');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$ownership = $this->input->post('ownership');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$customername = $this->input->post('customername');
		$frequency = $this->input->post('frequency');
		$inspectiondate = $this->input->post('inspectiondate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			"ToolType " => $tooltype,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Location " => $location,
			"Frequency" => $frequency,
			"InspectionDate" => $inspectiondate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"customername" => $customername,
			"ownership" => $ownership,

		);

		$result = $this->Crud_model->update_data("dies1", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}


	public function add_jigs()
	{
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$operationame = $this->input->post('operationame');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$ownership = $this->input->post('ownership');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$customername = $this->input->post('customername');
		$frequency = $this->input->post('frequency');
		$inspectiondate = $this->input->post('inspectiondate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			"OperationName " => $operationame,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Location " => $location,
			"Frequency" => $frequency,
			"InspectionDate" => $inspectiondate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"customername" => $customername,
			"ownership" => $ownership,

		);

		$result = $this->Crud_model->insert_data("jigs", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_jigs()
	{
		$id = $this->input->post('id');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$operationame = $this->input->post('operationame');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$ownership = $this->input->post('ownership');
		$location = $this->input->post('location');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$customername = $this->input->post('customername');
		$frequency = $this->input->post('frequency');
		$inspectiondate = $this->input->post('inspectiondate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			"OperationName " => $operationame,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Location " => $location,
			"Frequency" => $frequency,
			"InspectionDate" => $inspectiondate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"customername" => $customername,
			"ownership" => $ownership,

		);

		$result = $this->Crud_model->update_data("jigs", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}














	public function add_gauges()
	{
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$ownership = $this->input->post('ownership');
		$partnumber = $this->input->post('partnumber');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$make = $this->input->post('make');
		$frequency = $this->input->post('frequency');
		$calibrationdate = $this->input->post('calibrationdate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"PartNumber " => $partnumber,
			"Frequency" => $frequency,
			"CalibrationDate" => $calibrationdate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"Make" => $make,
			"ownership" => $ownership,

		);

		$result = $this->Crud_model->insert_data("rgauges", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_gauges()
	{
		$id = $this->input->post('id');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		$currentvalue = $this->input->post('currentvalue');
		$ownership = $this->input->post('ownership');
		$partnumber = $this->input->post('partnumber');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$make = $this->input->post('make');
		$frequency = $this->input->post('frequency');
		$calibrationdate = $this->input->post('calibrationdate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"PartNumber " => $partnumber,
			"Frequency" => $frequency,
			"CalibrationDate" => $calibrationdate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"Make" => $make,

			"ownership" => $ownership,

		);

		$result = $this->Crud_model->update_data("rgauges", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}









	public function add_instruments()
	{
		$asset_number = $this->input->post('asset_number');

		$check_data = array(
			"asset_number" => $asset_number,

		);

		$check_count  = $this->Crud_model->get_data_by_id_count('instruments', $check_data);

		if ($check_count > 0) {
			echo "<script>alert('Asset Number Already Present , Please Enter New Number ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$due_calibration_date = date('Y-m-d', strtotime($this->input->post('calibration_date') . ' + ' . $this->input->post('frequency') . ' days'));
			$data = array(
				"unique_number" => $this->input->post('unique_number'),
				"asset_number" => $this->input->post('asset_number'),
				"asset_description" => $this->input->post('asset_description'),
				"resolution" => $this->input->post('resolution'),
				"make" => $this->input->post('make'),
				"location" => $this->input->post('location'),
				"purchased_date" => $this->input->post('purchased_date'),
				"depreciation" => $this->input->post('depreciation'),
				"current_value" => $this->input->post('current_value'),
				// "frequency" =>$this->input->post('frequency'),
				// "calibration_date" =>$this->input->post('calibration_date'),
				// "due_calibration_date" =>$due_calibration_date,
				"status" => $this->input->post('status'),
				"remark" => $this->input->post('remark'),
				// "msa_value" =>$this->input->post('msa_value'),
				// "msa_file" =>$this->input->post('msa_file'),
				"created_by" => $this->user_id,
				"day" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
				"date" => $this->current_date,
				"time" => $this->current_time,


			);

			$result = $this->Crud_model->insert_data("instruments", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_machine_pm_type()
	{
		// $asset_number = $this->input->post('asset_number');

		// $check_data = array(
		// "asset_number" =>$asset_number,

		// );

		// $check_count  = $this->Crud_model->get_data_by_id_count('instruments', $check_data);

		// if($check_count > 0)
		// {
		// 	echo "<script>alert('Asset Number Already Present , Please Enter New Number ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";

		// }
		// else
		// {
		$due_calibration_date = date('Y-m-d', strtotime($this->input->post('pm_date') . ' + ' . $this->input->post('frequency') . ' days'));
		$data = array(
			"machine_id" => $this->input->post('machine_id'),
			"pm_type" => $this->input->post('pm_type'),
			"frequency" => $this->input->post('frequency'),
			"pm_date" => $this->input->post('pm_date'),
			"pm_due_date" => $due_calibration_date,
			"remark" => $this->input->post('remark'),
			"created_id" => $this->user_id,
			"created_date" => $this->date,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year" => $this->year,
			"created_date_time" => $this->date_time,
			"created_time" => $this->current_time,


		);

		$result = $this->Crud_model->insert_data("asset_machine_pm_history", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}

		//}





	}
	public function add_machines()
	{
		$asset_number = $this->input->post('asset_number');

		$check_data = array(
			"asset_number" => $asset_number,

		);

		$check_count  = $this->Crud_model->get_data_by_id_count('machines', $check_data);

		if ($check_count > 0) {
			echo "<script>alert('Asset Number Already Present , Please Enter New Number ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$due_calibration_date = date('Y-m-d', strtotime($this->input->post('calibration_date') . ' + ' . $this->input->post('frequency') . ' days'));

			if (!empty($_FILES['document_guide']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['document_guide']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('document_guide')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					print_r($this->upload->display_errors());
					$picture4 = "";
				}
			} else {
				$picture4 = "";
				// print_r($this->upload->display_errors());


			}
			$data = array(
				"unique_number" => $this->input->post('unique_number'),
				"asset_number" => $this->input->post('asset_number'),
				"asset_description" => $this->input->post('asset_description'),
				"resolution" => $this->input->post('resolution'),
				"make" => $this->input->post('make'),
				"location" => $this->input->post('location'),
				"purchased_date" => $this->input->post('purchased_date'),
				"depreciation" => $this->input->post('depreciation'),
				"current_value" => $this->input->post('current_value'),
				"code" => $this->input->post('code'),

				"document_guide" => $picture4,

				"status" => $this->input->post('status'),
				"remark" => $this->input->post('remark'),

				"created_by" => $this->user_id,
				"day" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
				"date" => $this->current_date,
				"time" => $this->current_time,


			);

			$result = $this->Crud_model->insert_data("machines", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_realtion_gauges()
	{
		$asset_number = $this->input->post('asset_number');

		$check_data = array(
			"asset_number" => $asset_number,

		);

		$check_count  = $this->Crud_model->get_data_by_id_count('realtion_gauges', $check_data);

		if ($check_count > 0) {
			echo "<script>alert('Asset Number Already Present , Please Enter New Number ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"unique_number" => $this->input->post('unique_number'),
				"asset_number" => $this->input->post('asset_number'),
				"asset_description" => $this->input->post('asset_description'),
				"resolution" => $this->input->post('resolution'),
				"make" => $this->input->post('make'),
				"location" => $this->input->post('location'),
				"purchased_date" => $this->input->post('purchased_date'),
				"depreciation" => $this->input->post('depreciation'),
				"current_value" => $this->input->post('current_value'),
				"frequency" => $this->input->post('frequency'),
				"calibration_date" => $this->input->post('calibration_date'),
				"due_days" => $this->input->post('due_days'),
				"status" => $this->input->post('status'),
				"remark" => $this->input->post('remark'),
				// "msa_value" =>$this->input->post('msa_value'),
				// "msa_file" =>$this->input->post('msa_file'),
				"created_by" => $this->user_id,
				"day" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
				"date" => $this->current_date,
				"time" => $this->current_time,


			);

			$result = $this->Crud_model->insert_data("realtion_gauges", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_history_instrument()
	{

		if (!empty($_FILES['upload_certificate']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['upload_certificate']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('upload_certificate')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
				//echo "yes";
				$due_calibration_date = date('Y-m-d', strtotime($this->input->post('new_calibration_date') . ' + ' . $this->input->post('frequncy_days') . ' days'));

				$data = array(
					"instrument_id" => $this->input->post('instrument_id'),
					"unique_id" => $this->input->post('unique_id'),
					"asset_number" => $this->input->post('asset_number'),
					"frequency" => $this->input->post('frequncy_days'),
					"old_calibration_date" => $this->input->post('old_calibration_date'),
					"old_calibration_due_date" => $this->input->post('old_calibration_due_date'),
					"overdue" => $this->input->post('overdue'),
					"overdue_color" => $this->input->post('overdue_color'),
					"overdue_bg" => $this->input->post('overdue_bg'),
					"calibration_date" => $this->input->post('new_calibration_date'),
					"due_calibration_date" => $due_calibration_date,
					"calibration_report" => $picture4,
					"created_id" => $this->user_id,
					"day" => $this->date,
					"month" => $this->month,
					"year" => $this->year,
					"created_date" => $this->current_date,
					"time" => $this->current_time,


				);

				$result = $this->Crud_model->insert_data("history_instruments", $data);
				if ($result) {
					echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					echo "<script>alert('Error :  Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
				// print_r($data);


			}
		} else {
			echo "<script>alert('Error :  Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_history_instrument()
	{


		$id = $this->input->post('history_id');

		if (!empty($_FILES['upload_certificate']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['upload_certificate']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('upload_certificate')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
				//echo "yes";

				$data = array(

					"calibration_report" => $picture4,


				);

				$result = $this->Crud_model->update_data("history_instruments", $data, $id);
				if ($result) {
					echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					echo "<script>alert('Error :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
				// print_r($data);


			}
		} else {
			echo "<script>alert('Error :  Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function asset_machine_pm()
	{


		$machine_id = $this->uri->segment('2');

		$data['asset_machine_pm'] = $this->Crud_model->get_data_by_id('asset_machine_pm_history', $machine_id, 'machine_id');
		// print_r($data['asset_machine_pm']);
		$this->load->view('header');
		$this->load->view('asset_machine_pm', $data);
		$this->load->view('footer');
	}
	public function assign_pm_group()
	{


		$machine_id = $this->uri->segment('2');
		$data['machine_id'] = $this->uri->segment('2');
		$data['check_list_groups'] = $this->Crud_model->read_data("check_list_groups");

		// $data['assign_pm_group'] = $this->Crud_model->get_data_by_id('assign_pm_group', $machine_id, 'machine_id');
		$data['assign_pm_group'] = $this->Crud_model->select_one_with_where("assign_pm_group", "group_id", " WHERE machine_id = $machine_id ");
		// print_r($data['assign_pm_group']);
		$this->load->view('header');
		$this->load->view('assign_pm_group', $data);
		$this->load->view('footer');
	}
	public function history_assign_pm_group()
	{



		$machine_id = $this->uri->segment('3');
		$group_id = $this->uri->segment('2');

		$data_check = array(
			"machine_id" => $machine_id,
			"group_id" => $group_id,
		);
		$data['assign_pm_group'] = $this->Crud_model->get_data_by_id_multile("assign_pm_group", $data_check);



		$this->load->view('header');
		$this->load->view('history_assign_pm_group', $data);
		$this->load->view('footer');
	}
	public function update_msa_instrument()
	{


		$id = $this->input->post('instrument_id');
		$msa_value = $this->input->post('msa_value');

		if (!empty($_FILES['msa_file']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['msa_file']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('msa_file')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
				//echo "yes";

				$data = array(

					"msa_value" => $msa_value,
					"msa_file" => $picture4,


				);

				$result = $this->Crud_model->update_data("instruments", $data, $id);
				if ($result) {
					echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					echo "<script>alert('Error :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
				// print_r($data);


			}
		} else {
			echo "<script>alert('Error :  Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_instruments()
	{
		$id = $this->input->post('id');
		$assetnumber = $this->input->post('assetnumber');
		$assetdesc = $this->input->post('assetdesc');
		$purchased_date = $this->input->post('purchased_date');
		echo	$currentvalue = $this->input->post('currentvalue');
		$location = $this->input->post('location');
		$range = $this->input->post('range');
		$remark = $this->input->post('remark');
		$depreciation = $this->input->post('depreciation');
		$make = $this->input->post('make');
		$frequency = $this->input->post('frequency');
		$calibrationdate = $this->input->post('calibrationdate');
		$data = array(
			"created_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"AssetNumber" => $assetnumber,
			"AssetDescription " => $assetdesc,
			"PurchasedDate " => $purchased_date,
			// "LicenseNumber "=>$license_no,	
			"CurrentValue " => $currentvalue,
			"Resolution " => $range,
			"Frequency" => $frequency,
			"CalibrationDate" => $calibrationdate,
			"Depreciation " => $depreciation,
			"Remark" => $remark,
			"Make" => $make,
			"location" => $location,

		);

		$result = $this->Crud_model->update_data("instruments", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}


	public function add_pm_type()
	{
		echo $pm_type_name = $this->input->post('pm_type_name');
		$pm_type_array = array(
			"pm_type_name" => $pm_type_name,
		);
		echo $pm_type_count = $this->Crud_model->get_data_by_id_count('pm_type', $pm_type_array);

		if ($pm_type_count != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {


			$data = array(
				"created_by" => $this->user_name,
				"day" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
				"date" => $this->current_date,
				"time" => $this->current_time,
				"pm_type_name" => $pm_type_name,
			);
			$result = $this->Crud_model->insert_data("pm_type", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	// public function add_pm_type()
	// {
	// 	echo $pm_type_name = $this->input->post('pm_type_name');
	// 	$pm_type_array = array(
	// 		"pm_type_name" => $pm_type_name,
	// 	);
	// 	echo $pm_type_count = $this->Crud_model->get_data_by_id_count('pm_type', $pm_type_array);

	// 	if ($pm_type_count != 0) {
	// 		echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
	// 	} else {


	// 		$data = array(
	// 			"created_by" => $this->user_name,
	// 			"day" => $this->date,
	// 			"month" => $this->month,
	// 			"year" => $this->year,
	// 			"date" => $this->current_date,
	// 			"time" => $this->current_time,
	// 			"pm_type_name" => $pm_type_name,
	// 		);
	// 		$result = $this->Crud_model->insert_data("pm_type", $data);
	// 		if ($result) {
	// 			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
	// 		} else {
	// 			echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
	// 		}
	// 	}
	// }
	public function create_breakdown()
	{
		$machine_id = $this->uri->segment('2');


		$data = array(
			"request_from" => $this->user_id,
			"crated_day" => $this->date,
			"crated_month" => $this->month,
			"created_year" => $this->year,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
			"machine_id" => $machine_id,
		);
		$result = $this->Crud_model->insert_data("breakdown_request", $data);
		if ($result) {
			// $this->send_meesage("Breakdown Created Alert ");
			// $this->send_meesage2("Breakdown Created Alert");
			echo "<script>alert('Break-Down Request Created  Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While Adding BreakDown ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function create_improvement()
	{
		$machine_id = $this->uri->segment('2');


		$data = array(
			"request_from" => $this->user_id,
			"crated_day" => $this->date,
			"crated_month" => $this->month,
			"created_year" => $this->year,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
			"machine_id" => $machine_id,
		);
		$result = $this->Crud_model->insert_data("improvement_request", $data);
		echo "<script>alert('Added Sucessfully ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";

		// echo "<script>alert('updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";

		// if ($result) {
		// 	// $this->send_meesage("Breakdown Created Alert ");
		// 	// $this->send_meesage2("Breakdown Created Alert");
		// 	echo "<script>alert('updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";

		// 	// echo "<script>alert('Error While Adding Improvement Request please try again ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// 	// echo "<script>alert('Improvement Request Created  Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// } else {
		// 	echo "<script>alert('Error While Adding Improvement Request please try again ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// }
	}

	public function send_meesage($message)
	{
		$ch = curl_init();
		$message = str_replace(' ', '%20', $message);
		// $message = "hi";
		//echo $message;
		// echo $mobile;
		$url = 'http://173.45.76.227/send.aspx?username=%20ojayur&pass=%20oj12ayur78&route=trans1&senderid=%20OJAYUR&numbers=%20919822959424&message=' . $message . '';
		// $mobile = "91"+$mobile;
		//   echo $url;
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_HTTPGET, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		print_r($response);
		curl_close($ch);
	}
	public function send_meesage2($message)
	{
		$ch = curl_init();
		$message = str_replace(' ', '%20', $message);
		// $message = "hi";
		//echo $message;
		// echo $mobile;
		$url = 'http://173.45.76.227/send.aspx?username=%20ojayur&pass=%20oj12ayur78&route=trans1&senderid=%20OJAYUR&numbers=%20918411932111&message=' . $message . '';
		// $mobile = "91"+$mobile;
		//   echo $url;
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_HTTPGET, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		print_r($response);
		curl_close($ch);
	}

	public function update_pm_type()
	{
		$id = $this->input->post('id');
		$pm_type_name = $this->input->post('pm_type_name');
		$data = array(
			"created_by" => $this->user_name,
			// "deleted_by" => $this->user_name,
			"day" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"date" => $this->current_date,
			"time" => $this->current_time,
			"pm_type_name" => $pm_type_name,
		);
		$result = $this->Crud_model->update_data("pm_type", $data, $id);
		if ($result) {
			echo "<script>alert('updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Not updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}



	public function add_pm_check_list()
	{
		// echo "hello";
		// $this->load->view('register');
		$pm_type_id = $this->input->post('pm_type_id');
		$parameter = $this->input->post('parameter');
		$spec_type = $this->input->post('spec_type');
		$spec = $this->input->post('spec');
		$actual = $this->input->post('actual');
		$attribute_result = $this->input->post('attribute_result');
		$spec_remark = $this->input->post('spec_remark');
		$machine_id1 = $this->input->post('machine_id');



		$data = array(
			"create_id" => $this->user_name,
			"machine_id" => $machine_id1,
			"deleted" => "",
			"date" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"created_date" => $this->current_date,
			"time" => $this->current_time,
			"pm_type_id" => $pm_type_id,
			"parameter " => $parameter,
			"spec_type" => $spec_type,
			"spec " => $spec,
			"actual " => $actual,
			"attribute_result" => $attribute_result,
			"spec_remark" => $spec_remark,

		);

		$result = $this->Crud_model->insert_data("machines_pm_checklist", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_pm_check_list()
	{
		// echo "hello";
		// $this->load->view('register');
		$id = $this->input->post('id');
		$pm_type_id = $this->input->post('pm_type_id');
		$parameter = $this->input->post('parameter');
		$spec_type = $this->input->post('spec_type');
		$spec = $this->input->post('spec');
		$actual = $this->input->post('actual');
		$attribute_result = $this->input->post('attribute_result');
		$spec_remark = $this->input->post('spec_remark');
		$machine_id1 = $this->input->post('machine_id');

		$data = array(
			"create_id" => $this->user_name,
			"machine_id" => $machine_id1,
			"deleted" => "",
			"date" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"created_date" => $this->current_date,
			"time" => $this->current_time,
			"pm_type_id" => $pm_type_id,
			"parameter " => $parameter,
			"spec_type" => $spec_type,
			"spec " => $spec,
			"actual " => $actual,
			"attribute_result" => $attribute_result,
			"spec_remark" => $spec_remark,

		);

		$result = $this->Crud_model->update_data("machines_pm_checklist", $data, $id);

		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}





	public function add_item_master()
	{
		// echo "hello";
		// $this->load->view('register');
		$spare_number = $this->input->post('spare_number');
		$test_array = array(
			"spare_number" => $spare_number,
		);
		$count = $this->Crud_model->get_data_by_id_count('item_master', $test_array);

		if ($count != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$spare_description = $this->input->post('spare_description');
			$saftey_stock = $this->input->post('saftey_stock');

			$data = array(
				"create_id" => $this->user_id,
				"spare_number" => $spare_number,
				"deleted" => "",
				"uom" => $this->input->post('uom'),
				// "grn_date" => $this->input->post('grn_date'),
				"date" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
				"created_date" => $this->current_date,
				"time" => $this->current_time,
				"spare_description" => $spare_description,
				"saftey_stock " => $saftey_stock,


			);

			$result = $this->Crud_model->insert_data("item_master", $data);

			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function update_item_master()
	{
		// echo "hello";
		// $this->load->view('register');
		$spare_number = $this->input->post('spare_number');
		$id = $this->input->post('id');

		$test_array = array(
			"spare_number" => $spare_number,
		);
		echo $count = $this->Crud_model->get_data_by_id_count('item_master', $test_array);

		// if ($count != 0) {
		// 	echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// } else {
		$spare_description = $this->input->post('spare_description');
		$saftey_stock = $this->input->post('saftey_stock');

		$data = array(
			"create_id" => $this->user_name,
			"spare_number" => $spare_number,
			"deleted" => "",
			"date" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"created_date" => $this->current_date,
			"time" => $this->current_time,
			"spare_description" => $spare_description,
			"saftey_stock " => $saftey_stock,


		);

		$result = $this->Crud_model->update_data("item_master", $data, $id);

		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	public function delete_data()
	{
		$id = $this->input->post('id');
		$table_name = $this->input->post('table_name');
		$data = array(
			"id" => $id,
		);
		// $this->db->where($array);
		$result = $this->Crud_model->delete($table_name, $data);
		if ($result) {
			echo "<script>alert(' Deleted Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not deleted');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	public function login_user()
	{


		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');


		if ($this->form_validation->run() == False) {
			$data2 = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data2);
			redirect('login');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			$data = array(
				"email" => $email,
				"password" => $password,
			);
			
			$result = $this->Crud_model->get_data_by_id_multile12("user", $data);
			
			if ($result == 0) {
				$data3 = array(
					'errors' => 'email and password invalid',
				);
				$this->session->set_flashdata($data3);
				redirect('login');
			} else {
				if ($result) {
					$user_data = array(
						'user_id' => $result[0]->id,
						'user_email' => $result[0]->email,
						'user_role' => $result[0]->user_type,
						'login_check' => true
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login', 'success');
					redirect('index');
				} else {
					$this->session->set_flashdata('logout', 'error');
					//redirect('AuthenticationController');
				}
			}
		}
	}
	public function logout()
	{
		$user_data = array(
			'user_email' => '',
			'login_check' => false,
		);
		$this->session->set_userdata($user_data);
		redirect('index');
	}

	public function add_part()
	{
		// echo 'yes';
		$id = $this->input->post('id');
		echo $table = $this->input->post('table_name');
		echo	$col_name = $this->input->post('column_name');
		$frequency = $this->input->post('frequency');
		$calibrationdate = $this->input->post('calibrationdate');
		if (!empty($_FILES['cad_file']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['cad_file']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('cad_file')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
				$data = array(
					$col_name => $picture4,
				);
				$result = $this->Crud_model->update_data($table, $data, $id);

				// echo "yes";	
				if ($result) {
					echo "<script>alert(' uploaded Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				$picture4 = '';
				echo "no 1";
			}
		} else {
			$picture4 = '';
			echo "no 2";
		}
	}

	public function add_spare_grn()
	{
		// echo "hello";
		// $this->load->view('register');
		$spare_id = $this->input->post('spare_id');
		$actual_stock = $this->input->post('actual_stock');
		$price_per_choice = $this->input->post('price_per_choice');
		$grn_number = $this->input->post('grn_number');
		$spare_description1 = $this->Crud_model->get_data_by_id('item_master', $spare_id, 'id');

		$id = $spare_description1[0]->spare_description;


		// $spare_description = $spare_description1['spare_description'];
		$test_array = array(
			"spare_id" => $spare_id,
			"grn_number" => $grn_number,
		);
		$count = $this->Crud_model->get_data_by_id_count('spare_grn', $test_array);

		if ($count > 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			if (!empty($_FILES['grn_document']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['grn_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('grn_document')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					print_r($this->upload->display_errors());
					$picture4 = "";
				}
			} else {
				$picture4 = "";
				// print_r($this->upload->display_errors());


			}


			$grn_total_price = $this->input->post('grn_qty') * $this->input->post('grn_price');
			$data = array(
				"spare_id" => $this->input->post('spare_id'),
				"spare_number" => $spare_description1[0]->spare_number,
				"spare_description" => $spare_description1[0]->spare_number,
				"grn_number" => $this->input->post('grn_number'),
				"grn_qty" => $this->input->post('grn_qty'),
				"on_hand_stock" => $this->input->post('grn_qty'),
				"grn_price" => $this->input->post('grn_price'),
				"grn_total_price" => $grn_total_price,
				"grn_date" => $this->input->post('grn_date'),
				"month" => $this->month,
				"year" => $this->year,
				"date" => $this->date,
				"grn_document" => $picture4,
				"created_id" => $this->user_id,
				"created_date" => $this->current_date,
				"time" => $this->current_time,
			);

			$store_stock = $spare_description1[0]->store_stock + ($this->input->post('grn_qty'));
			$data_new = array(
				"store_stock" => $store_stock,
			);
			$result_new = $this->Crud_model->update_data("item_master", $data_new, $spare_description1[0]->id);
			if ($result_new) {
				$result = $this->Crud_model->insert_data("spare_grn", $data);

				if ($result) {
					echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				echo "<script>alert('Error In Main Stock Update, please try again ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function update_spare_grn()
	{
		// echo "hello";
		// $this->load->view('register');
		echo $id = $this->input->post('id');
		$spare_id = $this->input->post('spare_id');
		$actual_stock = $this->input->post('actual_stock');
		$price_per_choice = $this->input->post('price_per_choice');
		$grn_number = $this->input->post('grn_number');
		$spare_description1 = $this->Crud_model->get_data_by_id('item_master', $spare_id, 'id');

		$spare_description = $spare_description1[0]->spare_description;
		// $spare_description = $spare_description1['spare_description'];
		$test_array = array(
			"spare_id" => $spare_id,
			"grn_number" => $grn_number,
		);
		$count = $this->Crud_model->get_data_by_id_count('spare_grn', $test_array);

		if ($count != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"create_id" => $this->user_name,
				"spare_description" => $spare_description,
				"date" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
				"created_date" => $this->current_date,
				"time" => $this->current_time,
				"spare_id" => $spare_id,
				"actual_stock " => $actual_stock,
				"grn_number" => $grn_number,

				"price_per_choice" => $price_per_choice,
			);

			$result = $this->Crud_model->update_data("spare_grn", $data, $id);

			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_spare_store()
	{
		// echo "hello";
		// $this->load->view('register');
		$spare_number = $this->input->post('spare_number');
		$actual_stock = $this->input->post('actual_stock');
		$price_per_choice = $this->input->post('price_per_choice');
		$grn_number = $this->input->post('grn_number');
		$spare_description1 = $this->Crud_model->get_data_by_id('item_master', $spare_number, 'spare_number');

		$id = $spare_description1[0]->spare_description;
		// $spare_description = $spare_description1['spare_description'];
		$data = array(
			"create_id" => $this->user_name,
			"spare_description" => $id,
			"date" => $this->date,
			"month" => $this->month,
			"year" => $this->year,
			"created_date" => $this->current_date,
			"time" => $this->current_time,
			"spare_number" => $spare_number,
			"actual_stock " => $actual_stock,
			"grn_number" => $grn_number,

			"price_per_choice" => $price_per_choice,
		);

		$result = $this->Crud_model->insert_data("spare_grn", $data);

		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Software Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
}
