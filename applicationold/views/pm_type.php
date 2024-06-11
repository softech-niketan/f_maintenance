<div class="wrapper">
    <!-- Navbar -->


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PM type</h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">PM type</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>




        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                <!-- Button trigger modal -->
                                <?php
                                // print_r($assign_pm_group);
                                foreach ($assign_pm_group as $a) {
                                    $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $a->group_id, "id");
                                    //   print_r($check_list_groups);

                                    if ($check_list_groups[0]->pm_type == $pm_types) {

                                ?>

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <?php
                                                if ($user_role == "machine_shop_maintenance_admin" || $user_role == "maintenance_user" || $user_role == "admin") {
                                                    if ($pm_request) {
                                                        if (count($pm_request) > 0) {

                                                            $pm_history = $this->Crud_model->get_data_by_id('pm_history', $pm_request[0]->id, 'pm_id');
                                                            // print_r($pm_history);
                                                            if ($pm_history) {
                                                                $staus = $pm_history[0]->status;
                                                            } else {
                                                                $staus = $pm_request[0]->status;
                                                            }

                                                            if ($staus == "Request_Closed") {
                                                                if ($user_role == "machine_shop_maintenance_admin" || $user_role == "maintenance_user" || $user_role == "admin") {
                                                ?>
                                                                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">

                                                                        PM Request <?php echo $check_list_groups[0]->pm_type ?>
                                                                    </button>

                                                            <?php
                                                                }
                                                            } else {
                                                                echo "<div class='alert alert-default-info mt-4'>
                                                  Previus PM Request Not Closed
                                                  </div>";
                                                            }
                                                        } else {
                                                            ?>
                                                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">

                                                                PM Request <?php echo $check_list_groups[0]->pm_type ?>
                                                            </button>

                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">

                                                            PM Request <?php echo $check_list_groups[0]->pm_type ?>
                                                        </button>
                                                <?php




                                                    }
                                                }

                                                ?>





                                            </div>
                                            <div class="col-lg-2">
                                                <?php
                                                $machine_id =  $this->uri->segment('3');
                                                $machine_info = $this->Crud_model->get_data_by_id('machines', $machine_id, 'id');
                                                // print_r( $machine_info);

                                                ?>
                                                <label for="">Machine Name</label>
                                                <input type="text" readonly class="form-control" value=" <?php echo $machine_info[0]->asset_number; ?>" name="" id="">

                                            </div>
                                            <div class="col-lg-2">
                                                <label for="">Machine Code</label>
                                                <input type="text" readonly class="form-control" value=" <?php echo $machine_info[0]->code; ?>" name="" id="">

                                            </div>
                                            <div class="col-lg-2">
                                                <label for="">Machine Description</label>
                                                <input type="text" readonly class="form-control" value=" <?php echo $machine_info[0]->asset_description; ?>" name="" id="">

                                            </div>
                                        </div>




                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> PM Request <?php echo $check_list_groups[0]->pm_type ?> </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <!-- <div class="row"> -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <form action="<?php echo base_url('assign_pm') ?>" method="post">
                                                                        <label for="exampleInputEmail1">Assign Request To <span class="text-danger">*</span></label>
                                                                        <select required name="request_to" class="form-control" id="">
                                                                            <?php
                                                                            foreach ($user as $r) {
                                                                            ?>
                                                                                <option value="<?php echo $r->id; ?>"><?php echo $r->user_name; ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label for="">Group Name <span class="text-danger">*</span></label>
                                                                <input readonly required placeholder="" value="<?php echo $check_list_groups[0]->group_name; ?>" class="form-control" type="text" name="pm_date" id="">
                                                                <input readonly required placeholder="" value="<?php echo $check_list_groups[0]->id; ?>" class="form-control" type="hidden" name="group_id" id="">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label for="">Group Frequncy <span class="text-danger">*</span></label>
                                                                <input readonly required placeholder="" value="<?php echo $check_list_groups[0]->pm_type; ?>" class="form-control" type="text" name="pm_frequency" id="">
                                                                <input readonly required placeholder="" value="<?php echo $machine_id; ?>" class="form-control" type="hidden" name="machine_id" id="">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label for="">PM Due Date <span class="text-danger">*</span></label>
                                                                <input readonly required placeholder="" value="<?php echo $a->last_due_date ?>" class="form-control" type="text" name="pm_date" id="">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label for="">Request Date <span class="text-danger">*</span></label>
                                                                <input required placeholder="" min="<?php echo date('Y-m-d'); ?>" class="form-control" type="date" name="pm_date" id="">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label for="">Request Time <span class="text-danger">*</span></label>
                                                                <input required placeholder="" class="form-control" type="time" name="pm_time" id="">
                                                            </div>



                                                        </div>
                                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <?php
                                                        // echo $a->last_pm_date;
                                                        // print_r($a->last_pm_date);
                                                        // $date1 = new DateTime($a->last_due_date);
                                                        // $date2 = new DateTime(date('Y-m-d'));
                                                        //  $final_date =  $date2->diff($date1)->days;

                                                        $date1 = new DateTime($a->last_due_date);
                                                        $date2 = new DateTime(date('Y-m-d'));

                                                        $date = date_create($a->last_due_date);
                                                        $current_date = date_create(date('Y-m-d'));


                                                        $diff = date_diff($current_date, $date);
                                                        $final_date = $diff->format("%r%a");
                                                        if ($final_date <= 45 || $final_date < 0) {


                                                        ?>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            <button type="submit" class="btn btn-primary ">Add</button>
                                                        <?php
                                                        } else {
                                                            $show_date = $final_date - 45;

                                                            echo "
                                                    <div style='width:100%;padding:20px;border:1px solid black;text-align:center' class='alert-warning'>
                                                    <h5> Request Can Be Raised After " . $show_date . " Days </h5>
                                                   </div>";
                                                        }

                                                        ?>

                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                        break;
                                    } else {
                                        // echo "No";
                                        // echo "<br>";

                                    }
                                }

                                ?>


                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Create PM Request
                                </button> -->

                                <!-- Modal -->

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Request Number</th>
                                            <th>Current Status</th>
                                            <th>Group Name</th>
                                            <th>PM Frequency</th>
                                            <th>PM Planned date</th>
                                            <th>PM Time</th>
                                            <th>PM Responsibility</th>
                                            <th>Initiated Date</th>
                                            <th>History</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Request Number</th>
                                            <th>Current Status</th>
                                            <th>Group Name</th>
                                            <th>PM Frequency</th>
                                            <th>PM Planned date</th>
                                            <th>PM Time</th>
                                            <th>PM Responsibility</th>

                                            <th>Initiated Date</th>
                                            <th>History</th>

                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        // print_r($pm_request);
                                        if ($pm_request) {
                                            $i = 1;
                                            foreach ($pm_request as $p) {
                                                $group_ids = $this->Crud_model->get_data_by_id("check_list_groups", $p->pm_group_id, "id");
                                                // print_r($group_ids);
                                                $request_from = $this->Crud_model->get_data_by_id("user", $p->request_from, "id");
                                                $request_to = $this->Crud_model->get_data_by_id("user", $p->request_to, "id");

                                                $pm_history = $this->Crud_model->get_data_by_id('pm_history', $p->id, 'pm_id');

                                                if ($pm_history) {
                                                    $staus = $pm_history[0]->status;
                                                } else {
                                                    $staus = $pm_request[0]->status;
                                                }


                                        ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $p->id ?></td>
                                                    <td><?php echo $staus ?></td>
                                                    <td><?php echo $group_ids[0]->group_name ?></td>
                                                    <td><?php echo $group_ids[0]->pm_type ?></td>
                                                    <td><?php echo $p->pm_date ?></td>
                                                    <td><?php echo $p->pm_time ?></td>
                                                    <td><?php echo $request_to[0]->user_name; ?></td>
                                                    <td><?php echo $p->created_date ?></td>
                                                    <td>
                                                        <a class="btn btn-primary" href="<?php echo base_url('history/pm_request/') . $p->id ?>">
                                                            History</a>
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