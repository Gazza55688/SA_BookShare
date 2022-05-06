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
if(isset($_GET["updateid"])){
    $re=$web->announceShow($_GET["updateid"]);
    $row=mysqli_fetch_row($re);
}
if(isset($_POST["name"]) && isset($_POST["word"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_POST["percent"]) && isset($_POST["updateid"])){
    if($web->announceUpdate($_POST["updateid"],$_POST["name"],$_POST["word"],$_POST["start"],$_POST["end"],$_POST["percent"])){
        echo "<script> {window.alert('修改成功');location.href='announce.php'} </script>";
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
    <title>商品資料更新 &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
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
                            <h1 id="fh5co-logo"><a href="index.php">學人旅店預約系統</a></h1>
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <?php
                            if(isset($type)){
                                if($type=="user"){
                                    echo "<li><a class='active' href='index.php'>返回頁首</a></li><li><a href='announce.php'>我的商品</a></li><li><a href='order.php'>檢視訂單</a></li><li><a href='reservecancel.php'>購物車</a>
									</li><li><a href='new.php'>使用者資訊</a></li><li><a href='index.php?status=logout'>登出</a></li>";
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
                                <h1 class="text-center">公告區</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="featured-hotel" class="fh5co-bg-color" style="background-color:white">
                <div class="container">
                    <a href='announce.php' class='btn btn-primary btn-luxe-primary'>回上一頁<i class='ti-angle-right'></i></a>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2>公告修改</h2>
                            </div>
                        </div>
                    </div>


                    <form action="announceupdate.php" method="post">
                       <input type="hidden" name="updateid" value="<?php echo $_GET["updateid"];?>">
                        <div class="row">
                            <?php
                echo "<div class='feature-full-2col'>
					<div class='f-hotel' style='border:1px black solid'>
						<div class='image' style='background-image: url(images/hotel_feature_2.jpeg); width:300px'>
							
						</div>
						<div class='desc'>
							公告名稱：<input type='text' name='name' value='$row[1]' style='height:30px;color:black'><br>
							公告內容：<textarea name='word'  cols='30' rows='10' style='height:100px;color:black'>$row[2]</textarea><br>
                            開始時間：<input type='date' name='start' value='$row[3]' style='height:30px;color:black'><br>
                            結束時間：<input type='date' name='end' value='$row[4]' style='height:30px;color:black'><br>
                            優惠折數：<input type='text' name='percent' value='$row[5]' style='height:30px;color:black'><br><br>
							<p><button class='btn btn-primary btn-luxe-primary'>修改<i class='ti-angle-right'></i></button></p>
						</div>
					</div></div>";
                ?>
                


                        </div>
                    </form>

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
