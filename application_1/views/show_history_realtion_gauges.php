<div  class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Relations Gauges History</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Instruments and Gauges</li>
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
                              
                               History
                            </div>
                              
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>Sr.no</th>
                                                <th>Unique Number</th>
                                                <th>Asset Number</th>
                                                <th>Old Start Date</th>
                                                <th>Old Due Date</th>
                                                <th>Upload Date</th>
                                                <th>Overdue</th>
                                                <th>Calibration Report</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Sr.no</th>
                                                <th>Unique Number</th>
                                                <th>Asset Number</th>
                                                <th>Old Start Date</th>
                                                <th>Old Due Date</th>
                                                <th>Upload Date</th>
                                                <th>Overdue</th>
                                                <th>Calibration Report</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach($history_instruments as $p)
                                            {
                                                $count = $this->Crud_model->days_count_diff_date($p->created_date,$p->old_calibration_due_date);
                                            
                                                // print_r($count);

                                                ?>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $p->unique_id;?></td>
                                                <td><?php echo $p->asset_number;?></td>
                                                <td><?php echo $p->old_calibration_date;?></td>
                                                <td><?php echo $p->old_calibration_due_date;?></td>
                                                <td><?php echo $p->created_date;?></td>
                                                <td class="<?php echo $count[0];?>"><?php echo $count[2];?></td>
                                                <td>
                                                    <a download class="btn btn-success" href="<?php echo base_url('documents/').$p->calibration_report;?>">
                                                    <i class="fa fa-download" aria-hidden="true"></i>

                                                </a>
                                                </td>
                                             
                                                <td style="width: 180px;">
                                                   

                                                   

                                                    <button style="display: inline;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalupload<?php echo $i;?>">
                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                </button>

                            

<!-- Modal -->
<div class="modal fade" id="exampleModalupload<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="form-group">
                <form action="<?php echo base_url('update_history_instrument')?>" method="POST"  enctype="multipart/form-data">

                            <label for="">Upload File  <span class="text-danger">*</span></label>
                            <input required type="file" placeholder="Enter Frequency" name="upload_certificate" class="form-control" id="">
                            <input required type="hidden" placeholder="Enter Frequency" value="<?php echo $p->id;?>" name="history_id" class="form-control" id="">

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
                                              
                                              


                                                </td>

                                                <?php

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