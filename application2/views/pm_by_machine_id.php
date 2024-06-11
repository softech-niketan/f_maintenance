<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:96%">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PM Checklist</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active"> PM Checklist</li>
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
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label>Machine Number</label>
                                        <input type="text" name="" id="" value="<?php echo $utility[0]->AssetNumber ?>" readonly>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>Machine Description</label>

                                        <input type="text" name="" id="" value="<?php echo $utility[0]->AssetDescription ?>" readonly>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
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
                                                <form action="<?php echo base_url('add_pm_check_list') ?>" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">PM type id<span class="text-danger">*</span>
                                                                    <input required type="text" name="pm_type_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Parameter<span class="text-danger">*</span>
                                                                    <input required type="text" name="parameter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">specification type<span class="text-danger">*</span>
                                                                    <input required type="text" name="spec_type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Value">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Spec<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="spec" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">



                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Actual<span class="text-danger">*</span>
                                                                    <input required type="text" name="actual" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Operation name">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Attribute Result<span class="text-danger">*</span>
                                                                    <input required type="text" name="attribute_result" class="form-control" name="location" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Spec Remark<span class="text-danger">*</span>
                                                                    <input required type="text" name="spec_remark" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ownership">

                                                            </div>
                                                            <input type="text" name="machine_id" id="" value="<?php echo $utility[0]->AssetNumber ?>">
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
                                                <th>Sr.no</th>
                                                <th>Asset Number</th>
                                                <th>PM type ID</th>
                                                <th>Parameter</th>
                                                <th>Spec Type</th>
                                                <th>Spec</th>
                                                <th>Actual</th>
                                                <th>Attribute Result</th>
                                                <th>Spec Remark</th>
                                                <th>Action</th>

                                                <!-- <th>Add PM Checklist </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($machines_pm_checklist as $u) {
                                                // $op = $this->Crud_model->days_count($u->PMDate);
                                                // $test = $this->Crud_model->days_add($u->PMDate, $u->Frequency);
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $u->machine_id ?></td>
                                                    <td><?php echo $u->pm_type_id ?></td>
                                                    <td><?php echo $u->parameter ?></td>
                                                    <td><?php echo $u->spec_type ?></td>
                                                    <td><?php echo $u->spec ?></td>
                                                    <td><?php echo $u->actual ?></td>
                                                    <td><?php echo $u->attribute_result ?></td>
                                                    <td><?php echo $u->spec_remark ?></td>


                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $i; ?>">

                                                            <i class="fas fa-edit"></i> </button>
                                                        <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#exampleModal2<?php echo $i; ?>">

                                                            <i class="far fa-trash-alt"></i> </button>
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
                                                                        <form action="<?php echo base_url('update_pm_check_list') ?>" method="post">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">PM type id<span class="text-danger">*</span>
                                                                                            <input required type="text" name="pm_type_id" class="form-control" value="<?php echo $u->pm_type_id ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Parameter<span class="text-danger">*</span>
                                                                                            <input required type="text" value="<?php echo $u->parameter ?>" name="parameter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">specification type<span class="text-danger">*</span>
                                                                                            <input required type="text" value="<?php echo $u->spec_type ?>" name="spec_type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Value">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Spec<span class="text-danger">*</span>
                                                                                            <input required type="text" value="<?php echo $u->spec ?>" class="form-control" name="spec" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-lg-6">



                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Actual<span class="text-danger">*</span>
                                                                                            <input required value="<?php echo $u->actual ?>" type="text" name="actual" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Operation name">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Attribute Result<span class="text-danger">*</span>
                                                                                            <input required type="text" value="<?php echo $u->attribute_result ?>" name="attribute_result" class="form-control" name="location" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Spec Remark<span class="text-danger">*</span>
                                                                                            <input required type="text" value="<?php echo $u->spec_remark ?>" name="spec_remark" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ownership">

                                                                                    </div>
                                                                                    <input type="text" name="machine_id" id="" value="<?php echo $utility[0]->AssetNumber ?>">
                                                                                    <input type="text" name="id" id="" value="<?php echo $u->id; ?>">
                                                                                </div>




                                                                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                                                            </div>
                                                                            <div class="modal-footer ">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary ">Update</button>
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
                                                                            <input value="machines_pm_checklist" name="table_name" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
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