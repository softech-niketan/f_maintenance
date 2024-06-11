<div style="width: 4000px;" class="wrapper">
    <!-- Navbar -->


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pending123 <?php
                                    if ($type == "pm_request") {
                                        echo "PM";
                                    } else {
                                        echo "Predictive";
                                    }
                                    ?> Request</h1>

                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Pending123 Request</li>
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
                                // if($type == "predictive_request")
                                // {
                                //     echo "All Predictive Request";
                                // }
                                // else if($type == "pm_request")
                                // {
                                //     echo "All PM Request";

                                // }
                                // else if($type == "breakdown_request")
                                // {
                                //     echo "All Break-Down Request";

                                // }
                                ?>



                            </div>
                            <div class="card-body">
                                <table id="example1abc" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Request Number</th>
                                            <th>Current Status</th>
                                            <th>Machine Number</th>
                                            <th>Machine Code</th>
                                            <th>Machine Description</th>
                                            <?php
                                            if ($type == "pm_request") {
                                            ?>
                                                <th>Group Name</th>
                                                <th>PM Frequency</th>
                                                <th>PM Checksheet</th>

                                            <?php

                                            } else {
                                            ?>
                                                <th>Details </th>


                                            <?php
                                            }

                                            ?>

                                            <th>PM Date</th>
                                            <th>PM Time</th>
                                            <th>PM Responsibility</th>
                                            <th>Initiated Date</th>
                                            <th>Spare Parts</th>
                                            <th>History</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Request Number</th>
                                            <th>Current Status</th>
                                            <th>Machine Number</th>
                                            <th>Machine Code</th>
                                            <th>Machine Description</th>
                                            <?php
                                            if ($type == "pm_request") {
                                            ?>
                                                <th>Group Name</th>
                                                <th>PM Frequency</th>
                                                <th>PM Checkshit</th>
                                            <?php

                                            } else {
                                            ?>
                                                <th>Details </th>


                                            <?php
                                            }

                                            ?>

                                            <th>PM Date</th>
                                            <th>PM Time</th>
                                            <th>PM Responsibility</th>
                                            <th>Initiated Date</th>
                                            <th>Spare Parts</th>
                                            <th>History</th>
                                            <th>Actions</th>

                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        // print_r($data1);
                                        if ($data1) {
                                            $i = 1;
                                            foreach ($data1 as $p) {
                                                // print_r($group_ids);
                                                $request_from = $this->Crud_model->get_data_by_id("user", $p->request_from, "id");
                                                $request_to = $this->Crud_model->get_data_by_id("user", $p->request_to, "id");
                                                $machines = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");








                                                if ($type == "pm_request") {
                                                    $table_name = "pm_history";

                                                    $data_check_pm_history = array(
                                                        "pm_id" => $p->id,
                                                        "status" => "Postpone"
                                                    );
                                                    $new_data_check_pm_history = $this->Crud_model->get_data_by_id_multile("pm_history", $data_check_pm_history);
                                                    if ($new_data_check_pm_history) {
                                                        if (count($new_data_check_pm_history) > 0) {
                                                            $pm_date = $new_data_check_pm_history[0]->new_pm_date;
                                                            $pm_time = $new_data_check_pm_history[0]->new_pm_time;
                                                        } else {
                                                            $pm_date = $p->pm_date;
                                                            $pm_time = $p->pm_time;
                                                        }
                                                        $created_month = $new_data_check_pm_history[0]->created_month;
                                                    } else {
                                                        $pm_date = $p->pm_date;
                                                        $pm_time = $p->pm_time;
                                                        $table_name = "pm_history";
                                                    }
                                                } else if ($type == "predictive_request") {
                                                    $table_name = "pm_history";
                                                    $pm_date = $p->pm_date;
                                                    $pm_time = $p->pm_time;
                                                    $table_name = "predective_history";
                                                } else {
                                                    $table_name = "breakdown_history";
                                                }
                                                $history_data = $this->Crud_model->get_data_by_id($table_name, $p->id, "pm_id");
                                                //    print_r($history_data);
                                                if ($history_data) {
                                                    if (count($history_data) >= 1) {
                                                        $status = $history_data[0]->status;
                                                    } else {
                                                        $status = $p->status;
                                                    }
                                                    $created_month = $history_data[0]->created_month;

                                                } else {
                                                    $status = $p->status;
                                                    $created_month = 01;

                                                }



                                                if ($status != "Request_Closed") {



                                        ?>

                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php
                                                            if ($type == "pm_request") {
                                                                $month2 = $this->Crud_model->return_number($p->id,$p->crated_month,$p->created_year,"pm_request");

                                                                echo  "PM-" . $month2;
                                                            } else {
                                                                $month3 = $this->Crud_model->return_number($p->id,$p->crated_month,$p->created_year,"predictive_request");

                                                                echo  "PR-" . $month3;
                                                            }
                                                            ?></td>
                                                        <td><?php echo $status ?></td>
                                                        <td><?php echo $machines[0]->asset_number; ?></td>
                                                        <td><?php echo $machines[0]->code; ?></td>
                                                        <td><?php echo $machines[0]->asset_description; ?></td>
                                                        <?php
                                                        if ($type == "pm_request") {
                                                            $group_ids = $this->Crud_model->get_data_by_id("check_list_groups", $p->pm_group_id, "id");

                                                        ?>
                                                            <td><?php echo $group_ids[0]->group_name ?></td>
                                                            <td><?php echo $group_ids[0]->pm_type ?></td>
                                                            <td>

                                                                <?php
                                                                if ($status != "initiated") {
                                                                    if ($status != "Postpone") {
                                                                        if ($status != "Accept") {
                                                                            if ($user_role == "machine_shop_maintenance_admin" || $user_role == "admin"  || $user_role == "maintenance_user") {

                                                                ?>
                                                                                <a class="btn btn-primary" href="<?php echo base_url('view_checkshit/') . $p->pm_group_id . '/' . $p->id ?>"> <i class="fas fa-eye"></i></a>
                                                            </td>
                                                        <?php

                                                                            } ?>
                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                            ?>
                                            <td><?php echo $p->details ?></td>


                                        <?php
                                                            }

                                        ?>

                                        <td><?php echo $pm_date ?></td>
                                        <td><?php echo $pm_time ?></td>
                                        <td><?php echo $request_to[0]->user_name; ?></td>
                                        <td><?php echo $p->created_date ?></td>
                                        <td>
                                            <?php
                                                    if ($user_role == "machine_shop_maintenance_admin" || $user_role == "admin"  || $user_role == "maintenance_user") {

                                            ?>
                                                <a class="btn btn-primary" href="<?php echo base_url('spare_parts/') . $p->id . '/' . $type; ?>">
                                                    <i class="fas fa-cogs"></i>
                                                <?php
                                                    }

                                                ?>
                                                </a>
                                                <?php
                                                    // }
                                                ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="<?php echo base_url('history/') . $type . '/' . $p->id; ?>">
                                                History</a>
                                        </td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $i; ?>">
                                                Change Status
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Change Status</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <form action="<?php echo base_url('create_history') ?>" method="POST" enctype="multipart/form-data">
                                                                        <label for="">Current Status <span class="text-danger">*</span></label>
                                                                        <input readonly type="text" class="form-control" name="previous_status" value="<?php echo $status ?>">
                                                                </div>

                                                                <?php if ($status == "initiated" || $status == "Postpone") {
                                                                    if ($user_role == "machine_shop_production_admin" || $user_role == "admin") {
                                                                ?>




                                                                        <div class="col-lg-12">
                                                                            <label for="">Select Status <span class="text-danger">*</span></label>
                                                                            <select required name="status" id="hi<?php echo $i; ?>" onchange="myFunction(this,<?php echo $i; ?>)" class="form-control" id="">
                                                                                <option value="Accept">Accept</option>
                                                                                <option value="Postpone">Postpone</option>
                                                                            </select>

                                                                        </div>
                                                                        <div class="col-lg-12" style="display: none;" id="new_trigger<?php echo $i; ?>">
                                                                            <div class="row">

                                                                                <div class="col-lg-12">
                                                                                    <label for="">New PM Date <span class="text-danger">*</span></label>
                                                                                    <input type="date" class="form-control" name="new_pm_date">
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <label for="">New PM Time <span class="text-danger">*</span></label>
                                                                                    <input type="time" class="form-control" name="new_pm_time">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <script>
                                                                            function myFunction(selectObject, id) {
                                                                                var value = selectObject.value;
                                                                                var valuediv = "new_trigger" + id;
                                                                                // var valuediv_new = "new_trigger"+id;  

                                                                                if (value === "Postpone") {
                                                                                    // alert(valuediv)
                                                                                    document.getElementById(valuediv).style.display = 'block'; // Hide

                                                                                } else {
                                                                                    // alert(valuediv)

                                                                                    document.getElementById(valuediv).style.display = 'none'; // Hide

                                                                                }
                                                                                // alert(valuediv);
                                                                            }
                                                                        </script>
                                                                    <?php
                                                                    }
                                                                } else if ($status == "Accept") {
                                                                    if ($user_role == "machine_shop_maintenance_admin" || $user_role == "maintenance_user" || $user_role == "admin") {
                                                                    ?>
                                                                        <div class="col-lg-12">
                                                                            <label for="">Select Status <span class="text-danger">*</span></label>
                                                                            <select required name="status" id="hi<?php echo $i; ?>" onchange="myFunction(this,<?php echo $i; ?>)" class="form-control" id="">
                                                                                <option value="Inprocess">Start</option>
                                                                            </select>

                                                                        </div>
                                                                    <?php
                                                                    }
                                                                } else if ($status == "checksheet_completed" || $p->status == "checksheet_completed") {
                                                                    if ($user_role == "machine_shop_production_admin" || $user_role == "admin") {
                                                                    ?>
                                                                        <div class="col-lg-12">
                                                                            <label for="">Select Status <span class="text-danger">*</span></label>
                                                                            <select required name="status" id="hi<?php echo $i; ?>" onchange="myFunction(this,<?php echo $i; ?>)" class="form-control" id="">
                                                                                <option value="Request_Closed">Request Closed</option>
                                                                            </select>

                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <label for="">Upload Document</label>
                                                                            <input type="file" class="form-control" name="file" id="">

                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <label for="">Enter Feedback <span class="text-danger">*</span></label>
                                                                            <input required type="text" placeholder="Enter Your Feedback" class="form-control" name="feedback" id="">

                                                                        </div>

                                                                    <?php
                                                                    }
                                                                } else if ($type == "pm_request" && $status == "Inprocess") {
                                                                    ?>
                                                                    <div class="col-lg-12">
                                                                        <br>
                                                                        <br>


                                                                        <h6 class="text-danger">Please Fill All Checkshit <?php echo $p->id ?> , To Complete This Request </h6>
                                                                        <!-- <select required name="status" id="hi<?php echo $i; ?>"  onchange="myFunction(this,<?php echo $i; ?>)" class="form-control" id="">
                                        <option value="Completed">Completed</option>
                                    </select> -->

                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>






                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <?php

                                                            if ($type == "pm_request") {
                                                            ?>
                                                                <input type="hidden" name="pm_group_id" value="<?php echo $p->pm_group_id ?>" id="">

                                                            <?Php
                                                            }

                                                            ?>
                                                            <input type="hidden" name="pm_id" value="<?php echo $p->id ?>" id="">
                                                            <input type="hidden" name="machine_id" value="<?php echo $p->machine_id ?>" id="">
                                                            <input type="hidden" name="table_name" value="<?php echo $table_name ?>" id="">
                                                            <input type="hidden" name="new_pm_date_2" value="<?php echo $pm_date ?>" id="">
                                                            <input type="hidden" name="new_pm_time_2" value="<?php echo $pm_time ?>" id="">
                                                            <?php
                                                            if ($p->status != "Inprocess") {
                                                            ?>


                                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                                            <?php
                                                            }
                                                            ?>
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
                                        }
                                        ?>
                                    </tbody>


                                </table>

                                <?php echo $this->pagination->create_links(); ?>

                            </div>


                            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                
                </div><!-- /.col -->

                <div class="col-sm-1">
                    <ol class="breadcrumb float-sm-right">
                   
                       
                    </ol>
                </div>
            </div>
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