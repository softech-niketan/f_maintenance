<?php

$jan1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 1 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$jan =  $jan1[0]->SUM1 + $jan1[0]->SUM2;

$feb1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 2 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$feb =  $feb1[0]->SUM1 + $feb1[0]->SUM2;

$mar1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 3 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$mar =  $mar1[0]->SUM1 + $mar1[0]->SUM2;

$apr1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 4 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$apr =  $apr1[0]->SUM1 + $apr1[0]->SUM2;

$may1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 5 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$may =  $may1[0]->SUM1 + $may1[0]->SUM2;

$jun1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 6 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$jun =  $jun1[0]->SUM1 + $jun1[0]->SUM2;


$jul1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 7 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$jul =  $jul1[0]->SUM1 + $jul1[0]->SUM2;

$aug1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 8 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$aug =  $aug1[0]->SUM1 + $aug1[0]->SUM2;

$sep1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 9 AND created_year =  ' . $year_id . ' AND type = "improvement" ')->result();
$sep =  $sep1[0]->SUM1 + $sep1[0]->SUM2;

$oct1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 10 AND created_year =  ' . $year_id . '  AND type = "improvement" ')->result();
$oct =  $oct1[0]->SUM1 + $oct1[0]->SUM2;

$nov1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 11 AND created_year =  ' . $year_id . '  AND type = "improvement" ')->result();
$nov =  $nov1[0]->SUM1 + $nov1[0]->SUM2;

$dec1 = $this->db->query('SELECT SUM(grn_1_actual_price) as SUM1, SUM(grn_2_actual_price) as SUM2  FROM spare_parts   WHERE created_month = 12 AND created_year =  ' . $year_id . '  AND type = "improvement" ')->result();
$dec =  $dec1[0]->SUM1 + $dec1[0]->SUM2;




?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);



    function drawStuff() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Cost'],
          ["JAN", <?php if (!empty($jan)) {
                        echo $jan;
                    } else {
                        echo 0;
                    } ?>],
            ["FEB", <?php if (!empty($feb)) {
                        echo $feb;
                    } else {
                        echo 0;
                    } ?>],
            ["MAR", <?php if (!empty($mar)) {
                        echo $mar;
                    } else {
                        echo 0;
                    } ?>],
            ["APR", <?php if (!empty($apr)) {
                        echo $apr;
                    } else {
                        echo 0;
                    } ?>],
            ["MAY", <?php if (!empty($may)) {
                        echo $may;
                    } else {
                        echo 0;
                    } ?>],
            ["JUN", <?php if (!empty($jun)) {
                        echo $jun;
                    } else {
                        echo 0;
                    } ?>],
            ["JUL", <?php if (!empty($jul)) {
                        echo $jul;
                    } else {
                        echo 0;
                    } ?>],
            ["AUG", <?php if (!empty($aug)) {
                        echo $aug;
                    } else {
                        echo 0;
                    } ?>],
            ["SEP", <?php if (!empty($sep)) {
                        echo $sep;
                    } else {
                        echo 0;
                    } ?>],
            ["OCT", <?php if (!empty($oct)) {
                        echo $oct;
                    } else {
                        echo 0;
                    } ?>],
            ["NOV", <?php if (!empty($nov)) {
                        echo $nov;
                    } else {
                        echo 0;
                    } ?>],
            ["DEC", <?php if (!empty($dec)) {
                        echo $dec;
                    } else {
                        echo 0;
                    } ?>],

        ]);

        var options = {
          chart: {
            title: 'Improvement Cost',
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
</script>
<div style="width: 100%;" class="wrapper">


    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Improvement Cost </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?php ?></li>
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
                                <!-- <div class="row">
                                    <div class="col-lg-2">
                                        <b>Doc. No. :QF/MT/8.5/17</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Date : 18-03-2018</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Rev.No./Date : 00/18-03-2018</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Page No. : 1 of 1</b>
                                    </div>
                                </div> -->

                                <div class="col-lg-12 mt-5" style="border:1px solid black;padding:15px">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <form action="<?php echo base_url('chart_improvement_cost'); ?>" method="POST">
                                                <label for="">Select Year <span class="text-danger">*</span></label>
                                                <select required class="form-control select2" name="year_id" id="">
                                                    <?php
                                                    for ($x = 2020; $x <= 2027; $x++) {
                                                    ?>
                                                        <option <?php if ($year_id == $x) {
                                                                    echo "selected";
                                                                } ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                    <!-- <option value="2020">2020</option> -->

                                                </select>
                                        </div>

                                        <div class="col-lg-2 ">
                                            <button style="margin-top: 30px;" type="submit" type="submit" class="btn btn-primary">
                                                Search
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>


                            </div>

                            <div class="card-body">






                                <body>
                                    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
                                    <br>

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>JAN</th>
                                                <th>FEB</th>
                                                <th>MAR</th>
                                                <th>APR</th>
                                                <th>MAY</th>
                                                <th>JUN</th>
                                                <th>JUL</th>
                                                <th>AUG</th>
                                                <th>SEP</th>
                                                <th>OCT</th>
                                                <th>NOV</th>
                                                <th>DEC</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <th><?php echo $jan ?></th>
                                                <th><?php echo $feb ?></th>
                                                <th><?php echo $mar ?></th>
                                                <th><?php echo $apr ?></th>
                                                <th><?php echo $may ?></th>
                                                <th><?php echo $jun ?></th>
                                                <th><?php echo $jul ?></th>
                                                <th><?php echo $aug ?></th>
                                                <th><?php echo $sep ?></th>
                                                <th><?php echo $oct ?></th>
                                                <th><?php echo $nov ?></th>
                                                <th><?php echo $dec ?></th>

                                            </tr>

                                        </tbody>

                                    </table>

                                </body>







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