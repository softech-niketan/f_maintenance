<div style="width:3000px" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ANNUAL PREVENTIVE MAINTENANCE PLAN OF MACHINES </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Annual Preventive</li>
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
                                        <b>Doc. No. :QF / MT / 8.5 / 02</b>
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
                                            <form action="<?php echo base_url('annual_preventive'); ?>" method="POST">
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
                                if ($machines) {
                                ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-center bg-secondary">
                                            <tr>
                                                <th>SR NO</th>
                                                <th> MACHINE NO </th>
                                                <th>MACHINE DESCRIPTION </th>
                                                <th>MACHINE MAKE </th>
                                                <th>MACHINE CODE </th>

                                                <?php
                                                for ($f = 1; $f <= 12; $f++) {
                                                    $month = $this->Crud_model->get_month($f);
                                                ?>

                                                    <th> <?php echo $month; ?></th>
                                                <?php


                                                }
                                                ?>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $i = 0;
                                            foreach ($machines as $p) {
                                                $my_array = array();

                                                $machines = $this->Crud_model->get_data_by_id("machines", $p->id, "id");
                                                // $assign_pm_group = $this->Crud_model->get_data_by_id("assign_pm_group", $p->machine_id, "machine_id");
                                                // $assign_pm_group = $this->Crud_model->get_data_by_id_asc("assign_pm_group", $p->machine_id, "machine_id");

                                                $assign_pm_group = $this->db->query('SELECT DISTINCT machine_id,group_id  FROM assign_pm_group   WHERE machine_id =  ' . $p->id . ' ')->result();

                                                if ($assign_pm_group) {

                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $machines[0]->asset_number; ?></td>
                                                        <td><?php echo $machines[0]->asset_description; ?></td>
                                                        <td><?php echo $machines[0]->make; ?></td>
                                                        <td><?php echo $machines[0]->code; ?></td>
                                                        <?php
                                                        // for ($f = 01; $f <= 12; $f++) {
                                                        $flag = 0;
                                                        $one = "";
                                                        $two = "";
                                                        $three = "";
                                                        $four = "";
                                                        $five = "";
                                                        $six = "";
                                                        $seven = "";
                                                        $eight = "";
                                                        $nine = "";
                                                        $ten = "";
                                                        $eleven = "";
                                                        $twelve = "";
                                                        $message = "";




                                                        // $assign_pm_group = $this->Crud_model->get_data_by_id_multile("assign_pm_group", $data_check);


                                                        foreach ($assign_pm_group as $a) {


                                                            $data_check34 = array(
                                                                "machine_id" => $a->machine_id,
                                                                "group_id" => $a->group_id,
                                                            );
                                                            $assign_pm_group_data = $this->Crud_model->get_data_by_id_multile_asc("assign_pm_group", $data_check34);



                                                            // $d = date_parse_from_format("Y-m-d", $a->last_due_date);
                                                            $check_list_groups_data = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");

                                                            $pm_type = $check_list_groups_data[0]->pm_type;


                                                            $last_date_data = "";
                                                            foreach ($assign_pm_group_data as $a) {
                                                                $last_date_data_new = $a->last_pm_date;
                                                                $last_date = substr($last_date_data_new, 5, 2);
                                                                $last_date_year = substr($last_date_data_new, 0, 4);


                                                                if ($last_date_year == $year_id) {
                                                                    $last_date_data = $last_date_data_new;
                                                                    break;
                                                                } else {

                                                                    if ($last_date_year == ((int)$year_id) - 1) {
                                                                        $last_date_data = $last_date_data_new;
                                                                    } else {
                                                                        $last_date_data = $assign_pm_group_data[0]->last_pm_date;
                                                                    }
                                                                }
                                                            }

                                                            $last_date = substr($last_date_data, 5, 2);

                                                            if ($last_date == 01) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $one .= $pm_type . " <br>";
                                                                    $two .= $pm_type . " <br>";
                                                                    $three .= $pm_type . " <br>";
                                                                    $four .= $pm_type . " <br>";
                                                                    $five .= $pm_type . " <br>";
                                                                    $six .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $one .= $pm_type . " <br>";
                                                                    $four .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $one .= $pm_type . " <br>";
                                                                    $five .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $one .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $one .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $one .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 02) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $two .= $pm_type . " <br>";
                                                                    $three .= $pm_type . " <br>";
                                                                    $four .= $pm_type . " <br>";
                                                                    $five .= $pm_type . " <br>";
                                                                    $six .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $two .= $pm_type . " <br>";
                                                                    $five .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $two .= $pm_type . " <br>";
                                                                    $six .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $two .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $two .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $two .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 03) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $three .= $pm_type . " <br>";
                                                                    $four .= $pm_type . " <br>";
                                                                    $five .= $pm_type . " <br>";
                                                                    $six .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $three .= $pm_type . " <br>";
                                                                    $six .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $three .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $three .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $three .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $three .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 04) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $four .= $pm_type . " <br>";
                                                                    $five .= $pm_type . " <br>";
                                                                    $six .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $four .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $four .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $four .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $four .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $four .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 05) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $five .= $pm_type . " <br>";
                                                                    $six .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $five .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $five .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $five .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $five .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $five .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 06) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $six .= $pm_type . " <br>";
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $six .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $six .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $six .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $six .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $six .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 07) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $seven .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $seven .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $seven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $seven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $seven .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 8) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $eight .= $pm_type . " <br>";
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $eight .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $eight .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $eight .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $eight .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $eight .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 9) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $nine .= $pm_type . " <br>";
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $nine .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $nine .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 10) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $ten .= $pm_type . " <br>";
                                                                    $eleven .= $pm_type . " <br>";

                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $ten .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 11) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $eleven .= $pm_type . " <br>";
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $eleven .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            if ($last_date == 12) {
                                                                if ($pm_type == "1 Monthly") {
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "3 Monthly") {
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "4 Monthly") {
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "6 Monthly") {
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "8 Monthly") {
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                                if ($pm_type == "12 Monthly") {
                                                                    $twelve .= $pm_type . " <br>";
                                                                }
                                                            }
                                                            // $this->date = $d["day"];
                                                            // $month_new = $d["month"];
                                                            // $this->year = $d["year"];



                                                            // if ($pm_type == "1 Monthly") {
                                                            //     $one =  "1 Monthly";
                                                            //     // if()

                                                            // } else if ($pm_type == "3 Monthly") {
                                                            //     $three = "3 Monthly";
                                                            // } else if ($pm_type == "4 Monthly") {
                                                            //     $four = "4 Monthly";
                                                            // } else if ($pm_type == "6 Monthly") {
                                                            //     $six =  "6 Monthly";
                                                            // } else if ($pm_type == "8 Monthly") {
                                                            //     $eight =  "8 Monthly";
                                                            // } else if ($pm_type == "9 Monthly") {
                                                            //     $nine =  "9 Monthly";
                                                            // } else if ($pm_type == "12 Monthly") {
                                                            //     $twelve =  "12 Monthly";
                                                            // }


                                                            // if ($f == $last_date) {
                                                            //     $message .= $pm_type . " <br>";
                                                            // }


                                                            // if ($pm_type == "1 Monthly") {

                                                            //     $message .= $pm_type . " <br>";
                                                            // } else if ($pm_type == "3 Monthly") {



                                                            //     if ($f == $last_date) {
                                                            //         $message .= $pm_type . " <br>";
                                                            //     }
                                                            // } else if ($pm_type == "4 Monthly") {
                                                            //     if ($f == $last_date) {
                                                            //         $message .= $pm_type . " <br>";
                                                            //     }
                                                            // } else if ($pm_type == "6 Monthly") {
                                                            //     if ($f == $last_date) {
                                                            //         $message .= $pm_type . " <br>";
                                                            //     }
                                                            // } else if ($pm_type == "8 Monthly") {
                                                            //     if ($f == $last_date) {
                                                            //         $message .= $pm_type . " <br>";
                                                            //     }
                                                            // } else if ($pm_type == "9 Monthly") {
                                                            //     if ($f == $last_date) {
                                                            //         $message .= $pm_type . " <br>";
                                                            //     }
                                                            // } else if ($pm_type == "12 Monthly") {
                                                            //     if ($f == $last_date) {
                                                            //         $message .= $pm_type . " <br>";
                                                            //     }
                                                            // }



                                                        ?>
                                                            <!-- <td>hi</td> -->
                                                        <?php


                                                            // if ($month_new == $f) {
                                                            //     $check_list_groups_data = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                                            //     if ($check_list_groups_data) {
                                                            //         array_push($my_array, $check_list_groups_data[0]->pm_type);
                                                            //     }
                                                            //     $flag = 1;
                                                            // }
                                                        }






                                                        //if ($flag == 0) {
                                                        ?>
                                                        <td>
                                                            <?php echo $one; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $two; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $three; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $four; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $five; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $six; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $seven; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $eight; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $nine; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ten; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $eleven; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $twelve; ?>
                                                        </td>
                                                        <!-- <td><?php echo $message; ?></td> -->

                                                        <!-- <td>
                                                                    No
                                                                </td> -->
                                                        <?php

                                                        // } else {
                                                        ?>
                                                        <!-- <td class="">
                                                                <?php
                                                                // if (!empty($one)) {
                                                                //     echo $one . "<br>";
                                                                // }
                                                                // if (!empty($three)) {
                                                                //     if ($f == 1 || $f == 3 || $f == 6 || $f == 9 || $f == 12) {
                                                                //         echo $three . "<br>";
                                                                //     }
                                                                // }
                                                                // if (!empty($six)) {
                                                                //     if ($f == 1 || $f == 6 || $f == 12) {
                                                                //         echo $six . "<br>";
                                                                //     }
                                                                // }
                                                                // if (!empty($twelve)) {
                                                                //     if ($f == 1 ||  $f == 12) {
                                                                //         echo $twelve . "<br>";
                                                                //     }
                                                                // }
                                                                // if (!empty($four)) {
                                                                //     if ($f == 1 ||  $f == 4 || $f == 8 || $f == 12) {
                                                                //         echo $four . "<br>";
                                                                //     }
                                                                // }
                                                                // if (!empty($eight)) {
                                                                //     if ($f == 1 ||  $f == 8) {
                                                                //         echo $eight . "<br>";
                                                                //     }
                                                                // }
                                                                // if (!empty($nine)) {
                                                                //     if ($f == 1 ||  $f == 9) {
                                                                //         echo $nine . "<br>";
                                                                //     }
                                                                // }



                                                                // echo $nine."<br>";


                                                                // if (count($my_array) > 0) {
                                                                //     foreach ($my_array as $m) {
                                                                //         echo $m;
                                                                //         echo "<br>";
                                                                //     }
                                                                // } 

                                                                ?>
                                                            </td> -->
                                                        <?php
                                                        // }

                                                        ?>

                                                <?php

                                                }
                                            }
                                                ?>


                                                    </tr>

                                                <?php

                                            }
                                            // 


                                                ?>

                                        </tbody>






                                    </table>

                                    <?php
                                    // } else {
                                    //     echo "
                                    //                     <div style='padding:10px' class='text-center alert-danger'>
                                    //                     <h3>No Result Found</h3>
                                    //                     </div>
                                    //                     ";
                                    // }

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