<div style="width: 2000px;" class="wrapper">
    <!-- Navbar -->


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Improvement Work Request Completed</h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Improvement Work Request Completed</li>
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
                                Improvement Work Request

                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Request Number</th>
                                            <th>Current Status</th>
                                            <th>Machine Number</th>
                                            <th>Machine Code</th>
                                            <th>Machine Description</th>
                                            <th>Initiated Date</th>
                                            <th>Initiated Time</th>
                                            <th>Request Initiater</th>
                                            <th>Spare Parts Request</th>

                                            <th>Request Document</th>
                                            <!-- <th>Actions</th> -->


                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        // print_r($pm_request);
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
                                                        <td><?php echo $request_from[0]->user_name; ?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?php echo base_url('spare_parts/') . $p->id . '/improvement'; ?>">
                                                                <i class="fas fa-cogs"></i>
                                                            </a>





                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($p->breakdown_document) {
                                                            ?>
                                                                <a download href="<?Php echo base_url('documents/') . $p->breakdown_document ?>" class="btn btn-primary">Download</a>

                                                            <?php

                                                            } else {
                                                                echo "Not Uploaded";
                                                            }
                                                            ?>

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