<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function login_admin()
    {        
        $this->load->view('login.php');
    }
    public function index()
    {        
        $this->load->view('login/login.php');
    }

    



    public function admin_login()
    {
        // echo "success";
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        

        if ($this->form_validation->run() ==  FALSE) 
        {
            $data = array(
                'errors' => validation_errors() 
            );
            $this->session->set_flashdata($data);

            redirect('webiste');
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $result =  $this->Login_model->login_user_without_type($email,$password);
        
         if($result==0)
         {
            $data = array(
                'errors' => ' email and password Invalid'

            );
            $this->session->set_flashdata($data);
            
            redirect('webiste');
         }
         else
         {

            if($result)
            {

                $user_data = array(
                    'drawing_id' => $result[0]->id,                 
                    'drawing_email' => $result[0]->user_email,                 
                    'drawing_login' => true,
                    'drawing_full_name' => $result[0]->user_name,
                    'drawing_role' => $result[0]->user_type,
                   
                    
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login','success');
            //   echo "succes2s";
            redirect('dashboard');
                
            }
            else
            {
                $this->session->set_flashdata('logout','error');
                //redirect('AuthenticationController');
            }
        }
        }
    }
    public function super_foundry_login()
    {
       //. echo "success";
        $this->form_validation->set_rules('employee_code', 'employee_code', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        

        if ($this->form_validation->run() ==  FALSE) 
        {
            $data = array(
                'errors' => validation_errors() 
            );
            $this->session->set_flashdata($data);

            redirect('user');
        }
        else
        {
       $email = $this->input->post('employee_code');
        $password = $this->input->post('password');
            

          $result =  $this->Login_model->login_user_without_type($email,$password);
        //print_r($result);
         if($result==0)
         {
            $data = array(
                'errors' => 'email and password Invalid'

            );
            $this->session->set_flashdata($data);
            //echo "error1";
            redirect('user');
         }
         else
         {

            if($result)
            {

               
                    $user_data = array(
                        'costin_id' => $result[0]->id,                 
                        'costing_email' => $result[0]->user_email,                 
                        'costing_login' => true,
                        'costing_full_name' => $result[0]->user_role,
                        'costing_role' => $result[0]->user_fullname
                       
                        
                    );

                   
    
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('login','success');
                    redirect('user_dashboard');
                

               
                
            }
            else
            {
               // $this->session->set_flashdata('logout','error');
                //redirect('AuthenticationController');
            }
        }
        }
    }
    public function admin_logout()
    {
        $user_data = array(
            'drawing_id' => "",                 
            'drawing_email' => "",                 
            'drawing_login' => false,
            'drawing_full_name' => "",
            'drawing_role' => ""
            
            
        );

        $this->session->set_userdata($user_data);
            //echo "success";
        redirect('webiste');
    }



    
}
?>