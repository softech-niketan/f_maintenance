<style>
    tr,
    td,
    th {
        border: 1.5px solid black;
    }

    /* table thead tr th{
    border-bottom: 5px solid #000000;
} */

    .anuj {
        border-bottom: 4px solid #000000;
        border-top: 2px solid #000000;

    }

    /* td
{
    border: 2px solid black;
} */
</style>
<div class="wrapper">

    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Maintenance Page</h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Maintenance Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <div class="row">
                                    <div class="col-lg-2">
                                        <b>Doc. No. :QF/MT/8.5/01</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Date : 18-03-2018</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Rev.No./Date : 00/18-03-2018</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Page No. : 1 of 1</b>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <table id="example1" class=" table table table-striped">

                                        <thead>
                                            <tr class="anuj text-center">
                                                <th colspan="5">Machine Details</th>
                                                <th colspan="7">PM Type</th>


                                            </tr>
                                            <tr class="anuj">
                                                <th>Sr.no</th>
                                                <th>Machine Number</th>
                                                <th>Machine Code</th>
                                                <th>Machine Description</th>
                                                <th>Machine Make</th>
                                                <th>Purchase Date </th>
                                                <th>1 Monthly</th>
                                                <th>3 Monthly</th>
                                                <th>4 Monthly</th>
                                                <th>6 Monthly</th>
                                                <th>8 Monthly</th>
                                                <th>9 Monthly</th>
                                                <th>12 Monthly</th>


                                            </tr>

                                        </thead>

                                        <tbody>
                                            <?php
                                            if ($machines) {
                                                $danger_count_1 = 0;
                                                $danger_count_3 = 0;
                                                $danger_count_4 = 0;
                                                $danger_count_6 = 0;
                                                $danger_count_8 = 0;
                                                $danger_count_9 = 0;
                                                $danger_count_12 = 0;

                                                $orange_count_1 = 0;
                                                $orange_count_3 = 0;
                                                $orange_count_4 = 0;
                                                $orange_count_6 = 0;
                                                $orange_count_8 = 0;
                                                $orange_count_9 = 0;
                                                $orange_count_12 = 0;


                                                $success_count_1 = 0;
                                                $success_count_3 = 0;
                                                $success_count_4 = 0;
                                                $success_count_6 = 0;
                                                $success_count_8 = 0;
                                                $success_count_9 = 0;
                                                $success_count_12 = 0;


                                                $yellow_count_1 = 0;
                                                $yellow_count_3 = 0;
                                                $yellow_count_4 = 0;
                                                $yellow_count_6 = 0;
                                                $yellow_count_8 = 0;
                                                $yellow_count_9 = 0;
                                                $yellow_count_12 = 0;




                                                $i = 1;
                                                foreach ($machines as $m) {
                                                    $assign_pm_group = $this->Crud_model->get_data_by_id("assign_pm_group", $m->id, "machine_id");

                                                    if ($assign_pm_group) {
                                                        $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $assign_pm_group[0]->group_id, "id");
                                                        // print_r($check_list_groups);
                                                        $d = date_parse_from_format("Y-m-d", $this->current_date);
                                                        $this->date = $d["day"];
                                                        $current_month = $d["month"];
                                                        $year_id = $d["year"];

                                                        $data_check_break = array(
                                                            "machine_id" => $m->id,
                                                            "created_year" => $year_id,
                                                        );
                                                        $breakdown_request = $this->Crud_model->get_data_by_id_multile_count("breakdown_request", $data_check_break);
                                                        $breakdown_request_created_month_data = array(
                                                            "machine_id" => $m->id,
                                                            "crated_month" => $current_month,
                                                        );
                                                        $breakdown_request_created_month_data_new = $this->Crud_model->get_data_by_id_multile_count("breakdown_request", $breakdown_request_created_month_data);

                                                        $data_check_predective_created_year = array(
                                                            "machine_id" => $m->id,
                                                            "created_year" => $year_id,
                                                        );

                                                        $predictive_request_created_year_new = $this->Crud_model->get_data_by_id_multile_count("predictive_request", $data_check_predective_created_year);

                                                        //momth
                                                        $month_predective = array(
                                                            "machine_id" => $m->id,
                                                            "crated_month" => $current_month,
                                                        );
                                                        $month_predective_new = $this->Crud_model->get_data_by_id_multile_count("predictive_request", $month_predective);

                                            ?>

                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $m->asset_number; ?></td>
                                                        <td><?php echo $m->code; ?></td>
                                                        <td><?php echo $m->asset_description; ?></td>
                                                        <td><?php echo $m->make; ?></td>
                                                        <td><?php echo $m->purchased_date; ?></td>
                                                        <td>
                                                            <?php
                                                            foreach ($assign_pm_group as $a) {
                                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                                //   print_r($check_list_groups);

                                                                if ($check_list_groups[0]->pm_type == "1 Monthly") {
                                                                    $date1 = new DateTime($a->last_due_date);
                                                                    $date2 = new DateTime(date('Y-m-d'));

                                                                    $date = date_create($a->last_due_date);
                                                                    $current_date = date_create(date('Y-m-d'));


                                                                    $diff = date_diff($current_date, $date);
                                                                    $final_date = $diff->format("%r%a");


                                                            ?>


                                                                    <a href="<?php echo base_url('pm_type/1 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-success">
                                                                        <?php echo "yes"; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach ($assign_pm_group as $a) {
                                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                                //   print_r($check_list_groups);

                                                                if ($check_list_groups[0]->pm_type == "3 Monthly") {
                                                                    $date1 = new DateTime($a->last_due_date);
                                                                    $date2 = new DateTime(date('Y-m-d'));

                                                                    $date = date_create($a->last_due_date);
                                                                    $current_date = date_create(date('Y-m-d'));


                                                                    $diff = date_diff($current_date, $date);
                                                                    $final_date = $diff->format("%r%a");


                                                            ?>


                                                                    <a href="<?php echo base_url('pm_type/3 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-success">
                                                                        <?php echo "yes"; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach ($assign_pm_group as $a) {
                                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                                //   print_r($check_list_groups);

                                                                if ($check_list_groups[0]->pm_type == "4 Monthly") {
                                                                    $date1 = new DateTime($a->last_due_date);
                                                                    $date2 = new DateTime(date('Y-m-d'));

                                                                    $date = date_create($a->last_due_date);
                                                                    $current_date = date_create(date('Y-m-d'));


                                                                    $diff = date_diff($current_date, $date);
                                                                    $final_date = $diff->format("%r%a");


                                                            ?>


                                                                    <a href="<?php echo base_url('pm_type/4 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-success">
                                                                        <?php echo "yes"; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach ($assign_pm_group as $a) {
                                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                                //   print_r($check_list_groups);

                                                                if ($check_list_groups[0]->pm_type == "6 Monthly") {
                                                                    $date1 = new DateTime($a->last_due_date);
                                                                    $date2 = new DateTime(date('Y-m-d'));

                                                                    $date = date_create($a->last_due_date);
                                                                    $current_date = date_create(date('Y-m-d'));


                                                                    $diff = date_diff($current_date, $date);
                                                                    $final_date = $diff->format("%r%a");


                                                            ?>


                                                                    <a href="<?php echo base_url('pm_type/6 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-success">
                                                                        <?php echo "yes"; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            foreach ($assign_pm_group as $a) {
                                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                                //   print_r($check_list_groups);

                                                                if ($check_list_groups[0]->pm_type == "8 Monthly") {
                                                                    $date1 = new DateTime($a->last_due_date);
                                                                    $date2 = new DateTime(date('Y-m-d'));

                                                                    $date = date_create($a->last_due_date);
                                                                    $current_date = date_create(date('Y-m-d'));


                                                                    $diff = date_diff($current_date, $date);
                                                                    $final_date = $diff->format("%r%a");


                                                            ?>


                                                                    <a href="<?php echo base_url('pm_type/8 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-success">
                                                                        <?php echo "yes"; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach ($assign_pm_group as $a) {
                                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                                //   print_r($check_list_groups);

                                                                if ($check_list_groups[0]->pm_type == "9 Monthly") {
                                                                    $date1 = new DateTime($a->last_due_date);
                                                                    $date2 = new DateTime(date('Y-m-d'));

                                                                    $date = date_create($a->last_due_date);
                                                                    $current_date = date_create(date('Y-m-d'));


                                                                    $diff = date_diff($current_date, $date);
                                                                    $final_date = $diff->format("%r%a");


                                                            ?>


                                                                    <a href="<?php echo base_url('pm_type/9 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-success">
                                                                        <?php echo "yes"; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach ($assign_pm_group as $a) {
                                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                                //   print_r($check_list_groups);

                                                                if ($check_list_groups[0]->pm_type == "12 Monthly") {
                                                                    $date1 = new DateTime($a->last_due_date);
                                                                    $date2 = new DateTime(date('Y-m-d'));

                                                                    $date = date_create($a->last_due_date);
                                                                    $current_date = date_create(date('Y-m-d'));


                                                                    $diff = date_diff($current_date, $date);
                                                                    $final_date = $diff->format("%r%a");


                                                            ?>


                                                                    <a href="<?php echo base_url('pm_type/12 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-success">
                                                                        <?php echo "yes"; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>


                                                        </tr>
                                            <?php
                                                        $i++;
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>



                                    </table>



                                </div>


                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->