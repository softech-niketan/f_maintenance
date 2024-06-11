<div style="width: 1750px;" class="wrapper">
    <!-- Navbar -->


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Completed <?php
                                        if ($type == "pm_request") {
                                            echo "PM";
                                        } else {
                                            echo "Predictive";
                                        }
                                        ?> Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Pending Request</li>
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
                                <table id="example1" class="table table-bordered table-striped">
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
                                            <th>Feedback Prodction</th>
                                            <th>History</th>
                                            <!-- <th>Actions</th> -->

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
                                            <th>Feedback Prodction</th>

                                            <th>History</th>
                                            <!-- <th>Actions</th> -->

                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        // print_r($pm_request);
                                        if ($data) {
                                            $i = 1;
                                            foreach ($data as $p) {
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
                                                } else {
                                                    $status = $p->status;
                                                }

                                                if ($status == "Request_Closed") {



                                        ?>

                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php
                                                            if ($type == "pm_request") {
                                                                echo  "PM-" . $p->id;
                                                            } else {
                                                                echo  "PR-" . $p->id;
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
                                                                <a class="btn btn-primary" href="<?php echo base_url('view_checkshit/') . $p->pm_group_id . '/' . $p->id ?>"> <i class="fas fa-eye"></i></a>
                                                            </td>
                                                        <?php

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
                                                            <a class="btn btn-primary" href="<?php echo base_url('spare_parts/') . $p->id . '/' . $type; ?>">
                                                                <i class="fas fa-cogs"></i>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $history_data[0]->feedback; ?></td>

                                                        <td>
                                                            <a class="btn btn-primary" href="<?php echo base_url('history/') . $type . '/' . $p->id; ?>">
                                                                History</a>
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