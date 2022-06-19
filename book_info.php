<?php
require "connect.php";
$web=new web;
session_start();
include "logincheck.php";
$link=mysqli_connect("localhost","root","12345678","user");
@$book = $_POST['book'];
@$own = $_POST['own'];
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
        img{
            width: 277px;
            height: 389px;
            float: right;
            margin-top: 50px;
        }
        html{
            overflow: auto; 
        }
        p{
            color: #000;
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
                                        include "navbar.php"
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>

            </div>
            <!-- end:fh5co-header -->
            <div class="fh5co-parallax" style="background-image: url(images/147945.jpg);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell">
                                <h1 class="text-center">書籍預約</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <div class="container" style="margin-top: 50px;">
                    <?
                        $sql1="SELECT b.*, u.user_t, u.user_name FROM book AS b, user as u WHERE b.book_name='$book' AND  u.user_id = '$own';";
                        $rs=mysqli_query($link,$sql);
                        $record = mysqli_fetch_row($rs);
                        $rs1=mysqli_query($link,$sql1);
                        while($record1 = mysqli_fetch_row($rs1)){
                            if($record1[8]=='b'){
                    ?>
                    <a href='books.php' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">返回上一頁<i class='ti-angle-right'></i></a>
                    <?
                            }
                            else{
                    ?>
                    <a href='book_br.php' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">返回上一頁<i class='ti-angle-right'></i></a>
                    <?
                            }
                    ?>
                    <form action="dblink.php" method="post">
                        <input type=hidden name="method" value="insert_b">
                        <div class="col-md-6">
                            <img src="<?php echo $record1[6];?>" class="img-responsive" alt="Image">
                        </div>
                        <div class="col-md-6">
                            <span class="super-heading-sm">書籍資料</span>
                            <input type=hidden name="id" value="<? echo $record1[0]?>">
                            <h3 class="heading">書名: <?php echo $record1[2];?></h3>
                            <p>出版社: <?php echo $record1[4];?></p>
                            <p>作者：<?php echo $record1[3];?></p>
                            <p>類別：<?php echo $record1[5];?></p>
                            <p><a href='user.php?uid=<?php echo $record1[1];?>'>擁有者：<?php echo $record1[11];?></a></p>
                            <p>擁有者電話：<?php echo $record1[10];?></p>
                            <input type="hidden" name="buy_id" value="<? echo $record[0]?>">
                            <?
                                if($record1[8]=='b'){
                            ?>
                                    <p>售價：$<?php echo $record1[9];?></p>
                                    <p><button class="btn btn-primary btn-luxe-primary">確定買書<i class="ti-angle-right"></i></button></p>
                            <?
                                }
                                else if($record1[8]=='br'){
                            ?>
                                <p><button class="btn btn-primary btn-luxe-primary">確定借書<i class="ti-angle-right"></i></button></p>
                            <?
                                }
                            ?>
                        </div>
                    </form>
                    <?
                        }
                    ?>
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
