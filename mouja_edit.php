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
    $query = "SELECT * FROM mouja WHERE id = '{$id}'";
    $result = mysqli_query($conn, $query);
    $info = mysqli_fetch_array($result);


}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $mouja_id = $_POST['mouja_id'];
    $mouja_name = $_POST['mouja_name'];
    $sa_jl = $_POST['sa_jl'];
    $bs_jl = $_POST['bs_jl'];
    $bs_jl_unpublished = $_POST['bs_jl_unpublished'];

    if($bs_jl_unpublished=='on'){
        $update_query = "UPDATE `mouja` SET `name`='$mouja_name', `sa_jl`='$sa_jl', `bs_jl`=NULL WHERE `id`='$mouja_id' LIMIT 1;";
    }else{
        $update_query = "UPDATE `mouja` SET `name`='$mouja_name', `sa_jl`='$sa_jl', `bs_jl`='$bs_jl' WHERE `id`='$mouja_id' LIMIT 1;";
    }

   // print_r($update_query);

    $result = mysqli_query($conn, $update_query);


//Start the session if already not started.
    session_start();
    $_SESSION['success_message'] = "আপনার পরিবর্তন সফলভাবে সংরক্ষণ করা হয়েছে।";
    header("Location: mouja.php");
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
        <div class="page-content" style="min-height:588px">
            <div class="row">
                <div class="col-md-12">
                    <div id="ajax-content">
                        <div class="page-head">
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-md-12"></div>
                                <div class="col-md-6">
                                    <div class="page-title">
                                        <h2 style="margin-top: 0px;"> মৌজা তথ্য সংশোধন করুন</h2>
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
                                            <i class="fa fa-pencil"></i>মৌজা তথ্য সংশোধন করুন
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">


                                            <form enctype="multipart/form-data" method="POST" accept-charset="utf-8"
                                                  class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div style="display:none;"><input type="hidden" name="_method"
                                                                                  value="POST"></div>


                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label"> মৌজার নাম
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <input type="hidden" name="mouja_id"
                                                                           value="<?php echo $info['id']; ?>"/>
                                                                    <div class="input "><input type="text"
                                                                                               name="mouja_name"
                                                                                               class="form-control"
                                                                                               value="<?php echo $info['name']; ?>"
                                                                                               required="required"
                                                                                               maxlength="255"
                                                                                               id="mouja_name">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">এসএ জেএল নম্বর
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input number"><input type="number"
                                                                                                     name="sa_jl"
                                                                                                     class="form-control numeric_bangla"
                                                                                                     value="<?php echo $info['sa_jl']; ?>"
                                                                                                     required="required"
                                                                                                     maxlength="255"
                                                                                                     id="sa_jl">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label"> বিএস জেএল নম্বর
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input number"><input type="number"
                                                                                                     name="bs_jl"
                                                                                                     class="form-control numeric_bangla"
                                                                                                     value="<?php echo $info['bs_jl']; ?>"
                                                                                                     maxlength="255"
                                                                                                     id="bs_jl"
                                                                        <?php if ($info['bs_jl'] == null) {
                                                                            echo "readonly=readonly ";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label"> বিএস অপ্রকাশিত
                                                            </label>
                                                            <div class="col-sm-1">
                                                                <div class="input number"><input type="checkbox"
                                                                                                 name="bs_jl_unpublished"
                                                                                                 id="bs_jl_unpublished"
                                                                                                 class="form-control numeric_bangla"
                                                                        <?php if ($info['bs_jl'] == null) {
                                                                            echo "checked";
                                                                        }
                                                                        ?>


                                                                                                 maxlength="255"
                                                                                                 id="bs_jl_unpublished">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-5 col-md-9">
                                                                <button type="submit" class="btn btn-circle blue">সংশোধন
                                                                    করুন
                                                                </button>
                                                                <button type="reset" class="btn btn-circle default">
                                                                    রিসেট
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