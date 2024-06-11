<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Predective Maintenance</h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Predective Maintenance</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                if ($user_role == "machine_shop_maintenance_admin" || $user_role == "admin") {
                                ?>
                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">

                                        Create Predective Maintenance Request
                                    </button>
                                <?php } ?>
                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Predective Maintenance</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- <div class="row"> -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <form action="<?php echo base_url('assign_predective') ?>" method="post">
                                                                <label for="exampleInputEmail1">Assign Request To <span class="text-danger">*</span></label>
                                                                <select required name="request_to" class="form-control select2" id="">
                                                                    <?php
                                                                    foreach ($user as $r) {
                                                                    ?>
                                                                        <option value="<?php echo $r->id; ?>"><?php echo $r->user_name; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="">Request Date <span class="text-danger">*</span></label>
                                                        <input min="<?php echo date('Y-m-d'); ?>" required placeholder="" class="form-control" type="date" name="pm_date" id="">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="">Request Time <span class="text-danger">*</span></label>
                                                        <input required placeholder="" class="form-control" type="time" name="pm_time" id="">
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <label for="">Predective Maintenance Details <span class="text-danger">*</span></label>
                                                        <textarea required name="details" class="form-control" placeholder="Enter Details Here" id="" cols="30" rows="5"></textarea>
                                                        <input readonly required placeholder="" value="<?php echo $machine_id; ?>" class="form-control" type="hidden" name="machine_id" id="">
                                                    </div>



                                                </div>
                                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary ">Add</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Request Number</th>
                                            <th>Current Status</th>
                                            <th>PM Details </th>
                                            <th>PM Date</th>
                                            <th>PM Time</th>
                                            <th>PM Responsibility</th>
                                            <th>Initiated Date</th>
                                            <th>History</th>


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Request Number</th>
                                            <th>Current Status</th>
                                            <th> Details </th>
                                            <th>PM Date</th>
                                            <th>PM Time</th>
                                            <th>PM Responsibility</th>
                                            <th>Initiated Date</th>
                                            <th>History</th>

                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        // print_r($pm_request);
                                        if ($predictive_request) {
                                            $i = 1;
                                            foreach ($predictive_request as $p) {
                                                // $group_ids = $this->Crud_model->get_data_by_id("check_list_groups", $p->pm_group_id, "id");
                                                // print_r($group_ids);
                                                $request_from = $this->Crud_model->get_data_by_id("user", $p->request_from, "id");
                                                $request_to = $this->Crud_model->get_data_by_id("user", $p->request_to, "id");

                                        ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $p->id ?></td>
                                                    <td><?php echo $p->status ?></td>
                                                    <td><?php echo $p->details ?></td>
                                                    <td><?php echo $p->pm_date ?></td>
                                                    <td><?php echo $p->pm_time ?></td>
                                                    <td><?php echo $request_to[0]->user_name ?></td>
                                                    <td><?php echo $p->created_date ?></td>

                                                    <td>
                                                        <a class="btn btn-primary" href="<?php echo base_url('history/predictive_request/') . $p->id ?>">
                                                            History</a>
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