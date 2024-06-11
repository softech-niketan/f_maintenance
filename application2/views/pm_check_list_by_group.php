<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>PM Check List For Group</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item "> <a href="<?php echo base_url('check_list_groups') ?>">Back</a> </li>
                            <li class="breadcrumb-item active">Check List Groups</li>
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
                                <!-- Button trigger modal -->
                                <?php
                                $group_id =  $this->uri->segment('2');

                                $check_list_groups = $this->Crud_model->get_data_by_id('check_list_groups', $group_id, 'id');
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
                                            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">
                                                Add
                                            </button>

                                        </div>
                                    </div>



                                <?php


                                }

                                ?>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form action="<?php echo base_url('add_pm_check_list_by_group') ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="">Particular <span class="text-danger">*</span> </label>
                                                                <input required placeholder="Enter Particular" type="text" class="form-control" name="particular" id="">
                                                                <input required placeholder="Enter Check list" type="hidden" value="<?php echo $this->uri->segment('2'); ?>" class="form-control" name="group_id" id="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Specification <span class="text-danger">*</span> </label>
                                                                <input required placeholder="Enter Specification" type="text" class="form-control" name="spec" id="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Type <span class="text-danger">*</span> </label>
                                                                <select name="type" required id="" class="form-control">
                                                                    <option value="PM">PM</option>
                                                                    <option value="CBM">CBM</option>
                                                                    <option value="TBM">TBM</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Upload File </label>
                                                                <input placeholder="Enter Particular" type="file" class="form-control" name="document" id="">
                                                            </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                                </form>
                                            </div>
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
                                            <th>Particular</th>
                                            <!-- <th>Actual</th> -->
                                            <th>Specification</th>
                                            <th>Document</th>
                                            <!-- <th>Remark</th>
                                             -->
                                            <th>Type</th>
                                            <th>Added Date</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <th>Sr.no</th>
                                        <th>Particular</th>
                                        <!-- <th>Actual</th> -->
                                        <th>Specification</th>
                                        <th>Document</th>
                                        <!-- <th>Remark</th>

                                             -->
                                        <th>Type</th>
                                        <th>Added Date</th>
                                        <th>Actions</th>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        if ($pm_check_list_by_group) {

                                            $i = 1;
                                            foreach ($pm_check_list_by_group as $c) {

                                        ?>
                                                <tr>
                                                    <td> <?php echo $i; ?></td>
                                                    <td> <?php echo $c->particular; ?></td>
                                                    <td> <?php echo $c->spec; ?></td>
                                                    <td> <?php if ($c->document) {
                                                            ?>
                                                            <a class="btn btn-primary" href="<?php echo base_url('documents/') . $c->document ?>">Download</a>
                                                        <?php
                                                            } else {
                                                                echo "Not Uploaded";
                                                            } ?>
                                                    </td>
                                                    <td> <?php echo $c->type; ?></td>
                                                    <td> <?php echo $c->created_date; ?></td>


                                                    <td>




                                                        <button style="display: inline;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalupload<?php echo $i; ?>">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </button>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalupload<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                <form action="<?php echo base_url('update_pm_check_list_by_group') ?>" method="POST" enctype="multipart/form-data">
                                                                                    <div class="form-group">
                                                                                        <label for="">Particular <span class="text-danger">*</span> </label>
                                                                                        <input required placeholder="Enter Check list" type="text" value="<?php echo $c->particular ?>" class="form-control" name="particular" id="">
                                                                                        <input required placeholder="Enter Check list" type="hidden" value="<?php echo $c->id ?>" class="form-control" name="id" id="">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="">Specification <span class="text-danger">*</span> </label>
                                                                                        <input required placeholder="Enter Specification" value="<?php echo $c->spec ?>" type="text" class="form-control" name="spec" id="">
                                                                                        <input required placeholder="Enter Specification" value="<?php echo $c->document ?>" type="hidden" class="form-control" name="old_photo" id="">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Type <span class="text-danger">*</span> </label>
                                                                                        <select name="type" required id="" class="form-control">
                                                                                            <option value="PM">PM</option>
                                                                                            <option value="CBM">CBM</option>
                                                                                            <option value="TBM">TBM</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Upload File </label>
                                                                                        <input placeholder="Enter Particular" type="file" class="form-control" name="document" id="">
                                                                                    </div>


                                                                                    <!-- <div class="col-lg-12">
                                                                                            <div class="form-group">
                                                                                                    <label for="">Actual<span class="text-danger">*</span> </label>
                                                                                                    <input required placeholder="Enter Actual" type="text"  class="form-control" value="<?php echo $c->actual ?>" name="actual" id="">
                                                                                            </div>
                                                                                        </div> -->


                                                                                    <!-- <div class="col-lg-12">
                                                                                            <div class="form-group">
                                                                                                    <label for="">Specification<span class="text-danger">*</span> </label>
                                                                                                    <input required placeholder="Enter Specification" type="text"  class="form-control" name="spec" value="<?php echo $c->spec ?>" id="">
                                                                                            </div>
                                                                                        </div> -->

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