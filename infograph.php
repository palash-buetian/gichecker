<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

//
//
//print_r($_SESSION);
include 'config.php';

?>


<!DOCTYPE html>
<html lang="en" class="no-js">
<!--
  <![endif]-->
<!-- BEGIN HEAD -->
<head>
    <?php include 'header.php'; ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-sidebar-page-sidebar-closed-hide-logo page-header-fixed page-footer-fixed"
      oncontextmenu="return false;">
<!-- BEGIN HEADER -->
<!-- BEGIN HEADER -->

<?php include 'top_nav.php'; ?>

<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

    <!-- BEGIN SIDEBAR -->
    <?php include 'sidebar.php'; ?>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content" id="scroller" style="min-height:588px">
            <div class="row">
                <div class="col-md-12">


                    <div id="ajax-content">
                        <div class="page-head">
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-md-12"></div>
                                <div class="col-md-6">
                                    <div class="page-title">
                                        <h2 style="margin-top: 0px;">গ্রাফিক্যাল ড্যাশবোর্ডে স্বাগতম!</h2>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat blue-madison">
                                        <div class="visual">

                                        </div>
                                        <div class="details">
                                            <div class="number numeric_bangla">
                                                <?php
                                                $query = "SELECT * FROM `dag`";
                                                $result = mysqli_query($conn, $query);

                                                $numrows_entries = mysqli_num_rows($result);
                                                echo $numrows_entries;
                                                ?>
                                            </div>
                                            <div class="desc">
                                                এন্ট্রিকৃত সরকারি স্বার্থের তথ্য সংখ্যা
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat purple-soft">
                                        <div class="visual">

                                        </div>
                                        <div class="details">
                                            <div class="number numeric_bangla">
                                                <?php
                                                $query_mouja = "SELECT * FROM `mouja`";
                                                $result_mouja = mysqli_query($conn, $query_mouja);

                                                $numrows_mouja = mysqli_num_rows($result_mouja);

                                                echo $numrows_mouja;

                                                ?>
                                            </div>
                                            <div class="desc">
                                                এন্ট্রিকৃত মোট মৌজা সংখ্যা
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat green-soft">
                                        <div class="visual">

                                        </div>
                                        <div class="details">
                                            <div class="number numeric_bangla">
                                                <?php
                                                $query_interest = "SELECT * FROM `interest`";
                                                $result_interest = mysqli_query($conn, $query_interest);

                                                $numrows_interest = mysqli_num_rows($result_interest);
                                                echo $numrows_interest;

                                                ?>                  </div>
                                            <div class="desc">
                                                এন্ট্রিকৃত সরকারি স্বার্থের ধরণ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat red-soft">
                                        <div class="visual">

                                        </div>
                                        <div class="details">
                                            <div class="number numeric_bangla">
                                                <?php
                                                $query_sa_count = "SELECT COUNT(DISTINCT mouja_id, sa_dag)+COUNT(DISTINCT mouja_id,bs_dag) AS sa FROM `dag`";

                                                $result_interest = mysqli_query($conn, $query_sa_count);
                                                $result = mysqli_fetch_array($result_interest);

                                                echo $result['sa'];

                                                ?>
                                            </div>
                                            <div class="desc">
                                                এন্ট্রিকৃত মোট এসএ ও বিএস দাগের সংখ্যা
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- END PAGE CONTENT INNER -->

                        <div class="row">

                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/export-data.js"></script>
                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                            <figure class="highcharts-figure">
                                <div id="container"></div>

                            </figure>


                        </div>


                        <div class="indexPart5">
                            <div class="row"
                            ">


                            <?php
                            $query_mouja = "SELECT * FROM `mouja`";
                            $result_mouja = mysqli_query($conn, $query_mouja);

                            $mouja_names = $mouja_entries = [];
                            while ($info = mysqli_fetch_array($result_mouja)) {



                                $dag_query = "SELECT * FROM `dag` WHERE mouja_id ={$info['id']}";

                                $dag_result = mysqli_query($conn, $dag_query);
                                $dag_info = mysqli_num_rows($dag_result);

                                array_push($mouja_names, $info['name']);
                                array_push($mouja_entries, $dag_info);

                                ?>
                                <div class="admin_group col-lg-3 col-md-3 col-sm-6 col-xs-12"
                                     style="height: 120px !important;">
                                    <div class="admin dashboard-stat <?php
                                    if ($info['id'] % 2 == 0) {
                                        echo 'red-soft';
                                    } else echo 'blue-madison'
                                    ?>" href="#">
                                        <div class="visual">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <div class="details">
                                            <div class="division_stat">
                                                <h3><span>
                                                      <?php echo $info['name']; ?>
                                                    </span></h3>
                                            </div>
                                            <div class="description" style="font-size: 15px;">
                                                <div>মোট <span class="numeric_bangla"> <?php echo $dag_info; ?> </span>টি
                                                    দাগের তথ্য
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <?php
                            }

                            $mouja_names = "'" . implode ( "', '", $mouja_names ) . "'";
                            $mouja_entries = implode ( ", ", $mouja_entries );
                            ?>


                        </div>
                    </div>


                    <!-- END PAGE CONTENT INNER -->
                    <!-- END PAGE CONTENT INNER -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->


<script>
    Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        style: {
            filter:'alpha(opacity=10)',
            opacity:10,
            background:'transparent',
            fontFamily: 'kalpurushregular !important',
        },
        title: {
            text: 'মৌজাভিত্তিক মোট সরকারি স্বার্থ সম্পর্কিত দাগের সংখ্যার তুলনামূলক চিত্র'
        },
        xAxis: {
            categories: [<?php  echo $mouja_names; ?>],
            title: {
                text: null
            }
        },
        series: [{
            name: 'এন্ট্রির সংখ্যা',
            data: [<?php echo $mouja_entries;?>]
        }],

        yAxis: {
            min: 0,
            title: {
                text: 'এন্ট্রিকৃত এসএ অথবা বিএস দাগের সংখ্যা',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' টি'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },

    });
</script>


<?php include 'footer.php'; ?>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->

<!-- END PAGE LEVEL SCRIPTS -->

<!-- END JAVASCRIPTS -->
<!-- END BODY -->
</body>
</html>
