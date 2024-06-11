<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportcontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	function index()
	{
		$this->load->view('excel_import');
	}
	
 function export_customer_wise_rate()
 {
			$this->load->library("excel");
			$object = new PHPExcel();

			$object->setActiveSheetIndex(0);

			$table_columns = array("Cutomer Name", "Grade", "RM Rate", "Scrap Rate", "Revision Number","Revision Remark","Revision Date","Effectivity Date","Created Date","Type");

			$column = 0;

			foreach($table_columns as $field)
			{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
			}

			$product_code = $this->Common_admin_model->get_all_data("raw_matrial_cutomer_rate");

			$excel_row = 2;

			foreach($product_code as $row)
			{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->customer_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->customer_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->grade);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->rm_rate);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->scrap_rate);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->revision_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->revision_remark );
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->revision_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->effectivity_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->created_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->type);
			$excel_row++;
			}

		
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="All Customer Wise Rate.xls"'); 
			header('Cache-Control: max-age=0'); 
			$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5'); 
			$objWriter->save('php://output');
				
 }
 function export_data_group_sub_group()
 {
	 $group_id = $this->input->post('group_id');
	 $sub_group_id = $this->input->post('sub_group_id');
	 $data28 = array(
		"group_id"=>$group_id,
		"sub_group_id"=>$sub_group_id,
		

	);
	$part_creation = $this->Common_admin_model->get_data_by_id_multiple_condition("part_creation",$data28);

			$this->load->library("excel");
			$object = new PHPExcel();

			$object->setActiveSheetIndex(0);

			$table_columns = array("Part Number ", "Part Description ", "Internal Part Number", "Group", "Sub Group","Type","Revision Number","Revision Date","Revision Remark");

			$column = 0;

			foreach($table_columns as $field)
			{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
			}

			// $product_code = $this->Common_admin_model->get_all_data("raw_matrial_cutomer_rate");

			$excel_row = 2;

			foreach($part_creation as $row)
			{

				$groups = $this->Common_admin_model->get_data_by_id("groups",$row->group_id,"id");
				$sub_group = $this->Common_admin_model->get_data_by_id("sub_group",$row->sub_group_id,"id");
				// $operations = $this->Common_admin_model->get_data_by_id("operations",$u[0]->group_id,"id");
				$parts_type = $this->Common_admin_model->get_data_by_id("parts_type",$row->type_id,"id");
			 
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->part_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->part_description);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->internal_part_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $groups[0]->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $sub_group[0]->sub_group_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $parts_type[0]->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->revision_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->revision_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->revision_remark);
			$excel_row++;
			}

				// print_r(($object));
		
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="Parts By Group and Sub-group.xls"'); 
			header('Cache-Control: max-age=0'); 
			$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5'); 
			$objWriter->save('php://output');
				
 }
 function export_all_parts()
 {
	
	$part_creation = $this->Common_admin_model->get_all_data("part_creation");

			$this->load->library("excel");
			$object = new PHPExcel();

			$object->setActiveSheetIndex(0);

			$table_columns = array("Part Number ", "Part Description ", "Internal Part Number", "Group", "Sub Group","Type","Revision Number","Revision Date","Revision Remark");

			$column = 0;

			foreach($table_columns as $field)
			{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
			}

			// $product_code = $this->Common_admin_model->get_all_data("raw_matrial_cutomer_rate");

			$excel_row = 2;

			foreach($part_creation as $row)
			{

				$groups = $this->Common_admin_model->get_data_by_id("groups",$row->group_id,"id");
				$sub_group = $this->Common_admin_model->get_data_by_id("sub_group",$row->sub_group_id,"id");
				// $operations = $this->Common_admin_model->get_data_by_id("operations",$u[0]->group_id,"id");
				$parts_type = $this->Common_admin_model->get_data_by_id("parts_type",$row->type_id,"id");
			 
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->part_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->part_description);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->internal_part_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $groups[0]->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $sub_group[0]->sub_group_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $parts_type[0]->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->revision_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->revision_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->revision_remark);
			$excel_row++;
			}

				// print_r(($object));
		
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="All Parts.xls"'); 
			header('Cache-Control: max-age=0'); 
			$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5'); 
			$objWriter->save('php://output');
				
 }
 function export_assebly_parts()
 {
	 $assebmly_part_id = $this->uri->segment('2');
	//  $sub_group_id = $this->input->post('sub_group_id');
	 $data28 = array(
		"assembly_part_id "=>$assebmly_part_id,
		

	);
	$assebly_parts = $this->Common_admin_model->get_data_by_id_multiple_condition("assembly_parts",$data28);

			$this->load->library("excel");
			$object = new PHPExcel();

			$object->setActiveSheetIndex(0);

			$table_columns = array("Part Number ", "Part Description ", "Revision Number", "Revision Date", "Revision Remark","Quantity");

			$column = 0;

			foreach($table_columns as $field)
			{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
			}

			// $product_code = $this->Common_admin_model->get_all_data("raw_matrial_cutomer_rate");

			$excel_row = 2;

			foreach($assebly_parts as $u)
			{      
				
				$row = $this->Common_admin_model->get_data_by_id("part_creation",$u->assembly_part_id ,"id");


				// $groups = $this->Common_admin_model->get_data_by_id("groups",$row->group_id,"id");
				// $sub_group = $this->Common_admin_model->get_data_by_id("sub_group",$row->sub_group_id,"id");
				// // $operations = $this->Common_admin_model->get_data_by_id("operations",$u[0]->group_id,"id");
				// $parts_type = $this->Common_admin_model->get_data_by_id("parts_type",$row->type_id,"id");
			 
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row[0]->part_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row[0]->part_description);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row[0]->revision_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row[0]->revision_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row[0]->revision_remark);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $u->quantity);
		
			$excel_row++;
			}

				// print_r(($object));
		
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="Assebly Parts.xls"'); 
			header('Cache-Control: max-age=0'); 
			$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5'); 
			$objWriter->save('php://output');
				
 }

 function export_quoatation()
 {

	
			$type_quotation = $this->uri->segment('3');
			$proto = $this->uri->segment('4');
			$rfq_id = $this->uri->segment('2');
			$data28 = array(
				"rfq_id"=>$rfq_id,
				"type_quotation"=>$type_quotation,
				

			);
			$part_costing = $this->Common_admin_model->get_data_by_id_multiple_condition("part_costing",$data28);
			// print_r($part_costing);
			$this->load->library("excel");
			$object = new PHPExcel();

			

			$object->setActiveSheetIndex(0);

			$common_section = array("Cutomer Part NO","HT Part NO","Part Description","Cutomer Name", "Annual Volume", "Proto Sample Qty", "MOQ","Setting Charges","Fitting Name");
			$raw_material = array("Customer Material", "Hytech Material", "Density", "RM Process", "RM Shape","RM Size","Finish Length","Cut Lenth","Total Lenth With Cut","Forging List Dropdown","GM RM Weight","Finish Weight","Scrap Weight","Customer Weight","Scrap Rate","Gross RM Cost","Scrap Cost","NET RM Cost");
			$bough_out = array("O Ring 1", "O Ring 1 Cost","O Ring 2", "O Ring 2 Cost","O Ring 3", "O Ring 3 Cost", "O Ring 4", "O Ring 4 Cost","Cap 1", "Cap 1 Cost","Cap 2", "Cap  Cost","Cap 3", "Cap 3 Cost", "Cap 4", "Cap 4 Cost","Clinch 1","Clinch 1 Cost","Clinch 2","Clinch 2 Cost","SS Wire Side 1","SS Wire Side 1 Cost","SS Wire Side 2","SS Wire Side 2 Cost","Total Bo Cost");
			$process = array("Blanking Machine", "Cycle Time In Sec","Qty Shift", "Thread Size Side 1","C Less Grinding Time 1", "Thread Size Side 2", "C Less Grinding Time 2","Thread Size Side 3", "C Less Grinding Time 3", "Thread Size Side 4", "C Less Grinding Time 4", "Total C Less Grinding Time","Roll Time 1","Roll Time 2","Roll Time 3","Roll Time 4", "Total Roll Time","Cnc Side 1", "Cnc Side 2","Cnc Side 3", "Cnc Side 4", "Total CNC Side","VMC Side 1", "VMC Side 2","VMC Side 3", "VMC Side 4", "Total VMC Side", "Milling Cost","Sewmac Cost","Drilling Cost","Tapping Cost","Hexpunching Cost","Blankingcost Cost","C Less Grinding Cost","Total Roll Time","CNN Cost ","VMC Cost","Milling cost","Sewmac Cost","Drilling Cost","Tapping  Cost","Hex Punching  Cost","O Ringing Assly Cost","Cap Assembly Cost","Clinch Washer Assly Cost","Wire Assly Cost","Retainer Ring Assly Cost","Crimping Assly Cost","Heat Treatment Cost","Sub Contractor Cost","Other Cost 1","Other Cost 2","Chamfring Deburing Cost","Crack Testing","HT Logo Punching","Process Cost Sub Total");
			$norms = array("Plating Type","Plating Rate Kg","Plating Cost","Total Process","Over Head %","Over Head Cost","Total Cost Without Profit","Profit Percentage","Profit Cost","Ex Works Cost With Profit","RM_BO","Packing Cost P","Packing Cost","Transportation Percentage","Transportation Cost","ICC %","ICC Cost","Norms Cost");
			$cost_contribution = array("Child  Part 1","Child 1 Cost","Child  Part 2","Child 2 Cost","Total Child Cost","Final Price  Assembly To Quote","Tool Cost","RM %","O-ring %","Business Value","RM Value","O-ring Value","Child  Part 1 RM","Child  Part 2 RM");
			$table_columns = array_merge($common_section, $raw_material,$bough_out,$process,$norms,$cost_contribution);	
			
			
			$column = 0;

			foreach($table_columns as $field)
			{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
			}

			// $product_code = $this->Common_admin_model->get_all_data("raw_matrial_cutomer_rate");
			$o_ring_1_name="NA";
			$excel_row = 2;
			$column_new=1;
			if($part_costing)
			{
				foreach($part_costing as $row)
			{



				$rfq_id = $part_costing[0]->rfq_id;

				$customer_detail = $this->Common_admin_model->get_data_by_id("customers",$row->customer_id,"id");
				$customer_grade = $this->Common_admin_model->get_data_by_id("raw_material",$row->material_customer,"id");
				$hytech_grade = $this->Common_admin_model->get_data_by_id("raw_material",$row->material_hytech,"id");
				$o_ring_1 = $this->Common_admin_model->get_data_by_id("boughtout_parts",$row->o_ring_1,"id");
				if($o_ring_1)
				{
					$o_ring_1_name = $o_ring_1[0]->part_number;
				}

				if($proto=="yes")
				{
				 if($row->final_cost == 0)
				 {
					 $final_cost = $row->final_cost;
				 }
				 else
				 {
					 $final_cost = $row->proto_cost;
				 }
				}
				else
				{
					$final_cost = $row->final_cost;                            
				}
		
				$child_part_1 = "NA";
				$child_part_1_cost = 0;
				$child_part_2 = "NA";
				$child_part_2_cost = 0;
				$child_part_1_rm_cost = 0;
				$child_part_2_rm_cost = 0;
				$total_child_cost=0;
				//body start
				$rfq_parts = $this->Common_admin_model->get_data_by_id("rfq_parts",$row->rfq_part_id,"id");
				$data28 = array(
					"assembly_type"=>"body",
					"id"=>$row->rfq_part_id,
					

				);
				$count_of_body = $this->Common_admin_model->get_data_by_id_multiple_condition_count("rfq_parts",$data28);
		
				$type_of_quoat =$rfq_parts[0]->type;
				if($count_of_body>0)
				{
				   
					// child 1
					$data29 = array(
						"assembly_type"=>"child_1",
						"assembly_id"=>$rfq_parts[0]->assembly_id,

					);
					$count_of_child_1 = $this->Common_admin_model->get_data_by_id_multiple_condition_count("rfq_parts",$data29);

					if( $count_of_child_1>0)
					{
						$data29 = array(
							"assembly_type"=>"child_1",
							"assembly_id"=>$rfq_parts[0]->assembly_id,
							
	
						);
						$data_of_child_1 = $this->Common_admin_model->get_data_by_id_multiple_condition("rfq_parts",$data29);
						$data_part_costing_data = array(
							"type_quotation"=>"External",
							"rfq_part_id"=>$data_of_child_1[0]->id,
							
	
						);
						$data_part_costing = $this->Common_admin_model->get_data_by_id_multiple_condition("part_costing",$data_part_costing_data);

						if($data_part_costing)
						{
							$child_part_1 = $data_of_child_1[0]->customer_part_number;
							
							
							 $child_part_1_cost = $data_part_costing[0]->final_cost;
							 $child_part_1_rm_cost = $data_part_costing[0]->net_rm_cost;
						}
						else
						{
							$child_part_1 = $data_of_child_1[0]->customer_part_number;
							$child_part_1_cost = 0;
						}
							
							
					}   
					else
					{
						$child_part_1 = "NA";
						$child_part_1_cost = 0;
						$child_part_1_rm_cost = 0;
					  
					   
					}
					//child 1 end
				   
					// child 2 start
					$data29 = array(
						"assembly_type"=>"child_2",
						"assembly_id"=>$rfq_parts[0]->assembly_id,

					);
					$count_of_child_2 = $this->Common_admin_model->get_data_by_id_multiple_condition_count("rfq_parts",$data29);

					if( $count_of_child_2>0)
					{
						$data39 = array(
							"assembly_type"=>"child_2",
							"assembly_id"=>$rfq_parts[0]->assembly_id,
							
	
						);
						$data_of_child_2 = $this->Common_admin_model->get_data_by_id_multiple_condition("rfq_parts",$data39);
						$data_part_costing_data_2 = array(
							"type_quotation"=>"External",
							"rfq_part_id"=>$data_of_child_2[0]->id,
							
	
						);
						$data_part_costing_2 = $this->Common_admin_model->get_data_by_id_multiple_condition("part_costing",$data_part_costing_data_2);

						if($data_part_costing_2)
						{
							  $child_part_2 = $data_of_child_2[0]->customer_part_number;
							
							
							 $child_part_2_cost = $data_part_costing_2[0]->final_cost;
							  $child_part_2_rm_cost = $data_part_costing_2[0]->net_rm_cost;
						}
						else
						{
							$child_part_2 = $data_of_child_2[0]->customer_part_number;
							$child_part_2_cost = 0;
						}
							
							
					}   
					else
					{
						$child_part_2 = "NA";
						$child_part_2_cost = 0;
						$child_part_2_rm_cost = 0;
					}
					//child 2 end
			
					

				}
				
			$total_child_cost = $child_part_1_cost+$child_part_2_cost;			   
			$final_price_assembly_to_quote = $final_cost+$child_part_1_cost+$child_part_2_cost;
			$rm_value = number_format($row->net_rm_cost*$row->annual_volume,2);
			$o_ring_value = number_format($row->o_ringing_assly_cost*$row->annual_volume,2);
			$business_volume = $row->annual_volume*$final_price_assembly_to_quote;
			$rm_percentage = number_format(($row->net_rm_cost/$final_price_assembly_to_quote)*100,2);
			$o_ring_percentage = number_format(($row->o_ringing_assly_cost/$final_price_assembly_to_quote)*100,2);

			if($rfq_parts[0]->assembly_type == "no" || $rfq_parts[0]->assembly_type=="body")
			{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $rfq_parts[0]->customer_part_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $rfq_parts[0]->hytech_part_number );	
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $rfq_parts[0]->customer_part_description);
	
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $customer_detail[0]->customer_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->annual_volume);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->proto_sample_qty);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->moq);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->setting_charges);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->fitting_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $customer_grade[0]->grade );
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $hytech_grade[0]->grade);

			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->density);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->rm_process);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->rm_shape);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->rm_size);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->finish_length);
			$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->cut_lenth);
			$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->total_lenth_with_cut);
			$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->forging_list_dropdown);
			$object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->gm_rm_wt);
			$object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->finish_wt);

			$object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->srap_weight);
			$object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->wt_customer);
			$object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->scrap_rate);
			$object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row->gross_rm_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row->scrap_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $row->net_rm_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $o_ring_1_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $row->o_ring_1_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $row->o_ring_2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $row->o_ring_2_cost);

			$object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $row->o_ring_3);
			$object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $row->o_ring_3_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $row->o_ring_4);
			$object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $row->o_ring_4_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $row->cap_1);
			$object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $row->cap_1_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $row->cap_2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $row->cap_2_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $row->cap_3);
			$object->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row, $row->cap_3_cost);
		
			$object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $row->cap_4);
			$object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $row->cap_4_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $row->clinch_1);
			$object->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, $row->clinch_1_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $row->clinch_2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $row->clinch_2_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $row->ss_wire_side_1);
			$object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $row->ss_wire_side_1_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $row->ss_wire_side_2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, $row->ss_wire_side_2_cost);
			
			$object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, $row->total_bo_cost );		
			$object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $row->mc_cycle_time );
			$object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, $row->cycle_time_in_sec );
			$object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $row->qty_shift );	
			$object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $row->thread_size_side_1 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $row->c_less_grinding_time_1 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $row->thread_size_side_2 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $row->c_less_grinding_time_2 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $row->thread_size_side_2 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(60, $excel_row, $row->c_less_grinding_time_3 );

			$object->getActiveSheet()->setCellValueByColumnAndRow(61, $excel_row, $row->thread_size_side_4 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(62, $excel_row, $row->c_less_grinding_time_4 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(63, $excel_row, $row->total_c_less_grinding_time );
			$object->getActiveSheet()->setCellValueByColumnAndRow(64, $excel_row, $row->roll_time_1 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(65, $excel_row, $row->roll_time_2 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(66, $excel_row, $row->roll_time_3 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(67, $excel_row, $row->roll_time_4 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(68, $excel_row, $row->total_roll_time );			
			$object->getActiveSheet()->setCellValueByColumnAndRow(69, $excel_row, $row->cnc_side_1  );
			$object->getActiveSheet()->setCellValueByColumnAndRow(70, $excel_row, $row->cnc_side_2 );

			$object->getActiveSheet()->setCellValueByColumnAndRow(71, $excel_row, $row->cnc_side_3 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(72, $excel_row, $row->cnc_side_4 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(73, $excel_row, $row->total_cnc_side );
			$object->getActiveSheet()->setCellValueByColumnAndRow(74, $excel_row, $row->vmc_side_1   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(75, $excel_row, $row->vmc_side_2 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(76, $excel_row, $row->vmc_side_3 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(77, $excel_row, $row->vmc_side_4 );
			$object->getActiveSheet()->setCellValueByColumnAndRow(78, $excel_row, $row->total_vmc_side );
			$object->getActiveSheet()->setCellValueByColumnAndRow(79, $excel_row, $row->milling );
			$object->getActiveSheet()->setCellValueByColumnAndRow(80, $excel_row, $row->sewmac );
			
			$object->getActiveSheet()->setCellValueByColumnAndRow(81, $excel_row, $row->drilling );
			$object->getActiveSheet()->setCellValueByColumnAndRow(82, $excel_row, $row->tapping );
			$object->getActiveSheet()->setCellValueByColumnAndRow(83, $excel_row, $row->hexpunching  );
			$object->getActiveSheet()->setCellValueByColumnAndRow(84, $excel_row, $row->blankingcost );
			$object->getActiveSheet()->setCellValueByColumnAndRow(85, $excel_row, $row->c_less_grinding_cost );
			$object->getActiveSheet()->setCellValueByColumnAndRow(86, $excel_row, $row->threadrollingcost );
			$object->getActiveSheet()->setCellValueByColumnAndRow(87, $excel_row, $row->cnn_cost );
			$object->getActiveSheet()->setCellValueByColumnAndRow(88, $excel_row, $row->vmc_cost );
			$object->getActiveSheet()->setCellValueByColumnAndRow(89, $excel_row, $row->milling_cost );
			$object->getActiveSheet()->setCellValueByColumnAndRow(90, $excel_row, $row->sewmac_cost );
			
			$object->getActiveSheet()->setCellValueByColumnAndRow(91, $excel_row, $row->drilling_cost  );
			$object->getActiveSheet()->setCellValueByColumnAndRow(92, $excel_row, $row->tapping_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(93, $excel_row, $row->hex_punching_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(94, $excel_row, $row->o_ringing_assly_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(95, $excel_row, $row->cap_assly_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(96, $excel_row, $row->clinch_washer_assly_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(97, $excel_row, $row->wire_assly_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(98, $excel_row, $row->retainer_ring_assly_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(99, $excel_row, $row->crimping_assly_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(100, $excel_row, $row->heat_treatment_cost   );
		
			$object->getActiveSheet()->setCellValueByColumnAndRow(101, $excel_row, $row->sub_contractor_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(102, $excel_row, $row->other_cost_1   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(103, $excel_row, $row->other_cost_2   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(104, $excel_row, $row->chamfring_deburing_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(105, $excel_row, $row->crack_testing   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(106, $excel_row, $row->ht_logo_punching   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(107, $excel_row, $row->process_cost_sub_total   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(108, $excel_row, $row->plating_type   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(109, $excel_row, $row->plating_rate_kg   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(110, $excel_row, $row->plating_cost   );
			
			$object->getActiveSheet()->setCellValueByColumnAndRow(111, $excel_row, $row->total_process   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(112, $excel_row, $row->over_head_p   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(113, $excel_row, $row->over_head_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(114, $excel_row, $row->total_cost_without_profit   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(115, $excel_row, $row->profit_p   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(116, $excel_row, $row->profit_cost   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(117, $excel_row, $row->ex_works_cost_with_profit   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(118, $excel_row, $row->rm_bo   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(119, $excel_row, $row->packing_cost_p   );
			$object->getActiveSheet()->setCellValueByColumnAndRow(120, $excel_row, $row->packing_cost   );
			
			$object->getActiveSheet()->setCellValueByColumnAndRow(121, $excel_row, $row->transportation_p    );
			$object->getActiveSheet()->setCellValueByColumnAndRow(122, $excel_row, $row->transportation_cost    );
			$object->getActiveSheet()->setCellValueByColumnAndRow(123, $excel_row, $row->icc_p);
			$object->getActiveSheet()->setCellValueByColumnAndRow(124, $excel_row, $row->icc_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(125, $excel_row, $row->norms_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(126, $excel_row, $child_part_1);
			$object->getActiveSheet()->setCellValueByColumnAndRow(127, $excel_row, $child_part_1_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(128, $excel_row, $child_part_2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(129, $excel_row, $child_part_2_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(130, $excel_row, $total_child_cost);
			
			$object->getActiveSheet()->setCellValueByColumnAndRow(131, $excel_row, $final_price_assembly_to_quote);
			$object->getActiveSheet()->setCellValueByColumnAndRow(132, $excel_row, $row->tool_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(133, $excel_row, $rm_percentage);
			$object->getActiveSheet()->setCellValueByColumnAndRow(134, $excel_row, $o_ring_percentage);
			$object->getActiveSheet()->setCellValueByColumnAndRow(135, $excel_row, $business_volume);
			$object->getActiveSheet()->setCellValueByColumnAndRow(136, $excel_row, $rm_value);
			$object->getActiveSheet()->setCellValueByColumnAndRow(137, $excel_row, $o_ring_value);
			$object->getActiveSheet()->setCellValueByColumnAndRow(138, $excel_row, $child_part_1_rm_cost);
			$object->getActiveSheet()->setCellValueByColumnAndRow(139, $excel_row, $child_part_2_rm_cost);
			// $object->getActiveSheet()->setCellValueByColumnAndRow(139, $excel_row, $child_part_2_rm_cost);
			// $object->getActiveSheet()->setCellValueByColumnAndRow(140, $excel_row, $child_part_2_rm_cost);
			}









			
			
			$excel_row++;
			$column_new=1;
			}

			for ($i = 'A'; $i !=  $object->getActiveSheet()->getHighestColumn(); $i++) {
				$object->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
			}

		
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="'.$rfq_parts[0]->customer_part_number.' '.$type_quotation.'.xls"'); 
			header('Cache-Control: max-age=0'); 
			$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5'); 
			$objWriter->save('php://output');
				
 }
 else
{
	echo "Part Costing Not Found !!!!";
}
}


 
 


}	


?>