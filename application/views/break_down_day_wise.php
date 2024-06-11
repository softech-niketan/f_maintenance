<style>
    td {
        border: 2px solid black;
    }
</style>
<div style="width: 2000px;" class="wrapper">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BREAKDOWN OCCURANCE CHART DAY WISE </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">BREAKDOWN OCCURANCE CHART DAY WISE </li>
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

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <b>Doc. No. :QF/MT/8.5/09</b>
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
                                            <?php
                                            $Electrical_check =  $this->Crud_model->query_sinegle("SELECT COUNT(id) AS SUM FROM breakdown_request WHERE type_of_breakdown = 'Electrical' AND crated_month = $month_id AND created_year = $year_id");
                                            $Electrical = $Electrical_check[0]->SUM;

                                            $Hydraulic_check =  $this->Crud_model->query_sinegle("SELECT COUNT(id) AS SUM FROM breakdown_request WHERE type_of_breakdown = 'Hydraulic' AND crated_month = $month_id AND created_year = $year_id");
                                            $Hydraulic = $Hydraulic_check[0]->SUM;

                                            $Mechanical_check =  $this->Crud_model->query_sinegle("SELECT COUNT(id) AS SUM FROM breakdown_request WHERE type_of_breakdown = 'Mechanical' AND crated_month = $month_id AND created_year = $year_id");
                                            $Mechanical = $Mechanical_check[0]->SUM;

                                            $Pneumatic_check =  $this->Crud_model->query_sinegle("SELECT COUNT(id) AS SUM FROM breakdown_request WHERE type_of_breakdown = 'Pneumatic' AND crated_month = $month_id AND created_year = $year_id");
                                            $Pneumatic = $Pneumatic_check[0]->SUM;

                                            $other_check =  $this->Crud_model->query_sinegle("SELECT COUNT(id) AS SUM FROM breakdown_request WHERE type_of_breakdown = 'Other' AND crated_month = $month_id AND created_year = $year_id");
                                            $other = $other_check[0]->SUM;


                                            $total = $Electrical + $Hydraulic + $Mechanical + $Pneumatic + $other;

                                            if ($total > 0) {
                                                $Electrical_show = round(($Electrical * 100) / $total, 0);
                                                "<br>";
                                                $Hydraulic_show = round(($Hydraulic * 100) / $total, 0);
                                                "<br>";

                                                $Mechanical_show = round(($Mechanical * 100) / $total, 0);
                                                "<br>";

                                                $Pneumatic_show = round(($Pneumatic * 100) / $total, 0);
                                                "<br>";

                                                $other_show = round(($other * 100) / $total, 0);
                                            } else {
                                                $Electrical_show = 0;
                                                $Hydraulic_show = 0;
                                                $Mechanical_show = 0;
                                                $Pneumatic_show = 0;
                                                $other_show = 0;
                                            }




                                            ?>

                                            <div class="col-lg-8 mt-5" style="border:1px solid black;padding:15px">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <form action="<?php echo base_url('break_down_day_wise'); ?>" method="POST">
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
                                                    <div class="col-lg-2">
                                                        <form action="<?php echo base_url('annual_preventive'); ?>" method="POST">
                                                            <label for="">Select Month <span class="text-danger">*</span></label>
                                                            <select required class="form-control select2" name="month_id" id="">
                                                                <?php
                                                                for ($y = 1; $y <= 12; $y++) {
                                                                    $month_new = $this->Crud_model->get_month($y);
                                                                ?>
                                                                    <option <?php if ($month_id == $y) {
                                                                                echo "selected";
                                                                            } ?> value="<?php echo $y; ?>"><?php echo $month_new; ?></option>

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


                                    </div>
                                    <div class="col-lg-4 text-left" id="">
                                        <div id="">
                                            <!-- <div id="piechart" style="width: 500px; height: 300px;margin-left:-400px"></div> -->
                                            <div id="piechart2" style="width: 500px; height: 300px;margin-left:-400px"></div>

                                        </div>
                                        <!-- <button id="fo">download</button> -->



                                    </div>



                                </div>



                            </div>

                            <div class="card-body">
                                <?php
                                if ($breakdown_request) {
                                ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-center bg-secondary">
                                            <tr>
                                                <th>SR NO</th>
                                                <th>MACHINE NO </th>
                                                <th>MACHINE DESCRIPTION </th>
                                                <th>MACHINE Code </th>

                                                <?php
                                                for ($f = 1; $f <= 31; $f++) {
                                                ?>

                                                    <th> <?php echo $f; ?></th>
                                                <?php


                                                }
                                                ?>
                                                <th>Total</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $i = 1;
                                            $final_count = 0;
                                            // if($breakdown_request)
                                            // {
                                            foreach ($machines as $p) {
                                                $data_check = array(
                                                    "created_year" => $year_id,
                                                    "crated_month" => $month_id,
                                                    "machine_id" => $p->id,
                                                );
                                                $breakdown_request_data = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
                                                if ($breakdown_request_data) {
                                                    if (count($breakdown_request_data) > 0) {


                                                        // $assign_pm_group = $this->Crud_model->get_data_by_id("assign_pm_group", $p->machine_id, "machine_id");
                                                        // if($assign_pm_group)
                                                        // {

                                            ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $p->asset_number; ?></td>
                                                            <td><?php echo $p->asset_description; ?></td>
                                                            <td><?php echo $p->code; ?></td>
                                                            <?php
                                                            $total_row = 0;
                                                            $total_column = 0;
                                                            for ($f = 1; $f <= 31; $f++) {
                                                                $flag = 0;
                                                                $count = 0;

                                                                foreach ($breakdown_request_data as $b) {
                                                                    $d = date_parse_from_format("Y-m-d", date("Y-m-d", strtotime($b->created_date)));

                                                                    $date_new = $d["day"];
                                                                    // echo "<br>";
                                                                    $month_new_2 = $d["month"];

                                                                    $month_new_2_new = $this->Crud_model->get_month($month_new_2);
                                                                    //   echo "<br>";
                                                                    $year_id_new = $d["year"];
                                                                    if ($date_new == $f && $month_new_2 == $month_id) {
                                                                        $flag = 1;
                                                                        $count++;
                                                                    }
                                                                }
                                                                if ($flag == 1) {


                                                            ?>
                                                                    <td class="bg-danger">
                                                                        <?php
                                                                        echo $count;
                                                                        $total_row = $total_row + $count;
                                                                        ?>
                                                                    </td>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <td class="">
                                                                        <?php //echo// $month_new_2_new; //if($flag == 1){ echo $year_id_new;}
                                                                        ?>
                                                                    </td>
                                                                <?php
                                                                }

                                                                ?>

                                                            <?php
                                                            }


                                                            // }
                                                            ?>

                                                            <th><?php echo $total_row;
                                                                $final_count = $final_count + $total_row;
                                                                ?></th>


                                                        </tr>



                                            <?php
                                                        $i++;
                                                    }
                                                }
                                            }
                                            //}
                                            // 


                                            ?>

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-center"> Total</th>
                                                <?php

                                                $data_check = array(
                                                    "created_year" => $year_id,
                                                    "crated_month" => $month_id,
                                                );
                                                $breakdown_request_data = $this->Crud_model->get_data_by_id_multile("breakdown_request", $data_check);
                                                if ($breakdown_request_data) {
                                                    if (count($breakdown_request_data) > 0) {
                                                        for ($f = 1; $f <= 31; $f++) {
                                                            $flag = 0;
                                                            $count = 0;

                                                            foreach ($breakdown_request_data as $b) {
                                                                $d = date_parse_from_format("Y-m-d", date("Y-m-d", strtotime($b->created_date)));

                                                                $date_new = $d["day"];
                                                                // echo "<br>";
                                                                $month_new_2 = $d["month"];

                                                                $month_new_2_new = $this->Crud_model->get_month($month_new_2);
                                                                //   echo "<br>";
                                                                $year_id_new = $d["year"];
                                                                if ($date_new == $f && $month_new_2 == $month_id) {
                                                                    $flag = 1;
                                                                    $count++;
                                                                }
                                                            }

                                                            echo "<th>" . $count . "</th>";
                                                        }
                                                    }
                                                }




                                                ?>
                                                <th><?php echo $final_count; ?></th>
                                            </tr>
                                        </tfoot>





                                    </table>

                                <?php
                                }

                                // } else {
                                //     echo "
                                //                     <div style='padding:10px' class='text-center alert-danger'>
                                //                     <h3>No Result Found</h3>
                                //                     </div>
                                //                     ";
                                // }

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

    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);
        // drawChart();

        function drawChart() {
            console.log("drawChartcalled2");



            var data = google.visualization.arrayToDataTable([
                ['Type', '%'],
                ['ELECTRICAL', <?php echo $Electrical_show; ?>],
                ['HYDRAULIC', <?php echo $Hydraulic_show; ?>],
                ['MECHANICAL', <?php echo $Mechanical_show; ?>],
                ['PNEUMATIC', <?php echo $Pneumatic_show; ?>],
                ['OTHER', <?php echo $other_show; ?>],

            ]);

            var options = {
                title: 'Breakdown Type'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script> -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Type', '%'],
                ['ELECTRICAL', <?php echo $Electrical_show; ?>],
                ['HYDRAULIC', <?php echo $Hydraulic_show; ?>],
                ['MECHANICAL', <?php echo $Mechanical_show; ?>],
                ['PNEUMATIC', <?php echo $Pneumatic_show; ?>],
                ['OTHER', <?php echo $other_show; ?>],
            ]);

            var options = {
                title: 'Breakdown Type'

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>