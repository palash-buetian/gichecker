<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config.php";

$username = $_COOKIE['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $officer_name = $_POST['officer_name'];
    $officer_designation = $_POST['officer_designation'];

    $query = "UPDATE `users` SET `officer_name`='$officer_name', `officer_designation`='$officer_designation' WHERE `username`= '$username' LIMIT 1";

    print($query);

    $result = mysqli_query($conn, $query);
}

$query1 = "SELECT * FROM `users` WHERE `username`= '$username' LIMIT 1";
$result2 = mysqli_query($conn, $query1);
$info2 = mysqli_fetch_array($result2);


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
<?php include('top_nav.php'); ?>

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
                                        <h2 style="margin-top: 0px;"> প্রফাইল তথ্য সংশোধন করুন</h2>
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

                                            <form enctype="multipart/form-data" method="post" accept-charset="utf-8"
                                                  class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div style="display:none;"><input type="hidden" name="_method"
                                                                                  value="user">

                                                    <?php

                                                    if (isset($_POST["submit"])) {

                                                        $target_dir = "images/uploads/";
                                                        $target_file = $target_dir . basename($_FILES["picture"]["name"]);


                                                        // Check if image file is a actual image or fake image

                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label"> কর্মকর্তার নাম
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text required"><input type="text"
                                                                                                            name="officer_name"
                                                                                                            value="<?php echo $info2['officer_name']; ?>"

                                                                                                            required="required"
                                                                                                            class="form-control"
                                                                                                            maxlength="255"
                                                                                                            id="officer_name">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">কর্মকর্তার পদবী
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text required"><input type="text"
                                                                                                            name="officer_designation"
                                                                                                            value="<?php echo $info2['officer_designation']; ?>"
                                                                                                            title="Numbers: 0-9"
                                                                                                            required="required"
                                                                                                            class="form-control"
                                                                                                            maxlength="255"
                                                                                                            id="officer_designation">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">প্রফাইল ছবি
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input ">
                                                                        <input type="file" class="form-control"
                                                                               id="picture"/>
                                                                        <img id='img-upload'/>
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet  box box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-pencil"></i>পাসওয়ার্ড পরিবর্তন করুন
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">

                                            <form enctype="multipart/form-data" method="post" accept-charset="utf-8"
                                                  class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div style="display:none;"><input type="hidden" name="_method"
                                                                                  value="POST">

                                                </div>
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label"> বর্তমান পাসওয়ার্ড
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input password required">
                                                                        <input type="password" name="password"
                                                                               autocomplete="off"
                                                                               placeholder="বর্তমান পাসওয়ার্ড লিখুন"
                                                                               class="form-control"
                                                                               title="রuppercase, one lowercase, one special character."
                                                                               data-toggle="tooltip"
                                                                               id="password" value=""></div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>


                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">নতুন পাসওয়ার্ড
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input password required">
                                                                        <input type="password" name="password"
                                                                               autocomplete="off"
                                                                               placeholder="নতুন পাসওয়ার্ড লিখুন"
                                                                               class="form-control"
                                                                               title="রuppercase, one lowercase, one special character."
                                                                               data-toggle="tooltip"
                                                                               id="password" value=""></div>
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
                                                    </br>
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