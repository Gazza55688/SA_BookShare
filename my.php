<?php
require "connect.php";
$web=new web;
session_start();
if(!isset($_SESSION["type"])){
    echo "<script> {window.alert('請先登入');location.href='login.php'} </script>";
}
else{
    if($_SESSION["type"]!="user"){
        echo "<script> {window.alert('請先登入系統');location.href='index.php'} </script>";
    }
}
if(isset($_SESSION["type"])){
    $type=$_SESSION["type"];
} 
if(isset($_GET["delid"])){
    if($web->announceDelete($_GET["delid"])){
        echo "<script> {window.alert('刪除成功');location.href='announce.php'} </script>";
    }
    else{
        echo "<script> {window.alert('刪除失敗');location.href='announce.php'} </script>";
    }
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
    <title>我的商品 &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
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
                            if(isset($type)){
                                if($type=="user"){
                                    echo "<li><a href='index.php'>首頁</a></li><li><a href='books.php'>查看現有書籍</a></li><li><li><a class='active' href='my.php'>我的商品</a></li><li><a href='order.php'>檢視訂單</a></li><li><a href='cart.php'>購物車</a>
								    </li><li><a href='user.php'>使用者資訊</a></li><li><a href='index.php?status=logout'>登出</a></li>";
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
            <div class="fh5co-parallax" style="background-image: url(images/147958.jpg);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell">
                                <h1 class="text-center">我的商品</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="featured-hotel" class="fh5co-bg-color" style="background-color:white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2>我的商品</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                $re=$web->announce();
                $i=0;
                $count=mysqli_num_rows($re);
                while($row=mysqli_fetch_row($re)){
                    if($i%2==0){
                        echo "<div class='feature-full-2col'>
					<div class='f-hotel' style='border:1px black solid'>
						<div class='image' style='background-image: url(images/hotel_feature_2.jpeg); width:300px'>
							
						</div>
						<div class='desc'>
							<h3>$row[1]</h3>
							<p>$row[2]</p>
                            <p>優惠期間:<br>".$row[3]."~".$row[4]."</p>
							<span><a href='announceupdate.php?updateid=$row[0]' class='btn btn-primary btn-luxe-primary'>修改<i class='ti-angle-right'></i></a></span><span><a href='announce.php?delid=$row[0]' class='btn btn-primary btn-luxe-primary' onclick=\"return confirm('確定刪除?')\">刪除<i class='ti-angle-right'></i></a></span>
						</div>
					</div>";
                    }
                    if($i%2!=0){
                        echo "<div class='f-hotel' style='border:1px black solid'>
						<div class='image' style='background-image: url(images/hotel_feature_2.jpeg);width:300px'>
							
						</div>
						<div class='desc'>
							<h3>$row[1]</h3>
							<p>$row[2]</p>
                            <p>優惠期間:<br>".$row[3]."~".$row[4]."</p>
							<span><a href='announceupdate.php?updateid=$row[0]' class='btn btn-primary btn-luxe-primary'>修改<i class='ti-angle-right'></i></a></span><span><a href='announce.php?delid=$row[0]' class='btn btn-primary btn-luxe-primary' onclick=\"return confirm('確定刪除?')\">刪除<i class='ti-angle-right'></i></a></span>
						</div>
					</div>";
                    }
                    if($i%2!=0 and $i%2<2){
                        echo "</div>";
                    }
                    if($i%2==0 and $i%2>2){
                        echo "<div class='f-hotel' style='border:1px black solid'>
						<div class='image' style='background-image: url(images/hotel_feature_2.jpeg);width:300px'>
							
						</div>
						<div class='desc'>
							<h3>$row[1]</h3>
							<p>$row[2]</p><br>
                            <p>優惠期間:<br>".$row[3]."~".$row[4]."</p>
							<span><a href='announce.php?updateid=$row[0]' class='btn btn-primary btn-luxe-primary'>修改<i class='ti-angle-right'></i></a></span><span><a href='announceupdate.php?delid=$row[0]' class='btn btn-primary btn-luxe-primary' onclick=\"return confirm('確定刪除?')\">刪除<i class='ti-angle-right'></i></a></span>
						</div>
					</div></div>";
                    }
                    
                    if($i+1==$count){
                        echo "</div>";
                    }
                    $i++;
                }
                ?>


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
