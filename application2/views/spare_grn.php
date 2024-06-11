<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:96%">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>GRN Details </h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Spare Stock GRN </li>
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
                                <!-- <a download href="<?php echo base_url('Demo_GRN_master.xlsx'); ?>" class="btn btn-danger ml-4">
                                    Download Format
                                </a> -->

                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#import">
                                    Import GRN
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalLabel">Select File</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('import_grn_master'); ?>" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="">Upload Excel File <span class="text-danger">*</span></label>
                                                        <input required type="file" name="file" class="form-control">
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
                                                <form action="<?php echo base_url('add_spare_grn') ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputEmail1">Spare Number<span class="text-danger">*</span></label>
                                                                <input required type="text" name="spare_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Spare Number">

                                                            </div> -->
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputEmail1">Spare Description<span class="text-danger">*</span></label>
                                                                <input required type="text" name="spare_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Spare Part Number/Description</label>
                                                                <select class="form-control select2bs4" name="spare_id" style="width: 100%;" enctype="multipart/form-data">
                                                                    <?php
                                                                    foreach ($spare_dropdown as $sd) {
                                                                    ?>
                                                                        <option value="<?php echo $sd->id ?>"><?php echo $sd->spare_number . "-" . $sd->spare_description; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Number<span class="text-danger">*</span></label>
                                                                <input required type="text" name="grn_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Qty<span class="text-danger">*</span></label>
                                                                <input required type="text" name="grn_qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Part Price<span class="text-danger">*</span></label>
                                                                <input required type="text" name="grn_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Date<span class="text-danger">*</span></label>
                                                                <input required type="date" name="grn_date" max="<?php echo date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Document</label>
                                                                <input type="file" name="grn_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>



                                                        </div>

                                                    </div>
                                                    <div class=" modal-footer ">
                                                        <button type=" button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                <th>Spare Part Number</th>
                                                <th>Spare Description</th>
                                                <th>GRN Number</th>
                                                <th>GRN Qty</th>
                                                <th>GRN Date</th>
                                                <th>Part Price</th>
                                                <th>GRN Document</th>
                                                <th>GRN Created Date</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Spare Part Number</th>
                                                <th>Spare Description</th>
                                                <th>GRN Number</th>
                                                <th>GRN Qty</th>
                                                <th>GRN Date</th>
                                                <th>Part Price</th>
                                                <th>GRN Document</th>
                                                <th>GRN Created Date</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if ($spare_grn_list) {



                                                foreach ($spare_grn_list as $u) {

                                                    // $number = $this->Crud_model->get_data_by_id('item_master', $u->spare_id, 'id');

                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $u->spare_number ?></td>
                                                        <td><?php echo $u->spare_description ?></td>
                                                        <td><?php echo $u->grn_number ?></td>
                                                        <td><?php echo $u->grn_qty ?></td>
                                                        <td><?php echo $u->grn_date ?></td>
                                                        <td><?php echo $u->grn_price ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($u->grn_document) || $u->grn_document == NULL || $u->grn_document == "" || $u->grn_document == " ") {
                                                                echo "Not Uploaded";
                                                            } else {
                                                            ?>
                                                                <a download class="btn btn-success" href="<?php echo base_url('documents/') . $u->grn_document ?>">
                                                                    Download
                                                                </a>
                                                            <?php

                                                            }
                                                            ?>
                                                        </td>
                                                        <td>

                                                            <?php echo $u->created_date ?></td>




                                                    </tr>

                                            <?php
                                                    $i++;
                                                }
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