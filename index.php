<?php
require_once "config.php";

$query1 = "SELECT * FROM `users` WHERE `username`= 'admin' LIMIT 1";
$result2 = mysqli_query($conn, $query1);
$info2 = mysqli_fetch_array($result2);


// get the info from the db
$mouja_query = "SELECT * FROM `mouja` ORDER BY id ASC";
$mouja_result = mysqli_query($conn, $mouja_query);


?>
<html>
<head>
    <title>সরকারি স্বার্থ যাচাই সিস্টেম</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <meta name="author" content="Palash Mondal">
    <link href="css/main.css" rel="stylesheet"/>
    <link href="css/choices.min.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg" style="overflow:hidden;">
<div id="login">
    <a class="btn" href="/login" >লগ-ইন</a>
</div>
<div class="head_text">
    <a class="logo" href="/">
        <img alt="" class="img-circle" src="/images/bd_logo.png"></a>
    <h1><?php echo $info2['office_name']; ?></h1>
    <h2>সরকারি স্বার্থ যাচাই সিস্টেম</h2>
</div>
<div class="s131">
    <form id="myForm">
        <div class="inner-form">
            <div class="input-field first-wrap">
                <input id="search" type="text" placeholder="জমির এসএ বা বিএস দাগ নম্বর লিখুন" autofocus class="input_bangla"
                       />
            </div>
            <div class="input-field second-wrap">
                <div class="input-select">
                    <select data-trigger="" name="choices-single-default" class="js-choice">
                        <option placeholder="" value="0">মৌজা</option>
                        <?php
                        while ($info = mysqli_fetch_array($mouja_result)) {
                            echo '<option value="'. $info['id'].'">'.$info['name'].'</option>';
                        }
                        ?>
                    </select>
                    
                </div>
            </div>
            <div class="input-field third-wrap">
                <button id="submitBtn" class="btn-search" type="button">খুঁজুন</button>
            </div>
        </div>
        <div id="output"></div>
    </form>
</div>
<footer class="fixed-bottom">
    <div class="footer_text">©পলাশ মন্ডল</div>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/choices.min.js"></script>
<script src="js/index.js"></script>
<script src="js/jquery.backstretch.min.js"></script>

<script>

    $.backstretch([
            "/images/background.jpg"
        ], {
            fade: 1000,
            duration: 8000
        }
    );


</script>
</body>
</html>


<!-- TODO
-make BS uneditable on add page and edit page if mouja is not published
-add a button on search page to link login page
  -->
