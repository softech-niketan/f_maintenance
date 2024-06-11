<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('excel_import_model');
		$this->load->library('excel');
		// $this->sales_tracking_id = $this->session->userdata('sales_tracking_id');
		// $this->sales_tracking_email = $this->session->userdata('sales_tracking_email');


		$this->current_date = date('Y-m-d');
		$this->current_time = date("h:i:sa");
		$this->date_time = date('Y-m-d H:i:s');

		$d = date_parse_from_format("Y-m-d", $this->current_date);
		$this->date = $d["day"];
		$this->month = $d["month"];
		$this->year = $d["year"];
	}

	function index()
	{
		$this->load->view('excel_import');
	}



	function import_item_master()
	{
		if (isset($_FILES["file"]["name"])) {



			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {

					$my_array = array();
					$id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$spare_number = trim($worksheet->getCellByColumnAndRow(2, $row)->getValue());
					$spare_description  = trim($worksheet->getCellByColumnAndRow(3, $row)->getValue());
					$safety_stock  = trim($worksheet->getCellByColumnAndRow(8, $row)->getValue());
					$uom_id  = trim($worksheet->getCellByColumnAndRow(9, $row)->getValue());

					$data_check = array(
						"spare_number" => $spare_number,
					);
					// print_r($data_check);
					$item_master_data = $this->Crud_model->get_data_by_id_multile("item_master", $data_check);
					if ($item_master_data) {
						if (count($item_master_data) > 0) {
							array_push($my_array, $spare_number);
						} else {
							if ($spare_number != "" && $spare_description != "") {

								$data = array(
									'spare_number' => $spare_number,
									'spare_description' => $spare_description,
									'saftey_stock' => $safety_stock,
									'uom' => $uom_id,
									'created_date' => $this->current_date,


								);
								//print_r($data);
								$update = $this->Crud_model->insert_data("item_master", $data);
							}
						}
					} else {
						if ($spare_number != "" && $spare_description != "") {

							$data = array(
								'spare_number' => $spare_number,
								'spare_description' => $spare_description,
								'saftey_stock' => $safety_stock,
								'uom' => $uom_id,
								'created_date' => $this->current_date,


							);
							//print_r($data);
							$update = $this->Crud_model->insert_data("item_master", $data);
						}
					}
				}
			}
			if ($update) {
				if (count($my_array) > 0) {
					$i = 1;
					foreach ($my_array as $a) {

						echo $i . " Following Item Code / Spare Number Already Present In System : " . $a;
						echo "<br>";
						echo "<br>";
						$i++;
					}
				} else {
					echo "<script>alert(' Added Successfully !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				echo "<script>alert('Error ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	function import_grn_master()
	{
		if (isset($_FILES["file"]["name"])) {

			$my_array = array();


			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 9; $row <= $highestRow; $row++) {
					$my_array = array();
					$my_array2 = array();
					$grn_date  = trim($worksheet->getCellByColumnAndRow(0, $row)->getFormattedValue());
					$grn_number  = trim($worksheet->getCellByColumnAndRow(1, $row)->getValue());
					$spare_number = trim($worksheet->getCellByColumnAndRow(7, $row)->getValue());
					$spare_description  = trim($worksheet->getCellByColumnAndRow(8, $row)->getValue());

					$grn_qty  = trim($worksheet->getCellByColumnAndRow(13, $row)->getValue());
					$grn_price  = trim($worksheet->getCellByColumnAndRow(14, $row)->getValue());


					$data_check = array(
						"spare_number" => $spare_number,
						"grn_number" => $grn_number,
					);

					if ($grn_qty == 0) {
					} else {


						// print_r($data_check);
						$item_master_data = $this->Crud_model->get_data_by_id_multile("spare_grn", $data_check);
						if ($item_master_data) {
							if (count($item_master_data) > 0) {
								array_push($my_array, $spare_number);
							} else {
								if ($spare_number != "" && $spare_description != "") {
									$item_master_data = $this->Crud_model->get_data_by_id("item_master", $spare_number, "spare_number");
									if ($item_master_data) {
										$data = array(
											'spare_id' => $item_master_data[0]->id,
											'spare_number' => $spare_number,
											'spare_description' => $spare_description,
											'grn_number' => $grn_number,
											'grn_qty' => $grn_qty,
											"on_hand_stock" => $grn_qty,
											'grn_price' => $grn_price,
											'grn_total_price' => $grn_qty * $grn_price,
											'grn_date' => $grn_date,
											'created_date' => $this->current_date,


										);
										//print_r($data);
										$update = $this->Crud_model->insert_data("spare_grn", $data);
										$store_stock = $item_master_data[0]->store_stock + $grn_qty;
										$data_new = array(
											"store_stock" => $store_stock,
										);
										$result_new = $this->Crud_model->update_data("item_master", $data_new, $item_master_data[0]->id);
									} else {
										array_push($my_array2, $spare_number);
									}
								}
							}
						} else {
							if ($spare_number != "" && $spare_description != "") {
								$item_master_data = $this->Crud_model->get_data_by_id("item_master", $spare_number, "spare_number");
								if ($item_master_data) {
									$data = array(
										'spare_id' => $item_master_data[0]->id,
										'spare_number' => $spare_number,
										'spare_description' => $spare_description,
										'grn_number' => $grn_number,
										'grn_qty' => $grn_qty,
										"on_hand_stock" => $grn_qty,
										'grn_price' => $grn_price,
										'grn_total_price' => $grn_qty * $grn_price,
										'grn_date' => $grn_date,
										'created_date' => $this->current_date,


									);
									//print_r($data);
									$update = $this->Crud_model->insert_data("spare_grn", $data);
									$store_stock = $item_master_data[0]->store_stock + $grn_qty;
									$data_new = array(
										"store_stock" => $store_stock,
									);
									$result_new = $this->Crud_model->update_data("item_master", $data_new, $item_master_data[0]->id);
								} else {
									array_push($my_array2, $spare_number);
								}
							}
						}
					}
				}
			}
			if ($update) {
				if (count($my_array) > 0 || count($my_array2) > 0) {
					if (count($my_array) > 0) {
						$i = 1;
						foreach ($my_array as $a) {

							echo $i . " Following Item Code / Spare Number and GRN Number Already Present In System : " . $a;
							echo "<br>";
							echo "<br>";
							$i++;
						}
					}
					echo "<br>";
					echo "<br>";
					if (count($my_array2) > 0) {
						$i = 1;
						foreach ($my_array as $a) {

							echo $i . " Following Item Code / Spare Number Are Not Found In Item Master , Please try again : " . $a;
							echo "<br>";
							echo "<br>";
							$i++;
						}
					}
				} else {
					echo "<script>alert(' Added Successfully !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				echo "<script>alert('Error ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}

	public function export_pending_parts()
	{
		$pm_id = $this->uri->segment('2');
		$type = $this->uri->segment('3');

		$data_assign_pm_group = array(
			"pm_id" =>  $pm_id,
			"type" => $type
		);

		$spare_parts = $this->Crud_model->get_data_by_id_multile("spare_parts", $data_assign_pm_group);
		// print_r($spare_parts);
		$item_master = $this->Crud_model->read_data("item_master");
		$i = 1;



		$this->load->library("excel");
		$object = new PHPExcel();
		$product_id =  $this->uri->segment('2');


		$object->setActiveSheetIndex(0);

		$table_columns = array("date", "grn_number", "", "", "", "", "", "spare number", "spare description", "created_date", "", "", "", "grn qty", "grn price");

		$column = 0;

		foreach ($table_columns as $field) {
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$excel_row = 9;
		foreach ($spare_parts as $s) {
			// echo $s->tool_id;
			$item_master = $this->Crud_model->get_data_by_id("item_master", $s->tool_id, "id");
			$spare_grn = $this->Crud_model->query_sinegle("SELECT * FROM spare_grn WHERE on_hand_stock >0 and spare_id = $s->tool_id  ORDER BY id ASC ");
			// print_r($spare_grn);
			if ($spare_grn) {
				$grn_qty = $spare_grn[0]->on_hand_stock;
			} else {
				$grn_qty = 0;
			}





			$grn_qty = $s->grn_1_take + $s->grn_2_take;
			$grn_price = $s->grn_1_actual_price + $s->grn_2_actual_price;

			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $this->current_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $s->pm_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $item_master[0]->spare_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $item_master[0]->spare_description);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $grn_qty);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $grn_price);
			$excel_row++;
		}


		// $grn_date  = trim($worksheet->getCellByColumnAndRow(0, $row)->getFormattedValue());
		// $grn_number  = trim($worksheet->getCellByColumnAndRow(1, $row)->getValue());
		// $spare_number = trim($worksheet->getCellByColumnAndRow(7, $row)->getValue());
		// $spare_description  = trim($worksheet->getCellByColumnAndRow(8, $row)->getValue());

		// $grn_qty  = trim($worksheet->getCellByColumnAndRow(13, $row)->getValue());
		// $grn_price  = trim($worksheet->getCellByColumnAndRow(14, $row)->getValue());

		// print_r($object);
		//   $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		//   header('Content-Type: application/vnd.ms-excel');
		//   header('Content-Disposition: attachment;filename="product_name.xls"');
		//   $object_writer->save('php://output');
		// $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		// header('Content-Type: application/vnd.ms-excel');
		// header('Content-Disposition: attachment;filename="quoatation22.xlsx"');
		// ob_end_clean();
		// $object_writer->save('php://output');


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="spare_parts.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		ob_end_clean();
		ob_start();
		// $objWriter->setPreCalculateFormulas(); 
		$objWriter->save('php://output');
	}
	function export_child_products()
	{
		$this->load->library("excel");
		$object = new PHPExcel();
		$product_id =  $this->uri->segment('2');


		$object->setActiveSheetIndex(0);

		$table_columns = array("diameter", "base_curve", "power", "cylinder", "axis", "colour", "sku", "stock_count", "delivery_days", "created_date");

		$column = 0;

		foreach ($table_columns as $field) {
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$product_code = $this->Common_admin_model->get_data_by_id("new_product_options", $product_id, "product_id");


		$excel_row = 2;

		foreach ($product_code as $row) {
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->diameter);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->base_curve);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->power);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->cylinder);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->axis);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->colour);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->sku);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->stock_count);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->delivery_days);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->created_date);
			$excel_row++;
		}

		// print_r($object);
		//   $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		//   header('Content-Type: application/vnd.ms-excel');
		//   header('Content-Disposition: attachment;filename="product_name.xls"');
		//   $object_writer->save('php://output');
		// $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		// header('Content-Type: application/vnd.ms-excel');
		// header('Content-Disposition: attachment;filename="quoatation22.xlsx"');
		// ob_end_clean();
		// $object_writer->save('php://output');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Child Products.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		$objWriter->save('php://output');
	}
}
