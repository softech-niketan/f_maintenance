<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:1800px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Software</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Software</li>
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
                                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#exampleModal">
                                    Add
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('add_software') ?>" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Number<span class="text-danger">*</span>
                                                                    <input required type="text" name="assetnumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Description<span class="text-danger">*</span>
                                                                    <input required type="text" name="assetdesc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Purchased Date<span class="text-danger">*</span>
                                                                    <input required type="text" name="purchased_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                            </div>


                                                        </div>
                                                        <div class="col-lg-4">


                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">License Number<span class="text-danger">*</span>
                                                                    <input required type="text" name="license_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter License Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span>
                                                                    <input required type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Remark<span class="text-danger">*</span>
                                                                    <input required type="text" name="remark" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Make<span class="text-danger">*</span>
                                                                    <input required type="text" name="make" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Make">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">License Expiry (days)<span class="text-danger">*</span>
                                                                    <input required type="text" name="license_exp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter License Expiry (days)">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Renewal Date<span class="text-danger">*</span>
                                                                    <input required type="text" name="renew" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Renewal Date">

                                                            </div>

                                                        </div>

                                                        <!-- <div class="form-group">
    <label for="exampleInputPassword1">Password<span class="text-danger">*</span>
    <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->



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
                                                <th>Sr.no</th>
                                                <th>Asset Number</th>
                                                <th>Asset Description</th>
                                                <th>Purchased Date</th>
                                                <th>License Number</th>
                                                <!-- <th>Current Value</th> -->
                                                <th>Location</th>
                                                <th>Make</th>
                                                <th>License Expiry(days)</th>
                                                <th>Renewal Date</th>
                                                <th>Status</th>
                                                <th>Remark</th>
                                                <th>Inspection report</th>
                                                <th>Model</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $count = 0;
                                            foreach ($software_list as $s) {

                                                $op = $this->Crud_model->days_count($s->RenewalDate);


                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $s->AssetNumber ?>
                                                    </td>
                                                    <td><?php echo $s->AssetDescription ?></td>

                                                    <td> <?php echo $s->PurchasedDate ?></td>
                                                    <td> <?php echo $s->LicenseNumber ?></td>
                                                    <!-- <td> <?php echo $s->CurrentValue ?></td> -->
                                                    <td> <?php echo $s->Location ?></td>
                                                    <td> <?php echo $s->Make ?></td>
                                                    <td> <?php echo $s->LicenseExpiry ?></td>
                                                    <td> <?php echo $s->RenewalDate ?></td>
                                                    <td class="<?php echo $op[0]  ?>"><?php echo $op[1] ?></td>
                                                    <td> <?php echo $s->Remark ?></td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal13<?php echo $i; ?>">
                                                            <i class="fas fa-upload"></i>

                                                        </button>
                                                        <?php

                                                        if ($s->image_name == "") {
                                                        } else {
                                                        ?>
                                                            <a class="btn btn-primary" download href="<?php echo base_url('documents/') . $s->image_name ?>">
                                                                <i class="fas fa-download"></i>

                                                            </a>

                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal13<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Inspection Report</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('add_part') ?>" method="post" enctype='multipart/form-data'>

                                                                            <div class="text-center">
                                                                                <!-- <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Frequency Days<span class="text-danger">*</span>
                                                                                        <input required type="number" name="frequency" value="<?php echo $j->Frequency ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Calibration Date<span class="text-danger">*</span>
                                                                                        <input required type="text" name="calibrationdate" value="<?php echo $j->CalibrationDate ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">
                                                                                </div> -->

                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Upload File<span class="text-danger">*</span>
                                                                                        <input required type="file" name="cad_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                </div>
                                                                                <input type="hidden" name="id" value="<?php echo $i ?>">
                                                                                <input type="hidden" name="table_name" value="software">
                                                                                <input type="hidden" name="column_name" value="image_name">


                                                                            </div>



                                                                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                                                                            <div class="modal-footer ">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary ">save changes</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal12<?php echo $i; ?>">
                                                            <i class="fas fa-upload"></i>

                                                        </button>
                                                        <?php

                                                        if ($s->model_image == "") {
                                                        } else {
                                                        ?>
                                                            <a class="btn btn-primary" download href="<?php echo base_url('documents/') . $s->model_image ?>">
                                                                <i class="fas fa-download"></i>

                                                            </a>

                                                        <?php
                                                        }
                                                        ?>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal12<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('add_part') ?>" method="post" enctype='multipart/form-data'>

                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Frequency Days<span class="text-danger">*</span>
                                                                                            <input required type="number" name="frequency" value="<?php echo $s->CustomerName ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Calibration Date<span class="text-danger">*</span>
                                                                                            <input required type="text" name="calibrationdate" value="<?php echo $s->CustomerName ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Upload File<span class="text-danger">*</span>
                                                                                            <input required type="file" name="cad_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                    </div>
                                                                                </div>




                                                                                <input type="hidden" name="id" value="<?php echo $i ?>">
                                                                                <input type="hidden" name="table_name" value="software">

                                                                                <input type="hidden" name="column_name" value="model_image">



                                                                            </div>



                                                                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                                                                            <div class="modal-footer ">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary ">save changes</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal14<?php echo $i; ?>">
                                                            <i class="fas fa-upload"></i>

                                                        </button>
                                                        <?php

                                                        if ($s->photo_name == "") {
                                                        } else {
                                                        ?>
                                                            <a class="btn btn-primary" download href="<?php echo base_url('documents/') . $s->photo_name ?>">
                                                                <i class="fas fa-download"></i>

                                                            </a>

                                                        <?php
                                                        }
                                                        ?>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal14<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Photo</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('add_part') ?>" method="post" enctype='multipart/form-data'>

                                                                            <div class="text-center">
                                                                                <!-- <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Frequency Days<span class="text-danger">*</span>
                                                                                        <input required type="number" name="frequency" value="<?php echo $j->Frequency ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Calibration Date<span class="text-danger">*</span>
                                                                                        <input required type="text" name="calibrationdate" value="<?php echo $j->CalibrationDate ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">
                                                                                </div> -->

                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Upload File<span class="text-danger">*</span>
                                                                                        <input required type="file" name="cad_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                </div>
                                                                                <input type="hidden" name="id" value="<?php echo $i ?>">
                                                                                <input type="hidden" name="table_name" value="software">
                                                                                <input type="hidden" name="column_name" value="photo_name">


                                                                            </div>



                                                                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                                                                            <div class="modal-footer ">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary ">save changes</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <!-- <td>X</td> -->
                                                    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $i ?>">

                                                            <i class="fas fa-edit"></i> </button>
                                                        <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#exampleModal2<?php echo $i ?>">

                                                            <i class="far fa-trash-alt"></i> </button>
                                                        <button type="button" class="btn btn-sm btn-primary ml-2" data-toggle="modal" data-target="#exampleModal1<?php echo $i ?>">

                                                            <i class="fas fa-eye"></i> </button>


                                                        <div class="modal fade" id="exampleModal1<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('update_software') ?>" method="post">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Asset Number<span class="text-danger">*</span>
                                                                                            <input required type="text" name="assetnumber" class="form-control" id="exampleInputEmail1" value="<?php echo $s->AssetNumber ?>" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                    </div>
                                                                                    <input type="hidden" name="id" value="<?php echo $s->id ?>">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Asset Description<span class="text-danger">*</span>
                                                                                            <input required type="text" name="assetdesc" class="form-control" value="<?php echo $s->AssetDescription ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Purchased Date<span class="text-danger">*</span>
                                                                                            <input required type="text" name="purchased_date" class="form-control" value="<?php echo $s->PurchasedDate ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                                                    </div>


                                                                                </div>
                                                                                <div class="col-lg-4">


                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">License Number<span class="text-danger">*</span>
                                                                                            <input required type="text" name="license_no" class="form-control" value="<?php echo $s->LicenseNumber ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter License Number">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Location<span class="text-danger">*</span>
                                                                                            <input required type="text" name="location" class="form-control" value="<?php echo $s->Location ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Remark<span class="text-danger">*</span>
                                                                                            <input required type="text" name="remark" class="form-control" value="<?php echo $s->Remark ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Make<span class="text-danger">*</span>
                                                                                            <input required type="text" name="make" class="form-control" value="<?php echo $s->Make ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Make">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">License Expiry (days)<span class="text-danger">*</span>
                                                                                            <input required type="text" name="license_exp" class="form-control" value="<?php echo $s->LicenseExpiry ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter License Expiry (days)">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Renewal Date<span class="text-danger">*</span>
                                                                                            <input required type="text" name="renew" class="form-control" value="<?php echo $s->RenewalDate ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Renewal Date">

                                                                                    </div>

                                                                                </div>

                                                                                <!-- <div class="form-group">
    <label for="exampleInputPassword1">Password<span class="text-danger">*</span>
    <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->



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

                                                        <div class="modal fade" id="exampleModal2<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('delete') ?>" method="POST">
                                                                            <input value="<?php echo $s->id; ?>" name="id" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                                                            <input value="software" name="table_name" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                                                            Do you want to delete?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
                                            ?>
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
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