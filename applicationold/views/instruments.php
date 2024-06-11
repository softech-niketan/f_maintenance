<div style="width: 2500px;" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Instruments and Gauges</h1>
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
                              
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Add
                                </button>
                             
                                <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></label>
                                                </button>
                                            </div>
                                            <form action="<?php echo base_url('add_instruments') ?>" method="post">

                                            <div class="modal-body">
                                                    <div class="row">
                                                        <?php 
                                                        function gen_uid($l=3){
                                                            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
                                                        }
                                                        ?>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Asset Number<span class="text-danger">*</span></label>
                                                                    <input required type="text" name="asset_number" class="form-control"     placeholder="Enter Asset Number">
                                                                    <input required type="hidden" value="IG-<?php echo date("Y").date("m").date("d")."-".gen_uid();?>" name="unique_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Description<span class="text-danger">*</span></label>
                                                                    <input required type="text" name="asset_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Range/Resolution<span class="text-danger">*</span></label>
                                                                    <input required type="text" name="resolution" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Resolution">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Make<span class="text-danger">*</span></label>
                                                                    <input required type="text" name="make" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Make">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span></label>
                                                                    <input required type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Purchased Date<span class="text-danger">*</span></label>
                                                                    <input required type="month" name="purchased_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">% Depreciation <span class="text-danger">*</span></label>
                                                                    <input required type="number" step="0.001" name="depreciation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Current Depreciated Value <span class="text-danger">*</span></label>
                                                                    <input required type="text" name="current_value" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cureent Depreciated tvalue">

                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Frequency <span class="text-danger">*</span></label>
                                                                    <input required type="text" name="frequency" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Frequency">

                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Calibration Date <span class="text-danger">*</span></label>
                                                                    <input required type="date" name="calibration_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Calibration Due Days <span class="text-danger">*</span></label>
                                                                    <input required type="text" name="due_days" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Due Days">

                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-4">
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
                                                <th>Unique Number</th>
                                                <th>Asset Number</th>
                                                <th>Asset Description</th>
                                                <th>Range / Resolution</th>
                                                <th>Make</th>
                                                <th>Location</th>
                                                <th>Purchase Date</th>
                                                <th>% Depreciation</th>
                                                <th>Current Depreciated Value</th>
                                                <th>Frequency (Days)</th>
                                                <th>Laste Calibration Date</th>
                                                <th>Calibration Due Date</th>
                                                <th> Due Days</th>
                                                <th>Status</th>
                                                <th>Upload Certificate </th>
                                                <th>Remark</th>
                                                <th>MSA (R&R%) Value</th>
                                                <th>Upload MSA File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Unique Number</th>
                                                <th>Asset Number</th>
                                                <th>Asset Description</th>
                                                <th>Range / Resolution</th>
                                                <th>Make</th>
                                                <th>Location</th>
                                                <th>Purchase Date</th>
                                                <th>% Depreciation</th>
                                                <th>Current Depreciated Value</th>
                                                <th>Frequency (Days)</th>
                                                <th>Laste Calibration Date</th>
                                                <th>Calibration Due Date</th>
                                                <th> Due Days</th>
                                                <th>Status</th>
                                                <th>Upload Certificate </th>
                                                <th>Remark</th>
                                                <th>MSA (R&R%) Value</th>
                                                <th>Upload MSA File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            if($instruments_list)
                                            {
                                            foreach($instruments_list as $p)
                                            {
                                               
                                                $history_instruments_counts = $this->Crud_model->get_data_by_id_count_new('history_instruments', $p->id, 'instrument_id ');

                                                if($history_instruments_counts==0)
                                                {
                                                    
                                                    $frequency =  "Document Not Uploaded";
                                                    $calibration_date =  "";
                                                    $due_calibration_date =  "";
                                                    $count = array("","NA","NA");
                                                    $upload_certificate = "NA";

                                                }
                                                else
                                                {
                                                    $history_instruments = $this->Crud_model->get_data_by_id('history_instruments', $p->id, 'instrument_id ');
                                                    $frequency = $history_instruments[0]->frequency;
                                                    $calibration_date = $history_instruments[0]->calibration_date;
                                                    $due_calibration_date = $history_instruments[0]->due_calibration_date;
                                                    $upload_certificate = $history_instruments[0]->calibration_report;
                                                    $count = $this->Crud_model->days_count($due_calibration_date);

                                                }

                                                
                                                



                                                // print_r($count[0]);
                                                ?>
                                                <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $p->unique_number;?></td>
                                                <td><?php echo $p->asset_number;?></td>
                                                <td><?php echo $p->asset_description;?></td>
                                                <td><?php echo $p->resolution;?></td>
                                                <td><?php echo $p->make;?></td>
                                                <td><?php echo $p->location;?></td>
                                                <td><?php echo $p->purchased_date;?></td>
                                                <td><?php echo $p->depreciation;?></td>
                                                <td><?php echo $p->current_value;?></td>
                                                <td><?php echo $frequency;?></td>
                                                <td><?php echo $calibration_date;?></td>
                                                <td><?php echo $due_calibration_date;?></td>
                                                <td><?php echo $count[2];?></td>
                                                <td style="width: 100px;" class="<?php echo $count[0]?>"><?php echo $count[1]?></td>
                                                <td style="width: 150px;">
                                                   

                                                   

                                                    <button style="display: inline;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalupload<?php echo $i;?>">
                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                </button>

                                                <?php  if($upload_certificate != "NA")
                                                {?>

                                                <a href="<?php echo base_url('documents/').$upload_certificate?>" class="btn bg-success">
                                                            <i class="fa fa-download"  aria-hidden="true"></i>
                                                   
                                                    </a>
                                                    <?php }?>

<!-- Modal -->
<div class="modal fade" id="exampleModalupload<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></label>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                                                    
                <div class="form-group">
                <form action="<?php echo base_url('add_history_instrument')?>" method="POST"  enctype="multipart/form-data">
                            <label for="">Frequency Days <span class="text-danger">*</span></label></label>
                            <input required type="number" placeholder="Enter Frequency" value="<?php if($frequency== "Document Not Uploaded"){echo "";}else{ echo $frequency;}?>" name="frequncy_days" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $p->id;?>" name="instrument_id" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $p->unique_number;?>" name="unique_id" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $p->asset_number;?>" name="asset_number" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $calibration_date;?>" name="old_calibration_date" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $due_calibration_date;?>" name="old_calibration_due_date" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $count[2];?>" name="overdue" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $count[1];?>" name="overdue_color" class="form-control" id="">
                            <input type="hidden" placeholder="Enter Frequency" value="<?php echo $count[0];?>" name="overdue_bg" class="form-control" id="">

                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                            <label for=""> Calibration Date <span class="text-danger">*</span></label></label>
                            <input required type="date" max="<?php echo date('Y-m-d');?>" placeholder="Enter Calibration Date" name="new_calibration_date" class="form-control" id="">

                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                            <label for="">Upload File  <span class="text-danger">*</span></label></label>
                            <input required type="file" placeholder="Enter Frequency" name="upload_certificate" class="form-control" id="">

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
                                                <td><?php echo $p->remark;?></td>
                                                <td><?php echo $p->msa_value;?></td>
                                                <td style="width: 150px;">
                                                   

                                                   

                                                   <button style="display: inline;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#msa<?php echo $i;?>">
                                                   <i class="fa fa-upload" aria-hidden="true"></i>
                                               </button>

                                               <?php  if($p->msa_file)
                                               {?>

                                               <a class="btn bg-success" href="<?php echo base_url('documents/').$p->msa_file?>">
                                                           <i class="fa fa-download" aria-hidden="true"></i>
                                                  
                                                   </a>
                                                   <?php }?>

<!-- Modal -->
<div class="modal fade" id="msa<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Upload Certificate</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span></label>
       </button>
     </div>
     <div class="modal-body">
       <div class="row">
           <div class="col-lg-12">
                                                   
               <div class="form-group">
               <form action="<?php echo base_url('update_msa_instrument')?>" method="POST"  enctype="multipart/form-data">
                           <label for="">MSA Value <span class="text-danger">*</span></label></label>
                           <input type="text" placeholder="Enter MSA Value" name="msa_value" class="form-control" id="">
                           <input type="hidden" placeholder="Enter Frequency" value="<?php echo $p->id;?>" name="instrument_id" class="form-control" id="">
                           

               </div>
           </div>

           <div class="col-lg-12">
               <div class="form-group">
                           <label for="">Upload MSA File  <span class="text-danger">*</span></label></label>
                           <input type="file" placeholder="Enter Frequency" name="msa_file" class="form-control" id="">

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
                                               
                                                <td>
                                                    <!-- Button trigger modal -->
<a href="<?php echo base_url('show_history_instrument/').$p->id?>" class="btn btn-primary">
  History
</a>


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