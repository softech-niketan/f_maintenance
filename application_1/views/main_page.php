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
    <div style="width: 2000px;" class="content-wrapper">
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

                                <div class="card-body">
                                    <table id="example1" class=" table table table-striped">

                                        <thead>
                                            <tr class="anuj text-center">
                                                <th colspan="4">Machine Details</th>
                                                <th colspan="7" class="bg-info text-white">PM Type</th>
                                                <!-- <th >Predictive </th> -->
                                                <th class="bg-danger text-white">Breakdown </th>
                                                <th class="bg-warning text-white">Improvement Work</th>

                                            </tr>
                                            <tr class="anuj">
                                                <th>Sr.no</th>
                                                <th>Machine Number</th>
                                                <th>Machine Code</th>
                                                <th>Machine Description</th>
                                                <th>1 Monthly</th>
                                                <th>3 Monthly</th>
                                                <th>4 Monthly</th>
                                                <th>6 Monthly</th>
                                                <th>8 Monthly</th>
                                                <th>9 Monthly</th>
                                                <th>12 Monthly</th>
                                                <!-- <th>Maintenance Count (Month/Year)</th> -->
                                                <th>Maintenance Count (Month/Year)</th>
                                                <th>Improvement Work Count(Month/Year)</th>

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
                                                        $improvement_request = $this->Crud_model->get_data_by_id_multile_count("improvement_request", $data_check_break);
                                                        $breakdown_requestmul = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check_break);
                                                        $improvement_requestmul = $this->Crud_model->get_data_by_id_multile("improvement_request", $data_check_break);
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
                                                        $predictive_request_created_year_newmul = $this->Crud_model->get_data_by_id_multile("pm_request", $data_check_predective_created_year);

                                                        //momth
                                                        $month_predective = array(
                                                            "machine_id" => $m->id,
                                                            "crated_month" => $current_month,
                                                        );
                                                        $month_predective_new = $this->Crud_model->get_data_by_id_multile_count("predictive_request", $month_predective);

                                                        $color = "white";
                                                        if ($breakdown_requestmul) {
                                                            if ($breakdown_requestmul[0]->status != "request_closed") {
                                                                $color = "danger";
                                                            }
                                                        }
                                                        if ($improvement_requestmul) {
                                                            if ($improvement_requestmul[0]->status != "completed") {
                                                                $color = "warning";
                                                            }
                                                        }
                                                        if ($predictive_request_created_year_newmul) {
                                                            // $color = $predictive_request_created_year_newmul[0]->status;

                                                            if ($predictive_request_created_year_newmul[0]->status != "checksheet_completed") {
                                                                $color = "info";
                                                            }
                                                        }
                                            ?>

                                                        <td><?php echo $i; ?></td>
                                                        <td class="<?php echo "bg-" . $color; ?>"><?php echo $m->asset_number; ?></td>
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
                                                        <!-- <td>
                                            <a href="<?php echo base_url('predective_maintaince/') . $m->id ?>" class="btn btn-success">
                                                    <?php echo $month_predective_new . " /" . $predictive_request_created_year_new; ?>
                                            </a>   
                                            </td> -->
                                                        <td style="width: 180px;">

                                                            <?php
                                                            if ($user_role == "machine_shop_production_admin" || $user_role == "production_user" || $user_role == "admin" || $user_role == "maintenance_user") {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#breakdown<?php echo $i; ?>">
                                                                    <!-- <i class="fas fa-skull-crossbones"></i> -->
                                                                    <?php echo $breakdown_request_created_month_data_new . " /" . $breakdown_request; ?>

                                                                </button>
                                                            <?php

                                                            } ?>

                                                            <a href="<?php echo base_url('breakdown_pending'); ?>" class="btn btn-info">
                                                                <?php echo $breakdown_request_created_month_data_new . " /" . $breakdown_request; ?>

                                                            </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="breakdown<?php echo $i; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Break-Down Request</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            Are You Sure Want To Create Break-Down Request For <?php echo $m->asset_number ?> Machine?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <?php

                                                                            $breakdown_request = $this->Crud_model->get_data_by_id('breakdown_request', $m->id, 'machine_id');
                                                                            if ($breakdown_request) {
                                                                                $latest_status = $breakdown_request[0]->status;

                                                                                if ($latest_status == "request_closed") {
                                                                            ?>
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                                    <a href="<?php echo base_url('create_breakdown/') . $m->id ?>" class="btn btn-danger">Create Breakdown Request</a>

                                                                                <?php
                                                                                    // }


                                                                                } else {
                                                                                    echo "<div style='padding:20px' class='bg-warning'>Privious Breakdown Request Of This Machine Is Not Completed, Please Change The Status Of This Machine breakdown request</div>";
                                                                                }
                                                                            } else {
                                                                                ?>
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                                <a href="<?php echo base_url('create_breakdown/') . $m->id ?>" class="btn btn-danger">2Create Breakdown Request</a>
                                                                            <?php

                                                                            }


                                                                            ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </td>
                                                        <td style="width: 180px;">

                                                            <?php
                                                            if ($user_role == "machine_shop_production_admin" || $user_role == "production_user" || $user_role == "admin" || $user_role == "maintenance_user") {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#breakdown2<?php echo $i; ?>">
                                                                    <!-- <i class="fas fa-skull-crossbones"></i> -->
                                                                    0/0
                                                                </button>
                                                            <?php

                                                            } ?>

                                                            <a href="<?php echo base_url('breakdown_pending'); ?>" class="btn btn-info">
                                                                0/0

                                                            </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="breakdown2<?php echo $i; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Improvement Request</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            Are You Sure Want To Create Improvement Request For <?php echo $m->asset_number ?> Machine?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <?php

                                                                            // $breakdown_request = $this->Crud_model->get_data_by_id('breakdown_request', $m->id, 'machine_id');
                                                                            // if ($breakdown_request) {
                                                                            //     $latest_status = $breakdown_request[0]->status;

                                                                            //     if ($latest_status == "request_closed") {
                                                                            // 
                                                                            ?>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                            <a href="<?php echo base_url('create_improvement/') . $m->id ?>" class="btn btn-danger">Create Improvement Request</a>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


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

                                <div class="card-head">
                                    Curreent Breakdown Request
                                </div>

                                <div class="card-body">
                                    <table id="example1" class=" table table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Request Number</th>
                                                <th>Current Status</th>
                                                <th>Machine Number</th>
                                                <th>Machine Code</th>
                                                <th>Machine Description</th>
                                                <th>Breakdown Initiated Date</th>
                                                <th>Breakdown Initiated Time</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Request Number</th>
                                                <th>Current Status</th>
                                                <th>Machine Number</th>
                                                <th>Machine Code</th>
                                                <th>Machine Description</th>
                                                <th>Breakdown Initiated Date</th>
                                                <th>Breakdown Initiated Time</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            if ($breakdown_pending) {
                                                $i = 1;
                                                foreach ($breakdown_pending as $p) {
                                                    // print_r($group_ids);
                                                    $request_from = $this->Crud_model->get_data_by_id("user", $p->request_from, "id");
                                                    $request_to = $this->Crud_model->get_data_by_id("user", $p->request_to, "id");
                                                    $machines = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");

                                                    if ($p->status != "request_closed") {






                                            ?>

                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo "BR-" . $p->id ?></td>
                                                            <td><?php echo $p->status ?></td>
                                                            <td><?php echo $machines[0]->asset_number; ?></td>
                                                            <td><?php echo $machines[0]->code; ?></td>
                                                            <td><?php echo $machines[0]->asset_description; ?></td>
                                                            <td><?php echo $p->created_date ?></td>
                                                            <td><?php echo $p->created_time ?></td>
                                                        </tr>

                                            <?php
                                                    }
                                                }
                                            } ?>
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