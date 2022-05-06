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
$result=$web->record();
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
    <title>檢視訂單 &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
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
                            <h1 id="fh5co-logo"><a href="index.php">書籍共享系統</a></h1>
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <?php
                            if(isset($type)){
                                if($type=="user"){
                                    echo "<li><a href='index.php'>首頁</a></li><li><a href='books.php'>查看現有書籍</a></li><li><li><a href='my.php'>我的商品</a></li><li><a class='active' href='order.php'>檢視訂單</a></li><li><a href='cart.php'>購物車</a>
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
                                <h1 class="text-center">檢視訂單</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="featured-hotel" class="fh5co-bg-color" style="background-color:white">
                <div class="container">
                    <!--<a href='announceinsert.php' class='btn btn-primary btn-luxe-primary'>新增公告<i class='ti-angle-right'></i></a>-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2>訂單列表</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="text-align:center">

                        <table style="margin-right:auto;margin-left:auto;">
                            <thead>
                                <tr>
                                    <th>書名</th>
                                    <th>賣家名稱</th>
                                    <th>借書/賣書</th>
                                    <th>地址</th>
                                    <th>價格</th>
                                    <th>完成時間</th>
                                    <th>訂單編號</th>
                                    <th>修改</th>
                                    <th>刪除</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($row=mysqli_fetch_row($result)){
                                    $username=$web->responseUserName($row[1]);
                                    $roomname=$web->roomName($row[5]);
                                    $announcename=$web->announceName($row[6]);
                                    echo "<tr>
                                    <td>$i</td>
                                    <td>$username</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>$row[4]</td>
                                    <td>$roomname</td>
                                    <td>$announcename</td>
                                    <td>NT$$row[7]</td>
                                    <td><a href='orderupdate.php?updateid=$row[0]' class='btn btn-primary ' style='background-color:#FF5722'>修改</a></td>
                                    <td><a href='order.php?delid=$row[0]' class='btn btn-primary'>刪除</a></td></tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

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

