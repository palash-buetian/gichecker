<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


if (isset($_GET["id"]) == true) {

    // Include config file
    require_once "config.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM interest_list WHERE id = '{$id}'";
    $result = mysqli_query($conn, $query);
    $info = mysqli_fetch_array($result);

//header("Location: /dashboard");
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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo page-footer-fixed "
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

                                            <form enctype="multipart/form-data" method="post" accept-charset="utf-8"
                                                  class="form-horizontal" action="/edit.php">
                                                <div style="display:none;"><input type="hidden" name="_method"
                                                                                  value="POST">
                                                    <input type="hidden"
                                                           name="id"
                                                           id="id">
                                                </div>
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="panel-body col-sm-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">এসএ দাগ নম্বর
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text required"><input type="number"
                                                                                                            name="username"
                                                                                                            value="<?php echo $info['sa_dag']; ?>"
                                                                                                            title="Numbers: 0-9"
                                                                                                            required="required"
                                                                                                            class="form-control"
                                                                                                            maxlength="255"
                                                                                                            id="username">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">বিএস দাগ নম্বর<span
                                                                        class="required"
                                                                        aria-required="true">* </span></label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text required"><input type="text"
                                                                                                            name="name_bn"
                                                                                                            value="<?php echo $info['bs_dag']; ?>"
                                                                                                            required="required"
                                                                                                            class="form-control"
                                                                                                            maxlength="200"
                                                                                                            id="name-bn">
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                            <option value="0">মৌজা সিলেক্ট করুন</option>
                                                                            <option value="25032">বরইকান্দি-১১৬</option>
                                                                            <option value="25105">খোজারখলা-১১৩</option>
                                                                            <option value="25106">পিরিজপুর-৯</option>
                                                                            <option value="25107">ধরাধরপুর-৮</option>
                                                                            <option value="25111">গুধরাইল-১০</option>
                                                                            <option value="25121">হবিনন্দী-১৪</option>
                                                                            <option value="25122">মনিপুর-১৩</option>
                                                                            <option value="25123">আলমপুর-১২</option>
                                                                            <option value="25124">গোটাটিকর-১১</option>
                                                                            <option value="93763">কুমারগাঁও-৮০</option>
                                                                            <option value="93764">মইয়ারচর-৩৭</option>
                                                                            <option value="93765">খুরুমখলা শাহপুর-৩৬
                                                                            </option>
                                                                            <option value="93770">আখালিয়া-৮৮</option>
                                                                            <option value="93771">ব্রাহ্মন শাসন-৭৭
                                                                            </option>
                                                                            <option value="93772">বাগবাড়ী-৯০</option>
                                                                            <option value="93785">তারাপুর টি
                                                                                গার্ডেন-৭৬
                                                                            </option>
                                                                            <option value="93788">আম্বরখানা-৯২</option>
                                                                            <option value="93816">টিলাগড়-৬৩</option>
                                                                            <option value="93818">দেবপুর-৯৬</option>
                                                                            <option value="93820">পেশনেওয়াজ-৮৫</option>
                                                                            <option value="93826">মিউনিসিপ্যালিটি-৯১
                                                                            </option>
                                                                            <option value="93828">সাদিপুর ১ম খন্ড-৯৩
                                                                            </option>
                                                                            <option value="93829">টুলটিকর-৯৯</option>
                                                                            <option value="93831">সুলতানপুর চক-৮৪
                                                                            </option>
                                                                            <option value="93832">কসবা কুইটুক-১০০
                                                                            </option>
                                                                            <option value="93833">রায়নগর-৯৭</option>
                                                                            <option value="93834">সাদিপুর ২য় খন্ড-৯৮
                                                                            </option>
                                                                            <option value="93837">মোমিনখলা-১১১</option>
                                                                            <option value="93840">ভার্থখলা-৭৭</option>
                                                                        </select>

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
                                                                <label class="col-sm-4 control-label">খতিয়ান</label>
                                                                <div class="col-sm-6">
                                                                    <div class="input email"><input type="number"
                                                                                                    name="khatian"
                                                                                                    class="form-control user_email "
                                                                                                    maxlength="100"
                                                                                                    id="khatian"></div>
                                                                    <div class="email_validation"
                                                                         style="color: red"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label"> জমির পরিমাণ</label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text required">
                                                                        <input type="text"
                                                                               name="mobile"
                                                                               required="required"
                                                                               class="form-control mobile_number"
                                                                               data-toggle="tooltip"
                                                                               maxlength="255"
                                                                               id="mobile">
                                                                    </div>

                                                                    <div class="mobile_validation"
                                                                         style=" color: red"></div>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">সরকারি স্বার্থ নির্বাচন করুন
                                                                    <span class="required"
                                                                          aria-required="true">* </span></label>
                                                                <div class="col-sm-6">
                                                                    <div class="input select">
                                                                        <select class="form-control select2 select2-hidden-accessible"
                                                                                name="mouja_id"
                                                                                placeholder="সরকারি স্বার্থ সিলেক্ট করুন"
                                                                                required="required" id="mouja_id"
                                                                                tabindex="-1" aria-hidden="true">
                                                                            <option value="0">সরকারি স্বার্থ সিলেক্ট
                                                                                করুন
                                                                            </option>
                                                                            <option value="25105">খাস জমি</option>
                                                                            <option value="25032">অর্পিত সম্পত্তি
                                                                            </option>
                                                                            <option value="25106">ওয়াকফ সম্পত্তি
                                                                            </option>
                                                                            <option value="25107">দেবোত্তর সম্পত্তি
                                                                            </option>
                                                                            <option value="25111">অধিগ্রহনকৃত সম্পত্তি
                                                                            </option>
                                                                            <option value="25121">মামলা ও আপত্তি
                                                                                সম্পর্কিত
                                                                            </option>
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
    </html><?php
