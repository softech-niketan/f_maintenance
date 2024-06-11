<div style="width: 2800px" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Why Why Analysis Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Why Why Analysis</li>
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
                        <?php if ($this->session->flashdata('success')) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('success');  ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>



                        <?php }
                        ?>
                        <?php if ($this->session->flashdata('error')) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('error');  ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>



                        <?php }
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <!-- <div class="col-lg-2">
                                        <b>Doc. No. :QF/MT/8.5/16</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Date : 18-03-2018</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Rev.No./Date : 00/18-03-2018</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Page No. : 1 of 1</b>
                                    </div> -->
                                </div>


                            </div>

                            <div class="card-body">
                                <?php
                                if (true) {
                                ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-center bg-secondary">
                                            <tr>
                                                <th>SR NO</th>
                                                <th>DATE </th>
                                                <th>BREAKDOWN REQUIST NO </th>
                                                <th>MACHINE CODE NO </th>
                                                <th>MACHINE NAME </th>
                                                <th>BREAKDOWN TIME </th>
                                                <th>NATURE OF BREAKDOWN </th>
                                                <th>ACTION TAKEN </th>
                                                <th>SPARES USED</th>
                                                <th>CLOSURE TIME </th>
                                                <th>BREAKDOWN IN MIN.</th>
                                                <th>BREAKDOWN HOURS</th>
                                                <th>Why 1</th>
                                                <th>Why 2</th>
                                                <th>Why 3</th>
                                                <th>Why 4</th>
                                                <th>Why 5</th>
                                                <th>Why 6</th>
                                                <th>Why 7</th>
                                                <th>Why 8</th>
                                                <th>Why 9</th>
                                                <th>Actions Plan</th>

                                                <th>Actions</th>



                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <?php
                                                if ($why_why_analysis) {
                                                    $why1 = $why_why_analysis[0]->why1;
                                                    $why2 = $why_why_analysis[0]->why2;
                                                    $why3 = $why_why_analysis[0]->why3;
                                                    $why4 = $why_why_analysis[0]->why4;
                                                    $why5 = $why_why_analysis[0]->why5;
                                                    $why6 = $why_why_analysis[0]->why6;
                                                    $why7 = $why_why_analysis[0]->why7;
                                                    $why8 = $why_why_analysis[0]->why8;
                                                    $why9 = $why_why_analysis[0]->why9;
                                                    $action_plan = $why_why_analysis[0]->action_plan;
                                                } else {
                                                    $why1 = "";
                                                    $why2 = "";
                                                    $why3 = "";
                                                    $why4 = "";
                                                    $why5 = "";
                                                    $why6 = "";
                                                    $why7 = "";
                                                    $why8 = "";
                                                    $why9 = "";
                                                    $action_plan = "";
                                                }

                                                ?>
                                                <td>1</td>
                                                <td><?php echo $breakdown_request[0]->created_date; ?></td>
                                                <td><?php echo "BR-" . $breakdown_request[0]->id; ?></td>
                                                <td><?php echo $machines[0]->asset_number . " / " . $machines[0]->unique_number; ?></td>
                                                <td><?php echo $machines[0]->asset_description; ?></td>
                                                <td><?php echo $breakdown_request[0]->created_time; ?></td>
                                                <td><?php echo $breakdown_request[0]->type_of_breakdown; ?></td>
                                                <td><?php echo $breakdown_request[0]->actions_taken; ?></td>
                                                <td><?php if ($used_parts_list) {
                                                        $j = 1;
                                                        foreach ($used_parts_list as $u) {
                                                            echo $j . ". " . $u;
                                                            echo "<br>";
                                                            $j++;
                                                        }
                                                    }
                                                    ?></td>
                                                <td><?php echo $breakdown_request[0]->complition_time; ?></td>
                                                <td><?php echo $breakdown_request[0]->time_to_complete_min; ?></td>
                                                <td><?php echo $breakdown_request[0]->time_to_complete_hours; ?></td>
                                                <td>
                                                    <form method="post" action="<?php echo base_url('update_why_why') ?>">
                                                        <textarea name="why1" class="form-control"><?php echo $why1; ?></textarea>
                                                </td>
                                                <td><textarea name="why2" class="form-control"><?php echo $why2; ?></textarea></td>
                                                <td><textarea name="why3" class="form-control"><?php echo $why3; ?></textarea></td>
                                                <td><textarea name="why4" class="form-control"><?php echo $why4; ?></textarea></td>
                                                <td><textarea name="why5" class="form-control"><?php echo $why5; ?></textarea></td>
                                                <td><textarea name="why6" class="form-control"><?php echo $why6; ?></textarea></td>
                                                <td><textarea name="why7" class="form-control"><?php echo $why7; ?></textarea></td>
                                                <td><textarea name="why8" class="form-control"><?php echo $why8; ?></textarea></td>
                                                <td><textarea name="why9" class="form-control"><?php echo $why9; ?></textarea></td>
                                                <td><textarea name="action_plan" class="form-control"><?php echo $action_plan; ?></textarea></td>
                                                <td>
                                                    <input type="hidden" name="bd_id" value="<?php echo $breakdown_request[0]->id; ?>">
                                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                </td>
                                                </form>

                                            </tr>
                                        </tbody>










                                    </table>

                                <?php
                                } else {
                                    echo "
                                                    <div style='padding:10px' class='text-center alert-danger'>
                                                    <h3>No Result Found</h3>
                                                    </div>
                                                    ";
                                }

                                ?>
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