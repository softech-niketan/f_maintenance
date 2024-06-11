<div style="width:2200px" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Machines</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Machines</li>
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

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Add
                                </button>

                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></label>
                                                </button>
                                            </div>
                                            <form action="<?php echo base_url('add_machines') ?>" method="post" enctype="multipart/form-data">

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <?php
                                                        function gen_uid($l = 3)
                                                        {
                                                            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
                                                        }
                                                        ?>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for=""> Asset Number<span class="text-danger">*</span></label>
                                                                <input required type="text" name="asset_number" class="form-control" placeholder="  Asset Number">
                                                                <input required type="hidden" value="IG-<?php echo date("Y") . date("m") . date("d") . "-" . gen_uid(); ?>" name="unique_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for=""> Machine Code<span class="text-danger">*</span></label>
                                                                <input required type="text" name="code" class="form-control" placeholder="Enter Machine Code ">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Description<span class="text-danger">*</span></label>
                                                                <input required type="text" name="asset_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Make<span class="text-danger">*</span></label>
                                                                <input required type="text" name="make" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Make">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span></label>
                                                                <input required type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Purchased Date<span class="text-danger">*</span></label>
                                                                <input required type="month" name="purchased_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">% Depreciation <span class="text-danger">*</span></label>
                                                                <input required type="number" step="0.001" name="depreciation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Current Depreciated Value <span class="text-danger">*</span></label>
                                                                <input required type="number" step="0.0001" name="current_value" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Depreciated Value">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Guideline Document </label>
                                                                <input type="file" name="document_guide" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Depreciated Value">

                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Frequency <span class="text-danger">*</span></label>
                                                                    <input required type="text" name="frequency" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Frequency">

                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Calibration Date <span class="text-danger">*</span></label>
                                                                    <input required type="date" name="calibration_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Calibration Due Days <span class="text-danger">*</span></label>
                                                                    <input required type="text" name="due_days" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Due Days">

                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Remark </label>
                                                                <input type="text" name="remark" class="form-control" id="remark" aria-describedby="emailHelp" placeholder="Enter Due Days">

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
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Unique Number</th>
                                        <th>Asset Number</th>
                                        <th>Asset Description</th>
                                        <th>Machine Code</th>
                                        <th>Make</th>
                                        <th>Location</th>
                                        <th>Purchase Date</th>
                                        <th>% Depreciation</th>
                                        <th>Current Depreciated Value</th>
                                        <th>Status</th>
                                        <!-- <th>Upload PM Report</th> -->
                                        <th>Assign PM Group</th>
                                        <th>Remark</th>
                                        <th>Guided Document</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Unique Number</th>
                                        <th>Asset Number</th>
                                        <th>Asset Description</th>
                                        <th>Machine Code</th>
                                        <th>Make</th>
                                        <th>Location</th>
                                        <th>Purchase Date</th>
                                        <th>% Depreciation</th>
                                        <th>Current Depreciated Value</th>
                                        <th>Status</th>
                                        <!-- <th>Upload PM Report</th> -->
                                        <th>Assign PM Group</th>
                                        <th>Remark</th>
                                        <th>Guided Document</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($machines) {
                                        foreach ($machines as $p) {


                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $p->unique_number; ?></td>
                                                <td><?php echo $p->asset_number; ?></td>
                                                <td><?php echo $p->asset_description; ?></td>
                                                <td><?php echo $p->code; ?></td>
                                                <!-- <td><?php echo $p->resolution; ?></td> -->
                                                <td><?php echo $p->make; ?></td>
                                                <td><?php echo $p->location; ?></td>
                                                <td><?php echo $p->purchased_date; ?></td>
                                                <td><?php echo $p->depreciation; ?></td>
                                                <td><?php echo $p->current_value; ?></td>
                                                <td>Stats</td>
                                                <!-- <td>
                                                    <a class="btn btn-primary" href="<?php echo base_url('asset_machine_pm/') . $p->id ?>">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                                    </a>
                                                </td> -->
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo base_url('assign_pm_group/') . $p->id ?>">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                                    </a>
                                                </td>



                                                <td><?php echo $p->remark; ?></td>

                                                <td>
                                                    <?php if ($p->document_guide) { ?>
                                                        <a download class="btn btn-success" href="<?php echo base_url('documents/') . $p->document_guide ?>">
                                                            Download

                                                        </a>
                                                    <?php
                                                    }

                                                    ?>

                                                    <br>
                                                    <br>
                                                    <br>

                                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalupdate<?Php echo $i; ?>">Upload</button>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalupdate<?Php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
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
                                                                            <div class="form-group">
                                                                                <form action="<?php echo base_url('update_machine') ?>" method="POST" enctype="multipart/form-data">

                                                                                    <label for="">Upload Guided Document <span class="text-danger">*</span></label>
                                                                                    <input type="file" required name="upload_certificate" class="form-control">
                                                                                    <input type="hidden" value="<?php echo $p->id ?>" required name="id" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    ?>


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