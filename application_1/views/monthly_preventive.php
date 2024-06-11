<style>
    td {
        border: 2px solid black;
    }
</style>
<div style="width: 4000px;" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>MONTHLY MACHINE PREVENTIVE MAINTENANCE PLAN </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
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
                                        <b>Doc. No. :QF / MT / 8.5 / 03</b>
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
                                            <form action="<?php echo base_url('monthly_preventive'); ?>" method="POST">
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
                                if ($machines) {
                                ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-center bg-secondary">
                                            <tr>
                                                <th>SR NO</th>
                                                <th> MACHINE NO </th>
                                                <th>MACHINE DESCRIPTION </th>
                                                <th>MACHINE Code </th>
                                                <th>MACHINE MAKE </th>

                                                <?php
                                                for ($f = 1; $f <= 31; $f++) {
                                                ?>

                                                    <th> <?php echo $f; ?></th>
                                                <?php


                                                }
                                                ?>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $i = 1;
                                            if ($machines) {
                                                foreach ($machines as $s) {
                                                    $data_check2 = array(
                                                        "crated_month" => $month_id,
                                                        "created_year" => $year_id,
                                                        "machine_id" => $s->id,
                                                    );
                                                    $p  = $this->Crud_model->get_data_by_id_multile("pm_request", $data_check2);

                                                    $machines = $this->Crud_model->get_data_by_id("machines", $s->id, "id");
                                                    $assign_pm_group = $this->Crud_model->get_data_by_id("assign_pm_group", $s->id, "machine_id");
                                                    if ($assign_pm_group) {

                                            ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $s->asset_number; ?></td>
                                                            <td><?php echo $s->asset_description; ?></td>
                                                            <td><?php echo $s->code; ?></td>
                                                            <td><?php echo $s->make; ?></td>
                                                            <?php
                                                            for ($f = 1; $f <= 31; $f++) {
                                                                $flag = 0;
                                                                $type = array();


                                                                foreach ($assign_pm_group as $a) {
                                                                    $check_list_groups_data = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");

                                                                    $pm_type = $check_list_groups_data[0]->pm_type;
                                                                    $d = date_parse_from_format("Y-m-d", date("Y-m-d", strtotime($a->last_due_date)));
                                                                    // $var = "20/04/2012";
                                                                    // echo date("Y-m-d", strtotime($a->last_due_date) );

                                                                    $date_new = $d["day"];
                                                                    // echo "<br>";
                                                                    $month_new_2 = $d["month"];

                                                                    $month_new_2_new = $this->Crud_model->get_month($month_new_2);
                                                                    //   echo "<br>";
                                                                    $year_id_new = $d["year"];
                                                                    //  echo "<br>";
                                                                    if ($date_new == $f && $month_new_2 == $month_id) {

                                                                        $flag = 1;
                                                                        array_push($type, $pm_type);
                                                                    }
                                                                }

                                                                if ($flag == 0) {
                                                            ?>
                                                                    <td>

                                                                        <!-- <?php echo $month_new_2_new; ?> -->

                                                                    </td>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <td class="bg-success">
                                                                        <?php
                                                                        if ($type) {
                                                                            foreach ($type as $t) {
                                                                                echo $t . "<br>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                <?php
                                                                }

                                                                ?>

                                                        <?php
                                                            }
                                                        }
                                                        ?>


                                                        </tr>

                                                <?php
                                                    $i++;
                                                }
                                            }
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