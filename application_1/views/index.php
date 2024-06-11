<!-- /.navbar -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Meters</h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-2 text-center">
              <div id="chart_div1" style="width: 500px; height: 200px;"></div>
              <h5 style="margin-left:-50px">PM Performance</h5>

            </div>
            <div class="col-lg-2 text-center">
              <div id="chart_div2" style="width: 500px; height: 200px;"></div>
              <h5 style="">MTBF</h5>

            </div>
            <div class="col-lg-2 text-center">
              <div id="chart_div3" style="width: 500px; height: 200px;"></div>
              <h5 style="">MTTR</h5>

              <!-- <h5 style="margin-left:-50px">MMTR</h5> -->

            </div>
            <div class="col-lg-2 text-center">
              <div id="chart_div4" style="width: 500px; height: 200px;"></div>
              <h5 style="margin-left:-50px">MSEB</h5>


            </div>
            <div class="col-lg-2 text-center">
              <div id="chart_div5" style="width: 500px; height: 200px;"></div>

              <h5 style="margin-left:-50px">Gas Consumption</h5>


            </div>
            <div class="col-lg-2 text-center">
              <div id="chart_div6" style="width: 500px; height: 200px;"></div>

              <h5 style="margin-left:-50px">Maintenance Cost</h5>



            </div>
          </div>


        </div>
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Dashboard</h1> -->
        </div><!-- /.col -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $PM_pending; ?></h3>

                  <p> PM pending for feedback</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('pending/pm_request'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $BD_pending; ?><sup style="font-size: 20px"></sup></h3>

                  <p>BD pending for feedback</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url('breakdown_pending'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <div class="row" style=" overflow: auto;">
                <div style="border:1px solid #111;" class="col-lg-4 border-1">
                  <h1>
                    PM
                  </h1>


                  <table style=" table-layout: fixed;" id="" class=" table table table-striped">
                    <thead>
                      <tr>
                        <th>Sr No.</th>

                        <th>Machine Number</th>
                        <th>Machine Code</th>
                        <th>Machine Description</th>

                      </tr>
                    </thead>

                    <tbody>
                      <!-- <marquee behavior="scroll" direction="up"> -->
                      <?php
                      if ($pm_request_pending) {
                        $i = 1;
                        foreach ($pm_request_pending as $p) {
                          // print_r($group_ids);
                          $machines = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");

                          if ($p->status != "request_closed") {






                      ?>
                            <!-- <?php echo $machines[0]->asset_number; ?> - <?php echo $machines[0]->code; ?> - <?php echo $machines[0]->asset_description; ?> -->
                            <!-- <br> -->
                            <tr>
                              <td><?php echo $i ?></td>

                              <td><?php echo $machines[0]->asset_number; ?></td>
                              <td><?php echo $machines[0]->code; ?></td>
                              <td style=" overflow: hidden;"><?php echo $machines[0]->asset_description; ?></td>

                            </tr>

                            <!-- <td><div class="marquee"><marquee direction="up" height="100" width="400" ><strong>XXX</strong><br />XXX</marquee></div></td> -->



                      <?php
                            $i++;
                          }
                        }
                      } ?>
                      <!-- </marquee> -->
                    </tbody>


                  </table>
                </div>
                <div style="border:1px solid #111;" class="col-lg-4">
                  <h1>
                    Breakdown
                  </h1>


                  <table style=" table-layout: fixed;" id="" class=" table table table-striped">
                    <thead>
                      <tr>
                        <th>Sr No.</th>

                        <th>Machine Number</th>
                        <th>Machine Code</th>
                        <th>Machine Description</th>

                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      if ($breakdown_pending) {
                        $i = 1;
                        foreach ($breakdown_pending as $p) {
                          // print_r($group_ids);
                          $machines = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");

                          if ($p->status != "request_closed") {






                      ?>

                            <tr>
                              <td><?php echo $i ?></td>

                              <td><?php echo $machines[0]->asset_number; ?></td>
                              <td><?php echo $machines[0]->code; ?></td>
                              <td style=" overflow: hidden;"><?php echo $machines[0]->asset_description; ?></td>

                            </tr>

                      <?php
                            $i++;
                          }
                        }
                      } ?>
                    </tbody>


                  </table>
                </div>
                <div style="border:1px solid #111;" class="col-lg-4">
                  <h1>
                    Miscellaneous Work
                  </h1>


                  <table style=" table-layout: fixed;" id="" class=" table table table-striped">
                    <thead>
                      <tr>
                        <th>Sr No.</th>

                        <th>Machine Number</th>
                        <th>Machine Code</th>
                        <th>Machine Description</th>

                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      if ($iwr) {
                        $i = 1;
                        foreach ($iwr as $p) {
                          // print_r($group_ids);
                          $machines = $this->Crud_model->get_data_by_id("machines", $p->machine_id, "id");

                          if ($p->status != "request_closed") {
                      ?>

                            <tr>
                              <td><?php echo $i; ?></td>

                              <td><?php echo $machines[0]->asset_number; ?></td>
                              <td><?php echo $machines[0]->code; ?></td>
                              <td style="overflow:hidden;"><?php echo $machines[0]->asset_description; ?></td>

                            </tr>

                      <?php
                            $i++;
                          }
                        }
                      } ?>
                    </tbody>

                  </table>
                </div>

              </div>

            </div>
          </div>


        </div>



        <!-- ./col -->
      </div>




      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['gauge']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data1 = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['Pm Perf.', <?php echo $pm_performance ?>],
      // ['CPU', 55],
      // ['Network', 68]
    ]);
    var options1 = {
      width: 500,
      height: 200,
      redFrom: 0,
      redTo: 80,
      yellowFrom: 80,
      yellowTo: 100,
      minorTicks: 5,
      greenFrom: 100,
      greenTo: 500,

    };
    var chart1 = new google.visualization.Gauge(document.getElementById('chart_div1'));
    chart1.draw(data1, options1);


    var data2 = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['', <?php echo $mtbf; ?>],
      // ['CPU', 55],
      // ['Network', 68]
    ]);
    var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));

    chart2.draw(data2, options1);
    var data3 = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['', <?php echo $mttr; ?>],
      // ['CPU', 55],
      // ['Network', 68]
    ]);
    var chart3 = new google.visualization.Gauge(document.getElementById('chart_div3'));
    chart3.draw(data3, options1);




    var data4 = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['', <?php echo $MSEB; ?>],
      // ['CPU', 55],
      // ['Network', 68]
    ]);
    var chart4 = new google.visualization.Gauge(document.getElementById('chart_div4'));
    chart4.draw(data4, options1);

    var data5 = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['', <?php echo $gas_consumption; ?>],
      // ['CPU', 55],
      // ['Network', 68]
    ]);
    var chart5 = new google.visualization.Gauge(document.getElementById('chart_div5'));
    chart5.draw(data5, options1);

    var data6 = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['', <?php echo $Maintaince_cost ?>],
      // ['CPU', 55],
      // ['Network', 68]
    ]);
    var chart6 = new google.visualization.Gauge(document.getElementById('chart_div6'));
    chart6.draw(data6, options1);


  }
</script>