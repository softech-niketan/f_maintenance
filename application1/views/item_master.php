<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:96%">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Item Master</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Item Master</li>
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
                                <!-- <a download href="<?php echo base_url('Demo_Item_master.xlsx'); ?>" class="btn btn-danger ml-4">
                                    Download Format
                                </a> -->

                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#import">
                                    Import Item Master
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
                                                <form action="<?php echo base_url('import_item_master'); ?>" method="POST" enctype="multipart/form-data">

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
                                                <form action="<?php echo base_url('add_item_master') ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Spare Part Number<span class="text-danger">*</span></label>
                                                                <input required type="text" name="spare_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Spare Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Spare Description<span class="text-danger">*</span></label>
                                                                <input required type="text" name="spare_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Safety Stock<span class="text-danger">*</span></label>
                                                                <input required type="text" name="saftey_stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">UOM<span class="text-danger">*</span></label>
                                                                <select name="uom" class="form-control">
                                                                    <option value="numbers">numbers</option>
                                                                    <option value="kg">kg</option>
                                                                    <option value="meters">meters</option>
                                                                    <option value="liters">liters</option>
                                                                </select>

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
                                                <th>Spare Part Number</th>
                                                <th>Spare Description</th>
                                                <th>Details</th>

                                                <!-- <th>Safety Stock</th>
                                                <th>Created Date</th>

                                                <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Spare Part Number</th>
                                                <th>Spare Description</th>
                                                <th>Details</th>

                                                <!-- <th>UOM</th>

                                                <th>Safety Stock</th>

                                                <th>Created Date</th>

                                                <th>Action</th> -->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if ($item_master_list) {
                                                foreach ($item_master_list as $u) {


                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $u->spare_number ?>
                                                        </td>
                                                        <td><?php echo $u->spare_description ?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href=" <?php echo base_url('item_master_details/') . $u->id; ?>">View Details</a>
                                                        </td>
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