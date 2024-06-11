<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Checksheet </h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('pending/pm_request') ?>">Back</a></li>
                            <li class="breadcrumb-item active">View Check List </li>

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
                                <?php
                                $pm_id =  $this->uri->segment('3');

                                $pm_request = $this->Crud_model->get_data_by_id('pm_request', $pm_id, 'id');
                                //  $pm_request[0]->pm_group_id;
                                $status =   $pm_request[0]->checksheet_status;
                                $machines = $this->Crud_model->get_data_by_id('machines', $pm_request[0]->machine_id, 'id');
                                $check_list_groups = $this->Crud_model->get_data_by_id('check_list_groups', $pm_request[0]->pm_group_id, 'id');
                                if ($check_list_groups) {
                                    $group_name = $check_list_groups[0]->group_name;
                                    $pm_type = $check_list_groups[0]->pm_type;


                                ?>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label for="">Group Name <span class="text-danger">*</span> </label>
                                            <input style="background-color: #D3D3D3;" class="form-control" readonly type="text" value="<?php echo $group_name; ?>" name="" id="">
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="">PM Frequency <span class="text-danger">*</span> </label>
                                            <input style="background-color: #D3D3D3;" class="form-control" readonly type="text" value="<?php echo $pm_type; ?>" name="" id="">
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="">Machine Name <span class="text-danger">*</span> </label>
                                            <input style="background-color: #D3D3D3;" class="form-control" readonly type="text" value="<?php echo $machines[0]->asset_number; ?>" name="" id="">
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="">Machine Code <span class="text-danger">*</span> </label>
                                            <input style="background-color: #D3D3D3;" class="form-control" readonly type="text" value="<?php echo $machines[0]->code; ?>" name="" id="">
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="">Machine Description <span class="text-danger">*</span> </label>
                                            <input style="background-color: #D3D3D3;" class="form-control" readonly type="text" value="<?php echo $machines[0]->asset_description; ?>" name="" id="">
                                        </div>
                                        <div class="col-lg-2 ">
                                            <label for="">DOC. NO <span class="text-danger">*</span> </label>
                                            <input style="background-color: #D3D3D3;" class="form-control" readonly type="text" value="DOC. NO QF/MT/8.5/05" name="" id="">
                                        </div>


                                    </div>



                                <?php


                                }

                                ?>
                                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add
                                </button> -->


                                <!-- Modal -->

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Particular </th>
                                                <th>Type </th>

                                                <th>Actions Taken </th>

                                                <th>Rmarks After Completion </th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Particular </th>
                                                <th>Type </th>

                                                <th>Actions Taken </th>

                                                <th>Rmarks After Completion </th>
                                                <th>Actions</th>

                                            </tr>

                                        </tfoot>

                                        <tbody>
                                            <?php if ($pm_check_list_by_group) {
                                                $i = 1;
                                                $s = 1;
                                                foreach ($pm_check_list_by_group as $p) {
                                                    // echo $p->id;

                                                    $data_checksheet_data = array(
                                                        "checksheet_id" =>  $p->id,
                                                        "machine_id" => $machines[0]->id,
                                                        "pm_id" =>   $this->uri->segment('3'),
                                                    );

                                                    $checksheet_id = $this->Crud_model->get_data_by_id_multile("checksheet_data", $data_checksheet_data);

                                                    if ($checksheet_id) {
                                                        if (count($checksheet_id) > 0) {
                                                            $s++;
                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $i; ?>
                                                                </td>
                                                                <th>
                                                                    <?php echo $p->particular; ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo $p->type; ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo $checksheet_id[0]->observation; ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo $checksheet_id[0]->remark; ?>
                                                                </th>

                                                                <td>
                                                                    <?php
                                                                    if ($user_role == "machine_shop_maintenance_admin" || $user_role == "admin") {

                                                                    ?>
                                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
                                                                            Update
                                                                        </button>

                                                                    <?php } ?>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModal<?php echo $i; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12">
                                                                                            <form action="<?php echo base_url('update_checksheet') ?>" method="POST">
                                                                                                <label for="">Actions Taken <span class="text-danger">*</span></label>
                                                                                                <input type="text" class="form-control" required name="observation" value="<?php echo $checksheet_id[0]->observation; ?>" id="">
                                                                                                <input type="hidden" class="form-control" required name="id" value="<?php echo $checksheet_id[0]->id; ?>" id="">
                                                                                        </div>
                                                                                        <div class="col-lg-12">
                                                                                            <label for="">Rmarks After Completion <span class="text-danger">*</span></label>
                                                                                            <input type="text" class="form-control" required name="remark" value="<?php echo $checksheet_id[0]->remark; ?>" id="">
                                                                                        </div>

                                                                                    </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr>

                                                        <?php
                                                        }
                                                    } else {

                                                        ?>
                                                        <tr>
                                                            <form method="POST" action="<?php echo base_url('add_chcecksheet') ?>">

                                                                <td>
                                                                    <?php echo $i; ?>
                                                                </td>
                                                                <th>
                                                                    <?php echo $p->particular; ?>
                                                                </th>
                                                                <td>
                                                                    <input type="text" required class="form-control" placeholder="Enter Action Taken " name="observation">
                                                                    <input type="hidden" required value="<?php echo $this->uri->segment('3'); ?>" placeholder="Enter Observation " name="pm_id">
                                                                    <input type="hidden" required value="<?php echo $machines[0]->id; ?>" placeholder="Enter Observation " name="machine_id">
                                                                    <input type="hidden" required value="<?php echo $p->group_id ?>" placeholder="Enter Observation " name="group_id">
                                                                    <input type="hidden" required value="<?php echo $p->id ?>" placeholder="Enter Observation " name="checksheet_id">
                                                                    <input type="hidden" required value="<?php echo $p->particular ?>" placeholder="Enter Observation " name="particular">
                                                                </td>
                                                                <td>
                                                                    <input type="text" required class="form-control" placeholder="Enter Remark After Complition " name="remark">
                                                                </td>
                                                                <td>
                                                                    <button type="submit" class="btn btn-secondary">
                                                                        Add Checksheet
                                                                    </button>
                                                                </td>




                                                            </form>


                                                        </tr>


                                                <?php

                                                    }
                                                    $i++;
                                                }
                                                ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-center"> </th>
                                                <td>
                                                    <?php
                                                    if ($i == $s) {
                                                        if ($status != "completed") {


                                                    ?>
                                                            <a href="<?php echo base_url('change_status_pm_checksheet/') . $pm_id ?>" class="btn btn-primary">
                                                                Final Submit
                                                            </a>

                                                    <?php
                                                        } else {
                                                            echo "Request Already Submitted";
                                                        }
                                                    } else {
                                                        echo "
                <h5>Please Complete Checksheet To Submit</h5>
                ";
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        </tfoot>

                                    <?php
                                            } else {
                                                echo "Records Not Found";
                                            } ?>

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