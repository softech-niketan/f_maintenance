<div style="" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Asset Master </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Asset Master</li>
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
                                        <b>Doc. No. :QF / MT / 8.5 / 01</b>
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


                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="text-center bg-secondary">
                                        <tr>
                                            <th rowspan="2">Sr.no</th>
                                            <th rowspan="2"> ASSET NO </th>
                                            <th rowspan="2"> Code  </th>
                                            <th rowspan="2">MACHINE DESCRIPTION </th>
                                            <th rowspan="2">MACHINE MAKE </th>
                                            <th rowspan="2">INSTALLED ON (Purchase Date)</th>
                                            <th colspan="8">PREVENTIVE MAINTENACE FREQ</th>

                                        </tr>
                                        </tr>

                                        <th>1 MONTHS </th>
                                        <th>3 MONTHS </th>
                                        <th>4 MONTHS </th>
                                        <th>6 MONTHS </th>
                                        <th>8 MONTHS </th>
                                        <th>9 MONTHS </th>
                                        <th>12 MONTHS </th>
                                        <!-- <th>Remark</th> -->


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($machines) {
                                            $i = 1;
                                        //     foreach ($machines as $m) {

                                        //         $assign_pm_group = $this->Crud_model->get_data_by_id("assign_pm_group", $m->id, "machine_id");
                                        //         $count_1 = $this->Crud_model->query_sinegle_count("SELECT * FROM pm_request WHERE  pm_frequency = '1 Monthly' and  machine_id = $m->id ");
                                        //         $count_3 = $this->Crud_model->query_sinegle_count("SELECT * FROM pm_request WHERE  pm_frequency = '3 Monthly' and  machine_id = $m->id ");
                                        //         $count_4 = $this->Crud_model->query_sinegle_count("SELECT * FROM pm_request WHERE  pm_frequency = '4 Monthly' and  machine_id = $m->id ");
                                        //         $count_6 = $this->Crud_model->query_sinegle_count("SELECT * FROM pm_request WHERE  pm_frequency = '6 Monthly' and  machine_id = $m->id ");
                                        //         $count_8 = $this->Crud_model->query_sinegle_count("SELECT * FROM pm_request WHERE  pm_frequency = '8 Monthly' and  machine_id = $m->id ");
                                        //         $count_9 = $this->Crud_model->query_sinegle_count("SELECT * FROM pm_request WHERE  pm_frequency = '9 Monthly' and  machine_id = $m->id ");
                                        //         $count_12 = $this->Crud_model->query_sinegle_count("SELECT * FROM pm_request WHERE  pm_frequency = '12 Monthly' and  machine_id = $m->id ");




                                        // ?>
                                                <!-- <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $m->asset_number; ?></td>
                                                    <td><?php echo $m->asset_description; ?></td>
                                                    <td><?php echo $m->make; ?></td>
                                                    <td><?php echo $m->purchased_date; ?></td>
                                                    <td><?php echo $count_1; ?></td>
                                                    <td><?php echo $count_3; ?></td>
                                                    <td><?php echo $count_4; ?></td>
                                                    <td><?php echo $count_6; ?></td>
                                                    <td><?php echo $count_8; ?></td>
                                                    <td><?php echo $count_9; ?></td>
                                                    <td><?php echo $count_12; ?></td>

                                                </tr> -->

                                        <?php
                                        //         $i++;
                                        //     }
                                        // }


                                        ?>
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


                                                                    <a href="<?php echo base_url('pm_type/1 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-<?php
                                                                                                                                                                                if ($final_date >= 30) {
                                                                                                                                                                                    $success_count_1++;
                                                                                                                                                                                    echo "success";
                                                                                                                                                                                } else if ($final_date < 30 && $final_date >= 15) {
                                                                                                                                                                                    $yellow_count_1++;
                                                                                                                                                                                    echo "warning";
                                                                                                                                                                                } else if ($final_date < 15 && $final_date >= 0) {
                                                                                                                                                                                    $orange_count_1++;
                                                                                                                                                                                    echo "orange";
                                                                                                                                                                                } else if ($final_date < 0) {
                                                                                                                                                                                    $danger_count_1 = $danger_count_1 + 1;
                                                                                                                                                                                    echo "danger";
                                                                                                                                                                                }


                                                                                                                                                                                ?>">
                                                                        <?php echo $final_date; ?>

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


                                                                    <a href="<?php echo base_url('pm_type/3 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-<?php
                                                                                                                                                                                if ($final_date >= 30) {
                                                                                                                                                                                    $success_count_3++;
                                                                                                                                                                                    echo "success";
                                                                                                                                                                                } else if ($final_date < 30 && $final_date >= 15) {
                                                                                                                                                                                    $yellow_count_3++;
                                                                                                                                                                                    echo "warning";
                                                                                                                                                                                } else if ($final_date < 15 && $final_date >= 0) {
                                                                                                                                                                                    $orange_count_3++;
                                                                                                                                                                                    echo "orange";
                                                                                                                                                                                } else if ($final_date < 0) {
                                                                                                                                                                                    $danger_count_3++;
                                                                                                                                                                                    echo "danger";
                                                                                                                                                                                }


                                                                                                                                                                                ?>">
                                                                        <?php echo $final_date; ?>

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


                                                                    <a href="<?php echo base_url('pm_type/4 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-<?php
                                                                                                                                                                                if ($final_date >= 30) {
                                                                                                                                                                                    $success_count_4++;
                                                                                                                                                                                    echo "success";
                                                                                                                                                                                } else if ($final_date < 30 && $final_date >= 15) {
                                                                                                                                                                                    $yellow_count_4++;
                                                                                                                                                                                    echo "warning";
                                                                                                                                                                                } else if ($final_date < 15 && $final_date >= 0) {
                                                                                                                                                                                    $orange_count_4++;
                                                                                                                                                                                    echo "orange";
                                                                                                                                                                                } else if ($final_date < 0) {
                                                                                                                                                                                    $danger_count_4++;
                                                                                                                                                                                    echo "danger";
                                                                                                                                                                                }


                                                                                                                                                                                ?>">
                                                                        <?php echo $final_date; ?>

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


                                                                    <a href="<?php echo base_url('pm_type/6 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-<?php
                                                                                                                                                                                if ($final_date >= 30) {
                                                                                                                                                                                    $success_count_6++;
                                                                                                                                                                                    echo "success";
                                                                                                                                                                                } else if ($final_date < 30 && $final_date >= 15) {
                                                                                                                                                                                    $yellow_count_6++;
                                                                                                                                                                                    echo "warning";
                                                                                                                                                                                } else if ($final_date < 15 && $final_date >= 0) {
                                                                                                                                                                                    $orange_count_6++;
                                                                                                                                                                                    echo "orange";
                                                                                                                                                                                } else if ($final_date < 0) {
                                                                                                                                                                                    $danger_count_6++;
                                                                                                                                                                                    echo "danger";
                                                                                                                                                                                }


                                                                                                                                                                                ?>">
                                                                        <?php echo $final_date; ?>

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


                                                                    <a href="<?php echo base_url('pm_type/8 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-<?php
                                                                                                                                                                                if ($final_date >= 30) {
                                                                                                                                                                                    $success_count_8++;
                                                                                                                                                                                    echo "success";
                                                                                                                                                                                } else if ($final_date < 30 && $final_date >= 15) {
                                                                                                                                                                                    $yellow_count_8++;
                                                                                                                                                                                    echo "warning";
                                                                                                                                                                                } else if ($final_date < 15 && $final_date >= 0) {
                                                                                                                                                                                    $orange_count_8++;
                                                                                                                                                                                    echo "orange";
                                                                                                                                                                                } else if ($final_date < 0) {
                                                                                                                                                                                    $danger_count_8++;
                                                                                                                                                                                    echo "danger";
                                                                                                                                                                                }


                                                                                                                                                                                ?>">
                                                                        <?php echo $final_date; ?>

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


                                                                    <a href="<?php echo base_url('pm_type/9 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-<?php
                                                                                                                                                                                if ($final_date >= 30) {
                                                                                                                                                                                    $success_count_9++;
                                                                                                                                                                                    echo "success";
                                                                                                                                                                                } else if ($final_date < 30 && $final_date >= 15) {
                                                                                                                                                                                    $yellow_count_9++;
                                                                                                                                                                                    echo "warning";
                                                                                                                                                                                } else if ($final_date < 15 && $final_date >= 0) {
                                                                                                                                                                                    $orange_count_9++;
                                                                                                                                                                                    echo "orange";
                                                                                                                                                                                } else if ($final_date < 0) {
                                                                                                                                                                                    $danger_count_9++;
                                                                                                                                                                                    echo "danger";
                                                                                                                                                                                }


                                                                                                                                                                                ?>">
                                                                        <?php echo $final_date; ?>

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


                                                                    <a href="<?php echo base_url('pm_type/12 Monthly/') . $m->id ?>" style="color:white" class="btn text-white  bg-<?php
                                                                                                                                                                                if ($final_date >= 30) {
                                                                                                                                                                                    $success_count_12++;
                                                                                                                                                                                    echo "success";
                                                                                                                                                                                } else if ($final_date < 30 && $final_date >= 15) {
                                                                                                                                                                                    $yellow_count_12++;
                                                                                                                                                                                    echo "warning";
                                                                                                                                                                                } else if ($final_date < 15 && $final_date >= 0) {
                                                                                                                                                                                    $orange_count_12++;
                                                                                                                                                                                    echo "orange";
                                                                                                                                                                                } else if ($final_date < 0) {
                                                                                                                                                                                    $danger_count_12++;
                                                                                                                                                                                    echo "danger";
                                                                                                                                                                                }


                                                                                                                                                                                ?>">
                                                                        <?php echo $final_date; ?>

                                                                    </a>


                                                            <?php
                                                                    break;
                                                                }
                                                            }




                                                            ?>
                                                        </td>

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