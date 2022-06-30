<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config.php";

// officer name and designation
$username =$_COOKIE['username'];

$query1 = "SELECT * FROM `users` WHERE `username`= '$username' LIMIT 1";
$result2 = mysqli_query($conn, $query1);
$info2 = mysqli_fetch_array($result2);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if(isset($_POST['action']) && $_POST['action']=='change_password'){

            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

            $old_password = $_POST['old_password'];

            if(password_verify( $old_password, $info2['password'])) {

                $update_query = "UPDATE `users` SET `password`='$new_password' WHERE `username` = '$username'";

                if ($conn->query($update_query) === TRUE) {
                    $_SESSION['success_message'] = "পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে।";
                } else {
                    $_SESSION['error_message'] = "পাসওয়ার্ড পরিবর্তন করা যায় নাই";
                }
            }else{
                $_SESSION['error_message'] = "আপনি বর্তমান পাসওয়ার্ড ভুল দিয়েছেন।";
            }





        }

   elseif (isset($_POST['action']) && $_POST['action']=='photo'){

       var_dump($_POST);
       var_dump($_FILES);


       $target_dir = "images/uploads/";
       $fileName =  basename($_FILES["photo"]["name"]);
       $target_file = $target_dir .$fileName;


       $targetFilePath =  $target_file;


       $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

       if(!empty($_FILES["photo"]["name"])){
           // Allow certain file formats
           $allowTypes = array('jpg','png','jpeg','gif');
           if(in_array($fileType, $allowTypes)){
               // Upload file to server
               if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
                   // Insert image file name into database
                   $query = "UPDATE `users` SET `image`= '$fileName' WHERE `username`='$username'";

//                   print_r($query);


                   if($conn->query($query) === TRUE){
                       $_SESSION['success_message'] = "ব্যবহারকারীর ছবি সফলভাবে পরিবর্তন করা হয়েছে।";
                   }else{
                       $_SESSION['error_message'] = "ফাইল আপলোড করা যায় নাই। আবার চেষ্টা করুন।";
                   }
               }else{
                   $_SESSION['error_message'] = "দুঃখিত, সার্ভারের সমস্যার কারণে ছবি আপলোড করা যায় নাই।";
               }
           }else{
               $_SESSION['error_message'] = 'দুঃখিত, শুধুমাত্র JPG, JPEG, PNG, GIF টাইপ ছবি আপলোড করা যাভে।';
           }
       }else{
           $_SESSION['error_message'] = 'আপলোড করার জন্য ফাইল সিলেক্ট করুন।';
       }


       // Check if image file is a actual image or fake image


   }
    else {

        $officer_name = $_POST['officer_name'];
        $officer_designation = $_POST['officer_designation'];
        $office_name = $_POST['office_name'];

        $update_query = "UPDATE `users` SET `officer_name`='$officer_name', `officer_designation`='$officer_designation', `office_name`='$office_name' WHERE `username`= '$username' LIMIT 1";

        print($update_query);
        if ($conn->query($update_query) === TRUE) {
            $_SESSION['success_message'] = "ব্যবহারকারী তথ্য সফলভাবে সংরক্ষণ করা হয়েছে।";
        } else {
            $_SESSION['error_message'] = "ব্যবহারকারী তথ্য পরিবর্তন করা যায় নাই";
        }
    }



    $conn->close();


   header("Location: profile.php");
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
                                                <div style="display:none;"><input type="hidden" name="user"
                                                                                  value="user_details">


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
                                                                <label class="col-sm-4 control-label">অফিসের নাম
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input text required"><input type="text"
                                                                                                            name="office_name"
                                                                                                            value="<?php echo $info2['office_name']; ?>"
                                                                                                            title="Numbers: 0-9"
                                                                                                            required="required"
                                                                                                            class="form-control"
                                                                                                            maxlength="255"
                                                                                                            id="office_name">
                                                                    </div>
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
                                <div class="portlet purple box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-pencil"></i>পাসওয়ার্ড পরিবর্তন করুন
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">

                                            <form enctype="multipart/form-data" method="post" accept-charset="utf-8"
                                                  class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div style="display:none;">
                                                    <input type="hidden" name="action"
                                                                                  value="change_password">

                                                </div>
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label"> বর্তমান পাসওয়ার্ড
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <div class="input password required">
                                                                        <input type="password" name="old_password"
                                                                               autocomplete="off"
                                                                               placeholder="বর্তমান পাসওয়ার্ড লিখুন"
                                                                               class="form-control"
                                                                               required="required"
                                                                               title="রuppercase, one lowercase, one special character."
                                                                               data-toggle="tooltip"
                                                                               id="old_password" value=""></div>
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
                                                                        <input type="password" name="new_password"
                                                                               autocomplete="off"
                                                                               placeholder="নতুন পাসওয়ার্ড লিখুন"
                                                                               class="form-control"
                                                                               required = "required"
                                                                               title="রuppercase, one lowercase, one special character."
                                                                               data-toggle="tooltip"
                                                                               id="new_password" value=""></div>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet  box box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-pencil"></i>ছবি পরিবর্তন করুন
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div style="font-size: 15px; text-align: justify;margin: 20px;">

                                            <form enctype="multipart/form-data" method="post" accept-charset="utf-8"
                                                  class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div style="display:none;">
                                                    <input type="hidden" name="action"
                                                           value="photo">

                                                </div>


                                                    </div>


                                                    <div class="row">
                                                        <div class="panel-body col-sm-12">
                                                            <div class="form-group">
                                                                <div class="col-sm-3 col-md-3  control-label">

                                                                <img alt="" class="px-0 mx-auto d-block img-thumbnail float-right"    <?php


                                                                ?>
                                                                     src="/images/uploads/<?php echo $info2['image']; ?>">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input ">
                                                                        <input type="file" name="photo" class="form-control"
                                                                               id="picture"/>
                                                                        <img id='img-upload'/>
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