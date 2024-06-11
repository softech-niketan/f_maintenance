<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:2500px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dies and Core Boxes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dies and Core Boxes</li>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('add_dies') ?>" method="post">
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
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tool type(Die/Core Box)<span class="text-danger">*</span>
                                                                    <input required type="text" name="tooltype" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Operation name">

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-4">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Current Value<span class="text-danger">*</span>
                                                                    <input required type="text" name="currentvalue" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Value">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">% Depreciation<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="depreciation" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="location" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Ownership<span class="text-danger">*</span>
                                                                    <input required type="text" name="ownership" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ownership">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Frequency(days)<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="frequency" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Frequency(days)">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Inspection Date<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="inspectiondate" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter PM Date">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Customer Name<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="customername" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Remark<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="remark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

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
                                                <th>Tool type(Die/Core Box)</th>
                                                <th>Purchased Date</th>
                                                <th>% Depreciation</th>
                                                <th>Current Value</th>
                                                <th>Ownership</th>
                                                <th>Location</th>
                                                <th>Customer Name</th>
                                                <th>Frequency(days)</th>
                                                <th>Inspection Date</th>
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

                                            foreach ($dies_list as $d) {
                                                $op = $this->Crud_model->days_count($d->InspectionDate);


                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $d->AssetNumber ?></td>
                                                    <td> <?php echo $d->AssetDescription ?></td>
                                                    <td> <?php echo $d->ToolType ?></td>
                                                    <td> <?php echo $d->PurchasedDate ?></td>
                                                    <td> <?php echo $d->Depreciation ?></td>
                                                    <td> <?php echo $d->CurrentValue ?></td>
                                                    <td> <?php echo $d->Ownership ?></td>
                                                    <td> <?php echo $d->Location ?></td>
                                                    <td> <?php echo $d->CustomerName ?></td>
                                                    <td> <?php echo $d->Frequency ?></td>
                                                    <td> <?php echo $d->InspectionDate ?></td>
                                                    <td class="<?php echo $op[0]  ?>"><?php echo $op[1] ?></td>
                                                    <td> <?php echo $d->Remark ?></td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal13<?php echo $i; ?>">
                                                            <i class="fas fa-upload"></i>

                                                        </button>
                                                        <?php

                                                        if ($d->image_name == "") {
                                                        } else {
                                                        ?>
                                                            <a class="btn btn-primary" download href="<?php echo base_url('documents/') . $d->image_name ?>">
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
                                                                                <input type="hidden" name="table_name" value="dies1">
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

                                                        if ($d->model_image == "") {
                                                        } else {
                                                        ?>
                                                            <a class="btn btn-primary" download href="<?php echo base_url('documents/') . $d->model_image ?>">
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
                                                                                            <input required type="number" name="frequency" value="<?php echo $d->CustomerName ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Calibration Date<span class="text-danger">*</span>
                                                                                            <input required type="text" name="calibrationdate" value="<?php echo $d->CustomerName ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Upload File<span class="text-danger">*</span>
                                                                                            <input required type="file" name="cad_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                    </div>
                                                                                </div>




                                                                                <input type="hidden" name="id" value="<?php echo $i ?>">
                                                                                <input type="hidden" name="table_name" value="dies1">

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

                                                        if ($d->photo_name == "") {
                                                        } else {
                                                        ?>
                                                            <a class="btn btn-primary" download href="<?php echo base_url('documents/') . $d->photo_name ?>">
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
                                                                                <input type="hidden" name="table_name" value="dies1">
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
                                                    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $i; ?>">

                                                            <i class="fas fa-edit"></i> </button>
                                                        <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#exampleModal1">

                                                            <i class="far fa-trash-alt"></i> </button>
                                                        <button type="button" class="btn btn-sm btn-primary ml-2" data-toggle="modal" data-target="#exampleModal2">

                                                            <i class="fas fa-eye"></i> </button>
                                                        <div class="modal fade" id="exampleModal1<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('update_dies') ?>" method="post">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Asset Number<span class="text-danger">*</span>
                                                                                            <input required type="text" name="assetnumber" value="<?php echo $d->AssetNumber ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Asset Description<span class="text-danger">*</span>
                                                                                            <input required type="text" name="assetdesc" value="<?php echo $d->AssetDescription ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Purchased Date<span class="text-danger">*</span>
                                                                                            <input required type="text" name="purchased_date" value=" <?php echo $d->PurchasedDate ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Tool type(Die/Core Box)<span class="text-danger">*</span>
                                                                                            <input required type="text" name="tooltype" value="<?php echo $d->ToolType ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Operation name">

                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-lg-4">

                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Current Value<span class="text-danger">*</span>
                                                                                            <input required type="text" name="currentvalue" value="<?php echo $d->CurrentValue ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Value">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">% Depreciation<span class="text-danger">*</span>
                                                                                            <input required type="text" value="<?php echo $d->Depreciation ?>" class="form-control" name="depreciation" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Location<span class="text-danger">*</span>
                                                                                            <input required type="text" value="<?php echo $d->Location ?>" class="form-control" name="location" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Ownership<span class="text-danger">*</span>
                                                                                            <input required type="text" name="ownership" value="<?php echo $d->Ownership ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ownership">

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Frequency(days)<span class="text-danger">*</span>
                                                                                            <input required type="text" class="form-control" value="<?php echo $d->Frequency ?>" name="frequency" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Frequency(days)">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Inspection Date<span class="text-danger">*</span>
                                                                                            <input required type="text" class="form-control" value="<?php echo $d->InspectionDate ?>" name="inspectiondate" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter PM Date">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Customer Name<span class="text-danger">*</span>
                                                                                            <input required type="text" class="form-control" value="<?php echo $d->CustomerName ?>" name="customername" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Remark<span class="text-danger">*</span>
                                                                                            <input required type="text" class="form-control" value="<?php echo $d->Remark ?>" name="remark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

                                                                                    </div>
                                                                                    <input type="hidden" name="id" value="<?php echo $i ?>">"
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
                                                                            <input value="<?php echo $u->id; ?>" name="id" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                                                            <input value="dies1" name="table_name" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
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