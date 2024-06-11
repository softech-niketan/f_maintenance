<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:96%">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Machine</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Machine</li>
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
                                                <form action="<?php echo base_url('add_machine') ?>" method="post">
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
                                                                <label for="exampleInputEmail1">Current Value<span class="text-danger">*</span>
                                                                    <input required type="text" name="currentvalue" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Value">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">% Depreciation<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="depreciation" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputEmail1">Operation name<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Operation name">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="location" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputEmail1">Ownership<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ownership">

                                                            </div> -->
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Frequency(days)<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="frequency" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Frequency(days)">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">PM Date<span class="text-danger">*</span>
                                                                    <input required type="text" class="form-control" name="pmdate" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter PM Date">

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

                                                <th>Add PM Checklist </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($pmcheck_list as $u) {
                                                $op = $this->Crud_model->days_count($u->PMDate);
                                                $test = $this->Crud_model->days_add($u->PMDate, $u->Frequency);
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $u->AssetNumber ?>
                                                    </td>
                                                    <td><?php echo $u->AssetDescription ?></td>


                                                    <td>
                                                        <a href="<?php echo base_url('pm_by_machine_id/') . $u->AssetNumber; ?>" class="btn btn-sm btn-primary ml-2">

                                                            <i class="fas fa-eye"></i> </a>
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