<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:2500px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Spare Part Requests. </h1>
                        <?php echo $user_role = trim($this->session->userdata('user_role')); ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('store_pending_request'); ?>">Back</a></li>
                            <li class="breadcrumb-item active">Spare Part For PM.</li>
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

                                <div style="border: 2px solid black;padding:20px" class="row">
                                    <div class="row-12">
                                        <a href="<?php echo base_url('export_pending_parts/') . $this->uri->segment('2') . '/' . $this->uri->segment('3'); ?>" class="btn btn-success mb-4">
                                            Export
                                        </a>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <?php
                                            $type = $this->uri->segment('3');
                                            $pm_id = $this->uri->segment('2');
                                            if ($type == "pm_request") {
                                                $main_data = $this->Crud_model->get_data_by_id("pm_request", $pm_id, "id");
                                                $machines = $this->Crud_model->get_data_by_id("machines", $main_data[0]->machine_id, "id");
                                                $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups", $main_data[0]->pm_group_id, "id");
                                                $pm_history = $this->Crud_model->get_data_by_id("pm_history", $pm_id, "pm_id");
                                                // print_r($check_list_groups);
                                            } else if ($type == "improvement") {
                                                $main_data = $this->Crud_model->get_data_by_id("improvement_request", $pm_id, "id");
                                                $machines = $this->Crud_model->get_data_by_id("machines", $main_data[0]->machine_id, "id");
                                                // $check_list_groups = $this->Crud_model->get_data_by_id("check_list_groups",$main_data[0]->pm_group_id,"id");
                                                // print_r($machines);
                                                $pm_history = $this->Crud_model->get_data_by_id("improvement_request", $pm_id, "id");
                                            } else {
                                                $main_data = $this->Crud_model->get_data_by_id("breakdown_request", $pm_id, "id");
                                                $machines = $this->Crud_model->get_data_by_id("machines", $main_data[0]->machine_id, "id");
                                                $pm_history = $this->Crud_model->get_data_by_id("breakdown_request", $pm_id, "id");
                                            }



                                            ?>


                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="">Machine Code/Number <span class="text-danger">*</span></label>
                                                    <input style="background-color: #D3D3D3;" value="<?php echo $machines[0]->code; ?>" class="form-control" creadonly type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="">Machine Description <span class="text-danger">*</span></label>
                                                    <input style="background-color: #D3D3D3;" value="<?php echo $machines[0]->asset_description; ?>" class="form-control" creadonly type="text" name="" id="">
                                                </div>
                                            </div>
                                            <?php
                                            if ($type == "pm_request") {



                                            ?>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="">Group Name <span class="text-danger">*</span></label>
                                                        <input style="background-color: #D3D3D3;" value="<?php echo $check_list_groups[0]->group_name; ?>" class="form-control" creadonly type="text" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="">Frequency Name <span class="text-danger">*</span></label>
                                                        <input style="background-color: #D3D3D3;" value="<?php echo $check_list_groups[0]->pm_type; ?>" class="form-control" creadonly type="text" name="" id="">
                                                    </div>
                                                </div>
                                            <?php

                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Select Spare Parts <span class="text-danger">*</span></label>
                                        <form method="POST" action="<?php echo base_url('add_tool_to_pm') ?>">
                                            <select required name="tool_id" class="form-control select2" required id="">
                                                <?php
                                                $j = 1;
                                                foreach ($item_master as $i) {

                                                    $abc2 = $this->Crud_model->grn_qty($i->id);

                                                    if ($abc2[0]->grn_qty > 0) {
                                                        $j++;
                                                ?>
                                                        <option value="<?php echo $i->id; ?>"><?php echo $j . ")  :  " . $i->spare_number . ' / ' . $i->spare_description; ?></option>
                                                <?php }
                                                } ?>

                                            </select>

                                            <input type="hidden" value="<?php echo $this->uri->segment('2') ?>" name="pm_id">
                                            <input type="hidden" value="<?php echo $this->uri->segment('3') ?>" name="type">

                                    </div>

                                    <?php
                                    if ($user_role != "production_user" || $user_role != "machine_shop_production_admin"  || $user_role != "maintenance_user") {
                                        if ($user_role != "stores_user") {
                                            if (isset($pm_history[0]->status)) {
                                                if ($type != "breakdown") {
                                                    if ($pm_history[0]->status != "Request_Closed") {
                                    ?>
                                                        <div class="col-lg-2">
                                                            <button style="margin-top:30px" class="btn btn-primary " type="submit">
                                                                Add Spare Parts
                                                            </button>
                                                        </div>
                                                    <?php
                                                    }
                                                } else if ($type == "breakdown") {
                                                    if ($pm_history[0]->status != "request_closed") {
                                                    ?>
                                                        <div class="col-lg-2">
                                                            <button style="margin-top:30px" class="btn btn-primary " type="submit">
                                                                Add Spare Parts
                                                            </button>
                                                        </div>

                                    <?php
                                                    }
                                                }
                                            }
                                        }
                                    } ?>
                                    </form>



                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('add_spare_grn') ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputEmail1">Spare Number<span class="text-danger">*</span></label>
                                                                <input required type="text" name="spare_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Spare Number">

                                                            </div> -->
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputEmail1">Spare Description<span class="text-danger">*</span></label>
                                                                <input required type="text" name="spare_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Select Spare Part Number / Description <span class="text-danger">*</span></label>
                                                                <select class="form-control select2bs4" name="spare_id" style="width: 100%;" enctype="multipart/form-data">
                                                                    <?php
                                                                    foreach ($item_master as $sd) {
                                                                    ?>
                                                                        <option value="<?php echo $sd->id ?>"><?php echo $sd->spare_number . "-" . $sd->spare_description; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Number<span class="text-danger">*</span></label>
                                                                <input required type="text" name="grn_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                           
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Qty<span class="text-danger">*</span></label>
                                                                <input required type="text" name="grn_qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Item Price<span class="text-danger">*</span></label>
                                                                <input required type="text" name="grn_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Date<span class="text-danger">*</span></label>
                                                                <input required type="date" name="grn_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">GRN Document</label>
                                                                <input  type="file" name="grn_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Saftey stock">

                                                            </div> -->



                                                        </div>

                                                    </div>
                                                    <div class=" modal-footer ">
                                                        <button type=" button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary ">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <?php
                                    if ($spare_parts) {
                                    ?>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.no</th>
                                                    <th>Spare Part Number</th>
                                                    <th>Spare Description</th>
                                                    <th>Spare Total Stock</th>
                                                    <th>On Hand GRN 1 Qty</th>
                                                    <th>Enter GRN 1 Qty</th>
                                                    <th>Validate</th>
                                                    <th>On Hand GRN 2 Qty</th>
                                                    <th>Enter GRN 2 Qty</th>
                                                    <th>Submit</th>
                                                    <th>GRN 1 Status</th>
                                                    <th>GRN 2 Status</th>
                                                    <th>Accept Request</th>
                                                    <th>Request Date & Time</th>
                                                    <th>Accept Request Date & Time</th>


                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.no</th>
                                                    <th>Spare Part Number</th>
                                                    <th>Spare Description</th>
                                                    <th>Spare Total Stock</th>
                                                    <th>On Hand GRN 1 Qty</th>
                                                    <th>Enter GRN 1 Qty</th>
                                                    <th>Validate</th>
                                                    <th>On Hand GRN 2 Qty</th>
                                                    <th>Enter GRN 2 Qty</th>
                                                    <th>Submit</th>
                                                    <th>GRN 1 Status</th>
                                                    <th>GRN 2 Status</th>
                                                    <th>Accept Request</th>

                                                    <th>Request Date & Time</th>
                                                    <th>Accept Request Date & Time</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php

                                                $i = 1;
                                                foreach ($spare_parts as $s) {
                                                    // echo $s->tool_id;
                                                    $item_master = $this->Crud_model->get_data_by_id("item_master", $s->tool_id, "id");
                                                    $spare_grn = $this->Crud_model->query_sinegle("SELECT * FROM spare_grn WHERE on_hand_stock >0 and spare_id = $s->tool_id  ORDER BY id ASC ");
                                                    // print_r($spare_grn);
                                                    if ($spare_grn) {
                                                        $grn_qty = $spare_grn[0]->on_hand_stock;
                                                    } else {
                                                        $grn_qty = 0;
                                                    }
                                                    // $grn_qty = $spare_grn[0]->grn_qty;

                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $item_master[0]->spare_number ?></td>
                                                        <td><?php echo $item_master[0]->spare_description ?></td>
                                                        <td><?php $abc = $this->Crud_model->grn_qty($item_master[0]->id);
                                                            echo $abc[0]->grn_qty . "";
                                                            // print_r($abc[0]->grn_qty);
                                                            ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($spare_grn[0])) {

                                                                if ($s->grn_1_take > 0) {
                                                                    echo $spare_grn[0]->on_hand_stock;
                                                                } else {
                                                            ?>
                                                                    <form action="<?php echo base_url('update_tool_to_pm') ?>" method="post" enctype="multipart/form-data">

                                                                        <input name="grn_1_actual" readonly id="actual<?php echo $i; ?>" required value="<?php echo $spare_grn[0]->on_hand_stock ?>" type="text">
                                                                        <input name="grn_1_actual_price" readonly required value="<?php echo $spare_grn[0]->grn_price ?>" type="hidden">
                                                                        <input name="grn_1_id_amain" readonly required value="<?php echo $spare_grn[0]->id ?>" type="hidden">
                                                                        <input name="id_main" readonly value="<?php echo $s->id; ?>" required type="hidden">
                                                                <?php
                                                                }
                                                            } else {
                                                                echo "Not Avalable";
                                                            }
                                                                ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($spare_grn[0])) {
                                                                // echo   $spare_grn[0]->grn_qty;
                                                                if ($s->grn_1_take > 0) {
                                                                    echo $s->grn_1_take;
                                                                } else {
                                                            ?>

                                                                    <input name="grn_1_take" value="0" type="text" id="entered<?php echo $i; ?>" placeholder="Enter GRN 1 Quantity " class="form-control" name="grn_1_quantity">

                                                            <?php
                                                                }
                                                            } else {
                                                                echo "Not Avalable";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($spare_grn[0])) {
                                                                if ($s->grn_1_take > 0) {
                                                                    echo "Request Already Send";
                                                                } else {  ?>
                                                                    <span disabled onclick="onMycheck('<?php echo $i; ?>')" class="btn btn-primary">
                                                                        Validate GRN 1
                                                                    </span>
                                                                    <!-- <button id="myButtoon<?php echo $i; ?>" disabled type="submit" class="btn btn-primary">
                                                            Add
                                                        </button> -->
                                                            <?php
                                                                }
                                                            } else {
                                                                echo "Stock Not Available";
                                                            } ?>

                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($spare_grn[1])) {
                                                                if ($s->grn_2_take > 0) {
                                                                    echo  $spare_grn[1]->on_hand_stock;
                                                                } else {
                                                            ?>
                                                                    <div id="none1<?php echo $i; ?>" style="display:none;">

                                                                        <input name="grn_2_actual" readonly required value="<?php echo $spare_grn[1]->on_hand_stock ?>" type="text" name="" id="actual_2<?php echo $i; ?>">
                                                                        <input name="grn_2_actual_price" readonly required value="<?php echo $spare_grn[1]->grn_price ?>" type="hidden">
                                                                        <input name="grn_2_id_amas" readonly required value="<?php echo $spare_grn[1]->id ?>" type="hidden">
                                                                    </div>

                                                            <?php
                                                                }
                                                            } else {
                                                                echo "Not Avalable";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($spare_grn[1])) {
                                                                if ($s->grn_2_take > 0) {
                                                                    echo  $s->grn_2_take;
                                                                } else {
                                                            ?>
                                                                    <div id="none2<?php echo $i; ?>" style="display: none;">
                                                                        <input name="grn_2_take" value="0" type="text" placeholder="Enter GRN 2 Quantity " class="form-control" name="grn_2_quantity" id="entered_2<?php echo $i; ?>">
                                                                    </div>
                                                            <?php
                                                                }
                                                            } else {
                                                                echo "Not Avalable";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($spare_grn[0])) {
                                                                if ($s->grn_1_take > 0) {
                                                                    echo "Request Already Send";
                                                                } else {  ?>
                                                                    <span disabled onclick="onMycheck2('<?php echo $i; ?>')" class="btn btn-primary">
                                                                        Validate GRN 2
                                                                    </span>
                                                                    <button id="myButtoon<?php echo $i; ?>" disabled type="submit" class="btn btn-primary">
                                                                        Add
                                                                    </button>
                                                            <?php
                                                                }
                                                            } else {
                                                                echo "Stock Not Available";
                                                            } ?>

                                                        </td>

                                                        <script>
                                                            function onMycheck(myid) {
                                                                var id = parseInt(myid);
                                                                var entered_id = "entered" + id;
                                                                var actual_id = "actual" + id;
                                                                var myButtoon = "myButtoon" + id;
                                                                // var myButtoon = "myButtoon2"+id;
                                                                var none1 = "none1" + id;
                                                                var none2 = "none2" + id;
                                                                // var entered_2 = "entered_2"+id;
                                                                // var actual_2 = "actual_2"+id;

                                                                var enteredValue = parseInt(document.getElementById(entered_id).value);
                                                                var actualValue = parseInt(document.getElementById(actual_id).value);
                                                                // alert(enteredValue);
                                                                // alert(actualValue);
                                                                // if (enteredValue === actualValue) {
                                                                //     alert('yes');
                                                                // } else {
                                                                //     alert('no');
                                                                // }
                                                                // var entered_2_check = document.getElementById(entered_2);
                                                                // var actual_2_check= document.getElementById(actual_2);

                                                                // var enteredValue = document.getElementById(entered_id).value;
                                                                // var actualValue = document.getElementById(actual_id).value;
                                                                // alert(enteredValue);


                                                                if (enteredValue === "" || enteredValue === 0) {
                                                                    alert("GRN 1 Value Should Be Greter Than 0");
                                                                } else if (enteredValue > actualValue) {

                                                                    alert("GRN 1 Entered Value Must Be Equal Or Less Than GRN 1 On Hand Value");
                                                                } else if (enteredValue === actualValue) {
                                                                    alert("Sucess Now , Now Add Validate GRN22222  ");
                                                                    document.getElementById(myButtoon).disabled = false;

                                                                    document.getElementById(none1).style.display = 'block';
                                                                    document.getElementById(none2).style.display = 'block';

                                                                    // document.getElementById(myButtoon).disabled = false;

                                                                } else if (enteredValue < actualValue) {
                                                                    alert("Sucess Now , Now Add Validate GRN2  ");
                                                                    document.getElementById(myButtoon).disabled = false;

                                                                    // document.getElementById(none1).style.display = 'block';
                                                                    // document.getElementById(none2).style.display = 'block';
                                                                    // // document.getElementById(myButtoon).disabled = false;

                                                                } else {
                                                                    alert("Sucess Now , Click Add Button");
                                                                    document.getElementById(myButtoon).disabled = false;

                                                                }





                                                            }

                                                            function onMycheck2(myid) {
                                                                var id = parseInt(myid);
                                                                // alert(id);
                                                                var entered_id = "entered" + id;
                                                                var actual_id = "actual" + id;
                                                                var myButtoon = "myButtoon" + id;
                                                                var entered_2 = "entered_2" + id;
                                                                var actual_2 = "actual_2" + id;
                                                                // alert(myButtoon);

                                                                // var enteredValue = document.getElementById(entered_id).value;
                                                                // var actualValue = document.getElementById(actual_id).value;

                                                                var entered_2_check = document.getElementById(entered_2);
                                                                var actual_2_check = document.getElementById(actual_2);




                                                                if (entered_2_check) {
                                                                    var enteredValue2 = entered_2_check.value;
                                                                    var actualValue2 = actual_2_check.value;
                                                                    if (enteredValue2 === "") {
                                                                        alert("GRN 2 Value At Least Zero");
                                                                    } else if (enteredValue2 > actualValue2) {

                                                                        alert("GRN 2 Entered Value Must Be Equal Or Less Than GRN 2 On Hand Value");
                                                                    } else {
                                                                        alert("Sucess Now , Click Add Button");
                                                                        document.getElementById(myButtoon).disabled = false;

                                                                    }
                                                                }




                                                            }
                                                        </script>
                                                        <td><?php echo $s->grn_1_status ?></td>
                                                        <td><?php echo $s->grn_2_status ?></td>
                                                        <td>
                                                            <?php
                                                            if ($user_role = "maintenance_user") {
                                                                if ($s->grn_1_status == "pending") {

                                                            ?>
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalaccept<?php echo $i; ?>">
                                                                        Accept Request
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModalaccept<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Accept Request</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="<?php echo base_url('accept_request') ?>" method="POST">
                                                                                        Are You Sure Want To Accept Request ?
                                                                                        <input required type="hidden" name="main_id_new" value="<?php echo $s->id ?>" id="">
                                                                                        <input required type="hidden" name="grn_1_id" value="<?php echo $s->grn_1_id ?>" id="">
                                                                                        <input required type="hidden" name="grn_1_taken" value="<?php echo $s->grn_1_take ?>" id="">
                                                                                        <input required type="hidden" name="grn_2_taken" value="<?php echo $s->grn_2_take ?>" id="">
                                                                                        <input required type="hidden" name="grn_2_id" value="<?php echo $s->grn_2_id ?>" id="">

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Acept Request</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } else {
                                                                    echo "Stock Issued";
                                                                } ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $s->created_date ?>
                                                            <br>
                                                            <?php echo $s->created_time ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $s->accepted_date ?>
                                                            <br>
                                                            <?php echo $s->accepted_time ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                                $i++;
                                                            }
                                                        }

                                            ?>

                                            </tbody>


                                        </table>

                                    <?php

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

    <script>



    </script>