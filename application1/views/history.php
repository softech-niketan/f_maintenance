<div style="width: 1750px;" class="wrapper">
    <!-- Navbar -->


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>History.</h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">History</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>




        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                <!-- Button trigger modal -->
                                History
                                <?php

                                // if($type == "predictive_request")
                                // {
                                //     echo "All Predictive Request";
                                // }
                                // else if($type == "pm_request")
                                // {
                                //     echo "All PM Request";

                                // }
                                // else if($type == "breakdown_request")
                                // {
                                //     echo "All Break-Down Request";

                                // }
                                // if ($history_data) {

                                // } else {
                                //     $status = $p->status;
                                // }

                                if ($history) {
                                    // if (count($history_data) >= 1) {
                                    $status = $history[0]->status;

                                    if ($status != "initiated") {
                                        if ($status != "Postpone") {
                                            if ($status != "Accept") {
                                                if ($user_role == "machine_shop_maintenance_admin" || $user_role == "admin"  || $user_role == "maintenance_user") {



                                ?>

                                                    <br>
                                                    <br>

                                                    <a href="<?php echo base_url('view_checkshit/') . $history[0]->pm_group_id . '/' . $pm_id; ?>" class="btn btn-success">View PM Checksheet</a>

                                <?php
                                                }
                                            }
                                        }
                                    }
                                } ?>



                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Previous Status</th>
                                            <th>Currnet Status</th>
                                            <th> PM Date</th>
                                            <th> PM Time</th>
                                            <th>Postpone Remark </th>
                                            <th>Final Feedback Remark </th>
                                            <th>Final Feedback Docuement</th>
                                            <th>Checksheet Document </th>
                                            <th>Status Update Date </th>
                                            <th>Status Update Time </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Previous Status</th>
                                            <th>Currnet Status</th>
                                            <th> PM Date</th>
                                            <th> PM Time</th>
                                            <th>Postpone Remark </th>
                                            <th>Final Feedback Remark </th>
                                            <th>Final Feedback Docuement</th>
                                            <th>Checksheet Document </th>
                                            <th>Status Update Date </th>
                                            <th>Status Update Time </th>
                                            <th>Actions</th>


                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        if ($history) {
                                            $i = 1;
                                            foreach ($history as $p) {



                                        ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $p->previous_status ?></td>
                                                    <td><?php echo $p->status ?></td>

                                                    <td><?php if (empty($p->new_pm_date)) {

                                                            echo "NA";
                                                        } else {
                                                            echo $p->new_pm_date;
                                                        } ?></td>
                                                    <td><?php if (empty($p->new_pm_time)) {

                                                            echo "NA";
                                                        } else {
                                                            echo $p->new_pm_time;
                                                        } ?></td>

                                                    <td><?php if (empty($p->postpone_feedback)) {

                                                            echo "NA";
                                                        } else {
                                                            echo $p->postpone_feedback;
                                                        } ?></td>

                                                    <td><?php if (empty($p->feedback)) {

                                                            echo "NA";
                                                        } else {
                                                            echo $p->feedback;
                                                        } ?>
                                                    </td>

                                                    <td>
                                                        <?php if (empty($p->feedback_document)) {

                                                            echo "NA";
                                                        } else {
                                                        ?>
                                                            <a download class="btn btn-success" href="<?php echo base_url('documents/') . $p->feedback_document ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php if (empty($p->checkshit_document)) {

                                                            echo "NA";
                                                        } else {
                                                        ?>
                                                            <a download class="btn btn-success" href="<?php echo base_url('documents/') . $p->checkshit_document ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>

                                                    </td>





                                                    <td><?php echo $p->created_date ?></td>
                                                    <td><?php echo $p->created_time ?></td>
                                                    <td></td>




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