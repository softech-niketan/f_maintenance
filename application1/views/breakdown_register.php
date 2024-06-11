<div style="width: 2000px;" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BREAKDOWN REGISTER. </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">BREAKDOWN REGISTER </li>
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
                                        <b>Doc. No. :QF/MT/8.5/08</b>
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
                                            <form action="<?php echo base_url('breakdown_register'); ?>" method="POST">
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
                                                <th> DATE </th>
                                                <th>BREAKDOWN REQUEST NO </th>
                                                <th>BREAKDOWN DETAILS </th>
                                                <th>MACHINE Number </th>
                                                <th>MACHINE DESCRIPTION </th>
                                                <th>MACHINE Code </th>
                                                <th>INITIATED DATE AND TIME </th>
                                                <th>CLOSURE DATE AND TIME (Feedback)</th>

                                                <th>NATURE OF BREAKDOWN </th>
                                                <th>ACTION TAKEN </th>
                                                <th>SPARE USED </th>
                                                <th>Total BREAKDOWN TIME By Maintaince </th>
                                                <th>BREAKDOWN IN MINUTES </th>
                                                <th>BREAKDOWN HOURS </th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $i = 1;
                                            foreach ($breakdown_request as $p) {

                                                $machines = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");
                                                $assign_pm_group = $this->Crud_model->get_data_by_id("assign_pm_group", $p->machine_id, "machine_id");
                                                if ($assign_pm_group) {
                                                    $min = (float) substr($p->complete_time_maintaince, 15, 3);
                                                    $min = round($min, 2);
                                                    $hour = (float) substr($p->complete_time_maintaince, 6, 3);
                                                    $hour = round($hour, 2);
                                                    $days = (float) substr($p->complete_time_maintaince, 0, 2);
                                                    $total_hours = ($days * 24) + $hour + ($min / 60);
                                                    $total_hours = round($total_hours, 2);
                                                    $total_min = ($days * 24) * 60 + ($hour) * 60 + ($min);
                                                    $total_min = round($total_min, 2);

                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $p->created_date; ?></td>
                                                        <td><?php echo $p->id; ?></td>
                                                        <td><?php echo $p->details; ?></td>

                                                        <td><?php echo $machines[0]->asset_number; ?></td>
                                                        <td><?php echo $machines[0]->asset_description; ?></td>
                                                        <td><?php echo $machines[0]->code; ?></td>
                                                        <td><?php echo $p->created_date . " " . $p->created_time; ?></td>
                                                        <td><?php echo $p->complition_date . " " . $p->complition_time; ?></td>

                                                        <td><?php echo $p->type_of_breakdown; ?></td>
                                                        <td><?php echo $p->actions_taken; ?></td>
                                                        <td><?php echo "NA"; ?></td>
                                                        <td><?php echo $p->complete_time_maintaince; ?></td>

                                                        <td><?php echo $total_min; ?></td>
                                                        <td><?php echo $total_hours; ?></td>



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