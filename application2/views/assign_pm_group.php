<div style="" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign PM Group To Machine</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('machines') ?>">Back To Machine</a></li>
                            <li class="breadcrumb-item active">Assign PM Group To Machine PM Group To Machinehines</li>
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

                                <div class="row">
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">
                                            Add
                                        </button>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php
                                        $machine_id =  $this->uri->segment('2');
                                        $machine_info = $this->Crud_model->get_data_by_id('machines', $machine_id, 'id');
                                        // print_r( $machine_info);

                                        ?>
                                        <label for="">Asset Number </label>
                                        <input type="text" readonly class="form-control" value=" <?php echo $machine_info[0]->asset_number; ?>" name="" id="">

                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Machine Code </label>
                                        <input type="text" readonly class="form-control" value=" <?php echo $machine_info[0]->code; ?>" name="" id="">

                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Asset Description</label>
                                        <input type="text" readonly class="form-control" value=" <?php echo $machine_info[0]->asset_description; ?>" name="" id="">

                                    </div>
                                </div>






                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></label>
                                                </button>
                                            </div>
                                            <form action="<?php echo base_url('add_assign_pm_group') ?>" method="post">

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <?php
                                                        function gen_uid($l = 3)
                                                        {
                                                            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
                                                        }
                                                        ?>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="">PM Type/Periodic Critical check<span class="text-danger">*</span></label>
                                                                <select name="group_id" id="group_id" class="form-control select2">
                                                                    <?php foreach ($check_list_groups as $g) { ?>
                                                                        <option value="<?php echo $g->id ?>"><?php echo $g->group_name; ?> - <?php echo $g->pm_type; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <input required type="hidden" name="machine_id" value="<?php echo $this->uri->segment('2'); ?>" class="form-control" placeholder="Enter Asset Number">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="">Last PM Date<span class="text-danger">*</span></label>

                                                                <input required type="date" max="<?php echo  date('Y-m-d'); ?>" name="last_pm_date" class="form-control" placeholder="Enter ">

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
                                        <th>Group Name</th>
                                        <th>PM Frequency</th>
                                        <th>Last Due Date</th>
                                        <th>Completed Date</th>
                                        <th>Next PM Due Date</th>
                                        <!-- <th>Planned Date</th> -->
                                        <th>Due Days</th>
                                        <th>History</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Group Name</th>
                                        <th>PM Frequency</th>
                                        <th>Last Due Date</th>
                                        <th>Completed Date</th>
                                        <th>Next PM Due Date</th>
                                        <!-- <th>Planned Date</th> -->
                                        <th>Due Days</th>
                                        <th>History</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($assign_pm_group) {
                                        foreach ($assign_pm_group as $p) {
                                            $data_check = array(
                                                "machine_id" => $machine_id,
                                                "group_id" => $p->group_id,
                                            );
                                            $assign_pm_group = $this->Crud_model->get_data_by_id_multile("assign_pm_group", $data_check);

                                            // $check_list_groups = $this->Crud_model->get_data_by_id('check_list_groups', $p->group_id, 'id');
                                            $check_list_groups = $this->Crud_model->get_data_by_id('check_list_groups', $p->group_id, 'id');


                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $check_list_groups[0]->group_name; ?></td>
                                                <td><?php echo $check_list_groups[0]->pm_type; ?></td>
                                                <td><?php echo $assign_pm_group[0]->planeed_pm_date; ?></td>

                                                <td><?php echo $assign_pm_group[0]->last_pm_date; ?></td>
                                                <td><?php echo $assign_pm_group[0]->last_due_date; ?></td>
                                                <?php if ($assign_pm_group[0]->planeed_pm_date) {
                                                    $date1 = new DateTime($assign_pm_group[0]->last_due_date);
                                                    $date2 = new DateTime(date('Y-m-d'));
                                                    $interval = $date1->diff($date2);
                                                    // $difference = $datetime2->diff($datetime1);


                                                ?>
                                                    <td class="
                                                     <?php

                                                        if ($interval->days) {
                                                            if ($interval->days <= 0) {
                                                                echo "bg-danger";
                                                            } else if ($interval->days > 0 && $interval->days <  15) {
                                                                echo "bg-warning";
                                                            } else {
                                                                echo "bg-success";
                                                            }
                                                        } ?>">
                                                        <?php echo $interval->days; ?>
                                                    </td>
                                                    <?Php


                                                    ?>

                                                <?php
                                                } else {
                                                ?>
                                                    <td>NA</td>
                                                <?php
                                                }

                                                ?>




                                                <td>
                                                    <a class="btn btn-success" href="<?php echo base_url('history_assign_pm_group/') . $p->group_id . '/' . $machine_id ?>">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
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