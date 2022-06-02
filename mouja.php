<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config.php";


if ( $_SERVER['REQUEST_METHOD'] == 'POST'  ) {

    $name =$_POST['office_name'];

    $query = "UPDATE `settings` SET `field_value`='$name' WHERE `field_name`='office_name' LIMIT 1;";
    print($query);

    $result = mysqli_query($conn, $query);

}

$query1 = 'SELECT * FROM `settings` WHERE field_name= "office_name"';

$result2 = mysqli_query($conn, $query1);
$info = mysqli_fetch_array($result2);


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
                                        <h2 style="margin-top: 0px;"> মৌজা তথ্য সংশোধন করুন</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right" style="margin-top: 10px;">
                                    <a href="/add" style="background:#399439;" type="submit" name="submit"
                                       value="search"
                                       id="submit" class="btn btn-success btn-lg">
                                        <i class="fa fa-fw fa-plus"></i> নতুন মৌজা সংযোজন করুন
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
                                            <i class="fa fa-cogs"></i> মৌজা তালিকা
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">


                                            <div id="deleteDataModal" class="modal fade">
                                                <div class="modal-dialog modal-confirm">
                                                    <div class="modal-content">
                                                        <form action="delete_data.php" method="GET"></form>
                                                        <div class="modal-header flex-column">
                                                            <div class="icon-box">
                                                                <i class="fa fw fa-trash"></i>
                                                            </div>
                                                            <h4 class="modal-title w-100">আপনি কি
                                                                নিশ্চিত?</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>আপনি কি এই রেকর্ড ডিলিট করার বিষয়ে
                                                                নিশ্চিত ? এটা ডিলিট করলে রেকর্ডটি আর
                                                                ফেরত পাওয়া যাবে না।.</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <!-- add a hidden input field to store ID for next step -->
                                                            <input type="hidden" name="id" value="1393">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">না, ফেরত যান
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">হ্যাঁ, ডিলিট
                                                                করুন
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="deleteDataModal" class="modal fade">
                                                <div class="modal-dialog modal-confirm">
                                                    <div class="modal-content">
                                                        <form action="delete_data.php" method="GET"></form>
                                                        <div class="modal-header flex-column">
                                                            <div class="icon-box">
                                                                <i class="fa fw fa-trash"></i>
                                                            </div>
                                                            <h4 class="modal-title w-100">আপনি কি
                                                                নিশ্চিত?</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>আপনি কি এই রেকর্ড ডিলিট করার বিষয়ে
                                                                নিশ্চিত ? এটা ডিলিট করলে রেকর্ডটি আর
                                                                ফেরত পাওয়া যাবে না।.</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <!-- add a hidden input field to store ID for next step -->
                                                            <input type="hidden" name="id" value="1392">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">না, ফেরত যান
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">হ্যাঁ, ডিলিট
                                                                করুন
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <table class="table table-striped table-bordered table-hover" id="sample_6">
                                                <thead>
                                                <tr>
                                                    <th style="text-align: center;">ক্রম</th>
                                                    <th style="text-align: center;">মৌজার নাম</th>

                                                    <th style="text-align: center;">এসএ জেএল</th>
                                                    <th style="text-align: center;">বিএস জেএল</th>



                                                    <th style="text-align: center;" width="20%">পদক্ষেপ</th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                <tr style="">

                                                    <td style="text-align: center;" class="numeric_bangla"> 1</td>

                                                    <td style="text-align: center;">পিরিজপুর</td>

                                                    <td style="text-align: center;" class="numeric_bangla"> 114</td>
                                                    <td style="text-align: center;" class="numeric_bangla">9</td>



                                                    <td class="text-center">
                                                        <a href="/edit.php?id=1393" class="btn btn-primary btn-xs label-success" title="সংশোধন"><i class="fa fa-pencil fa-fw"></i> সংশোধন</a>
                                                        <a href="#deleteDataModal" class="btn btn-danger btn-xs" data-toggle="modal" data-id="1393" title="ডিলিট"><i class="fa fa-trash-o fa-lg"></i> ডিলিট</a>
                                                    </td>
                                                    <!-- Modal HTML -->

                                                </tr>


                                                <tr style="">

                                                    <td style="text-align: center;" class="numeric_bangla"> 2</td>

                                                    <td style="text-align: center;">মিউনিসিপ্যালিটি</td>

                                                    <td style="text-align: center;" class="numeric_bangla">333</td>
                                                    <td style="text-align: center;"> অপ্রকাশিত</td>



                                                    <td class="text-center">
                                                        <a href="/edit.php?id=1392" class="btn btn-primary btn-xs label-success" title="সংশোধন"><i class="fa fa-pencil fa-fw"></i> সংশোধন</a>
                                                        <a href="#deleteDataModal" class="btn btn-danger btn-xs" data-toggle="modal" data-id="1392" title="ডিলিট"><i class="fa fa-trash-o fa-lg"></i> ডিলিট</a>
                                                    </td>
                                                    <!-- Modal HTML -->

                                                </tr>



                                                </tbody>
                                            </table>



                                            <div class="paginator">
                                                <ul class="pagination">


                                                    <li class="numeric_bangla"><a href="">1</a></li>

                                                </ul>
                                                <p>বর্তমান পেজ নং 1,
                                                    মোট 1-টি পেজের মধ্যে। মোট ২০-টি তথ্য
                                                    প্রদর্শিত হচ্ছে সর্বমোট 2-টির মধ্যে।</p>

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