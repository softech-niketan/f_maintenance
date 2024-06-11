<?php

// $jan1 = $this->db->query('SELECT SUM(id) as SUM1,complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 1 AND created_year =  ' . $year_id . ' ')->result();
$jan2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 1 AND created_year =  ' . $year_id . ' ')->result();


// $feb1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 2 AND created_year =  ' . $year_id . ' ')->result();
// $feb =  $feb1[0]->SUM1;

// $mar1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 3 AND created_year =  ' . $year_id . ' ')->result();
// $mar =  $mar1[0]->SUM1;

// $apr1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 4 AND created_year =  ' . $year_id . ' ')->result();
// $apr =  $apr1[0]->SUM1;

// $may1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 5 AND created_year =  ' . $year_id . ' ')->result();
// $may =  $may1[0]->SUM1;

// $jun1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 6 AND created_year =  ' . $year_id . ' ')->result();
// $jun =  $jun1[0]->SUM1;


// $jul1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 7 AND created_year =  ' . $year_id . ' ')->result();
// $jul =  $jul1[0]->SUM1;

// $aug1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 8 AND created_year =  ' . $year_id . ' ')->result();
// $aug =  $aug1[0]->SUM1;

// $sep1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 9 AND created_year =  ' . $year_id . ' ')->result();
// $sep =  $sep1[0]->SUM1;

// $oct1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 10 AND created_year =  ' . $year_id . ' ')->result();
// $oct =  $oct1[0]->SUM1;

// $nov1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 11 AND created_year =  ' . $year_id . ' ')->result();
// $nov =  $nov1[0]->SUM1;

// $dec1 = $this->db->query('SELECT SUM(id) as SUM1  FROM breakdown_request   WHERE crated_month = 12 AND created_year =  ' . $year_id . ' ')->result();
// $dec =  $dec1[0]->SUM1;


$feb2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 2 AND created_year =  ' . $year_id . ' ')->result();
$mar2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 3 AND created_year =  ' . $year_id . ' ')->result();
$apr2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 4 AND created_year =  ' . $year_id . ' ')->result();
$may2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 5 AND created_year =  ' . $year_id . ' ')->result();
$jun2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 6 AND created_year =  ' . $year_id . ' ')->result();
$jul2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 7 AND created_year =  ' . $year_id . ' ')->result();
$aug2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 8 AND created_year =  ' . $year_id . ' ')->result();
$sep2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 9 AND created_year =  ' . $year_id . ' ')->result();
$oct2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 10 AND created_year =  ' . $year_id . ' ')->result();
$nov2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 11 AND created_year =  ' . $year_id . ' ')->result();
$dec2 = $this->db->query('SELECT complete_time_maintaince  FROM breakdown_request   WHERE crated_month = 12 AND created_year =  ' . $year_id . ' ')->result();


$jan_hour = 0;
foreach ($jan2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $jan_hour = $jan_hour + $hour;
}

$feb_hour = 0;
foreach ($feb2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $feb_hour = $feb_hour + $hour;
}

$mar_hour = 0;
foreach ($mar2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $mar_hour = $mar_hour + $hour;
}

$apr_hour = 0;
foreach ($apr2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $apr_hour = $apr_hour + $hour;
}

$may_hour = 0;
foreach ($mar2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $may_hour = $may_hour + $hour;
}

$jun_hour = 0;
foreach ($jun2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $jun_hour = $jun_hour + $hour;
}

$jul_hour = 0;
foreach ($jul2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $jul_hour = $jul_hour + $hour;
}

$aug_hour = 0;
foreach ($aug2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $aug_hour = $aug_hour + $hour;
}

$sep_hour = 0;
foreach ($sep2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $sep_hour = $sep_hour + $hour;
}

$oct_hour = 0;
foreach ($oct2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $oct_hour = $oct_hour + $hour;
}

$nov_hour = 0;
foreach ($nov2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $nov_hour = $nov_hour + $hour;
}

$dec_hour = 0;
foreach ($nov2 as $j) {
    // echo $j->complete_time_maintaince;
    $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);

    $dec_hour = $dec_hour + $hour;
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
          ['Month', 'Hours'],
          ["JAN", <?php if (!empty($jan_hour)) {
                        echo $jan_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["FEB", <?php if (!empty($feb_hour)) {
                        echo $feb_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["MAR", <?php if (!empty($mar_hour)) {
                        echo $mar_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["APR", <?php if (!empty($apr_hour)) {
                        echo $apr_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["MAY", <?php if (!empty($may_hour)) {
                        echo $may_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["JUN", <?php if (!empty($jun_hour)) {
                        echo $jun_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["JUL", <?php if (!empty($jul_hour)) {
                        echo $jul_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["AUG", <?php if (!empty($aug_hour)) {
                        echo $jan_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["SEP", <?php if (!empty($sep_hour)) {
                        echo $sep_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["OCT", <?php if (!empty($oct_hour)) {
                        echo $oct_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["NOV", <?php if (!empty($nov_hour)) {
                        echo $nov_hour;
                    } else {
                        echo 0;
                    } ?>],
            ["DEC", <?php if (!empty($dec_hour)) {
                        echo $dec_hour;
                    } else {
                        echo 0;
                    } ?>],

        ]);

        var options = {
          chart: {
            title: 'BD Total Hours ',
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
                        <h1>BD Total Hours </h1>
                        <?php

                        // echo  $hour = round((float) substr($j->complete_time_maintaince, 6, 3), 2);
                        //    $hour = round($hour, 2);
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">BD Total Hours </li>
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
                                            <form action="<?php echo base_url('chart_bd_hourse'); ?>" method="POST">
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
                                                <th><?php echo $jan_hour ?></th>
                                                <th><?php echo $feb_hour ?></th>
                                                <th><?php echo $mar_hour ?></th>
                                                <th><?php echo $apr_hour ?></th>
                                                <th><?php echo $may_hour ?></th>
                                                <th><?php echo $jun_hour ?></th>
                                                <th><?php echo $jul_hour ?></th>
                                                <th><?php echo $aug_hour ?></th>
                                                <th><?php echo $sep_hour ?></th>
                                                <th><?php echo $oct_hour ?></th>
                                                <th><?php echo $nov_hour ?></th>
                                                <th><?php echo $dec_hour ?></th>
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