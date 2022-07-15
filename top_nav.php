<?php
require_once "config.php";

// officer name and designation
$username = $_SESSION['username'];

//office name
$user_query = "SELECT * FROM `users` WHERE `username`= '$username'";
$user_result = mysqli_query($conn, $user_query);
$user_info = mysqli_fetch_array($user_result);

?>

<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="dashboard.php">
                <img src="./images/logo.png" alt="logo" class="logo-default">
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
        <div class="page-actions ">
            <h2 class="homepage" style="color: #ffff00;margin: 5px;">
                <a href="/"  style="color: yellow;" target="_blank"><?php echo $user_info['office_name']; ?></a>
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
                            <img alt="" class="img-circle"
                                 src="/images/uploads/<?php echo $user_info['image'] ?>">
                            <span class="username username-hide-on-mobile"> <?php echo $user_info['officer_name']; ?> <br> <?php echo $user_info['officer_designation']; ?> , <?php echo $user_info['office_name']; ?> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default topright">


                            <li>
                                <a href="/profile">
                                    <i class="icon-user"></i></i> প্রোফাইল </a>
                            </li>
                            <li class="divider">
                            </li>
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
