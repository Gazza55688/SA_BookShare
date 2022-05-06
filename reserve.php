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
if(isset($_GET["d1"])){
    $web->userLoveChange("d1",$_GET["d1"],$userid);
}
if(isset($_GET["d2"])){
    $web->userLoveChange("d2",$_GET["d2"],$userid);
}
if(isset($_GET["d3"])){
    $web->userLoveChange("d3",$_GET["d3"],$userid);
}
if(isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
}
$arr=$web->userLove($userid);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
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
										<a href='#' class='fh5co-sub-ddown sf-with-ul'>我的最愛</a>
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
						<h1 class="text-center">預約訂房</h1>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-hotel-section">
		<div class="container">
			<div class="row">
			<?php
                $i=1;
                $d="d";
                $r=$web->room();
                while($row=mysqli_fetch_row($r)){
                    echo "<div class='col-md-4'>
					<div class='hotel-content'>
						<div class='hotel-grid' style='background-image: url(images/image-".$row[0].".jpeg);'>
							<div class='price'><small>For as low as</small><span>NT$".$row[3]."/晚</span></div>
							<a class='book-now text-center' href='reserve2.php?roomid=$row[0]'><i class='ti-calendar''></i>訂房</a>
                            
						</div>
						<div class='desc'>
							<h3><a href='#'>$row[1]</a></h3>
							<p>$row[4]</p>";
                          if($web->userLoveSearch($d,$i,$userid)==0){
                              echo "<span class='div-a-".$row[0]."' id='da".$row[0]."'>
                    <svg aria-label='讚' color='#262626' fill='#262626' height='24' role='img' viewBox='0 0 24 24' width='24'>
                        <path d='M16.792 3.904A4.989 4.989 0 0121.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 014.708-5.218 4.21 4.21 0 013.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 013.679-1.938m0-2a6.04 6.04 0 00-4.797 2.127 6.052 6.052 0 00-4.787-2.127A6.985 6.985 0 00.5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 003.518 3.018 2 2 0 002.174 0 45.263 45.263 0 003.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 00-6.708-7.218z'></path>
                    </svg>
                </span>
                <span class='div-b-".$row[0]."' id='db".$row[0]."'>
                    <svg aria-label='收回讚' class='_8-yf5 ' color='#ed4956' fill='#ed4956' height='24' role='img' viewBox='0 0 48 48' width='24'>
                        <path d='M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z'></path>
                    </svg>
                </span>";
                          }  
                    else{
                        echo "<span class='div-a-".$row[0]."' id='da".$row[0]."' style='position: relative;display: none;'>
                    <svg aria-label='讚' color='#262626' fill='#262626' height='24' role='img' viewBox='0 0 24 24' width='24'>
                        <path d='M16.792 3.904A4.989 4.989 0 0121.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 014.708-5.218 4.21 4.21 0 013.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 013.679-1.938m0-2a6.04 6.04 0 00-4.797 2.127 6.052 6.052 0 00-4.787-2.127A6.985 6.985 0 00.5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 003.518 3.018 2 2 0 002.174 0 45.263 45.263 0 003.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 00-6.708-7.218z'></path>
                    </svg>
                </span>
                <span class='div-b-".$row[0]."' id='db".$row[0]."' style='position: relative;display:block'>
                    <svg aria-label='收回讚' class='_8-yf5 ' color='#ed4956' fill='#ed4956' height='24' role='img' viewBox='0 0 48 48' width='24'>
                        <path d='M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z'></path>
                    </svg>
                </span>";
                    }
						 echo "</div>
					</div>
				</div>";
                    $i++;
                }
                ?>
				
				

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
<script>
    var da1 = document.getElementById("da1");
    var db1 = document.getElementById("db1");
    var li1 = document.getElementById("li1");
    var da2 = document.getElementById("da2");
    var db2 = document.getElementById("db2");
    var li2 = document.getElementById("li2");
    var da3 = document.getElementById("da3");
    var db3 = document.getElementById("db3");
    var li3 = document.getElementById("li3");
    var d1 = 0;
    var d2 = 0;
    var d3 = 0;
    
    da1.onclick = function() {
        da1.style.display = "none";
        db1.style.display = "block";
        li1.style.display = "block";
        d1 = 1;
        location.href="reserve.php?d1="+d1;
    }
    db1.onclick = function() {
        db1.style.display = "none";
        da1.style.display = "block";
        li1.style.display = "none";
        d1 = 0;
        location.href="reserve.php?d1="+d1;
    }
    da2.onclick = function() {
        da2.style.display = "none";
        db2.style.display = "block";
        li2.style.display = "block";
        d2 = 1;
        location.href="reserve.php?d2="+d2;
    }
    db2.onclick = function() {
        db2.style.display = "none";
        da2.style.display = "block";
        li2.style.display = "none";
        d2 = 0;
        location.href="reserve.php?d2="+d2;
    }
    da3.onclick = function() {
        da3.style.display = "none";
        db3.style.display = "block";
        li3.style.display = "block";
        d3 = 1;
        location.href="reserve.php?d3="+d3;
    }
    db3.onclick = function() {
        db3.style.display = "none";
        da3.style.display = "block";
        li3.style.display = "none";
        d3 = 0;
        location.href="reserve.php?d3="+d3;
    }
    
    
    $(function() {
        $('[data-submenu]').submenupicker();
    });

</script>