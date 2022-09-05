<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
}

require_once "config.php";


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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo page-footer-fixed "
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

                    <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div id="success-alert" class="alert alert-success message success">
                            <button class="close" data-close="alert"></button>
                            <?php echo $_SESSION['success_message']; ?>
                        </div>
                        <?php unset($_SESSION['success_message']);
                    }
                    ?>

                    <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])) { ?>
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
                                        <h2 style="margin-top: 0px;"> সরকারি স্বার্থের ধরণের তালিকা</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right" style="margin-top: 10px;">
                                    <a href="/interest_add.php" style="background:#399439;" type="submit" name="submit"
                                       value="search"
                                       id="submit" class="btn btn-success btn-lg">
                                        <i class="fa fa-fw fa-plus"></i> নতুন সরকারি স্বার্থের ধরণ সংযোজন করুন
                                    </a>

                                </div>
                            </div>
                        </div>

                        <!-- END PAGE CONTENT INNER -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet purple box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>সরকারি স্বার্থের ধরণের তালিকা
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">



                                            <table class="table table-striped table-bordered table-hover" id="sample_6">
                                                <thead>
                                                <tr>
                                                    <th style="text-align: center;">ক্রম</th>
                                                    <th style="text-align: center;">সরকারি স্বার্থের নাম</th>
                                                    <th style="text-align: center;" width="20%">পদক্ষেপ</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                // get the info from the db
                                                $interest_query = "SELECT * FROM `interest` ORDER BY `interest_id` ASC";
                                                $interest_result = mysqli_query($conn, $interest_query);

                                                //$info2 = mysqli_fetch_array($interest_result);

                                                $i = 1;
                                                while ($info2 = mysqli_fetch_array($interest_result)) {
                                                    echo ' <tr style=""> <td style="text-align: center;" class="numeric_bangla">' . $i . '</td> <td style="text-align: center;">';
                                                    echo $info2['interest_name'] . '</td> <td class="text-center"> <a href="/interest_edit.php?interest_id=' . $info2['interest_id'];
                                                    echo '" class="btn btn-primary btn-xs label-success" title="সংশোধন"><i class="fa fa-pencil fa-fw"></i> সংশোধন</a>';
                                                    echo   ' <a href="#deleteDataModal-'.$info2['interest_id'].'" class= " btn btn-danger btn-xs" data-toggle="modal" data-id="' .$info2['interest_id'];
                                                    echo '" title="ডিলিট"><i class="fa fa-trash-o fa-lg"></i> ডিলিট</a>
                                                    </td>'; ?>
                                                    <!-- Modal HTML -->
                                                    <div id="deleteDataModal-<?php echo $info2['interest_id']?>"
                                                         class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <form action="delete_interest.php" method="GET">
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
                                                                    <div class="modal-body">
                                                                        <p>আপনি কি সরকারি স্বার্থের এই ধরণ ডিলিট করার
                                                                            বিষয়ে
                                                                            নিশ্চিত ? এটা ডিলিট করলে এই সার্থের সাথে
                                                                            সম্পর্কিত সকল দাগের তথ্য ডিলিট হয়ে যাবে।</p>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <!-- add a hidden input field to store ID for next step -->
                                                                        <input type="hidden" name="interest_id"
                                                                               value="<?php echo $info2['interest_id']; ?>"/>
                                                                        <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">না, ফেরত যান
                                                                        </button>
                                                                        <button type="submit"
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
                                                ?>


                                                </tbody>
                                            </table>


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