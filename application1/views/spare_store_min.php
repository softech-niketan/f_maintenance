<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:96%">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Spare Safety Stock Status </h1>
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


                                <!-- Modal -->

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Spare Part Number</th>
                                                <th>Spare Description</th>
                                                <th>Safety Stock</th>
                                                <th>Actual Stock</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if ($item_master_list) {
                                                // $t  =   $this->db->item_master->distinct('spare_number');
                                                // print_r($t);
                                                foreach ($item_master_list as $u) 
                                                {
                                                    // $item_master  = $this->Crud_model->get_data_by_id('item_master',$u->spare_id,"id");

                                                    if($u->saftey_stock >= $u->store_stock )
                                                    {


                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $u->spare_number ?>
                                                        </td>
                                                        <td><?php echo $u->spare_description ?></td>
                                                        <td> <?php echo $u->saftey_stock ?></td>
                                                        <td> <?php echo $u->store_stock ?></td>


                                                    </tr>

                                            <?php   
                                            $i++;
                                                    }

                                                    
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Sr.no</th>
                                                <th>Spare Part Number</th>
                                                <th>Spare Description</th>
                                                <th>Safety Stock</th>
                                                <th>Actual Stock</th>
                                            </tr>
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