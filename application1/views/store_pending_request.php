<div style="width:2000px" class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Store Pending Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Store Pending Reques</li>
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

                                Pending Request's

                                <!-- Modal -->

                                <!-- /.card-header -->
                                <div class="card-body">


                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Request Number</th>
                                                <th>Request Type</th>
                                                <th>Current Status</th>

                                                <th>Machine Code</th>
                                                <th>Asset Description</th>

                                                <th>PM Responsibility</th>
                                                <th>Initiated Date</th>
                                                <th>View Details </th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Request Number</th>
                                                <th>Request Type</th>
                                                <th>Current Status</th>

                                                <th>Machine Code</th>
                                                <th>Asset Description</th>

                                                <th>PM Responsibility</th>
                                                <th>Initiated Date</th>
                                                <th>View Details</th>

                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <?php

                                            if ($pending_request) {
                                                $i = 1;
                                                foreach ($pending_request as $p) {

                                                    // echo $s->tool_id;
                                                  
                                                        // $group_ids = $this->Crud_model->get_data_by_id("check_list_groups", $p->pm_request[0]->pm_group_id, "id");


                                                        if ($p->type == "breakdown") {
                                                            $status = "request_closed";
                                                            $br_request = $this->Crud_model->get_data_by_id("breakdown_request", $p->pm_id, "id");
                                                            $request_from = $this->Crud_model->get_data_by_id("user", $br_request[0]->request_from, "id");
                                                            $request_to = $this->Crud_model->get_data_by_id("user", $br_request[0]->request_to, "id");
                                                            $machines = $this->Crud_model->get_data_by_id("machines", $br_request[0]->machine_id, "id");
                                                            $check_status = $br_request[0]->status;

                                                        }
                                                        else
                                                        {
                                                            $status = "checksheet_completed";
                                                            $pm_request = $this->Crud_model->get_data_by_id("pm_request", $p->pm_id, "id");
                                                    
                                                            $request_from = $this->Crud_model->get_data_by_id("user", $pm_request[0]->request_from, "id");
                                                            $request_to = $this->Crud_model->get_data_by_id("user", $pm_request[0]->request_to, "id");
                                                            $machines = $this->Crud_model->get_data_by_id("machines", $pm_request[0]->machine_id, "id");
                                                            $check_status = $pm_request[0]->status;
    
                                                        }

                                                        if ($check_status!= $status) {


                                            ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php if ($p->type == "breakdown") {
                                                                        echo "BR-" . $p->pm_id;
                                                                    } else {
                                                                        echo  $p->pm_id;
                                                                    }
                                                                    ?></td>
                                                                <td><?php echo $p->type ?></td>
                                                                <td><?php echo $pm_request[0]->status ?></td>
                                                                <td><?php echo $machines[0]->code; ?></td>
                                                                <td><?php echo $machines[0]->asset_description; ?></td>

                                                                <td><?php  if(!empty($request_to)){echo $request_to[0]->user_name;}else{echo "breakdown";} ?></td>
                                                                <td><?php echo $pm_request[0]->created_date ?></td>

                                                                <td>
                                                                    <?php if ($p->type == "breakdown") {
                                                                    ?>
                                                                        <a class="btn btn-primary" href="<?php echo base_url('spare_parts/') . $p->pm_id . '/breakdown'; ?>">
                                                                            <i class="fas fa-cogs"></i>
                                                                        </a>

                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <a class="btn btn-primary" href="<?php echo base_url('spare_parts/') . $p->pm_id . '/pm_request'; ?>">
                                                                            <i class="fas fa-cogs"></i>
                                                                        </a>
                                                                    <?php
                                                                    }
                                                                    ?>


                                                                </td>


                                                            </tr>
                                            <?php
                                                        }
                                                    
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

    <script>
        // $.ajax({
        //     url:"<?php echo base_url(); ?>get_mhr",
        //     method:"POST",
        //     data:{mc_id:mc_id,customer_id:main_customer},
        //     success:function(data)
        //     {
        //       //  alert('started');

        //       console.log(data);

        //         const obj = JSON.parse(data);
        //       // alert(obj.count);
        //         if(obj.count === 0 )
        //         {
        //             // alert('Material Not Found !, Please Add This Material For External Customer and try it Again ');
        //             window.alert('MHR Not Found !, Please Add MHR Of This Blanking Machine For External Customer and try it Again');
        //             window.location.href='new_pending_rfq';


        //         }
        //         else
        //         {
        //           // window.alert('Present');
        //           // alert('present');
        //             // window.location.href='new_pending_rfq';


        //         }

        //     }
        // });
    </script>