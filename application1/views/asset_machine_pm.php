<div style="" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Asset Machine PM Type</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('')?>">Home</a></li>
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
                             
                                <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></label>
                                                </button>
                                            </div>
                                            <form action="<?php echo base_url('add_machine_pm_type') ?>" method="post">

                                            <div class="modal-body">
                                                    <div class="row">
                                                        <?php 
                                                        function gen_uid($l=3){
                                                            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
                                                        }
                                                        ?>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="">PM Type/Periodic Critical check<span class="text-danger">*</span></label>
                                                                    <input required type="text" name="pm_type" class="form-control"     placeholder="Enter PM Type/Periodic Critical check ">
                                                                    <input required type="hidden" name="machine_id" value="<?php echo $this->uri->segment('2');?>" class="form-control"     placeholder="Enter Asset Number">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Frequency (Days)<span class="text-danger">*</span></label>
                                                                    <input required type="text" name="frequency" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">PM Date<span class="text-danger">*</span></label>
                                                                    <input required type="date" name="pm_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Resolution">

                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Remark </label>
                                                                    <input  type="text" name="remark" class="form-control" id="remark" aria-describedby="emailHelp" placeholder="Enter Due Days">

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
                                                <th>PM Type/Periodic Critical check</th>
                                                <th>Frequency (Days)</th>
                                                <th>Last PM Date</th>
                                                <th>PM Due Date</th>
                                                <th>Due Days</th>
                                                <th>Status</th>
                                            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Sr.no</th>
                                                <th>PM Type/Periodic Critical check</th>
                                                <th>Frequency (Days)</th>
                                                <th>Last PM Date</th>
                                                <th>PM Due Date</th>
                                                <th>Due Days</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            if($asset_machine_pm)
                                            {
                                            foreach($asset_machine_pm as $p)
                                            {
                                                $count = $this->Crud_model->days_count($p->pm_due_date);



                                                ?>
                                                <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $p->pm_type;?></td>
                                                <td><?php echo $p->frequency;?></td>
                                                <td><?php echo $p->pm_date;?></td>
                                                <td><?php echo $p->pm_due_date;?></td>
                                                <td><?php echo $count[2];?></td>
                                                <td style="width: 100px;" class="<?php echo $count[0]?>"><?php echo $count[1]?></td>
                                               
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