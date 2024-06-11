<style>
    td {
        border: 2px solid black;
    }
</style>
<div style="width: 3500px;" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BREAKDOWN Time Lost CHART DAY WISE. </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">BREAKDOWN OCCURANCE CHART DAY WISE </li>
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
                                        <b>Doc. No. : QF/MT/8.5/13</b>
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
                                            <form action="<?php echo base_url('breakdown_time_lost'); ?>" method="POST">
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
                                <?php
                                if ($breakdown_request) {
                                ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-center bg-secondary">
                                            <tr>
                                                <th>SR NO</th>
                                                <th>MACHINE NO </th>
                                                <th>MACHINE DESCRIPTION </th>
                                                <th>MACHINE Code </th>

                                                <?php
                                                for ($f = 1; $f <= 31; $f++) {
                                                ?>

                                                    <th> <?php echo $f; ?></th>
                                                <?php


                                                }
                                                ?>
                                                <td>Total</td>



                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $i = 0;

                                            // if($breakdown_request)
                                            foreach ($machines as $p) {
                                                $data_check = array(
                                                    "created_year" => $year_id,
                                                    "crated_month" => $month_id,
                                                    "machine_id" => $p->id,
                                                );
                                                $total_h = 0;
                                                $total_m = 0;
                                                $breakdown_request_data = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
                                                if ($breakdown_request_data) {

                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $p->asset_number; ?></td>
                                                        <td><?php echo $p->asset_description; ?></td>
                                                        <td><?php echo $p->code; ?></td>
                                                        <?php
                                                        // for ($f = 1; $f <= 31; $f++) {
                                                        //     $flag = 0;
                                                        //     $count = 0;

                                                        //     foreach ($breakdown_request_data as $b) {
                                                        //         $d = date_parse_from_format("Y-m-d", date("Y-m-d", strtotime($b->created_date)));

                                                        //         $date_new = $d["day"];
                                                        //         // echo "<br>";
                                                        //         $month_new_2 = $d["month"];

                                                        //         $month_new_2_new = $this->Crud_model->get_month($month_new_2);
                                                        //         //   echo "<br>";
                                                        //         $year_id_new = $d["year"];
                                                        //         if ($date_new == $f && $month_new_2 == $month_id) {
                                                        //             $flag = 1;
                                                        //             $count++;
                                                        //         }
                                                        //     }
                                                        //     if ($flag == 1) {
                                                        for ($f = 1; $f <= 31; $f++) {
                                                            $flag = 0;
                                                            $count = 0;
                                                            $total_min_final = 0;
                                                            $total_hours_final = 0;

                                                            foreach ($breakdown_request_data as $bb) {
                                                                // print_r($breakdown_request_data);
                                                                $d = date_parse_from_format("Y-m-d", date("Y-m-d", strtotime($bb->created_date)));

                                                                $date_new = $d["day"];
                                                                // echo "<br>";
                                                                $month_new_2 = $d["month"];

                                                                $month_new_2_new = $this->Crud_model->get_month($month_new_2);
                                                                //   echo "<br>";
                                                                $year_id_new = $d["year"];
                                                                if ($date_new == $f && $month_new_2 == $month_id) {
                                                                    $flag = 1;
                                                                    $count++;
                                                                    $min = (float) substr($bb->complete_time_maintaince, 15, 3);
                                                                    $min = round($min, 2);
                                                                    $hour = (float) substr($bb->complete_time_maintaince, 6, 3);
                                                                    $hour = round($hour, 2);
                                                                    $days = (float) substr($bb->complete_time_maintaince, 0, 2);
                                                                    $total_hours = ($days * 24) + $hour + ($min / 60);
                                                                    $total_hours = round($total_hours, 2);
                                                                    $total_hours_final = $total_hours_final + $total_hours;
                                                                    $total_min = ($days * 24) * 60 + ($hour) * 60 + ($min);
                                                                    $total_min = round($total_min, 2);
                                                                    $total_min_final = $total_min_final + $total_min;
                                                                }
                                                            }



                                                            //  echo "<br>";
                                                            if ($flag == 1) {


                                                        ?>
                                                                <td class="bg-danger">
                                                                    <?php
                                                                    echo "Total " . $total_hours_final . " Hours OR Total  " . $total_min_final . " Min";
                                                                    $total_h = $total_h + $total_hours_final;
                                                                    $total_m = $total_m + $total_min_final;
                                                                    ?>
                                                                </td>
                                                            <?php

                                                            } else {
                                                            ?>
                                                                <td class="">
                                                                    <?php //echo// $month_new_2_new; //if($flag == 1){ echo $year_id_new;}
                                                                    ?>
                                                                </td>
                                                            <?php
                                                            }

                                                            ?>

                                                        <?php
                                                        }


                                                        // }
                                                        ?>

                                                        <td>
                                                            <?php
                                                            echo "Total " . $total_h . " Hours OR Total  " . $total_m . " Min";

                                                            ?>
                                                        </td>


                                                    </tr>

                                                <?php
                                                } else {
                                                ?>

                                            <?php
                                                }
                                            }
                                            //}
                                            // 


                                            ?>

                                        </tbody>










                                    </table>

                                <?php

                                } else {
                                    echo "
                                                    <div style='padding:10px' class='text-center alert-danger'>
                                                    <h3>No Result Found</h3>
                                                    </div>
                                                    ";
                                }

                                ?>
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