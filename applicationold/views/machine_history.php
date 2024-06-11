<div class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> MACHINE HISTORY CARD </h1>
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
                                        <b>Doc. No. :QF/MT/8.5/15</b>
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
                                            <form action="<?php echo base_url('machine_history'); ?>" method="POST">
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
                                        <div class="col-lg-3">
                                            <label for="">Select Machine Number - Code <span class="text-danger">*</span></label>
                                            <select required class="form-control select2" name="machine_id" id="">
                                                <?php
                                                foreach ($machines as $m) {
                                                ?>
                                                    <option <?php if ($m->id == $machine_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $m->id; ?>"><?php echo $m->asset_number . '  - ' . $m->code; ?></option>

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
                                            <th>Request ID</th>
                                            <th>Date (YEAR/MONTH)</th>
                                            <th>Maintance Date </th>
                                            <th>Type Of Maintance </th>
                                            <th>Spare History </th>
                                            <th>Maintance Cost</th>
                                            <th>Document</th>


                                        </tr>
                                    </thead>


                                    <?php
                                    $i = 1;
                                    if ($pm_request_data) {

                                    ?>
                                        <tbody>
                                            <?php


                                            foreach ($pm_request_data as $p) {



                                                $sum_main =  $this->Crud_model->query_sinegle("SELECT SUM(grn_1_actual_price) AS SUM1 , SUM(grn_2_actual_price) as SUM2  FROM spare_parts WHERE pm_id = $p->id AND type ='pm_request' ");

                                                $total_sum = $sum_main[0]->SUM1 + $sum_main[0]->SUM2;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('history/pm_request/') . $p->id ?>">
                                                            <?php echo $p->id; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $machines_data[0]->purchased_date; ?></td>
                                                    <td><?php echo $p->pm_date; ?></td>
                                                    <td>PM</td>
                                                    <td>
                                                        <a href="<?php echo base_url('spare_parts/') . $p->id . "/pm_request" ?>">
                                                            Spare Details <?php echo $p->id; ?>
                                                        </a>

                                                    </td>
                                                    <td><?php echo $total_sum; ?></td>
                                                    <td></td>
                                                </tr>



                                            <?php
                                                $i++;
                                            }

                                            ?>
                                        </tbody>

                                    <?php


                                    }

                                    ?>


                                    <tbody>
                                        <?php
                                        if ($breakdown_request_data) {
                                        ?>
                                            <?php


                                            foreach ($breakdown_request_data as $p) {

                                                $sum_main =  $this->Crud_model->query_sinegle("SELECT SUM(grn_1_actual_price) AS SUM1 , SUM(grn_2_actual_price) as SUM2  FROM spare_parts WHERE pm_id = $p->id  ");

                                                $total_sum = $sum_main[0]->SUM1 + $sum_main[0]->SUM2;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('breakdown_complete') ?>">
                                                            <?php echo $p->id; ?>
                                                        </a>

                                                    </td>

                                                    <td><?php echo $machines_data[0]->purchased_date; ?></td>
                                                    <td><?php echo $p->created_date; ?></td>
                                                    <td>BD</td>
                                                    <td>
                                                        <a href="<?php echo base_url('spare_parts/') . $p->id . "/breakdown" ?>">
                                                            Spare Details <?php echo $p->id; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $total_sum; ?></td>
                                                    <td></td>
                                                </tr>




                                        <?php
                                                $i++;
                                            }
                                        }

                                        ?>

                                    </tbody>
                                    <tbody>
                                        <?php
                                        if ($improvement_request_data) {
                                        ?>
                                            <?php


                                            foreach ($improvement_request_data as $p) {

                                                $sum_main =  $this->Crud_model->query_sinegle("SELECT SUM(grn_1_actual_price) AS SUM1 , SUM(grn_2_actual_price) as SUM2  FROM spare_parts WHERE pm_id = $p->id  ");

                                                $total_sum = $sum_main[0]->SUM1 + $sum_main[0]->SUM2;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('i_work_request_completed') ?>">
                                                            <?php echo $p->id; ?>
                                                        </a>

                                                    </td>

                                                    <td><?php echo $machines_data[0]->purchased_date; ?></td>
                                                    <td><?php echo $p->created_date; ?></td>
                                                    <td>Improvement Work</td>
                                                    <td>
                                                        <a href="<?php echo base_url('spare_parts/') . $p->id . "/improvement" ?>">
                                                            Spare Details <?php echo $p->id; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $total_sum; ?></td>
                                                    <td>

                                                        <a href="<?php echo base_url('documents/') . $p->breakdown_document ?>" class="btn btn-primary" download>Download</a>


                                                    </td>
                                                </tr>




                                        <?php
                                                $i++;
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