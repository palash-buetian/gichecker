<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['office_name'];

    $query = "UPDATE `settings` SET `field_value`='$name' WHERE `field_name`='office_name' LIMIT 1;";
    print($query);

    $result = mysqli_query($conn, $query);

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
                                        <h2 style="margin-top: 0px;"> মৌজা তথ্য সংশোধন করুন</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right" style="margin-top: 10px;">
                                    <a href="/mouja_add.php" style="background:#399439;" type="submit" name="submit"
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


                                                <?php

                                                include 'config.php';
                                                // get the info from the db
                                                $query = "SELECT * FROM `mouja` ORDER BY id ASC";
                                                $result = mysqli_query($conn, $query);

                                                $numrows = mysqli_num_rows($result);

                                                // number of rows to show per page
                                                $rowsperpage = 10;
                                                // find out total pages
                                                $totalpages = ceil($numrows / $rowsperpage);

                                                // get the current page or set a default
                                                if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
                                                    // cast var as int
                                                    $currentpage = (int)$_GET['currentpage'];
                                                } else {
                                                    // default page num
                                                    $currentpage = 1;
                                                } // end if


                                                // if current page is greater than total pages...
                                                if ($currentpage > $totalpages) {
                                                    // set current page to last page
                                                    $currentpage = $totalpages;
                                                } // end if
                                                // if current page is less than first page...
                                                if ($currentpage < 1) {
                                                    // set current page to first page
                                                    $currentpage = 1;
                                                } // end if

                                                // the offset of the list, based on current page
                                                $offset = ($currentpage - 1) * $rowsperpage;

                                                // get the info from the db
                                                $query_final = "SELECT * FROM `mouja` ORDER BY id ASC LIMIT $offset, $rowsperpage";

                                                $result = mysqli_query($conn, $query_final);
                                                $numrows = mysqli_num_rows($result);
                                                $i =1;
                                                while ($info2 = mysqli_fetch_array($result)) {


                                                    echo ' <tr style="">
                                                    <td style="text-align: center;" class="numeric_bangla">';
                                                    echo $offset + $i;
                                                    echo '</td>
                                                    <td style="text-align: center;">';

                                                    echo $info2['name'];
                                                    echo '  </td>
                                                    <td style="text-align: center;" class="numeric_bangla">';
                                                    echo $info2['sa_jl'];
                                                    echo '</td>
                                                    <td style="text-align: center;" ';
                                                    echo  $info2['bs_jl']==null? '>অপ্রকাশিত': 'class="numeric_bangla">'.$info2['bs_jl'];
                                                    echo '</td>
                                                    <td class="text-center">
                                                        <a href="/mouja_edit.php?id=';
                                                    echo $info2['id'];
                                                    echo '" class="btn btn-primary btn-xs label-success" title="সংশোধন"><i class="fa fa-pencil fa-fw"></i> সংশোধন</a>
                                                        <a href="#deleteDataModal-'.$info2['id'].'" class="btn btn-danger btn-xs" data-toggle="modal" data-id="';
                                                    echo $info2['id'];
                                                    echo '<i class="fa fa-trash-o fa-lg"></i> ডিলিট</a>
                                                    </td>';
                                                    ?>
                                                    <!-- Modal HTML -->
                                                      <div id="deleteDataModal-<?php echo $info2['id']?>"
                                                         class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <form action="delete_mouja.php" method="GET">
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
                                                                        <input type="hidden" name="mouja_id"
                                                                               value="<?php echo $info2['id']; ?>"/>
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


                                            <div class="paginator">
                                                <ul class="pagination">


                                                    <?php

                                                    /******  build the pagination links ******/
                                                    // range of num links to show
                                                    $range = 9;

                                                    // if not on page 1, don't show back links
                                                    if ($currentpage > 1) {
                                                        // show << link to go back to page 1
                                                        echo "<li class='numeric_bangla'><a href='{$_SERVER['PHP_SELF']}?currentpage=1'> প্রথম পেজ</a></li> ";
                                                        // get previous page num
                                                        $prevpage = $currentpage - 1;
                                                        // show < link to go back to 1 page
                                                        echo "<li class='numeric_bangla'><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'> পূর্ববর্তী পেজ</a></li> ";
                                                    } // end if

                                                    // loop to show links to range of pages around current page
                                                    for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
                                                        // if it's a valid page number...
                                                        if (($x > 0) && ($x <= $totalpages)) {
                                                            // if we're on current page...
                                                            if ($x == $currentpage) {
                                                                // 'highlight' it but don't make a link
                                                                echo " <li class='numeric_bangla'><a href>$x</a></li> ";
                                                                // if not current page...
                                                            } else {
                                                                // make it a link
                                                                echo " <li class='numeric_bangla'><a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a></li> ";
                                                            } // end else
                                                        } // end if
                                                    } // end for

                                                    // if not on last page, show forward and last page links
                                                    if ($currentpage != $totalpages) {
                                                        // get next page
                                                        $nextpage = $currentpage + 1;
                                                        // echo forward link for next page
                                                        echo " <li class='numeric_bangla'><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>পরবর্তী পেজ</a></li> ";
                                                        // echo forward link for lastpage
                                                        echo " <li class='numeric_bangla'><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>সর্বশেষ পেজ</a></li> ";
                                                    } // end if
                                                    /****** end build pagination links ******/

                                                    ?>


                                                </ul>
                                                <p>বর্তমান পেজ নং <?php echo $currentpage; ?>,
                                                    মোট <?php echo $totalpages; ?>-টি পেজের মধ্যে। মোট ২০-টি তথ্য
                                                    প্রদর্শিত হচ্ছে সর্বমোট <?php echo $numrows; ?>-টির মধ্যে।</p>

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