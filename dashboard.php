<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login");
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


                    <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message']))
                    { ?>
                        <div id="success-alert" class="alert alert-success message success">
                            <button class="close" data-close="alert"></button>
                            <?php echo $_SESSION['success_message']; ?>
                        </div>
                        <?php unset($_SESSION['success_message']);
                    }
                    ?>

                    <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message']))
                    { ?>
                        <div id="success-alert" class="alert alert-danger message danger">
                            <button class="close" data-close="alert"></button>
                            <?php echo $_SESSION['error_message']; ?>
                        </div>
                        <?php unset($_SESSION['error_message']);
                    }
                    ?>


                    <div id="ajax-content">
                        <div class="page-head">
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-md-12"></div>
                                <div class="col-md-6">
                                    <div class="page-title">
                                        <h2 style="margin-top: 0px;"> ড্যাশবোর্ডে স্বাগতম!</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right" style="margin-top: 10px;">
                                    <a href="/add" style="background:#399439;" type="submit" name="submit"
                                       id="submit" class="btn btn-success btn-lg">
                                        <i class="fa fa-fw fa-plus"></i> নতুন তথ্য সংযোজন করুন
                                    </a>

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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet blue box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i> সরকারি স্বার্থ সার্চ করুন
                                        </div>
                                    </div>
                                    <div class="portlet-body" >
                                        <div style="font-size: 16px;text-align: center;margin: 20px;margin-bottom: 0px;">
                                            <div class="col-sm-13">

                                                <form id="dashboard" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                    <div class="row">
                                                        <div class="col-sm-1" style="width: 10%;flex: 0 0 10%;max-width: 10%;">
                                                            <div class="form-group">
                                                                <input type="text" name="sa_dag" id="sa_dag"
                                                                       class="form-control bn2en"
                                                                       value="<?php echo isset($_REQUEST["sa_dag"]) ? $_REQUEST["sa_dag"] : ""; ?>"
                                                                       placeholder="এসএ দাগ ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1"  style="width: 10%;flex: 0 0 10%;max-width: 10%;">
                                                            <div class="form-group">
                                                                <input type="text" name="bs_dag" id="bs_dag"
                                                                       class="form-control  bn2en"
                                                                       value="<?php echo isset($_REQUEST["bs_dag"]) ? $_REQUEST["bs_dag"] : ""; ?>"
                                                                       placeholder="বিএস দাগ ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" name="sa_khatian" id="sa_khatian"
                                                                       class="form-control  bn2en"
                                                                       value="<?php echo isset($_REQUEST["sa_khatian"]) ? $_REQUEST["sa_khatian"] : ""; ?>"
                                                                       placeholder="এসএ খতিয়ান ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" name="bs_khatian" id="bs_khatian"
                                                                       class="form-control  bn2en"
                                                                       value="<?php echo isset($_REQUEST["bs_khatian"]) ? $_REQUEST["bs_khatian"] : ""; ?>"
                                                                       placeholder="বিএস খতিয়ান ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <div class=" input select">
                                                                    <div id="container_mouja_id" class="">
                                                                        <select class="form-control  "
                                                                                name="mouja_id"
                                                                                placeholder="মৌজা সিলেক্ট করুন"
                                                                                id="mouja_id"
                                                                                tabindex="-1" aria-hidden="true">
                                                                            <?php
                                                                            if (isset($_REQUEST["mouja_id"]))
                                                                            {
                                                                                $mouja_id = (int)$_REQUEST["mouja_id"];
                                                                            }elseif(isset($_GET["mouja_id"])){
                                                                                $interest_id = (int)$_GET["mouja_id"];
                                                                            }
                                                                            else
                                                                            {
                                                                                $mouja_id = 0;
                                                                            }

                                                                            ?>
                                                                            <option value="0">মৌজা সিলেক্ট করুন</option>
                                                                            <?php
                                                                            // get the info from the db
                                                                            $query = "SELECT * FROM `mouja` ORDER BY id ASC";
                                                                            $result = mysqli_query($conn, $query);

                                                                            //$numrows = mysqli_num_rows($result);

                                                                            // print($numrows);
                                                                            while ($info = mysqli_fetch_array($result))
                                                                            {

                                                                                echo '<option value="';
                                                                                echo $info['id'];
                                                                                echo '"';

                                                                                if ($mouja_id == $info['id']) echo ' selected="selected"';
                                                                                echo '>';
                                                                                echo $info['name'];
                                                                                echo '</option>';

                                                                            }

                                                                            ?>


                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <div class=" input select">
                                                                    <div id="container_mouja_id" class="">
                                                                        <select class="form-control "
                                                                                name="interest_id"
                                                                                placeholder="সরকারি স্বার্থ সিলেক্ট করুন"
                                                                                id="interest_id"
                                                                                tabindex="-1" aria-hidden="true">



                                                                            <option value="">সরকারি স্বার্থ সিলেক্ট
                                                                                করুন  </option>

                                                                            <?php

                                                                            if (isset($_REQUEST["interest_id"]))
                                                                            {
                                                                                $interest_id = (int)$_REQUEST["interest_id"];
                                                                            }elseif(isset($_GET["interest_id"])){
                                                                                $interest_id = (int)$_GET["interest_id"];
                                                                            }
                                                                            else
                                                                            {
                                                                                $interest_id = 0;
                                                                            }

                                                                            //print_r($interest_id);
                                                                            // get the info from the db
                                                                            $interest_query = "SELECT * FROM `interest` ORDER BY `interest_id` ASC";
                                                                            $interest_result = mysqli_query($conn, $interest_query);

                                                                            $interest_rows = mysqli_num_rows($interest_result);

                                                                            while ($interest_info = mysqli_fetch_array($interest_result))
                                                                            {

                                                                                echo '<option value="';
                                                                                echo $interest_info['interest_id'];
                                                                                echo '"';

                                                                                if ($interest_id != 0 & $interest_id == $interest_info['interest_id'])
                                                                                {
                                                                                    echo ' selected="selected"';
                                                                                }

                                                                                echo '>';
                                                                                echo $interest_info['interest_name'];
                                                                                echo '</option>';
                                                                            }

                                                                            ?>
                                                                        </select>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <div>
                                                                    <button id="dag_search" type="submit" name="submit"
                                                                            id="submit" class="btn btn-primary">
                                                                        <i class="fa fa-fw fa-search"></i> অনুসন্ধান
                                                                    </button>
                                                                    <!--
                                                                    <a href="<?php echo $_SERVER["PHP_SELF"]; ?>"
                                                                       class="btn btn-danger">
                                                                        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></i>
                                                                        রিফ্রেস </a>
                                                                        -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet purple box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i> সরকারি স্বার্থের তালিকা
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">


                                            <table class="table table-striped table-bordered table-hover" id="sample_6">
                                                <thead>
                                                <tr>
                                                    <th style="text-align: center;">ক্রম</th>
                                                    <th style="text-align: center;">মৌজার নাম</th>

                                                    <th style="text-align: center;">এসএ জেএল</th>
                                                    <th style="text-align: center;">বিএস জেএল</th>

                                                    <th style="text-align: center;">এসএ দাগ</th>
                                                    <th style="text-align: center;">বিএস দাগ</th>


                                                    <th style="text-align: center;">এসএ খতিয়ান </th>
                                                    <th style="text-align: center;">বিএস খতিয়ান</th>

                                                    <th style="text-align: center;">এসএ জমি (একর)</th>
                                                    <th style="text-align: center;">বিএস জমি (একর)</th>

                                                    <th style="text-align: center;">সরকারি স্বার্থের ধরণ</th>

                                                    <th style="text-align: center;" width="15%">পদক্ষেপ</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                include 'config.php';
                                                // get the info from the db
                                                $query = "SELECT * FROM `dag` ORDER BY id DESC";
                                                $result = mysqli_query($conn, $query);

                                                $numrows = mysqli_num_rows($result);

                                                // number of rows to show per page
                                                $rowsperpage = 11;
                                                // find out total pages
                                                $totalpages = ceil($numrows / $rowsperpage);

                                                // get the current page or set a default
                                                if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage']))
                                                {
                                                    // cast var as int
                                                    $currentpage = (int)$_GET['currentpage'];
                                                }
                                                else
                                                {
                                                    // default page num
                                                    $currentpage = 1;
                                                } // end if


                                                // if current page is greater than total pages...
                                                if ($currentpage > $totalpages)
                                                {
                                                    // set current page to last page
                                                    $currentpage = $totalpages;
                                                } // end if
                                                // if current page is less than first page...
                                                if ($currentpage < 1)
                                                {
                                                    // set current page to first page
                                                    $currentpage = 1;
                                                } // end if
                                                // the offset of the list, based on current page
                                                $offset = ($currentpage - 1) * $rowsperpage;

                                                // get the info from the db
                                                $query_final = "SELECT * FROM `dag` ORDER BY id DESC LIMIT $offset, $rowsperpage";


                                                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                                                {

                                                    // Include config file
                                                    $sa_dag = $_POST['sa_dag'] ;
                                                    $bs_dag = $_POST['bs_dag'];
                                                    $sa_khatian = $_POST['sa_khatian'];
                                                    $bs_khatian = $_POST['bs_khatian'];
                                                    $mouja_id = $_POST['mouja_id'];
                                                    $interest_id = $_POST['interest_id'];

                                                    $data = array_filter($_POST);
                                                }else{
                                                    $sa_dag = isset($_GET['sa_dag']) ? $_GET['sa_dag'] : '';
                                                    $bs_dag = isset($_GET['bs_dag']) ? $_GET['bs_dag'] : '';
                                                    $sa_khatian = isset($_GET['sa_khatian']) ? $_GET['sa_khatian'] : '';
                                                    $bs_khatian =isset($_GET['bs_khatian']) ? $_GET['bs_khatian'] : '';
                                                    $mouja_id = isset($_GET['mouja_id']) ? $_GET['mouja_id'] : '';
                                                    $interest_id = isset($_GET['interest_id']) ? $_GET['interest_id'] : '';

                                                    $data = array_filter($_GET);
                                                }

                                                unset($data['currentpage']);

                                                    $joiner  = '';
                                                    $pagination_joiner = '&';
                                                    $i = 1;
                                                    foreach ($data as $var => $val)
                                                    {


                                                            $joiner .= "$var=$val";
                                                            //pagination joiner
                                                            $pagination_joiner .= "$var=$val";

                                                            if ($i < sizeof($data)) {
                                                                $joiner .= " AND ";
                                                                $pagination_joiner .= "&";
                                                            }
                                                            $i++;




                                                    }


                                                    if ((isset($sa_dag) && !empty($sa_dag)) || (isset($bs_dag) && !empty($bs_dag)) || (isset($sa_khatian) && !empty($sa_khatian)) || (isset($bs_khatian) && !empty($bs_khatian)) || (isset($interest_id) && !empty($interest_id)) || (isset($mouja_id) && !empty($mouja_id)))
                                                    {
                                                        $query_final = "SELECT * FROM dag WHERE " . $joiner . " ORDER BY id DESC LIMIT $offset, $rowsperpage";

                                                        $filtered_all = "SELECT * FROM dag WHERE " . $joiner . " ORDER BY id DESC";

                                                         //var_dump($query_final);

                                                    }else
                                                {
                                                    $query_final = "SELECT * FROM `dag` ORDER BY id DESC LIMIT $offset, $rowsperpage";
                                                     $filtered_all = "SELECT * FROM dag";
                                                    $pagination_joiner ='';
                                                }

                                                // print($query_final);


                                                $result_final = mysqli_query($conn, $query_final);
                                                $filtered_all_result = mysqli_query($conn, $filtered_all);
                                                // $info = mysqli_fetch_array($result_final);


                                                // var_dump($query_final);
                                                if (mysqli_num_rows($result_final) > 0)
                                                {
                                                    $i = 1;
                                                    while ($info = mysqli_fetch_array($result_final))
                                                    {
                                                        //var_dump($info);
                                                        $mouja_query = "SELECT * FROM `mouja` WHERE id ={$info['mouja_id']}";

                                                        $mouja_result = mysqli_query($conn, $mouja_query);
                                                        $mouja_info = mysqli_fetch_array($mouja_result);

                                                        //var_dump($mouja_info);
                                                        $interest_query = "SELECT * FROM `interest` WHERE interest_id ={$info['interest_id']}";

                                                        $interest_result = mysqli_query($conn, $interest_query);
                                                        $interest_info = mysqli_fetch_array($interest_result);

                                                        ?>

                                                        <tr style="">

                                                            <td style="text-align: center;"
                                                                class="numeric_bangla"> <?php echo $offset + $i; ?></td>

                                                            <td style="text-align: center;"><?php echo $mouja_info['name']; ?></td>




                                                            <!-- SA jl -->
                                                            <td style="text-align: center;"
                                                                class="numeric_bangla"> <?php echo $mouja_info['sa_jl']; ?></td>
                                                            <!-- bs jl -->
                                                            <td style="text-align: center;"
                                                            <?php
                                                            if ($mouja_info['bs_jl'] == null || $mouja_info['bs_jl'] == '0')
                                                            {
                                                                echo '>  অপ্রকাশিত';
                                                            }
                                                            else
                                                            {
                                                                echo ' class="numeric_bangla">' . $mouja_info['bs_jl'];
                                                            }
                                                            echo '</td>';
                                                            ?>

                                                            <!-- sa khatian -->

                                                            <td style="text-align: center;"
                                                            <?php echo $info['sa_dag'] == 0 ? ">অজানা" : ' class="numeric_bangla">' . $info['sa_dag']; ?></td>

                                                            <td style="text-align: center"

                                                            <?php
                                                            if ($mouja_info['bs_jl'] == null || $mouja_info['bs_jl'] == '0')
                                                            {
                                                                echo '> অপ্রকাশিত';
                                                            }
                                                            else
                                                            {
                                                                echo $info['bs_dag'] == 0 ? ">অজানা" : ' class="numeric_bangla">' . $info['bs_dag'];
                                                            }
                                                            echo '</td>';
                                                            ?>

                                                            <td style="text-align: center;"
                                                            <?php echo $info['sa_khatian'] == 0 ? ">অজানা" : ' class="numeric_bangla">' . $info['sa_khatian']; ?></td>
                                                            <td style="text-align: center;"
                                                            <?php echo $info['bs_khatian'] == 0 ? ">অজানা" : ' class="numeric_bangla">' . $info['bs_khatian']; ?></td>


                                                            <td style="text-align: center;"
                                                            <?php echo $info['sa_land_amount'] == 0 ? ">অজানা" : 'class="numeric_bangla">' . $info['sa_land_amount']; ?></td>
                                                            <td style="text-align: center;"
                                                            <?php echo $info['bs_land_amount'] == 0 ? ">অজানা" : 'class="numeric_bangla">' . $info['bs_land_amount']; ?></td>

                                                            <td style="text-align: center;"><?php echo $interest_info['interest_name']; ?></td>
                                                            <td class="text-center">
                                                                <a
                                                                        href="/edit.php?id=<?php echo $info['id']; ?>"
                                                                        class="btn btn-primary btn-xs label-success"

                                                                        title="সংশোধন"
                                                                ><i class="fa fa-pencil fa-fw"></i> সংশোধন</a
                                                                >
                                                                <a href="#deleteDataModal"
                                                                   class="btn btn-danger btn-xs" data-toggle="modal"

                                                                   data-id= "<?php echo $info['id']; ?>"
                                                                   title="ডিলিট"
                                                                ><i class="fa fa-trash-o fa-lg"></i> ডিলিট</a
                                                                >
                                                            </td>
                                                            <!-- Modal HTML -->
                                                            <div id="deleteDataModal"
                                                                 class="modal fade">
                                                                <div class="modal-dialog modal-confirm">
                                                                    <div class="modal-content">
                                                                        <form action="delete_data.php" method="GET">
                                                                            <div class="modal-header flex-column">
                                                                                <div class="icon-box">
                                                                                    <i class="fa fw fa-trash"></i>
                                                                                </div>
                                                                                <h4 class="modal-title w-100">আপনি কি
                                                                                    নিশ্চিত?</h4>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-hidden="true">&times;
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body bangla_text">
                                                                                <p>আপনি কি এই রেকর্ড ডিলিট করার বিষয়ে
                                                                                    নিশ্চিত ? এটা ডিলিট করলে রেকর্ডটি আর
                                                                                    ফেরত পাওয়া যাবে না।</p>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-center">
                                                                                <!-- add a hidden input field to store ID for next step -->
                                                                                <input type="hidden" name="id" value="<?php echo $info['id']; ?>" />
                                                                                <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">না, ফেরত যান
                                                                                </button>
                                                                                <button  type="submit"
                                                                                         class="btn btn-danger">হ্যাঁ, ডিলিট
                                                                                    করুন
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>

                                                        <?php
                                                        $i++;
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<div id='success-alert' class='alert alert-danger' >  <button class='close' data-close='alert'></button> কোন সরকারি স্বার্থ খুঁজে পাওয়া যায় নাই।</div>";

                                                }

                                                ?>

                                                </tbody>
                                            </table>


                                            <?php
                                            $pagination_needed = mysqli_num_rows($result_final) > 10;
                                            if ($pagination_needed)
                                            {

                                                ?>


                                                <div class="paginator">
                                                    <ul class="pagination">


                                                        <?php

                                                        /******  build the pagination links ******/
                                                        // range of num links to show
                                                        $range = 9;

                                                        // if not on page 1, don't show back links
                                                        if ($currentpage > 1)
                                                        {
                                                            // show << link to go back to page 1
                                                            echo "<li class='bangla_text'><a href='{$_SERVER['PHP_SELF']}?currentpage=1$pagination_joiner'> প্রথম পেজ</a></li> ";
                                                            // get previous page num
                                                            $prevpage = $currentpage - 1;
                                                            // show < link to go back to 1 page
                                                            echo "<li class='bangla_text'><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage$pagination_joiner'> পূর্ববর্তী পেজ</a></li> ";
                                                        } // end if

                                                        $total_page = (int)(mysqli_num_rows($filtered_all_result)/$rowsperpage);;

                                                        // loop to show links to range of pages around current page
                                                        for ($x = ($currentpage);$x < (($currentpage + $range) + 1);$x++)
                                                        {
                                                            // if it's a valid page number...
                                                            if (($x > 0) && ($x <= $total_page+1))
                                                            {
                                                                // if we're on current page...
                                                                if ($x == $currentpage)
                                                                {
                                                                    // 'highlight' it but don't make a link
                                                                    echo " <li class='numeric_bangla active'><a href>$x</a></li> ";
                                                                    // if not current page...

                                                                }
                                                                else
                                                                {
                                                                    // make it a link
                                                                    echo " <li ><a href='{$_SERVER['PHP_SELF']}?currentpage=$x$pagination_joiner'>$x</a></li> ";
                                                                } // end else

                                                            } // end if

                                                        } // end for
                                                        // if not on last page, show forward and last page links


                                                        if ($currentpage <= $total_page)
                                                        {
                                                            // get next page
                                                            $nextpage = $currentpage + 1;
                                                            // echo forward link for next page
                                                            echo " <li class='bangla_text' ><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage$pagination_joiner'>পরবর্তী পেজ</a></li> ";
                                                            // echo forward link for lastpage
                                                            echo " <li class='bangla_text'><a href='{$_SERVER['PHP_SELF']}?currentpage=$total_page$pagination_joiner'>সর্বশেষ পেজ</a></li> ";
                                                        } // end if
                                                        /****** end build pagination links ******/

                                                        ?>


                                                    </ul>
                                                    <p>বর্তমান পেজ নং <?php echo $currentpage; ?>,
                                                        মোট <?php echo $total_page; ?>-টি পেজের মধ্যে। মোট <?php echo $rowsperpage;?>-টি তথ্য
                                                        প্রদর্শিত হচ্ছে সর্বমোট <?php echo mysqli_num_rows($filtered_all_result); ?>-টির মধ্যে।</p>

                                                </div>


                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
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
