<div style="width: 2000px;" class="wrapper">
    <!-- Navbar -->


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Improvement Work Request</h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Improvement Work Request</li>
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
                                            <th>Actions</th>


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
                                                        <td><?php 
                                                        
                                                        $month2 = $this->Crud_model->return_number($p->id,$p->crated_month,$p->created_year,"improvement_request");

                                                        // print_r($month2);
                                                        echo "IR-".$month2;
                                                        ?></td>
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

                                                        <td>
                                                            <?php
                                                            if ($p->type_of_breakdown) {


                                                                // echo $p->type_of_breakdown;
                                                            } else {
                                                                if ($user_role == "admin" || $user_role == "machine_shop_maintenance_admin" || $user_role == "maintenance_user") {
                                                            ?>
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $i; ?>">
                                                                        Update Details
                                                                    </button>
                                                            <?php }
                                                            }


                                                            ?>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Change Status</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">

                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <form method="POST" action="<?php echo base_url('add_improvement_details') ?>" enctype="multipart/form-data">

                                                                                            <label for="">Upload Document <span class="text-danger">*</span></label>
                                                                                            <input type="file" class="form-control" name="breakdown_document" id="">
                                                                                            <input type="hidden" class="form-control" name="id" value="<?php echo $p->id ?>" id="">
                                                                                            <input type="hidden" class="form-control" name="status" value="completed" id="">
                                                                                            <input type="hidden" class="form-control" name="timestamp" value="<?php echo $p->timestamp ?>" id="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Note </label>
                                                                                        <textarea name="actions_taken" placeholder="Enter Note" class="form-control" id="" cols="30" rows="2"></textarea>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update Status</button>

                                                                        </div>
                                                                        </form>
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