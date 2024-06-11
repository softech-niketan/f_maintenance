<div style="width:3000px" class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PM Request </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">PM Request</li>
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
                                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PM Request</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <form action="<?php echo base_url('add_group') ?>" method="post">

                                                                <label for="">Select Machine Name<span class="text-danger">*</span></label>
                                                                <select name="pm_type" class="form-control select2" required id="">
                                                                    <option value="1 Monthly">M-1 / Testing</option>
                                                                    <option value="1 Monthly">M-2 / Testing</option>
                                                                    <option value="1 Monthly">M-3 / Testing</option>
                                                                    <option value="1 Monthly">M-4 / Testing</option>
                                                                    <option value="1 Monthly">M-5 / Testing</option>

                                                                </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <form action="<?php echo base_url('add_group') ?>" method="post">

                                                                <label for="">Select PM Group <span class="text-danger">*</span></label>
                                                                <select name="pm_type" class="form-control select2" required id="">
                                                                    <option value="1 Monthly">Group 1 / Testing</option>
                                                                    <option value="1 Monthly">Group 2 / Testing</option>
                                                                    <option value="1 Monthly">Group 3 / Testing</option>
                                                                    <option value="1 Monthly">Group 4 / Testing</option>
                                                                    <option value="1 Monthly">Group 5 / Testing</option>

                                                                </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <form action="<?php echo base_url('add_group') ?>" method="post">

                                                                <label for="">Select User <span class="text-danger">*</span></label>
                                                                <select name="pm_type" class="form-control select2" required id="">
                                                                    <option value="1 Monthly">User 1 / Testing</option>
                                                                    <option value="1 Monthly">User 2 / Testing</option>
                                                                    <option value="1 Monthly">User 3 / Testing</option>
                                                                    <option value="1 Monthly">User 4 / Testing</option>
                                                                    <option value="1 Monthly">User 5 / Testing</option>

                                                                </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="">Select PM Date <span class="text-danger">*</span></label>
                                                            <input type="date" name="date" class="form-control" id="">

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="">Select PM Time <span class="text-danger">*</span></label>
                                                            <input type="time" name="time" class="form-control" id="">

                                                        </div>

                                                    </div>
                                                </div>







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
                                            <th>Sr.no</th>
                                            <th>Group Name</th>
                                            <th>PM Frequency</th>
                                            <th>Created Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Group Name</th>
                                            <th>PM Frequency</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>

                                    </tfoot>

                                    <tbody>
                                        <?php



                                        if ($pm_request) {
                                            $i = 1;

                                            foreach ($check_list_groups as $c) {

                                        ?>
                                                <tr>
                                                    <td> <?php echo $i; ?></td>
                                                    <td> <?php echo $c->group_name; ?></td>
                                                    <td> <?php echo $c->pm_type; ?></td>
                                                    <td> <?php echo $c->created_date; ?></td>


                                                    <td>

                                                        <a href="<?php echo base_url('pm_check_list_by_group/') . $c->id ?>" class="btn btn-primary">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>

                                                        </a>


                                                        <button style="display: inline;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaluploadsd<?php echo $i; ?>">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </button>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModaluploadsd<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Update Certificate</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">

                                                                                <div class="form-group">
                                                                                    <form action="<?php echo base_url('update_group_name') ?>" method="POST" enctype="multipart/form-data">
                                                                                        <label for="">Group Name <span class="text-danger">*</span></label>
                                                                                        <input required type="text" placeholder="Enter Frequency" value="<?php echo $c->group_name; ?>" name="group_name" class="form-control" id="">
                                                                                        <input required type="hidden" placeholder="Enter Frequency" value="<?php echo $c->id; ?>" name="id" class="form-control" id="">


                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">

                                                                                    <div class="form-group">
                                                                                        <label for="">Select PM Frequency <span class="text-danger">*</span> </label>
                                                                                        <select name="pm_type" class="form-control select2" required id="">
                                                                                            <option <?php if ($c->pm_type == "1 Monthly") {
                                                                                                        echo "selected";
                                                                                                    } ?> value="1 Monthly">1 Monthly</option>
                                                                                            <option <?php if ($c->pm_type == "3 Monthly") {
                                                                                                        echo "selected";
                                                                                                    } ?> value="3 Monthly">3 Monthly</option>
                                                                                            <option <?php if ($c->pm_type == "4 Monthly") {
                                                                                                        echo "selected";
                                                                                                    } ?> value="4 Monthly">4 Monthly</option>
                                                                                            <option <?php if ($c->pm_type == "6 Monthly") {
                                                                                                        echo "selected";
                                                                                                    } ?> value="6 Monthly">6 Monthly</option>
                                                                                            <option <?php if ($c->pm_type == "8 Monthly") {
                                                                                                        echo "selected";
                                                                                                    } ?>value="8 Monthly">8 Monthly</option>
                                                                                            <option <?php if ($c->pm_type == "9 Monthly") {
                                                                                                        echo "selected";
                                                                                                    } ?> value="9 Monthly">9 Monthly</option>
                                                                                            <option <?php if ($c->pm_type == "12 Monthly") {
                                                                                                        echo "selected";
                                                                                                    } ?>value="12 Monthly">12 Monthly</option>
                                                                                        </select>
                                                                                    </div>


                                                                                </div>
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
                                                $i = $i + 1;
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