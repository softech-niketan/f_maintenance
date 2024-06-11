<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard Master</h1>
                    <!-- <a href="<?php echo base_url('export_promocode'); ?>" class="btn btn-primary text-white">
                 Export Promocode
                </a> -->
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div>
            <!-- Small boxes (Stat box) -->
            <div class="row">


                <br>
                <div class="col-lg-12">

                    <!-- Modal -->
                    <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add EPR Users</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <form action="<?php echo base_url('add_users') ?>" method="POST" enctype="multipart/form-data">

                                    </div>
                                    <div class="form-group">
                                        <label for="on click url">User Full Name<span class="text-danger">*</span></label> <br>
                                        <input required type="text" name="user_name" placeholder="Enter Full Name" class="form-control" value="" id="">


                                    </div>
                                    <div class="form-group">
                                        <label for="on click url">User Email<span class="text-danger">*</span></label> <br>
                                        <input required type="email" name="email" placeholder="Enter Email" class="form-control" value="" id="">


                                    </div>
                                    <div class="form-group">
                                        <label for="on click url">User Password<span class="text-danger">*</span></label> <br>
                                        <input required type="password" name="password" placeholder="Enter Password" class="form-control" value="" id="">


                                    </div>
                                    <div class="form-group">
                                        <label for="on click url">Select Role<span class="text-danger">*</span></label> <br>
                                        <select required name="user_role" class="form-control select2" id="">
                                            <option value="machine_shop_maintenance_admin">Machine Shop Maintenance Admin </option>
                                            <option value="maintenance_user">Maintenance User</option>
                                            <option value="machine_shop_production_admin">Machine shop Production Admin</option>
                                            <option value="production_user">Production user</option>
                                            <option value="stores_user">Stores user</option>
                                            <option value="admin">Admin</option>

                                        </select>


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
                    <div class="card">

                        <div class="card-header">
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromo">
                                Add Users
                            </button> -->
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Current Value</th>
                                        <th>Target Value</th>
                                        <th>Percent Value</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if ($dashboard_master) {
                                        $i = 1;
                                        foreach ($dashboard_master as $u) {
                                            //$product_into = $this->Ojwebsitemodel->get_product_info_new($u->product_id);

                                    ?>


                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $u->name ?></td>
                                                <td><?php echo $u->current ?></td>
                                                <td><?php echo $u->max ?></td>
                                                <td><?php echo $u->percentage ?></td>

                                                <td>
                                                    <button style="display: inline;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaluploadsd<?php echo $i; ?>">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </button>



                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModaluploadsd<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                <form action="<?php echo base_url('update_dashboard') ?>" method="POST" enctype="multipart/form-data">

                                                                                    <div class="form-group">
                                                                                        <label for="">Current Value<span class="text-danger">*</span> </label>
                                                                                        <input class="form-control" type="number" step="any" name="current" value="<?php echo $u->current ?>">
                                                                                        <input class="form-control" type="hidden" step="any" name="id" value="<?php echo $u->id ?>">
                                                                                    </div>


                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">

                                                                                <div class="form-group">
                                                                                    <label for="">Target Value<span class="text-danger">*</span> </label>
                                                                                    <input class="form-control" type="number" step="any" name="target" value="<?php echo $u->max ?>">
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
                                            $i++;
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- ./col -->
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>