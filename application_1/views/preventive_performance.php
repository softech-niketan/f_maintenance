<div style="width: 2000px;" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PREVENTIVE MAINTENACE PERFORMANCE </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">PREVENTIVE MAINTENACE PERFORMANCE </li>
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
                                        <b>Doc. No. :QF/MT/8.5/06</b>
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

                                <div class="col-lg-12 mt-5" style="border:1px solid black;padding:15px">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <form action="<?php echo base_url('preventive_performance'); ?>" method="POST">
                                                <label for="">Select Year <span class="text-danger">*</span></label>
                                                <select required class="form-control select2" name="year_id" id="">
                                                    <?php
                                                    for ($x = 2020; $x <= 2027; $x++) {
                                                    ?>
                                                        <option <?php if ($year_id == $x) {
                                                                    echo "selected";
                                                                } ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                    <!-- <option value="2020">2020</option> -->

                                                </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <form action="<?php echo base_url('annual_preventive'); ?>" method="POST">
                                                <label for="">Select Month <span class="text-danger">*</span></label>
                                                <select required class="form-control select2" name="month_id" id="">
                                                    <?php
                                                    for ($y = 1; $y <= 12; $y++) {
                                                        $month_new = $this->Crud_model->get_month($y);
                                                    ?>
                                                        <option <?php if ($month_id == $y) {
                                                                    echo "selected";
                                                                } ?> value="<?php echo $y; ?>"><?php echo $month_new; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                    <!-- <option value="2020">2020</option> -->

                                                </select>
                                        </div>
                                        <div class="col-lg-2 ">
                                            <button style="margin-top: 30px;" type="submit" type="submit" class="btn btn-primary">
                                                Search
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>


                            </div>

                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="text-center bg-secondary">
                                        <tr>
                                            <th>SR NO</th>
                                            <th> MACHINE NO </th>
                                            <th>MACHINE DESCRIPTION </th>
                                            <th>MACHINE Code </th>
                                            <th>MACHINE MAKE </th>
                                            <th>FREQUENCY </th>
                                            <th>PLAN </th>
                                            <th>ACTUAL </th>
                                            <th>FAILURE </th>
                                            <th>Production DEPT FAILURE </th>
                                            <th>Maintenance DEPT FAILURE</th>




                                        </tr>
                                        <!-- <tr>
                                            <th>MACHINE SHOP DEPT </th>
                                            <th>Maintenance DEPT </th>


                                        </tr> -->


                                    </thead>
                                    <tfoot class="text-center bg-secondary">
                                        <tr>
                                            <th>SR NO</th>
                                            <th> MACHINE NO </th>
                                            <th>MACHINE DESCRIPTION </th>
                                            <th>MACHINE Code </th>
                                            <th>MACHINE MAKE </th>
                                            <th>FREQUENCY </th>
                                            <th>PLAN </th>
                                            <th>ACTUAL </th>
                                            <th>FAILURE </th>
                                            <th>Production DEPT FAILURE </th>
                                            <th>Maintenance DEPT FAILURE</th>




                                        </tr>
                                        <!-- <tr>
                                            <th>MACHINE SHOP DEPT </th>
                                            <th>Maintenance DEPT </th>


                                        </tr> -->


                                    </tfoot>

                                    <tbody>
                                        <?php
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



                                                    // if ($pm_history_data) {
                                                    //     $status = $pm_history_data[0]->status;
                                                    //     $pm_date = $pm_history_data[0]->new_pm_date;
                                                    //     $feedback = $pm_history_data[0]->feedback;
                                                    //     $feedback = "";
                                                    //     $purchase_dept   = "";
                                                    //     $foundry_dept   = "";
                                                    //     $machineshop_dept   = "";
                                                    //     $final_inspection_dept = "";
                                                    //     $failure = "";
                                                    //     if ($status == "Request_Closed") {
                                                    //         $actual = $pm_history_data[0]->created_date;
                                                    //         $diff = date_diff(date_create($actual), $date);
                                                    //         $final_date = $diff->format("%r%a");
                                                    //         if ($final_date < 0) {
                                                    //             $failure = "yes";
                                                    //         }

                                                    //         if ($final_date) {
                                                    //             if ($final_date > 0) {
                                                    //                 // $machineshop_dept = "yes";
                                                    //                 //$failure = "Yes";
                                                    //             } else {
                                                    //                 $foundry_dept = "yes";
                                                    //             }
                                                    //             // $final_date = $diff->format("%r%a");
                                                    //         }
                                                    //     } else {
                                                    //         $actual = "NA";
                                                    //         if ($final_date_new < 0) {
                                                    //             $failure = "yes";
                                                    //             $machineshop_dept = "yes";
                                                    //         }
                                                    //     }
                                                    // } else {
                                                    //     $status = $p->status;
                                                    //     $pm_date = $p->pm_date;
                                                    //     $actual = "NA";
                                                    //     if ($final_date_new < 0) {
                                                    //         $failure = "yes";
                                                    //         $machineshop_dept = "yes";
                                                    //     }
                                                    // }


                                                    if ($failure == "yes") {
                                                        $actual_counter++;
                                                    }
                                                    if ($jj == 1) {


                                        ?>
                                                        <tr>
                                                            <td><?php echo $p->machine_id . '/' . $p->pm_group_id; ?></td>
                                                            <td><?php echo $machines_data[0]->asset_number; ?></td>
                                                            <td><?php echo $machines_data[0]->asset_description; ?></td>
                                                            <td><?php echo $machines_data[0]->code; ?></td>
                                                            <td><?php echo $machines_data[0]->make; ?></td>
                                                            <td><?php echo $p->pm_frequency; ?></td>
                                                            <td><?php echo $plan_date; ?></td>
                                                            <td><?php echo $actual_date; ?></td>
                                                            <td><?php echo $failure; ?></td>
                                                            <td><?php echo $foundry_dept; ?></td>
                                                            <td><?php echo $machineshop_dept; ?></td>





                                                        </tr>
                                            <?php
                                                        $i++;
                                                    }
                                                }
                                            }
                                            ?>

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="6"></td>


                                            <th colspan="">AVG : <?php
                                                                    if ($i > 0) {


                                                                        $mul =  $actual_counter * 100;
                                                                        $abc = $i - 1;

                                                                        echo 100 - round($mul / $abc, 2);
                                                                    } else {
                                                                        echo 0;
                                                                    }
                                                                    ?></th>

                                            <td></td>

                                        </tr>
                                    </tfoot>
                                <?php

                                        } else {
                                ?>
                                    <tr>
                                        <th colspan="13">No Data Found</th>
                                    </tr>
                                <?php } ?>






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