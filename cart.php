<?php
require "connect.php";
$web=new web;
session_start();
if(!isset($_SESSION["type"])){
    echo "<script> {window.alert('請先登入');location.href='login.php'} </script>";
}
if(isset($_SESSION["type"]) && $_SESSION["type"]!="user"){
        echo "<script> {window.alert('非一般使用者');location.href='index.php'} </script>";
}
else{
    $type=$_SESSION["type"];
}
if(isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
}
if(isset($_GET["delid"])){
    if($web->delRecordTimeCheck($_GET["delid"])){
        if($web->delRecord($_GET["delid"])){
            echo "<script> {window.alert('取消成功');location.href='reservecancel.php'} </script>";
        }
    }
    else{
        echo "<script> {window.alert('不能於入住當天取消訂房');location.href='reservecancel.php'} </script>";
    }
}
//$arr=$web->userLove($userid);
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
    <title>購物車</title>
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
                            <h1 id="fh5co-logo"><a href="index.php">書籍共享系統</a></h1>
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <?php
                            if(isset($type)){
                                if($type=="user"){
                                    echo "<li><a href='index.php'>首頁</a></li><li><a href='books.php'>查看現有書籍</a></li><li><li><a href='my.php'>我的商品</a></li><li><a href='order.php'>檢視訂單</a></li><li><a  class='active' href='cart.php'>購物車</a>
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
                                <h1 class="text-center">購物車</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div id="featured-hotel" class="fh5co-bg-color" style="background-color:white">
                <div class="container" style="background-color:#e6e6e6;padding-left:40px;padding-right:40px">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center" style="padding-top:20px">
                                <h2>購物車清單</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">


                        <?php
                        $result=$web->recordSearch($userid);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_row($result)){
                                $arr=$web->cancelInform($row[5],$row[6]);
                                echo "<div class='feature-full-2col'>
                            <div class='f-hotel'>
                                <div class='image' style='background-image: url(images/image-".$row[5].".jpg);width:600px;'>
                                    <!--<div class='descrip text-center'>
                                        <p><small>For as low as</small><span>$99/night</span></p>
                                    </div>-->
                                </div>
                                
                            </div>
                            <div class='f-hotel'>
                                
                                <div class='desc' style='width:600px'>
                                    <p>訂購房型：".$arr[0]."</p>
                                    <p>預約日期:".$row[2]."</p>
                                    <p>入住日期:".$row[3]."</p>
                                    <p>退房日期:".$row[4]."</p>
                                    <p>使用優惠:".$arr[1]."</p>
                                    <p>應付金額:".$row[7]."</p>
                                    <p><a href='reservecancel.php?delid=$row[0]' class='btn btn-primary btn-luxe-primary' onclick=\"return confirm('確定取消?')\">取消預約<i class='ti-angle-right'></i></a></p>
                                </div>
                            </div>

                        </div>";
                            }
                        }
                        else{
                            echo "<div class='section-title text-center' style='padding-top:20px'>
                                <h1 style='color:red'>目前無訂單</h1>
                            </div>";
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
