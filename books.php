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
if(!isset($_SESSION["type"])){
    echo "<script> {window.alert('請先登入');location.href='login.php'} </script>";
}
else{
    if($_SESSION["type"]!="user"){
        echo "<script> {window.alert('請先登入系統');location.href='index.php'} </script>";
    }
}
$link=mysqli_connect("localhost","root","12345678","user");
@$searchtxt = $_GET["searchtxt"];
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <style type="text/css">
        img {
            width: 277px;
            height: 389px;
        }

        p {
            margin: 5px;
            margin-bottom: 5px;
        }
        .container-1{
            justify-content: center; 
            align-items: center; 
            width: 500px;
            vertical-align: middle;
            white-space: nowrap;
            position: relative;
            margin: auto;
        }
        .container-1 input#search{
            width: 500px;
            height: 50px;
            background: #2b303b;
            border: none;
            font-size: 10pt;
            float: left;
            color: #fff;
            padding-left: 45px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
        .container-1 input#search::-webkit-input-placeholder {
            color: #fff;
        }
 
        .container-1 input#search:-moz-placeholder { /* Firefox 18- */
            color: #fff;  
        }
 
        .container-1 input#search::-moz-placeholder {  /* Firefox 19+ */
            color: #fff;  
        }
 
        .container-1 input#search:-ms-input-placeholder {  
            color: #fff;  
        }
        .container-1 .icon{
            top: 50%;
            margin-top: 17px;
            z-index: 1;
            color: #4f5b66;
        }
        .container-1 input#searchbtn{
            height: 50px;
            background-color: #4f5b66;
            white-space: nowrap;
            color: #fff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
    </style>
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

</head>

<body>
    <div>
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
                                echo "<li><a href='index.php'>首頁</a></li><li><a  class='active' href='books.php'>查看現有書籍</a></li><li><li><a href='my.php'>我的商品</a></li><li><a href='order.php'>檢視訂單</a></li><li><a href='cart.php'>購物車</a>
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
            <div class="fh5co-parallax" style="background-image: url(images/147945.jpg);" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell">
                                <h1 class="text-center">查看書籍</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fh5co-books-section" style="width: 100%">
                <div class="container">
                    <a href='insert.php?method=b' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">發布書本(賣)<i class='ti-angle-right'></i></a>
                    <a href='insert.php?method=br' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">發布書本(借出)<i class='ti-angle-right'></i></a>
                    <form action="" method=get>
                    <div class="box">
                    <div class="container-1">
                        <input type="text" id="search" name="searchtxt" placeholder="輸入書名" value=<?php echo $searchtxt ?>>
                        <input id="searchbtn" type=submit value="搜尋">
                    </div>
                    </div>
                    </form>
                    <?
                        @$_SESSION['searchtxt'] = $searchtxt;
                        if(empty($searchtxt)){
	                       $sql1="select * from book where buy_b = 'b'";
                           $sql2="select * from book where buy_b = 'br'";
		                }
                        else{
                            $sql1="select * from book where buy_b = 'b' and book_name like '%$searchtxt%' order by book_id"; 
                            $sql2="select * from book where buy_b = 'br' and book_name like '%$searchtxt%' order by book_id";
                        }
                        $rs1=mysqli_query($link,$sql1);
                        //買賣分頁
                        @$data_nums = mysqli_num_rows($rs1); //統計總比數
                        $per = 9; //每頁顯示項目數量
                        $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
                        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                           $page=1; //則在此設定起始頁數
                        } else {
                          $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
                        }
                        $start = ($page-1)*$per; //每一頁開始的資料序號
                        $rs1 = mysqli_query($link, $sql1.' LIMIT '.$start.', '.$per)or die("Error");
                        //借書分頁
                        
                        $rs2=mysqli_query($link,$sql2);
                        @$data_nums2 = mysqli_num_rows($rs2); //統計總比數
                        $per = 9; //每頁顯示項目數量
                        $pages2 = ceil($data_nums2/$per); //取得不小於值的下一個整數
                        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                            $page2=1; //則在此設定起始頁數
                        } else {
                            $page2 = intval($_GET["page"]); //確認頁數只能夠是數值資料
                        }
                        $start2 = ($page2-1)*$per; //每一頁開始的資料序號
                        $rs = mysqli_query($link, $sql2.' LIMIT '.$start2.', '.$per)or die("Error");
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <div id="tabs">
                                    <nav class="tabs-nav" style="margin:0px auto; margin-top: 30px; margin-bottom: 30px;">
                                        <a>
                                            <span></span>
                                        </a>
                                        <a>
                                            <span></span>
                                        </a>
                                        <a href="" class="active" data-tab="tab1">
                                            <span>我想買書(<? echo $data_nums?>)</span>

                                        </a>
                                        <a href="" data-tab="tab2">
                                            <span>我想借書(<? echo $data_nums2?>)</span>
                                        </a>
                                    </nav>
                                    <div class="tab-content-container">
                                        <div class="tab-content active show" data-tab-content="tab1">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="container">
                                                                <div class="row text-center">
                                                    <?php
                                                    //賣書輸出
                                                        while($record = mysqli_fetch_row($rs1)){
                                                    ?>
                                                    <div style="float:left; width:30%; margin: 5px; border: 1px solid;">
                                                        <img src="<?php echo $record[6];?>">
                                                        <hr>
                                                        <div>
                                                            <p style="font-size: 15px; color: #000;"><?php echo $record[2];?></p>
                                                            <p style="font-size: 15px; color: #000;">作者: <?php echo $record[3];?></p>
                                                            <p style="font-size: 15px; color: #000;">出版社: <?php echo $record[4];?></p>
                                                            <p style="font-size: 15px; color: #000;">售價: $<?php echo $record[9];?></p>
                                                            <p style="font-size: 15px; color: #000;">擁有者: <?php echo $record[1];?></p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <footer id="footer" style=" padding: 5px;">
                                                    <?php
                                                    //分頁頁碼
                                                    echo '共 '.$data_nums.' 筆-在第 '.$page.' 頁-共 '.$pages.' 頁';
                                                    echo "<br /><a href=?page=1>第一頁</a> ";
                                                    echo "第 ";
                                                    for( $i=1 ; $i<=$pages ; $i++ ) {
                                                    if ( $page-3 < $i && $i < $page+3 ) {
                                                        echo "<a href=?page=".$i.">".$i."</a> ";
                                                        }
                                                    } 
                                                    echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
                                                    ?>
                                                    </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content" data-tab-content="tab2">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                            <div class="container" style="margin-left: -10px; margin-right: -10px;">
                                                                <div class="row text-center">
                                                    <?php
                                                    //借書輸出
                                                        while($record = mysqli_fetch_row($rs2)){
                                                    ?>
                                                                    <div style="float:left; width:30%; margin: 5px; border: 1px solid;">
                                                                        <img src="<?php echo $record[6];?>">
                                                                        <hr style="border: 1px solid;">
                                                                        <div>
                                                                            <p style="font-size: 15px; color: #000;"><?php echo $record[2];?></p>
                                                                            <p style="font-size: 15px; color: #000;">作者: <?php echo $record[3];?></p>
                                                                            <p style="font-size: 15px; color: #000;">出版社: <?php echo $record[4];?></p>
                                                                            <p style="font-size: 15px; color: #000;">擁有者: <?php echo $record[1];?></p>
                                                                        </div>
                                                                    </div>
                                                    <?php
                                                        }
                                                    ?>
                                                                <footer id="footer" style=" padding: 5px;">
                                                    <?php
                                                    //分頁頁碼
                                                    echo '共 '.$data_nums2.' 筆-在第 '.$page2.' 頁-共 '.$pages2.' 頁';
                                                    echo "<br /><a href=?page=1>第一頁</a> ";
                                                    echo "第 ";
                                                    for( $i=1 ; $i<=$pages2 ; $i++ ) {
                                                    if ( $page2-3 < $i && $i < $page2+3 ) {
                                                        echo "<a href=?page=".$i.">".$i."</a> ";
                                                        }
                                                    } 
                                                    echo " 頁 <a href=?page=".$pages2.">末頁</a><br /><br />";
                                                    ?>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
