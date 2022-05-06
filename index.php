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
/*if(isset($_SESSION["user_id"])){
    $user_id=$_SESSION["user_id"];
    $arr=$web->userLove($user_id);
}*/
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
                                echo "<li><a class='active' href='index.php'>首頁</a></li><li><a href='books.php'>查看現有書籍</a></li><li><li><a href='my.php'>我的商品</a></li><li><a href='order.php'>檢視訂單</a></li><li><a href='cart.php'>購物車</a>
								</li><li><a href='user.php'>使用者資訊</a></li><li><a href='index.php?status=logout'>登出</a></li>";
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
            <aside id="fh5co-hero" class="js-fullheight">
                <div class="flexslider js-fullheight">
                    <ul class="slides">
                        <li style="background-image: url(images/147945.jpg);">
                            <div class="overlay-gradient"></div>
                            <div class="container">
                                <div class="col-md-12 col-md-offset-0 text-center slider-text">
                                    <div class="slider-text-inner js-fullheight">
                                        <div class="desc">
                                            <p><span>設計理念</span></p>
                                            <p>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="section-title text-center" style="color: #fff;">
                                                        「書籍共享系統」是一款能讓眾多讀者互相借閱書籍的系統，也能在線上借閱圖書館的書籍，使用宅配、超商取貨等方式傳遞書籍，並在閱讀完畢後歸還給該書的擁有者或圖書館。<br><br>此系統搭建的原因是為了在這個電子書興起的時代，給傳統書籍開闢一條新的道路，現在購買紙質書的人正在漸漸減少，因為它也不如電子書那般易於保存和收藏，甚至有許多書被擱置在家中角落，但是還是有許多讀者偏愛紙質書，所以人們需要更方便閱讀紙質書的管道，書籍共享系統的誕生可以給紙質書帶來新的生命力，在讀者之間傳閱共享，延續它們的價值，而且讀者在書籍交換的過程中可以認識許多有相同讀書愛好的人，還可以和眾多讀者交流讀書心得，比一個人閱讀更能抒發內心所想。
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url(images/147958.jpg);">
                            <div class="overlay-gradient"></div>
                            <div class="container">
                                <div class="col-md-12 col-md-offset-0 text-center slider-text">
                                    <div class="slider-text-inner js-fullheight">
                                        <div class="desc">
                                            <p><span>設計理念</span></p>
                                            <p>
                                            </p>
                                            <div class="col-md-12">
                                                    <div class="section-title text-center" style="color: #fff;">
                                                        「書籍共享系統」是一款能讓眾多讀者互相借閱書籍的系統，也能在線上借閱圖書館的書籍，使用宅配、超商取貨等方式傳遞書籍，並在閱讀完畢後歸還給該書的擁有者或圖書館。<br><br>此系統搭建的原因是為了在這個電子書興起的時代，給傳統書籍開闢一條新的道路，現在購買紙質書的人正在漸漸減少，因為它也不如電子書那般易於保存和收藏，甚至有許多書被擱置在家中角落，但是還是有許多讀者偏愛紙質書，所以人們需要更方便閱讀紙質書的管道，書籍共享系統的誕生可以給紙質書帶來新的生命力，在讀者之間傳閱共享，延續它們的價值，而且讀者在書籍交換的過程中可以認識許多有相同讀書愛好的人，還可以和眾多讀者交流讀書心得，比一個人閱讀更能抒發內心所想。
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
            </aside>
        <div id="featured-hotel" class="fh5co-bg-color">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2>書籍推薦</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $re=$web->announce();
                        $i=0;
                        @$count=mysqli_num_rows($re);
                        while(@$row=mysqli_fetch_row($re)){
                        if($i%2==0){
                        echo "<div class='feature-full-2col'>
					<div class='f-hotel' style='border:1px black solid'>
						<div class='image' style='background-image: url(images/hotel_feature_2.jpeg);'>
							
						</div>
						<div class='desc'>
							<h3>$row[1]</h3>
							<p>$row[2]</p>
                            <p>優惠期間:<br>".$row[3]."~".$row[4]."</p>
							<span><a href='reserve.php' class='btn btn-primary btn-luxe-primary'>馬上訂房<i class='ti-angle-right'></i></a></span>
						</div>
					</div>";
                    }
                    if($i%2!=0){
                        echo "<div class='f-hotel' style='border:1px black solid'>
						<div class='image' style='background-image: url(images/hotel_feature_2.jpeg);'>
							
						</div>
						<div class='desc'>
							<h3>$row[1]</h3>
							<p>$row[2]</p>
                            <p>優惠期間:<br>".$row[3]."~".$row[4]."</p>
							<span><a href='reserve.php' class='btn btn-primary btn-luxe-primary'>馬上訂房<i class='ti-angle-right'></i></a></span>
						</div>
					</div>";
                    }
                    if($i%2!=0 and $i%2<2){
                        echo "</div>";
                    }
                    if($i%2==0 and $i%2>2){
                        echo "<div class='f-hotel' style='border:1px black solid'>
						<div class='image' style='background-image: url(images/hotel_feature_2.jpeg);'>
							
						</div>
						<div class='desc'>
							<h3>$row[1]</h3>
							<p>$row[2]</p><br>
                            <p>優惠期間:<br>".$row[3]."~".$row[4]."</p>
							<span><a href='reserve.php' class='btn btn-primary btn-luxe-primary'>馬上訂房<i class='ti-angle-right'></i></a></span>
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

            <div id="hotel-facilities">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2>功能</h2>
                            </div>
                        </div>
                    </div>

                    <div id="tabs">
                        <nav class="tabs-nav">
                            <a href="#" class="active" data-tab="tab1">
                                <span>借閱</span>
                            </a>
                            <a href="#" data-tab="tab2">
                                <span>出借</span>
                            </a>

                            <a href="#" data-tab="tab4">
                                <span>買書</span>
                            </a>

                            <a href="#" data-tab="tab6">
                                <span>賣書</span>
                            </a>
                        </nav>
                        <div class="tab-content-container">
                            <div class="tab-content active show" data-tab-content="tab1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="images/147986.jpg" class="img-responsive" alt="Image">
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="heading">借閱</h3>
                                            <p>可以在此找到可以借閱的書籍，這裡陳列了各種人家刊登上來的書籍，無論是教科書、小說還是漫畫書等等都有機會找到，另外也可以透過搜尋書籍名稱來找到自己特定想要借的書籍，來加快瀏覽的時間。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" data-tab-content="tab2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="images/147987.jpg" class="img-responsive" alt="Image">
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="heading">出借</h3>
                                            <p>可以在此把自己用不到或是不想要的圖書分享到這裡，將資源分享給需要的人，並且可以幫出版社或作家打廣告，讓這本書不再只被看過一次就被拋棄。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content" data-tab-content="tab4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="images/2019.jpg" class="img-responsive" alt="Image">
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="heading">買書</h3>
                                            <p>可以在此找尋自己想要買的書籍，輸入書籍名稱即可快速讓你找到想要的書，對於想買此書籍卻不知道從哪裡開始找的人，可以使用此網站來查詢。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content" data-tab-content="tab6">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="images/20191.jpg" class="img-responsive" alt="Image">
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="heading">賣書</h3>
                                            <p>可以在此刊登想要販售的書籍，輸入書籍相關資料和販售價格即可刊登，對於家裡有多的或是用不到的書的人，在延續書籍價值的方面是個不錯的選擇。</p>
                                        </div>
                                    </div>
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
