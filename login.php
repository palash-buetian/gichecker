<?php

ob_start(); // Initiate the output buffer
 
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard");
    exit;
}

// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "দয়া করে ইউজারনেম লিখুন।";
    } else {
        $username = trim($_POST["username"]);
    }

// Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "দয়া করে পাসওয়ার্ড টাইপ করুন।";
    } else {
        $password = trim($_POST["password"]);
    }

// Validate credentials
    if (empty($username_err) && empty($password_err)) {
// Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";


        if ($stmt = mysqli_prepare($conn, $sql)) {
// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

// Set parameters
            $param_username = $username;

// Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
// Store result
                mysqli_stmt_store_result($stmt);

// Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
// Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {

                        //$hash=password_hash("smrc", PASSWORD_DEFAULT);

                        if (password_verify($password, $hashed_password)) {
// Password is correct, so start a new session
                            //session_start();

// Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

// Redirect user to welcome page

                            $cookie_name = "username";
                            $cookie_value =  $username;
							
                            setcookie($cookie_name, $cookie_value, time() + (60*120), "/"); // 86400 = 1 day
                            setcookie('sidebar_closed', 0);
                            $_SESSION['success_message'] = "আপনি সফলভাবে লগ-ইন করেছেন।";
                            header("Location: dashboard");
                            exit();


                        } else {
// Password is not valid, display a generic error message
                            $login_err = "ইউজারনেম অথবা পাসওয়ার্ড ভুল হয়েছে।";
                        }
                    }
                } else {
// Username doesn't exist, display a generic error message
                    $login_err = "ইউজারনেম অথবা পাসওয়ার্ড ভুল হয়েছে।";
                }
            } else {
                echo "কোন একটা সমস্যা হয়েছে। আবার চেষ্টা করুন।";
            }

// Close statement
            mysqli_stmt_close($stmt);
        }
    }

// Close connection
    mysqli_close($conn);
}

ob_end_flush(); // Flush the output from the buffer
?>


<html>
<head>
    <title>সরকারি স্বার্থ যাচাই সিস্টেম- লগ ইন</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <meta name="author" content="Palash Mondal">
    <link href="css/main.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/login.css" rel="stylesheet"/>
    <link href="css/components-rounded.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body class="bg login" style="overflow: hidden;">
<div class="head_text">
    <img alt="" class="img-circle" src="/images/bd_logo.png">
   <!-- <h1>সিলেট মহানগর রাজস্ব সার্কেল</h1> -->
    <h2>সরকারি স্বার্থ যাচাই সিস্টেম</h2>
</div>


<div class="content">
    <br>
    <br>
    <!-- BEGIN LOGIN FORM -->
    <div style="display: block; overflow: hidden; margin-bottom: 5px;">

        <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form  id="loginFrm" class="login-form"  method="post" novalidate="novalidate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


            <div class="form-group otp-hidden">
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon">
                    <i class="a2i_gn_user1"></i>
                    <input class="form-control placeholder-no-fix <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" type="text" autocomplete="off"
                           placeholder="ব্যবহারকারী" id="username" name="username" aria-required="true"
                           aria-invalid="false" aria-describedby="username-error" value="<?php echo $username; ?>" >

                    <span class="invalid-feedback" style="color: red;"><?php echo $username_err; ?></span>
                </div>
            </div>
            <div class="form-group otp-hidden">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="a2i_gn_secrecy2"></i>
                    <input class="form-control placeholder-no-fix valid" type="password" autocomplete="off"
                           placeholder="পাসওয়ার্ড" id="password" name="password" aria-required="true"
                           aria-invalid="true" aria-describedby="password-error password-error" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback" style="color: red;"><?php echo $password_err; ?></span>
                </div>


                <div class="form-actions otp-visable">

                </div>




                <label class="checkbox">
                    <a href="/" class="btn btn-primary" style="margin-top: 10px;"><i class="a2i_gn_login2 otp_login_icon"></i></i>হোমপেজ</a>
                    <button  id="otpLoginBtn" class="btn pull-right btn-success"  type="submit" style="margin-top: 10px;">
                        <i class="a2i_gn_login2 otp_login_icon"></i> প্রবেশ করুন
                    </button>
                </label>

        </form>


    </div>
    <!-- END LOGIN FORM -->
</div>


<footer class="fixed-bottom">
    <div class="footer_text">©পলাশ মন্ডল</div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>

<script>
    $.backstretch([
            "/images/background.jpg"
        ], {
            fade: 500,
            duration: 6000,
			scale: 'cover'
        }
    );
</script>
</body>
</html>
