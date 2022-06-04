<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'config.php';

if (isset($_GET["id"]) == true) {

    // Include config file
    require_once "config.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM dag WHERE id = '{$id}'";
    $result = mysqli_query($conn, $query);
    $info = mysqli_fetch_array($result);


}


if ( $_SERVER['REQUEST_METHOD'] == 'POST'  ) {

    $id =$_POST['id'];
    $mouja_id =$_POST['mouja_id'];
    $sa_dag =$_POST['sa_dag'];
    $bs_dag =$_POST['bs_dag'];
    $sa_khatian =$_POST['sa_khatian'];
    $bs_khatian =$_POST['bs_khatian'];
    $sa_land_amount =$_POST['sa_land_amount'];
    $bs_land_amount =$_POST['bs_land_amount'];
    $interest_id =$_POST['interest_id'];


    $update_query = "UPDATE `dag` SET `mouja_id`='$mouja_id', `sa_dag`='$sa_dag', `bs_dag`='$bs_dag', `sa_khatian`='$sa_khatian', `bs_khatian`='$bs_khatian', `sa_land_amount`='$sa_land_amount', `bs_land_amount`='$bs_land_amount', `interest_id`='$interest_id'  WHERE `id`='$id' LIMIT 1;";

    $result = mysqli_query($conn, $update_query);



//Start the session if already not started.
    session_start();
    $_SESSION['success_message'] = "আপনার পরিবর্তন সফলভাবে সংরক্ষণ করা হয়েছে।";
    header("Location: dashboard.php");
    exit();

}




?>



<!DOCTYPE html>
<html lang="en" class="no-js">
<!--
  <![endif]-->
<!-- BEGIN HEAD -->
<?php include 'header.php'; ?>
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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo"
      oncontextmenu="return false;">
<!-- BEGIN HEADER -->
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/dashboard">
                <img src="/images/logo.png" alt="logo" class="logo-default">
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"></a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <h2 style="color: #ffff00;margin: 5px;">সিলেট মহানগর রাজস্ব সার্কেল
            </h2>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <!--
  <form class="search-form" action="extra_search.html" method="GET"><div class="input-group"><input type="text" class="form-control input-sm" placeholder="Search..." name="query"><span class="input-group-btn"><a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a></span></div></form>
  -->
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"></li>
                    <li class="separator hide"></li>
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-on-mobile"> পলাশ মন্ডল <br>সহকারী কমিশনার (ভূমি), সিলেট মহানগর রাজস্ব সার্কেল </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">

                            <li>
                                <a href="logout.php">
                                    <i class="icon-key"></i> লগ আউট </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php include 'sidebar.php'; ?>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height:588px">
            <div class="row">
                <div class="col-md-12">
                    <div id="ajax-content">
                        <div class="page-head">
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-md-12"></div>
                                <div class="col-md-6">
                                    <div class="page-title">
                                        <h2 style="margin-top: 0px;"> সরকারি স্বার্থ সংশোধন করুন</h2>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- END PAGE CONTENT INNER -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet  box box red-sunglo">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-pencil"></i>তথ্য সংশোধন করুন
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">


                                            <form enctype="multipart/form-data" method="POST"  accept-charset="utf-8"
                                                  class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                <div style="display:none;"><input type="hidden" name="_method"
                                                                                  value="POST"></div>

                                                <input type="hidden" id="id" name="id" value="<?php  echo $id;  ?>">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="panel-body col-sm-6">

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">মৌজা নির্বাচন করুন
                                                                    <span class="required"
                                                                          aria-required="true">* </span></label>
                                                                <div class="col-sm-6">
                                                                    <div class="input select">
                                                                        <select class="form-control select2 select2-hidden-accessible"
                                                                                name="mouja_id"
                                                                                placeholder="মৌজা সিলেক্ট করুন"
                                                                                required="required" id="mouja_id"
                                                                                tabindex="-1" aria-hidden="true">
                                                                            <option value="">মৌজা সিলেক্ট করুন</option>
                                                                            <?php

                                                                            if (isset($_REQUEST["mouja_id"])){
                                                                                $mouja_id=(int)$_REQUEST["mouja_id"];
                                                                            }else{
                                                                                $mouja_id= 0;
                                                                            }




                                                                            // get the info from the db
                                                                            $query = "SELECT * FROM `mouja` ORDER BY id ASC";
                                                                            $result = mysqli_query($conn, $query);

                                                                            $numrows =mysqli_num_rows($result);


                                                                            print($numrows);

                                                                            print_r($info);

                                                                            while ($info2 = mysqli_fetch_array($result)) {

                                                                                echo '<option value="';
                                                                                echo $info2['id'];
                                                                                echo '"';

                                                                                print_r($mouja_id);

                                                                                if ($info['mouja_id'] == $info2['id']) echo ' selected="selected"';
                                                                                echo '>';
                                                                                echo $info2['name'];
                                                                                echo '</option>';
                                                                            }
                                                                            ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">এসএ খতিয়ান নম্বর
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input number "><input type="number"
                                                                                                      name="sa_khatian"


                                                                                                      class="form-control"
                                                                                                      value="<?php echo $info['sa_khatian']; ?>"
                                                                                                      maxlength="255"
                                                                                                      id="sa_khatian">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">এসএ দাগ নম্বর
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text required"><input type="number"
                                                                                                            name="sa_dag"

                                                                                                            class="form-control"
                                                                                                            maxlength="255"
                                                                                                            value="<?php echo $info['sa_dag']; ?>"
                                                                                                            id="sa_dag">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">এসএ জমির পরিমাণ<span
                                                                        class="required"
                                                                        aria-required="true">* </span></label>
                                                                <div class="col-sm-6">
                                                                    <div class="input number "><input type="text"
                                                                                                      name="sa_land_amount"

                                                                                                      class="form-control"
                                                                                                      maxlength="200"
                                                                                                      value="<?php echo $info['sa_land_amount']; ?>"
                                                                                                      id="sa_land_amount">
                                                                    </div>
                                                                </div>
                                                            </div>







                                                            <div class="form-group">
                                                                <div id="profile_image_preview" class="col-sm-offset-7"
                                                                     style="max-height: 200px;max-margin-bottom: 10px;width: 219px;">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div id="signature_image_preview"
                                                                     class="col-sm-offset-7"
                                                                     style="max-height: 200px;margin-bottom: 10px; max-width: 219px;">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="panel-body col-sm-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">বিএস খতিয়ান</label>
                                                                <div class="col-sm-6">
                                                                    <div class="input "><input type="number"
                                                                                               name="bs_khatian"
                                                                                               class="form-control user_email "
                                                                                               maxlength="100"
                                                                                               value="<?php echo $info['bs_khatian']; ?>"
                                                                                               id="bs_khatian"></div>
                                                                    <div class="email_validation"
                                                                         style="color: red"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">বিএস দাগ</label>
                                                                <div class="col-sm-6">
                                                                    <div class="input "><input type="number"
                                                                                               name="bs_dag"
                                                                                               class="form-control user_email "
                                                                                               maxlength="100"
                                                                                               value="<?php echo $info['bs_dag']; ?>"
                                                                                               id="bs_dag"></div>
                                                                    <div class="email_validation"
                                                                         style="color: red"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">বিএস জমির পরিমাণ</label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text ">
                                                                        <input type="number"
                                                                               name="bs_land_amount"
                                                                               step="any"

                                                                               class="form-control"
                                                                               data-toggle="tooltip"
                                                                               maxlength="255"
                                                                               value="<?php echo $info['bs_land_amount']; ?>"
                                                                               id="bs_land_amount">
                                                                    </div>

                                                                    <div class="mobile_validation"
                                                                         style=" color: red"></div>
                                                                </div>
                                                            </div>


                                                            <?php print_r($info2);?>

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">সরকারি স্বার্থ নির্বাচন করুন
                                                                    <span class="required"
                                                                          aria-required="true">* </span></label>
                                                                <div class="col-sm-6">
                                                                    <div class="input select">
                                                                        <select class="form-control select2 select2-hidden-accessible required"
                                                                                name="interest_id"
                                                                                placeholder="সরকারি স্বার্থ সিলেক্ট করুন"
                                                                                required="required" id="interest_id"
                                                                                tabindex="-1" aria-hidden="true">


                                                                            <option value="">সরকারি স্বার্থ সিলেক্ট
                                                                                করুন  </option>

                                                                            <?php

                                                                            // get the info from the db
                                                                            $interest_query = "SELECT * FROM `interest` ORDER BY `interest_id` ASC";
                                                                            $interest_result = mysqli_query($conn, $interest_query);

                                                                            $interest_rows =mysqli_num_rows($interest_result);

                                                                            print_r($info['interest_id']);

                                                                            while ($interest_info = mysqli_fetch_array($interest_result)) {

                                                                                echo '<option value="';
                                                                                echo $interest_info['interest_id'];
                                                                                echo '"';

                                                                                if ($info['interest_id'] == $interest_info['interest_id']) echo ' selected="selected"';
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
                                                    </div>

                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-5 col-md-9">
                                                            <button type="submit" class="btn btn-circle blue">সংরক্ষণ
                                                            </button>
                                                            <button type="reset" class="btn btn-circle default">রিসেট
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>




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