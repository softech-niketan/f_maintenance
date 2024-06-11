<div style="width: 100%;" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>MEAN TIME BETWEEN FAILURE ( MTBF ) </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">MEAN TIME BETWEEN FAILURE ( MTBF ) </li>
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
                                        <b>Doc. No. :QF/MT/8.5/17</b>
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
                                            <form action="<?php echo base_url('mtbf'); ?>" method="POST">
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
                                                <th>MACHINE CODE NO </th>
                                                <th>MACHINE Name </th>
                                                <th>MACHINE Number </th>
                                                <th>B/D HRS </th>
                                                <th>No OF FAILURE </th>
                                                <th>TOTAL AVAILABLE HRS : 624</th>
                                                <th>MTBF </th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $i = 1;
                                            $total_hours_bcount = 0;
                                            $total_faliure_count = 0;
                                            $total_mtfb = 0;;
                                            foreach ($machines as $p) {

                                                $data_check = array(
                                                    "created_year" => $year_id,
                                                    "crated_month" => $month_id,
                                                    "machine_id" => $p->id,
                                                );
                                                $breakdown_request_data = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
                                                $bd_hours = 0;
                                                $no_of_failures = 0;
                                                $ava_hours = 624;
                                                $mtbf = 0;

                                                if ($breakdown_request_data) {

                                                    foreach ($breakdown_request_data as $b) {

                                                        if ($b->status == "request_closed") {
                                                            $min = (float) substr($b->complete_time_maintaince, 15, 3);
                                                            $min = round($min, 2);
                                                            $hour = (float) substr($b->complete_time_maintaince, 6, 3);
                                                            $hour = round($hour, 2);
                                                            $days = (float) substr($b->complete_time_maintaince, 0, 2);
                                                            $total_hours = ($days * 24) + $hour + ($min / 60);
                                                            $total_hours = round($total_hours, 2);
                                                          


                                                            $bd_hours = $bd_hours + $total_hours;


                                                            // $bd_hours = (float)substr($b->complete_time_maintaince, 6, 3);
                                                            $no_of_failures++;
                                                        }
                                                    }



                                                    $total_hours_bcount =  $total_hours_bcount + $bd_hours;
                                                    $total_faliure_count =  $total_faliure_count + $no_of_failures;

                                                    if ($no_of_failures != 0) {
                                                        $mtbf = round(($ava_hours - $bd_hours) / $no_of_failures, 2);
                                                    }

                                                    $total_mtfb = $total_mtfb + $mtbf;




                                                    if ($bd_hours != 0) {



                                            ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $p->code; ?></td>
                                                            <td><?php echo $p->asset_description; ?></td>
                                                            <td><?php echo $p->asset_number; ?></td>
                                                            <td><?php echo $bd_hours; ?></td>
                                                            <td><?php echo $no_of_failures; ?></td>
                                                            <td><?php echo $ava_hours; ?></td>
                                                            <td><?php echo $mtbf; ?></td>


                                                        </tr>

                                            <?php
                                                        $i++;
                                                    }
                                                }
                                            }
                                            // 


                                            ?>

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Total</th>
                                                <th colspan=""><?php echo $total_hours_bcount; ?></th>
                                                <th colspan=""><?php echo $total_faliure_count; ?></th>
                                                <th colspan=""><?php echo $total_faliure_count*624?></th>
                                                <!-- <th colspan=""> Month MTBF : <?php   echo round((($total_faliure_count*624)-$total_hours_bcount)/$total_faliure_count,2);
                                                ?> </th> -->
                                                <th colspan="">Avg : <?php echo round($total_mtfb / ($i - 1), 2); ?> </th>
                                            </tr>
                                        </tfoot>






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