<?php
require "connect.php";
$web=new web;
session_start();
include "logincheck.php";
@$site = $_SESSION["site"];
@$tid = $_SESSION["tid"];
@$bkid = $_SESSION["bkid"];
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>書籍共享系統</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

    <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

    <!-- Stylesheets -->
    <!-- Dropdown Menu -->
    <link rel="stylesheet" href="css/superfish.css">
    <!-- Owl Slider -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <!-- CS Select -->
    <link rel="stylesheet" href="css/cs-select.css">
    <link rel="stylesheet" href="css/cs-skin-border.css">

    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- Icomoon -->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <style type="text/css">
        form{
            display: flex;
            justify-content: center; 
            align-items: center;
            width: 30%;
        }
        .row{
            display: flex;
            justify-content: center; 
            align-items: center;
            margin-bottom: 10px;
        }
        textarea{
            resize: none;
        }
    </style>
</head>

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <div id="fh5co-header">
                <header id="fh5co-header-section">
                    <div class="container">
                        <div class="nav-header">
                            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
                            <h1 id="fh5co-logo"><a href="index.php">書籍共享系統</a></h1>
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <?php
                                        include "navbar.php";
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>

            </div>
            <!-- end:fh5co-header -->
            <div class="fh5co-parallax" style="background-image: url(images/147958.jpg);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell">
                                <h1 class="text-center">評價對方吧!</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fh5co-bg-color" style="background-color:white">
                <div class="container">
                    <a href='<? echo $site ?>.php' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">回上一頁<i class='ti-angle-right'></i></a>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                                <h2>訂單資訊</h2>
                        </div>
                    </div>
                    <div style="display: flex;justify-content: center;align-items: center;">
                            <?
                                @$link = mysqli_connect("localhost", "root", "12345678", "user");
                                @$sql="select b.book_name, u.user_name, b.buy_b, t.buy_id, b.owner_id from trade as t, book as b, user as u where t.trade_id = $tid and b.book_id = $bkid and u.user_id = t.buy_id";
                                @$sql2="select u.user_name, t.t_date, b.s_price from trade as t, book as b, user as u where t.trade_id = $tid and b.book_id = $bkid and u.user_id = b.owner_id";
                                @$result = mysqli_query($link,$sql);
                                @$result2 = mysqli_query($link,$sql2);
                                while($row=mysqli_fetch_row($result)){
                                    $buyer = $row[3];
                                    $owner = $row[4];
                                    echo "<div style=text-align: right;><p>書名: $row[0]</p>
                                    <p>訂單申請人: $row[1]";
                                    if($row[2]=="b"){
                                        $row[2] = "買書";
                                        $buy_b = $row[2];
                                        echo "(買書)</p>";
                                    }
                                    else{
                                        $row[2] = "借書";
                                        $buy_b = $row[2];
                                        echo "(借書)</p>";
                                    }
                                }
                                while($row=mysqli_fetch_row($result2)){
                                    echo "<p>書持有者: $row[0]</p>
                                    <p>訂單日期: $row[1]</p>";
                                    if($row[2]!=0){
                                        echo"<p>售價: $$row[2]</p></div>";
                                    }
                                    else{
                                        echo"</div>";
                                    }
                                }
                            ?>
                    </div>
                    <div class="row">
                        <form action="dblink2.php" method="post">
                                <input type="hidden" name="site" value="<? echo $site;?>">
                                <input type="hidden" name="bkid" value="<? echo $bkid;?>">
                                <input type="hidden" name="uid" value="<? echo $record[0];?>">
                                <input type="hidden" name="tid" value="<? echo $tid;?>">
                                <input type=hidden name="method" value="insert_rate">
                                    <div style='border:1px black solid; padding: 10px;'>
                                        <label>
                                            <?
                                                if($buyer == $record[0]){
                                            ?>
                                                    填下你對書籍持有者的評價分數(1到5分，5分最高)
                                            <?
                                                }
                                                else{
                                            ?>
                                                    填下你對<? echo $buy_b?>者的評價分數(1到5分，5分最高)
                                            <?
                                                }
                                            ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="score" id="inlineRadio1" value="1" required>
                                                <label class="form-check-label" for="inlineRadio1" style="margin-right: 10px;">1</label>
                                                <input class="form-check-input" type="radio" name="score" id="inlineRadio2" value="2" required>
                                                <label class="form-check-label" for="inlineRadio2" style="margin-right: 10px;">2</label>
                                                <input class="form-check-input" type="radio" name="score" id="inlineRadio3" value="3" required>
                                                <label class="form-check-label" for="inlineRadio3" style="margin-right: 10px;">3</label>
                                                <input class="form-check-input" type="radio" name="score" id="inlineRadio4" value="4" required>
                                                <label class="form-check-label" for="inlineRadio4" style="margin-right: 10px;">4</label>
                                                <input class="form-check-input" type="radio" name="score" id="inlineRadio5" value="5" required>
                                                <label class="form-check-label" for="inlineRadio5">5</label>
                                            </div>
                                        </label>
                                        <br>
                                        <label>
                                            簡述你對本次交易的評價(選填，最多50字)
                                        </label>
                                        <span>
                                            <textarea name="rate_t" rows="3" cols="20" resize: none></textarea>
                                        </span>                                             
										<br>
                                        <p style="float: right;"><button class='btn btn-primary btn-luxe-primary'>送出<i class='ti-angle-right'></i></button></p>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

    <!-- Javascripts -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- Dropdown Menu -->
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Counters -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Stellar Parallax -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Owl Slider -->
    <!-- // <script src="js/owl.carousel.min.js"></script> -->
    <!-- Date Picker -->
    <script src="js/bootstrap-datepicker.min.js"></script>
    <!-- CS Select -->
    <script src="js/classie.js"></script>
    <script src="js/selectFx.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>

    <script src="js/custom.js"></script>

</body>

</html>
