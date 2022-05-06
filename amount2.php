<?php
require "connect.php";
$web=new web;
session_start();
if(!isset($_SESSION["type"])){
    echo "<script> {window.alert('請先登入');location.href='login.php'} </script>";
}
else{
    if($_SESSION["type"]!="manager"){
        echo "<script> {window.alert('非管理者無法進行這項操作');location.href='index.php'} </script>";
    }
}
if(isset($_SESSION["type"])){
    $type=$_SESSION["type"];
} 
if(isset($_GET["roomid"])){
    $result=$web->roomAmount($_GET["roomid"]);
    $row=mysqli_fetch_row($result);
    $roomname=$web->roomName($_GET["roomid"]);
}
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
    <title>學人旅店預約系統 &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);
        var m10 = <?php echo $row[1];?>;
        var m11 = <?php echo $row[2];?>;
        var m12 = <?php echo $row[3];?>;
        var m1 = <?php echo $row[4];?>;
        var name = <?php echo $roomname;?>;

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['月份', '總銷售額'],
                ['10月', m10],
                ['11月', m11],
                ['12月', m12],
                ['1月', m1]
            ]);

            var options = {
                chart: {
                    title: '房型總銷售額',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

    </script>
    <style>
        table {
            border: 0;
            border-collapse: collapse;
        }

        th {
            background-color: #34393d;
            border: solid 1px #000;
            padding: 8px;
            color: #fff;
            text-align: center;
        }

        td {
            border: solid 1px #34393d;
            text-align: center;
            padding: 8px;
            color: #757575;
        }

        .bt {
            color: #fff;
            background-color: #f36b4f;
            border: 1px solid #f36b4f;
            font-size: 20px;
        }

        .bt:hover {
            background-color: #34393d;
            border: 1px solid #34393d;
        }

        .reservation {
            color: #fff;
            background-color: #d9593f;
            border: 1px solid #d9593f;
            width: auto;
            height: auto;
        }

        .reservation:hover {
            color: #fff;
            background-color: #696c6f;
            border: 1px solid #696c6f;

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
                            <h1 id="fh5co-logo"><a href="index.php">學人旅店預約系統</a></h1>
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <?php
                            if(isset($type)){
                                if($type=="user" and isset($arr)){
                                    echo "<li><a class='active' href='index.php'>主頁</a></li><li><a href='reserve.php'>預約訂房</a></li><li><a href='reservecancel.php'>取消預約</a></li><li>
										<a href='#' class='fh5co-sub-ddown'>我的最愛</a>
										<ul class='fh5co-sub-menu'>";
                                    if($arr[0]==0){
                                        echo "<li id='li1'><a href='#'>總統單人房</a></li>";
                                    }
                                    else{
                                        echo "<li id='li1' style='display:block'><a href='#'>總統單人房</a></li>";
                                    }
                                    if($arr[1]==0){
                                        echo "<li id='li2'><a href='#'>總統雙人房</a></li>";
                                    }
                                    else{
                                        echo "<li id='li2' style='display:block'><a href='#'>總統雙人房</a></li>";
                                    }
                                    if($arr[2]==0){
                                        echo "<li id='li3'><a href='#'>總統家庭房</a></li>";
                                    }
                                    else{
                                        echo "<li id='li3' style='display:block'><a href='#'>總統家庭房</a></li>";
                                    }		
										echo "</ul>
									</li><li><a href='index.php?status=logout'>登出</a></li>";
                                }
                                if($type=="manager"){
                                    echo "<li><a href='index.php'>主頁</a></li><li><a href='announce.php'>公告區</a></li><li><a href='amount.php' class='active'>營運報表</a></li><li><a href='order.php'>後台管理</a></li><li><a href='index.php?status=logout'>登出</a></li>";
                                }
                                
                            }
                            else{
                                echo "<li><a class='active' href='index.php'>主頁</a></li><li><a href='login.php'>登入</a></li>";
                            }
                            ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>

            </div>
            <!-- end:fh5co-header -->
            <div class="fh5co-parallax" style="background-image: url(images/slider1.jpeg);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell">
                                <h1 class="text-center">營運報表</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href='amount.php' class='btn btn-primary btn-luxe-primary' style="margin-top:30px;margin-left:30px">回上一頁<i class='ti-angle-right'></i></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2><?php echo $roomname."報表";?></h2>
                    </div>
                </div>
            </div>
            <div id="hotel-facilities">
                <div class="container">
                    <div id="tabs">

                        <div class="tab-content-container">
                            <div class="tab-content active show" data-tab-content="tab1">
                                <div class="container">
                                    <form action="reserve2.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="images/tab_img_5.jpeg" class="img-responsive" alt="Image">
                                            </div>
                                            <div class="col-md-6">
                                                <div id="columnchart_material" style="width: 600px; height: 500px;"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <footer id="footer" class="fh5co-bg-color">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="copyright">
                                <p><small>&copy; 2016 Free HTML5 Template. <br> All Rights Reserved. <br>
                                        Designed by <a href="http://freehtml5.co" target="_blank">FreeHTML5.co</a> <br> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3>Company</h3>
                                    <ul class="link">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Hotels</a></li>
                                        <li><a href="#">Customer Care</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h3>Our Facilities</h3>
                                    <ul class="link">
                                        <li><a href="#">Resturant</a></li>
                                        <li><a href="#">Bars</a></li>
                                        <li><a href="#">Pick-up</a></li>
                                        <li><a href="#">Swimming Pool</a></li>
                                        <li><a href="#">Spa</a></li>
                                        <li><a href="#">Gym</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h3>Subscribe</h3>
                                    <p>Sed cursus ut nibh in semper. Mauris varius et magna in fermentum. </p>
                                    <form action="#" id="form-subscribe">
                                        <div class="form-field">
                                            <input type="email" placeholder="Email Address" id="email">
                                            <input type="submit" id="submit" value="Send">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="social-icons">
                                <li>
                                    <a href="#"><i class="icon-twitter-with-circle"></i></a>
                                    <a href="#"><i class="icon-facebook-with-circle"></i></a>
                                    <a href="#"><i class="icon-instagram-with-circle"></i></a>
                                    <a href="#"><i class="icon-linkedin-with-circle"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

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