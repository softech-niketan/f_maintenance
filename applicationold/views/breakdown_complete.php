<div style="width: 3100px;" class="wrapper">
  <!-- Navbar -->


  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Break Down Request Completed</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
              <li class="breadcrumb-item active">Break Down Request</li>
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
                Break Down Request

              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr No.</th>
                      <th>Request Number</th>
                      <th>Current Status</th>
                      <th>Machine Name</th>
                      <th>Machine Code</th>
                      <th>Machine Description</th>
                      <th>Details</th>
                      <th>Initiated Date</th>
                      <th>Initiated Time</th>
                      <th>BreakDown Initiater</th>
                      <th> Spare Parts Request</th>

                      <th>Feedback Document</th>
                      <th>Feedback</th>
                      <th>BreakDown Document</th>
                      <th>Breakdown Type</th>
                      <th>Breakdown Complete Name</th>
                      <th>Breakdown Details Added Date</th>
                      <th>Breakdown Details Added Time</th>
                      <th>Breakdown Complete Date</th>
                      <th>Breakdown Complete Time</th>
                      <th>Actions Taken</th>
                      <th>BreakDown Time To Complete Maintance</th>
                      <th>BreakDown Time To Complete Feedback</th>


                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr No.</th>
                      <th>Request Number</th>
                      <th>Current Status</th>
                      <th>Machine Name</th>
                      <th>Machine Code</th>

                      <th>Machine Description</th>
                      <th>Details</th>
                      <th>Initiated Date</th>
                      <th>Initiated Time</th>
                      <th>BreakDown Initiater</th>
                      <th> Spare Parts Request</th>

                      <th>Feedback Document</th>
                      <th>Feedback</th>
                      <th>BreakDown Document</th>
                      <th>Breakdown Type</th>
                      <th>Breakdown Complete Name</th>

                      <th>Breakdown Details Added Date</th>
                      <th>Breakdown Details Added Time</th>
                      <th>Breakdown Complete Date</th>
                      <th>Breakdown Complete Time</th>
                      <th>Actions Taken</th>
                      <th>BreakDown Time To Complete Maintance</th>
                      <th>BreakDown Time To Complete Feedback</th>

                    </tr>
                  </tfoot>

                  <tbody>
                    <?php
                    // print_r($pm_request);
                    if ($breakdown_pending) {
                      $i = 1;
                      foreach ($breakdown_pending as $p) {
                        // print_r($group_ids);
                        $action_taken_person_name = $this->Crud_model->get_data_by_id("user", $p->action_taken_person_name, "id");
                        $request_from = $this->Crud_model->get_data_by_id("user", $p->request_from, "id");
                        $request_to = $this->Crud_model->get_data_by_id("user", $p->request_to, "id");
                        $machines = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");

                        if (!empty($p->complition_date)) {






                    ?>

                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo "BR-" . $p->id ?></td>
                            <td><?php echo $p->status ?></td>
                            <td><?php echo $machines[0]->asset_number; ?></td>
                            <td><?php echo $machines[0]->code; ?></td>
                            <td><?php echo $machines[0]->asset_description; ?></td>



                            <td>

                              <?php

                              if (!empty($p->details)) {
                                echo $p->details;
                              } else {

                              ?>


                                <button disabled type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrossp<?php echo $i; ?>">
                                  Add Details
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrossp<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">

                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <form method="POST" action="<?php echo base_url('update_breadkdown_details') ?>">
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $p->id ?>" id="">

                                                <label for="">Add Details <span class="text-danger">*</span></label>
                                                <textarea name="details" placeholder="Enter Add Details" class="form-control" id="" cols="30" rows="5"></textarea>
                                            </div>
                                          </div>


                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Status</button>

                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              <?php }
                              ?>
                            </td>





                            <td><?php echo $p->created_date ?></td>
                            <td><?php echo $p->created_time ?></td>
                            <td><?php echo $request_from[0]->user_name; ?></td>
                            <td>
                              <a class="btn btn-primary" href="<?php echo base_url('spare_parts/') . $p->id . '/breakdown'; ?>">
                                <i class="fas fa-cogs"></i>
                              </a>





                            </td>
                            <td>
                              <?php
                              if ($p->feedback_document) {
                              ?>
                                <a download href="<?Php echo base_url('documents/') . $p->feedback_document ?>" class="btn btn-primary">Download</a>

                              <?php

                              } else {
                                echo "Not Uploaded";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if ($p->feedback) {

                                echo $p->feedback;
                              } else {
                                echo "Not Added";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if ($p->breakdown_document) {
                              ?>
                                <a download href="<?Php echo base_url('documents/') . $p->breakdown_document ?>" class="btn btn-primary">Download</a>

                              <?php

                              } else {
                                echo "Not Uploaded";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if ($p->type_of_breakdown) {

                                echo $p->type_of_breakdown;
                              } else {
                                echo "Not Added";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if (empty($action_taken_person_name)) {

                                "";
                              } else {
                                echo $action_taken_person_name[0]->user_name;
                              }

                              echo "<br>" . $p->team;
                              ?>

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrossp<?php echo $i; ?>">
                                Add Team
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="staticBackdrossp<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">Add Team</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">

                                        <div class="col-lg-12">
                                          <div class="form-group">
                                            <form method="POST" action="<?php echo base_url('update_breadkdown_details_team') ?>">
                                              <input type="hidden" class="form-control" name="id" value="<?php echo $p->id ?>" id="">

                                              <label for="">Add Team <span class="text-danger">*</span></label>
                                              <textarea name="details" placeholder="Enter Add Team" class="form-control" id="" cols="30" rows="5"></textarea>
                                          </div>
                                        </div>


                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Update Status</button>

                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <?php
                              if ($p->breakdown_completed_date) {

                                echo $p->breakdown_completed_date;
                              } else {
                                echo " ";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if ($p->breakdown_completed_time) {

                                echo $p->breakdown_completed_time;
                              } else {
                                echo "";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if ($p->complition_date) {

                                echo $p->complition_date;
                              } else {
                                echo "Not Added";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if ($p->complition_time) {

                                echo $p->complition_time;
                              } else {
                                echo "Not Added";
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              if ($p->actions_taken) {

                                echo $p->actions_taken;
                              } else {
                                echo "Not Added";
                              }
                              ?>

                            </td>
                            <td><?php
                                if (!empty($p->complete_time_maintaince)) {


                                  echo $p->complete_time_maintaince;
                                } else {
                                  echo "0";
                                }



                                ?>
                            <td><?php
                                if (!empty($p->complete_time_feedback)) {


                                  echo $p->complete_time_feedback;
                                } else {
                                  echo "0";
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