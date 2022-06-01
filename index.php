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
<body class="bg">
<div class="head_text">
    <a class="logo" href="/">
    <img alt="" class="img-circle" src="/images/bd_logo.png"></a>
    <h1>সিলেট মহানগর রাজস্ব সার্কেল</h1>
    <h2>সরকারি স্বার্থ যাচাই সিস্টেম</h2>
</div>
<div class="s131">
    <form id="myForm">
        <div class="inner-form">
            <div class="input-field first-wrap">
                <input id="search" type="text" placeholder="জমির দাগ নম্বর লিখুন" autofocus class="input_bangla"
                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
            </div>
            <div class="input-field second-wrap">
                <div class="input-select">
                    <select data-trigger="" name="choices-single-default" class="js-choice">
                        <option placeholder="" value="0">মৌজা</option>
                        <option value="91">মিউনিসিপ্যালিটি</option>
                        <option value="93">সাদিপুর ১ম খন্ড</option>
                        <option value="98">সাদিপুর ২য় খন্ড</option>
                        <option value="97">রায়নগর</option>
                        <option value="99">টুলটিকর</option>
                        <option value="100">কসবা কুইটুক</option>
                        <option value="101">সুলতানপুর চক</option>
                        <option value="107">হবিনন্দী</option>
                        <option value="108">মনিপুর</option>
                        <option value="109">আলমপুর</option>
                        <option value="110">গোটাটিকর</option>
                        <option value="111">মোমিনখলা</option>
                        <option value="112">ভার্থখলা</option>
                        <option value="113">খোজারখলা</option>
                        <option value="126">গুধরাইল</option>
                        <option value="114">পিরিজপুর</option>
                        <option value="115">ধরাধরপুর</option>
                        <option value="77">ব্রাক্ষণশাসন</option>
                        <option value="80">কুমারগাঁও</option>
                        <option value="81">মইয়ারচর</option>
                        <option value="82">খুরুমখলা শাহপুর</option>
                        <option value="88">আখালিয়া</option>
                        <option value="90">বাগবাড়ি</option>
                        <option value="95">টিলাগড়</option>
                        <option value="96">দেবপুর</option>
                        <option value="102">পেশনেওয়াজ</option>
                        <option value="76">তারাপুর টি গার্ডেন</option>
                        <option value=" 92">আম্বরখানা</option>
                        <option value="116">বরইকান্দি</option>
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
<script src="js/main.js"></script>

</body>
</html>