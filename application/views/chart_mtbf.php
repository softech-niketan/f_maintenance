<?php

for ($jj = 1; $jj <= 12; $jj++) {
    ${"variable$jj"} = 0;
    $mar1 = $this->db->query('SELECT  complete_time_feedback,complete_time_maintaince FROM breakdown_request WHERE  crated_month = '.$jj.' AND created_year =  ' . $year_id . ' AND status = "request_closed" ')->result();
    $bd_hours = 0;
    $no_of_failures = 0;
    $ava_hours = 624;
    $mtbf = 0;
    $total_hours_bcount = 0;
    $total_faliure_count = 0;
    $total_mtfb = 0;;
    $count_mtbf = 0;
    foreach ($mar1 as $b) { {
            $min = (float) substr($b->complete_time_maintaince, 15, 3);

            $min = round($min, 2);
            $hour = (float) substr($b->complete_time_maintaince, 6, 3);
            $hour = round($hour, 2);
            $days = (float) substr($b->complete_time_maintaince, 0, 2);
            $total_hours = ($days * 24) + $hour + ($min / 60);
            $total_hours = round($total_hours, 2);



            $bd_hours = $bd_hours + $total_hours;
            $no_of_failures++;
        }
    }
    $total_hours_bcount =  $total_hours_bcount + $bd_hours;
    $total_faliure_count =  $total_faliure_count + $no_of_failures;
    if ($no_of_failures != 0) {
        $mtbf = round(($ava_hours - $bd_hours) / $no_of_failures, 2);
        $count_mtbf++;
        $total_mtfb = $total_mtfb + $mtbf;
        ${"variable$jj"} = round((($no_of_failures * $ava_hours) - $bd_hours) / $no_of_failures, 2);
     
    }
  

}



?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);



    function drawStuff() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'MTBF'],
            ["JAN", <?php if (!empty($variable1)) {
                        echo $variable1;
                    } else {
                        echo 0;
                    } ?>],
            ["FEB", <?php if (!empty($variable2)) {
                        echo $variable2;
                    } else {
                        echo 0;
                    } ?>],
            ["MAR", <?php if (!empty($variable3)) {
                        echo $variable3;
                    } else {
                        echo 0;
                    } ?>],
            ["APR", <?php if (!empty($variable4)) {
                        echo $variable4;
                    } else {
                        echo 0;
                    } ?>],
            ["MAY", <?php if (!empty($variable5)) {
                        echo $variable5;
                    } else {
                        echo 0;
                    } ?>],
            ["JUN", <?php if (!empty($variable6)) {
                        echo $variable6;
                    } else {
                        echo 0;
                    } ?>],
            ["JUL", <?php if (!empty($variable7)) {
                        echo $variable7;
                    } else {
                        echo 0;
                    } ?>],
            ["AUG", <?php if (!empty($variable8)) {
                        echo $variable8;
                    } else {
                        echo 0;
                    } ?>],
            ["SEP", <?php if (!empty($variable9)) {
                        echo $variable9;
                    } else {
                        echo 0;
                    } ?>],
            ["OCT", <?php if (!empty($variable10)) {
                        echo $variable10;
                    } else {
                        echo 0;
                    } ?>],
            ["NOV", <?php if (!empty($variable11)) {
                        echo $variable11;
                    } else {
                        echo 0;
                    } ?>],
            ["DEC", <?php if (!empty($variable12)) {
                        echo $variable12;
                    } else {
                        echo 0;
                    } ?>],

        ]);

        var options = {
            chart: {
                title: 'MTBF',
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
                        <h1> MTBF </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">MTBF </li>
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
                                <?php

echo $variable1;
                                // print_r($breakdown_request_data);
                                ?>

                                <div class="col-lg-12 mt-5" style="border:1px solid black;padding:15px">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <form action="<?php echo base_url('chart_mttr'); ?>" method="POST">
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
                                    <div id="top_x_div" style="width: 100%; height: 500px;"></div>
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
                                                <th><?php echo $variable1 ?></th>
                                                <th><?php echo $variable2 ?></th>
                                                <th><?php echo $variable3 ?></th>
                                                <th><?php echo $variable4 ?></th>
                                                <th><?php echo $variable5 ?></th>
                                                <th><?php echo $variable6 ?></th>
                                                <th><?php echo $variable7 ?></th>
                                                <th><?php echo $variable8 ?></th>
                                                <th><?php echo $variable9 ?></th>
                                                <th><?php echo $variable10 ?></th>
                                                <th><?php echo $variable11 ?></th>
                                                <th><?php echo $variable12 ?></th>

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