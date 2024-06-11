<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Break-Down Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Break-Down Request</li>
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
                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                            
                                          Create  Break-Down Request
                                         </button> -->

                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Break-Down Request</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- <div class="row"> -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        Are You Sure Want To Create Break-Down Request For This Machine ?
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url('create_breakdown/') . $machine_id ?>" class="btn btn-danger">Create Breakdown Request</a>
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
                                        if ($breakdown_request) {
                                            $i = 1;
                                            foreach ($breakdown_request as $p) {
                                                // $group_ids = $this->Crud_model->get_data_by_id("check_list_groups", $p->pm_group_id, "id");
                                                // print_r($group_ids);
                                                $request_from = $this->Crud_model->get_data_by_id("user", $p->request_from, "id");
                                                $request_to = $this->Crud_model->get_data_by_id("user", $p->request_to, "id");

                                        ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $p->id ?></td>
                                                    <td><?php echo $p->status ?></td>
                                                    <td>
                                                        <?php if (empty($p->details)) {
                                                            echo "Details Not Added";
                                                        } else {
                                                            echo $p->details;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if (empty($p->pm_date)) {
                                                            echo "Details Not Added";
                                                        } else {
                                                            echo $p->pm_date;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if (empty($p->pm_time)) {
                                                            echo "Details Not Added";
                                                        } else {
                                                            echo $p->pm_time;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if (empty($p->user_name)) {
                                                            echo "Details Not Added";
                                                        } else {
                                                            echo $p->user_name;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $p->created_date ?></td>

                                                    <td>
                                                        <a class="btn btn-primary" href="#">
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