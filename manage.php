<?php
require "connect.php";
$web=new web;
session_start();
include "logincheck.php";
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
    <title>管理訂單</title>
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
                                        include "navbar.php";
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
                                <h1 class="text-center">管理訂單</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div>
                <div style="width: 100%; background-color:#e6e6e6;padding-left:40px;padding-right:40px; margin-bottom: 40px;padding-bottom:40px">
                    <a href='index.php' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px; margin-left: 100px;">返回上一頁<i class='ti-angle-right'></i></a>
                    <div class="row">
                        <div class="col-md-12" style="height: 50px;">
                            <div class="section-title text-center" style="padding-top:10px;">
                                <h2>收到訂單列表</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="text-align:center">
                                <?php
                                $link = mysqli_connect("localhost","root","12345678","user");
                                $sqlj="select t.t_status_1, b.buy_sit, t.trade_id from trade as t, book as b where b.book_id = t.book_id and b.owner_id = '$record[0]'";
                                $result_j = mysqli_query($link, $sqlj);
                                while($row=mysqli_fetch_row($result_j)){
                                    if($row[0]==3 and $row[1]==0){
                                        $sqlc="update trade set t_status_1 = 4 where trade_id = $row[2]";
                                        mysqli_query($link, $sqlc);
                                    }
                                }
                                
                                $sqlt = "select b.book_name, u.user_name, u.user_t, b.buy_b, b.s_price, t.t_date, t.trade_id, b.book_id, t.t_status_1, u.user_id, b.buy_sit from trade as t, user as u, book as b where b.book_id = t.book_id and b.owner_id = '$record[0]' and  u.user_id = t.buy_id and t.t_status_1 != 4 and t.t_status_1 != 1";
                                $result = mysqli_query($link, $sqlt);
                                $record = mysqli_num_rows($result);
                                $row = mysqli_num_rows($result);
                                $per = 9; //每頁顯示項目數量
                                @$pages = ceil($record/$per); //取得不小於值的下一個整數
                                if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                                    $page=1; //則在此設定起始頁數
                                } else {
                                    $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
                                }
                                $start = ($page-1)*$per; //每一頁開始的資料序號
                                @$rs1 = mysqli_query($link, $sqlt.' LIMIT '.$start.', '.$per)or die("Error");
                                if($row > 0){
                                ?>
                                <table style="margin-right:auto;margin-left:auto;">
                                <thead>
                                    <tr>
                                        <th>書名</th>
                                        <th>訂單申請人</th>
                                        <th>訂單申請人電話</th>
                                        <th>借書/賣書</th>
                                        <th>價格</th>
                                        <th>訂單時間</th>
                                        <th>交易與評價</th>
                                        <th>修改狀態</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                    while($row=mysqli_fetch_row($result)){
                                ?>
                                        <form action="dblink2.php" method="post">
                                <?
                                        $u_name = $row[1];
                                        if($row[3]=="b"){
                                            $row[3]="買";
                                            $row[4]="NT$$row[4]";
                                        }
                                        else{
                                            $row[3]="借";
                                            $row[4]="借書";
                                        }
                                        echo "<tr>
                                        <td>$row[0]</td>
                                        <td><a href=user.php?uid=$row[9]>$u_name</a></td>
                                        <td>$row[2]</td>
                                        <td>$row[3]</td>
                                        <td>$row[4]</td>
                                        <td>$row[5]</td>
                                        <input type=hidden name=buy_brw value=$row[3]>
                                        <input type=hidden name=buyer_id value=$row[9]>
                                        <input type=hidden name=bkid value=$row[7]>
                                        <input type=hidden name=tid value=$row[6]>
                                        ";
                                    //交易與評價
                                    if($row[8]== 0){
                                ?>
                                        <input type="hidden" name="method" value="judge">
                                        <td><input class="btn btn-warning" type="submit" name="agree" value="同意交易" style="border-radius: 5px;">
                                        <input class="btn btn-warning" type="submit" name="no" value="拒絕交易" style="border-radius: 5px;"></td>
                                <?
                                     }elseif($row[8] == 2){
                                ?>
                                        <input type="hidden" name="site" value="manage">    
                                        <td><input class="btn btn-warning" type="submit" name="rate" value="點此填寫評價" style="border-radius: 5px;"></td>
                                <?
                                        }
                                      else{
                                ?>
                                            <td>已填寫評論</td>
                                <?
                                        }
                                    //修改狀態
                                    if($row[3] == '借' and $row[8] > 1){
                                        if($row[10] == 1){
                                ?>
                                            <td><input class="btn btn-warning" type="submit" name="back" value="已經還書" style="border-radius: 5px;"></td>
                                <?
                                        }else{
                                ?>
                                            <td>已經還書</td>
                                <?
                                        }
                                    }
                                    else{
                                        if($row[8]==2){
                                ?>      
                                            <td>賣出</td>
                                <?
                                        }
                                        else{
                                ?>
                                            <td></td>
                                <?
                                        }
                                    }
                                ?>
                                    </form>
                                <?
                                    }
                                }
                                else{
                                    echo "<div class='section-title text-center' style='padding-top:20px'>
                                    <h1 style='color:red'>你沒有訂單</h1>
                                    </div>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <footer id="footer" style=" padding: 5px; text-align: center">
                         <?php
                        //分頁頁碼
                        echo '共 '.$record.' 筆-在第 '.$page.' 頁-共 '.$pages.' 頁';
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
