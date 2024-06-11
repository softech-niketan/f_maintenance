<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->user_name = $this->session->userdata('user_email');
		$this->user_id = $this->session->userdata('user_id');
		$this->current_date = date('Y-m-d');
		$this->current_time = date("h:i:sa");
		$this->date_time = date('Y-m-d H:i:s');

		$d = date_parse_from_format("Y-m-d", $this->current_date);
		$this->date = $d["day"];
		$this->month = $d["month"];
		$this->year = $d["year"];
	}
	public function erp_users()
	{

		$data['user_info'] = $this->Crud_model->get_all_data("user");


		$this->load->view('header.php');
		$this->load->view('erp_users.php', $data);
		$this->load->view('footer.php');
	}
	public function dashboard_master()
	{

		$data['dashboard_master'] = $this->Crud_model->get_all_data("dashboard_master");


		$this->load->view('header.php');
		$this->load->view('dashboard_master.php', $data);
		$this->load->view('footer.php');
	}
	public function add_users()
	{



		$data = array(
			'user_name' => $this->input->post('user_name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'user_type' => $this->input->post('user_role'),


		);



		$inser_query = $this->Crud_model->insert_data("user", $data);
		if ($inser_query) {
			echo "<script>alert('User  Added Successfully');document.location='erp_users'</script>";
		} else {
			echo "<script>alert('Error IN User  Adding ,try again');document.location='erp_users'</script>";
		}
	}
}
