<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
    function __construct()
    {
        parent::__construct(); 
    

        $this->user_name = $this->session->userdata('drawing_full_name');
		$this->user_id =$this->session->userdata('drawing_id');
		$this->current_date = date('Y-m-d');
		$this->current_time = date('h:i:s');

	} 
	public function add_users_data()
    {
        
       
       
        $data = array(
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>$this->input->post('user_password'),
            'user_name'=>$this->input->post('user_fullname'),
            'user_type'=>$this->input->post('user_role')
            
            
        );

      

        $inser_query = $this->Common_admin_model->insert("user_info",$data);

       
           
           
           
            if($inser_query)
            {
                echo "<script>alert('User  Added Successfully');document.location='erp_users'</script>";

            }
            else
            {
               echo "<script>alert('Error IN User  Adding ,try again');document.location='erp_users'</script>";

            }


        
      
           
	}
	public function add_part_creation()
	{
		$data_old = array(
			'part_number'=>$this->input->post('part_number'),
			'revision_number'=>$this->input->post('revision_number'),
			
		);

		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition("part_creation",$data_old);




		if($customer_count>0)
		{
			echo "<script>alert('Error : Customer Part Number and Revision Number Must Be Unique');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			
				if(!empty($_FILES['cad_file']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['cad_file']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('cad_file')){
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
					//echo "yes";	
				}
				else{
					$picture4 = '';
					echo "no 1";
				}
			}else
			{
				$picture4 = '';
				echo "no 2";
			}






			
				if(!empty($_FILES['part_drawing']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['part_drawing']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('part_drawing')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture1 = '';
					echo "no 1";
				}
			}else
			{
				$picture1 = '';
				echo "no 2";
			}
				
			
			if(!empty($_FILES['ppap_document']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['ppap_document']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('ppap_document')){
					$uploadData = $this->upload->data();
					$picture2 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture2 = '';
					echo "no 1";
				}
			}else
			{
				$picture2 = '';
				echo "no 2";
			}
			if(!empty($_FILES['modal_document']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['modal_document']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('modal_document')){
					$uploadData = $this->upload->data();
					$picture3 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture3 = '';
					echo "no 1";
				}
			}else
			{
				$picture3 = '';
				echo "no 2";
			}

				$data = array(
					'part_number'=>$this->input->post('part_number'),
					'part_description'=>$this->input->post('part_description'),
					'internal_part_number'=>$this->input->post('internal_part_number'),
					'group_id'=>$this->input->post('group_id'),
					'sub_group_id'=>$this->input->post('sub_group_id'),
					'type_id'=>$this->input->post('type_id'),
					'part_drawing'=>$picture1,
					'ppap_document'=>$picture2,
					'modal_document'=>$picture3,
					'cad_file'=>$picture4,
					'revision_number'=>$this->input->post('revision_number'),
					'revision_date'=>$this->input->post('revision_date'),
					'revision_remark'=>$this->input->post('revision_remark'),
					'created_date'=>$this->current_date,
				);
		
				$insert = $this->Common_admin_model->insert('part_creation',$data);
		
				if($insert)
				{
		
				
					
							
		
				echo "<script>alert(' Parts Added  ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
							
		
				}
				else
				{
					echo "<script>alert('Error While Adding part_creation  !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		
				}
		}
			

		
	}
    public function index()
    {
		$data['total_groups'] = $this->Common_admin_model->get_all_data_count("groups");

		$data['total_sub_groups'] = $this->Common_admin_model->get_all_data_count("sub_group");
		$data['standards'] = $this->Common_admin_model->get_all_data_count("standards");
		$data['total_ppap_document'] = $this->Common_admin_model->get_all_data_count("part_creation");
		$data['total_parts'] =  $this->Common_admin_model->get_all_data_count("part_creation");
		
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('index.php',$data);

		$this->load->view('includes/footer.php');

    }
   
    public function groups()
    {
		
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('groups.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function export_by_group_sub_groups()
    {
		
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		
		// print_r($data['orders']);
		
		
		$this->load->view('includes/header.php');
		$this->load->view('export_by_group_sub_groups.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function groups_grid()
    {
		
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('groups_grid.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function standards()
    {
		
		$data['standards'] = $this->Common_admin_model->get_all_data("standards");
		
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('standards.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function part_creation()
    {
		
		$data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		$data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");
		$data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		$role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		$data['part_creation_revision'] = $role_management_data->result();
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('part_creation.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function view_part_by_sub_group_id()
    {
		$sub_group_id = $this->uri->segment('2');
		$data['part_creation'] = $this->Common_admin_model->get_data_by_id("part_creation",$sub_group_id,"sub_group_id");

		// $data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		// $data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		// $data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		// $data['operations'] = $this->Common_admin_model->get_all_data("operations");
		// $data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		// $data['part_creation_revision'] = $role_management_data->result();
		// print_r($data['part_creation']);
		$this->load->view('includes/header.php');
		$this->load->view('view_part_by_sub_group_id.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function part_operations()
    {
		$type = $this->uri->segment('2');
		$data['type'] = $this->uri->segment('2');
		$part_id = $this->uri->segment('3');
		$data['part_id'] = $this->uri->segment('3');

		$data['part_info'] = $this->Common_admin_model->get_data_by_id("part_creation",$part_id,"id");
		// print_r($data['part_info']);


		$data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		$data['part_operations'] = $this->Common_admin_model->get_all_data("part_operations");
		$data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");
		$data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		$role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		$data['new_part'] = $role_management_data->result();
		$role_management_data = $this->db->query('SELECT DISTINCT part_id,operation_id FROM `part_operations` WHERE part_id='.$part_id.' ');
		$data['part_operations_revision'] = $role_management_data->result();
		// print_r($data['new_part']);
		$this->load->view('includes/header.php');
		$this->load->view('part_operations.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function part_operations_assembly()
    {
		
		$data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		$data['part_operations'] = $this->Common_admin_model->get_all_data("part_operations");
		$data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");
		$data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		$role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		$data['new_part'] = $role_management_data->result();
		$role_management_data = $this->db->query('SELECT DISTINCT part_id,operation_id FROM `part_operations_assembly` ');
		$data['part_operations_revision'] = $role_management_data->result();
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('part_operations_assembly.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function view_history_part()
    {
        $part_no =$this->uri->segment('2');
		
		// $data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		$data['part_creation'] = $this->Common_admin_model->get_data_by_id("part_creation",$part_no,"part_number");

		$data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");
		$data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		// $data['part_creation_revision'] = $role_management_data->result();
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('view_history_part.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function view_history_operation_parts()
    {
        $part_no =$this->uri->segment('2');
        $operation_id =$this->uri->segment('3');
		
		$data_old = array(
			'part_id'=>$part_no,
			'operation_id'=>$operation_id,
			
		);

		$data['part_operations'] = $this->Common_admin_model->get_data_by_id_multiple_condition("part_operations",$data_old);
		// $data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		// $data['part_creation'] = $this->Common_admin_model->get_data_by_id("part_creation",$part_no,"part_number");
		// print_r(($data['part_operations']));
		// $data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		// $data['groups'] = $this->Common_admin_model->get_all_data("groups");
		// $data['size'] = $this->Common_admin_model->get_all_data("size");
		// $data['operations'] = $this->Common_admin_model->get_all_data("operations");
		// $data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		// $data['part_creation_revision'] = $role_management_data->result();
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('view_history_operation_parts.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function view_history_operation_parts_assembly()
    {
        $part_no =$this->uri->segment('2');
        $operation_id =$this->uri->segment('3');
		
		$data_old = array(
			'part_id'=>$part_no,
			'operation_id'=>$operation_id,
			
		);

		$data['part_operations'] = $this->Common_admin_model->get_data_by_id_multiple_condition("part_operations_assembly",$data_old);
		// $data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		// $data['part_creation'] = $this->Common_admin_model->get_data_by_id("part_creation",$part_no,"part_number");
		// print_r(($data['part_operations']));
		// $data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		// $data['groups'] = $this->Common_admin_model->get_all_data("groups");
		// $data['size'] = $this->Common_admin_model->get_all_data("size");
		// $data['operations'] = $this->Common_admin_model->get_all_data("operations");
		// $data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		// $data['part_creation_revision'] = $role_management_data->result();
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('view_history_operation_parts_assembly.php',$data);

		$this->load->view('includes/footer.php');

    }

    public function sub_groups()
    {
		
		$data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");

		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('sub_groups.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function view_sub_group_grid()
    {
		$gruop_id = $this->uri->segment('2');
		
		$data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		$data['groups'] = $this->Common_admin_model->get_all_data("groups");
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");
		$data['sub_group'] = $this->Common_admin_model->get_data_by_id("sub_group",$gruop_id,"group_id");

		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('view_sub_group_grid.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function size()
    {
		
		$data['size'] = $this->Common_admin_model->get_all_data("size");
		
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('size.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function operations()
    {
		
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");
		
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('operations.php',$data);

		$this->load->view('includes/footer.php');

    }
    public function part_type()
    {
		
		$data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");
		
		// print_r($data['orders']);
		$this->load->view('includes/header.php');
		$this->load->view('part_type.php',$data);

		$this->load->view('includes/footer.php');

    }


	public function erp_users()
    {

        $data['user_info'] = $this->Common_admin_model->get_all_data("user_info");


        $this->load->view('includes/header.php');
        $this->load->view('erp_users.php',$data);
        $this->load->view('includes/footer.php');
	}
	
	
   
    //add    
	public function add_groups()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("groups",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('Group  already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			if(!empty($_FILES['img']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['img']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('img')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture1 = '';
					echo "no 1";
				}
			}else
			{
				$picture1 = '';
				echo "no 2";
			}

			$data = array(
				'name'=>$this->input->post('name'),
				'img'=>$picture1,
				'created_by'=>$this->user_id,
				'created_date'=>$this->current_date,
				'created_time'=>$this->current_time,
			);
	
			$insert = $this->Common_admin_model->insert('groups',$data);
	
			if($insert)
			{
 				echo "<script>alert('Groups Added , ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
						
	
			}
			else
			{
				echo "<script>alert('Error While Adding Groups !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
	
			}

		}
		
		
		
	}
	public function add_child_part()
	{
		$data_old = array(
			'assembly_part_id'=>$this->input->post('assembly_part_id'),
			'part_id'=>$this->input->post('part_id'),
			
		);
		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition_count("assembly_parts",$data_old);



		if($customer_count>0)
		{
			echo "<script>alert('ERROR : Child Part Already Present');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			// if(!empty($_FILES['img']['name']))
			// {
			// 	$image_path = "./documents/";
			// 	$config['upload_path'] = $image_path;
			// 	$config['allowed_types'] = '*';
			// 	$config['file_name'] = $_FILES['img']['name'];
				
			// 	//Load upload library and initialize configuration
			// 	$this->load->library('upload',$config);
			// 	$this->upload->initialize($config);
				
			// 	if($this->upload->do_upload('img')){
			// 		$uploadData = $this->upload->data();
			// 		$picture1 = $uploadData['file_name'];
			// 		//echo "yes";
			// 	}
			// 	else{
			// 		$picture1 = '';
			// 		echo "no 1";
			// 	}
			// }else
			// {
			// 	$picture1 = '';
			// 	echo "no 2";
			// }

			$data = array(
				'assembly_part_id'=>$this->input->post('assembly_part_id'),
				'part_id'=>$this->input->post('part_id'),
				'quantity'=>$this->input->post('quantity'),
				// 'revision_number'=>$this->input->post('revision_number'),
				// 'revision_remark'=>$this->input->post('revision_remark'),
				
			);
	
			$insert = $this->Common_admin_model->insert('assembly_parts',$data);
	
			if($insert)
			{
 				echo "<script>alert('Assebmly Parts Added , ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
						
	
			}
			else
			{
				echo "<script>alert('Error While Assebmly Parts !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
	
			}
			
		}

		//}
		
		
		
	}
	public function add_size()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("size",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('size  already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			
			$data = array(
				'name'=>$this->input->post('name'),
				'created_by'=>$this->user_id,
				'created_date'=>$this->current_date,
				'created_time'=>$this->current_time,
			);
	
			$insert = $this->Common_admin_model->insert('size',$data);
	
			if($insert)
			{
 				echo "<script>alert('Size Added , ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
						
	
			}
			else
			{
				echo "<script>alert('Error While size Groups !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
	
			}

		}
		
		
		
	}
	public function add_standards()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("standards",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('Standards  already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			if(!empty($_FILES['document']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['document']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('document')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture1 = '';
					echo "no 1";
				}
			}else
			{
				$picture1 = '';
				echo "no 2";
			}
			
			$data = array(
				'name'=>$this->input->post('name'),
				'document'=>$picture1,
				'created_date'=>$this->user_id,
				'created_date'=>$this->current_date,
				'created_time'=>$this->current_time,
			);
	
			$insert = $this->Common_admin_model->insert('standards',$data);
	
			if($insert)
			{
 				echo "<script>alert('Standards Added , ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
						
	
			}
			else
			{
				echo "<script>alert('Error While Adding  Standards !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
	
			}

		}
		
		
		
	}
	public function add_operations()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("operations",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('Operations  already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			
			$data = array(
				'name'=>$this->input->post('name'),
				'created_by'=>$this->user_id,
				'created_date'=>$this->current_date,
				'created_time'=>$this->current_time,
			);
	
			$insert = $this->Common_admin_model->insert('operations',$data);
	
			if($insert)
			{
 				echo "<script>alert('operations Added  ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
						
	
			}
			else
			{
				echo "<script>alert('Error While operations  !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
	
			}

		}
		
		
		
	}
	public function add_part_type()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("parts_type",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('parts_type  already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			
			$data = array(
				'name'=>$this->input->post('name'),
				'created_by'=>$this->user_id,
				'created_date'=>$this->current_date,
				'created_time'=>$this->current_time,
			);
	
			$insert = $this->Common_admin_model->insert('parts_type',$data);
	
			if($insert)
			{
 				echo "<script>alert('parts_type Added  ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
						
	
			}
			else
			{
				echo "<script>alert('Error While parts_type  !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
	
			}

		}
		
		
		
	}
	public function add_sub_groups()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("sub_group",$this->input->post('name'),"sub_group_name");



		if($customer_count>0)
		{
			echo "<script>alert('sub_group  already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
			if(!empty($_FILES['img']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['img']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('img')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture1 = '';
					echo "no 1";
				}
			}else
			{
				$picture1 = '';
				echo "no 2";
			}

			$data = array(
				'group_id'=>$this->input->post('group_id'),
				'sub_group_name'=>$this->input->post('name'),
				'img'=>$picture1,
				'created_by'=>$this->user_id,
				'created_date'=>$this->current_date,
				'created_time'=>$this->current_time,
			);

			//print_r($data);
	
			$insert = $this->Common_admin_model->insert('sub_group',$data);
	
			if($insert)
			{
 				echo "<script>alert('Sub Groups Added , ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
						
	
			}
			else
			{
				echo "<script>alert('Error While Adding Sub Groups !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
	
			}

		}
		
		
		
	}
	

	
	public function add_part_operations()
	{
		$data_old = array(
			'part_id'=>$this->input->post('part_id'),
			'operation_id'=>$this->input->post('operation_id'),
			'revision_number'=>$this->input->post('revision_number'),
			
		);

		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition_count("part_operations",$data_old);

		// // $customer_count = $this->Common_admin_model->get_data_by_id_count("part_operations",$this->input->post('part_id'),"part_id");



		if($customer_count>0)
		{
			echo "<script>alert('Error : Part Already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		
else
			{

				
			
				if(!empty($_FILES['drawing']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['drawing']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('drawing')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture1 = '';
					echo "no 1";
				}
			}else
			{
				$picture1 = '';
				echo "no 2";
			}

				$data = array(
					'part_id'=>$this->input->post('part_id'),
					'operation_id'=>$this->input->post('operation_id'),
					'operation_description'=>$this->input->post('operation_description'),
					'drawing'=>$picture1,
					'revision_number'=>$this->input->post('revision_number'),
					'revision_date'=>$this->input->post('revision_date'),
					'revision_remark'=>$this->input->post('revision_remark'),
					'created_date'=>$this->current_date,
				);
		
				$insert = $this->Common_admin_model->insert('part_operations',$data);
		
				if($insert)
				{
		
				
					
							
		
				echo "<script>alert(' Operations  Added  ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
							
		
				}
				else
				{
					echo "<script>alert('Error While Adding Operations Parts !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		
				}
			

			}

		//	}
			

		
	}
	public function add_part_operations_assembly()
	{
		// $data_old = array(
		// 	'part_id'=>$this->input->post('part_id'),
		// 	'operation_id'=>$this->input->post('operation_id'),
			
		// );

		// $customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition_count("part_operations_assembly",$data_old);

		// // $customer_count = $this->Common_admin_model->get_data_by_id_count("part_operations",$this->input->post('part_id'),"part_id");



		// if($customer_count>0)
		// {
		// 	echo "<script>alert('Error : Part Already Present!!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		// }
		// else
		// {
			
				if(!empty($_FILES['drawing']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['drawing']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('drawing')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				}
				else{
					$picture1 = '';
					echo "no 1";
				}
			}else
			{
				$picture1 = '';
				echo "no 2";
			}

				$data = array(
					'part_id'=>$this->input->post('part_id'),
					'operation_id'=>$this->input->post('operation_id'),
					'operation_description'=>$this->input->post('operation_description'),
					'drawing'=>$picture1,
					'revision_number'=>$this->input->post('revision_number'),
					'revision_date'=>$this->input->post('revision_date'),
					'revision_remark'=>$this->input->post('revision_remark'),
					'created_date'=>$this->current_date,
				);
		
				$insert = $this->Common_admin_model->insert('part_operations_assembly',$data);
		
				if($insert)
				{
		
				
					
							
		
				echo "<script>alert('Assebmly Operations  Added  ');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
							
		
				}
				else
				{
					echo "<script>alert('Error While Adding Assebmly Operations Parts !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		
				}

			//}
			

		
	}
	

	
    

    //update
    public function update_groups()
	{
		if(!empty($_FILES['img']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['img']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('img')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
				
				}
				else{
					$picture1 = '';
					
				}
			}else
			{
				$picture1 = $this->input->post('old_img');
				
			}

        $id = $this->input->post('id');
		$data = array(
			'name'=>$this->input->post('name'),
			'img'=>$picture1
		);

		 $query = $this->Common_admin_model->update("groups",$data,"id",$id);

		if($query)
		{
			
				echo "<script>alert('Groupds  Updated !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			
		}
		else
		{
			echo "<script>alert('Error While  Updating Groups, Please try Again');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
		
	}
    public function update_part_drawings()
	{
		if(!empty($_FILES['document']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['document']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('document')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
				
				}
				else{
					$picture1 = '';
					
				}
			}else
			{
				$picture1 = $this->input->post('old_img');
				
			}

		$id = $this->input->post('id');
		$document_name  = "a";

		if($this->input->post('document_name')== "ppap_document")
		{
			$document_name  ="ppap_document";
		}
		else if($this->input->post('document_name')== "cad_file")
		{
			$document_name  ="cad_file";

		}
		else if($this->input->post('document_name')== "modal_document")
		{
			$document_name  ="modal_document";

		}
		$data = array(
			$document_name=>$picture1,
		);

			 $document_name;
		 $query = $this->Common_admin_model->update("part_creation",$data,"id",$id);

		if($query)
		{
			
				echo "<script>alert(' Update Success !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			
		}
		else
		{
			echo "<script>alert('Error While  Updating , Please try Again');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
		
	}
    
    public function update_sub_groups()
	{
		if(!empty($_FILES['img']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['img']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('img')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
				
				}
				else{
					$picture1 = '';
					
				}
			}else
			{
				$picture1 = $this->input->post('old_img');
				
			}

        $id = $this->input->post('id');
		$data = array(
			'group_id'=>$this->input->post('group_id'),
			'sub_group_name'=>$this->input->post('sub_group_name'),
			'img'=>$picture1
		);

		 $query = $this->Common_admin_model->update("sub_group",$data,"id",$id);

		if($query)
		{
			
				echo "<script>alert('Sub Groupds  Updated !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			
		}
		else
		{
			echo "<script>alert('Error While  Updating Sub Groups, Please try Again');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
		
	}
    public function update_size()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("size",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('Size  already Present, Please Try With Diff Size');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
		

        $id = $this->input->post('id');
		$data = array(
			'name'=>$this->input->post('name'),
			
		);

		 $query = $this->Common_admin_model->update("size",$data,"id",$id);

		if($query)
		{
			
				echo "<script>alert('Size Updated !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			
		}
		else
		{
			echo "<script>alert('Error While  Updating Size, Please try Again');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	}
	}
    public function update_operations()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("operations",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('Operations Number already Present, Please Try With Diff Name');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
		

        $id = $this->input->post('id');
		$data = array(
			'name'=>$this->input->post('name'),
			
		);

		 $query = $this->Common_admin_model->update("operations",$data,"id",$id);

		if($query)
		{
			
				echo "<script>alert('Operations Updated !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			
		}
		else
		{
			echo "<script>alert('Error While  Updating Operations, Please try Again');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	}
		
	}
    public function update_part_type()
	{
		

        $id = $this->input->post('id');
		$data = array(
			'name'=>$this->input->post('name'),
			
		);

		 $query = $this->Common_admin_model->update("parts_type",$data,"id",$id);

		if($query)
		{
			
				echo "<script>alert('Parts type Updated !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			
		}
		else
		{
			echo "<script>alert('Error While  Updating Parts Type, Please try Again');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
		
	}
    public function update_standards()
	{
		
		$customer_count = $this->Common_admin_model->get_data_by_id_count("standards",$this->input->post('name'),"name");



		if($customer_count>0)
		{
			echo "<script>alert('Standard Name already Present, Please Try With Diff Name');document.location='".$_SERVER['HTTP_REFERER']."'</script>";


		}
		else
		{
		

        if(!empty($_FILES['img']['name']))
			{
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['img']['name'];
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('img')){
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
				
				}
				else{
					$picture1 = '';
					
				}
			}else
			{
				$picture1 = $this->input->post('old_img');
				
			}

        $id = $this->input->post('id');
		$data = array(
			'name'=>$this->input->post('name'),
			'document'=>$picture1
		);

		
		 $query = $this->Common_admin_model->update("standards",$data,"id",$id);

		if($query)
		{
			
				echo "<script>alert('Standards  Updated !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			
		}
		else
		{
			echo "<script>alert('Error While  Updating Standards, Please try Again');document.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	}
		
	}
    
    public function delete()
	{
		// $id = $this->input->post('product_Id');
		$id = $this->input->post('id');
		$table_name = $this->input->post('table_name');

		$delete_user = $this->Common_admin_model->delete_user_by_id($table_name,"id",$id);

			if($delete_user)
			{
				echo "<script>alert(' Deleted !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			}
			else
			{
				echo "<script>alert('Error in  Deletedting !!!!');document.location='".$_SERVER['HTTP_REFERER']."'</script>";

			}

	}
    
    

}
?>