<?php

require_once "config.php";


//office name
$query1 = 'SELECT * FROM `settings` WHERE field_name= "office_name"';
$result1 = mysqli_query($conn, $query1);
$info1 = mysqli_fetch_array($result1);


// officer name and designation
$username =$_COOKIE['username'];

$query2 = "SELECT * FROM `users` WHERE `username`= '$username' LIMIT 1";
$result2 = mysqli_query($conn, $query2);
$info2 = mysqli_fetch_array($result2);

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
        <div class="page-actions">
            <h2 style="color: #ffff00;margin: 5px;"><?php echo $info1['field_value']; ?>
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
                            <img alt="" class="img-circle"
                                 <?php

                                 if($info2['image'] == 'profile_picture.png'){
                                     $source = '/images/profile_picture.png';
                                 }else{
                                     $source = '/images/uploads/'+ $info2['image'];
                                 }

                                 ?>
                                 src="<?php echo $source ?>">
                            <span class="username username-hide-on-mobile"> <?php echo $info2['officer_name'];?> <br> <?php echo $info2['officer_designation'];?> , <?php echo $info1['field_value']; ?> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">


                            <li>
                                <a href="/profile">
                                    <i class="icon-user"></i></i> প্রফাইল </a>
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
</div><?php
