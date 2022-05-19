<?php
require "connect.php";
$web=new web;
session_start();
if(isset($_GET["status"]) && $_GET["status"]=="logout"){
    session_destroy();
}
else{
    if(isset($_SESSION["user_id"])){
        $type=$_SESSION["user_id"];
    }     
}
include "logincheck.php";
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
    <title>學人旅店預約系統</title>
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
	<style>
        #li1 {
            display: none;
        }

        #li2 {
            display: none;
        }

        #li3 {
            display: none;
        }
        .div-a-1 {
            position: relative;
        }

        .div-b-1 {
            position: relative;
            display: none;
            
        }

        .div-a-2 {
            position: relative;

        }

        .div-b-2 {
            position: relative;
            display: none;
        }

        .div-a-3 {
            position: relative;

        }

        .div-b-3 {
            position: relative;
            display: none;
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
                                if($type=="user"){
                                    echo "<li><a href='index.php'>主頁</a></li><li><a href='reserve.php' class='active'>預約訂房</a></li><li><a href='reservecancel.php'>取消預約</a></li><li>
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
                                    echo "<li><a class='active' href='index.php'>主頁</a></li><li><a href='announce.php'>公告區</a></li><li><a href='amount.php'>營運報表</a></li><a href='order.php'>後台管理</a></li><li><a href='index.php?status=logout'>登出</a></li>";
                                }
                                
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
                                <h1 class="text-center"><?php echo $row[1]."預約";?></h1>

                            </div>
                        </div>
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
                                                <span class="super-heading-sm">最高規格</span>
                                                <h3 class="heading"><?php echo $row[1];?></h3>
                                                <p><?php echo $row[4];?></p>
                                                <p>房間售價：<?php echo "NT$".strval($row[3])."/晚";?></p>
                                                <p>入住日期：<input type="date" name="start"></p>
                                                <p>退房日期：<input type="date" name="end"></p>
                                                <p>適用優惠: <select name="announce">
                                                <option value='0'></option>
                                                <?php
                                                $date=date("Y-m-d");
                                                $result3=$web->announce(); while($row3=mysqli_fetch_row($result3)){
                                                    if(strtotime($row3[4])-strtotime($date)>0 and strtotime($date)-strtotime($row3[3])>0){
                                                        echo "<option value='$row3[0]'>".$row3[1]."--".$row3[2]."</option>";
                                                    }
                                                }
                                                ?>
                                                </select></p>
                                                <br>
                                            
                                                <p><button class="btn btn-primary btn-luxe-primary">訂房<i class="ti-angle-right"></i></button></p>
                                                <input type="hidden" name="roomid" value="<?php echo $roomid;?>">
                                                <input type="hidden" name="date" value="<?php echo $date;?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
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
