<?php
require "connect.php";
$web=new web;
$link=mysqli_connect("localhost","root","12345678","user");
@$searchtxt = $_GET["searchtxt"];
@$cat = $_GET["cat"];
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
            width: 300px;
            vertical-align: middle;
            white-space: nowrap;
            position: relative;
            margin: auto;
            border-radius: 5px;
        }
        .container-1 input#search{
            width: 300px;
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
                                    <? include "navbar.php"?>
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
                    <a href='index.php' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">返回上一頁<i class='ti-angle-right'></i></a>
                    <a href='insert.php?method=b' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">發布書本(賣)<i class='ti-angle-right'></i></a>
                    <a href='insert.php?method=br' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">發布書本(借出)<i class='ti-angle-right'></i></a>
                    <form action="" method="get">
                        <div class="container-1">
                            <div class="input-group mb-3">
                            <select name="cat" class="form-select" id="inputGroupSelect02" style="color: #000;">
                                <option selected>請選擇類別(選填)</option>
                                <?
                                    $sqlc = "select cat_name from cat";
                                    $rsc = mysqli_query($link,$sqlc);
                                    while($recordc = mysqli_fetch_row($rsc)){
                                ?>
                                        <option value="<? echo $recordc[0];?>"><? echo $recordc[0];?></option>
                                <?
                                    }
                                ?>
                            </select>
                            </div>
                        <input type="text" id="search" name="searchtxt" placeholder="輸入書名" value=<?php echo $searchtxt ?>>
                        <input id="searchbtn" type=submit value="搜尋">
                        </div>
                    </form>
                    <?
                        if(empty($searchtxt) and $cat=='請選擇類別(選填)' or $cat==""){
	                       $sql1="select * from book where buy_b = 'b' and buy_sit != 1 order by book_id";
                           $sql2="select * from book where buy_b = 'br' and buy_sit != 1 order by book_id";
		                }
                        elseif($cat=='請選擇類別(選填)'){
                            $sql1="select * from book where buy_b = 'b' and buy_sit != 1 and book_name like '%$searchtxt%' order by book_id"; 
                            $sql2="select * from book where buy_b = 'br' and buy_sit != 1 and book_name like '%$searchtxt%' order by book_id";
                        }
                        elseif(empty($searchtxt)){
                            $sql1="select * from book where buy_b = 'b' and buy_sit != 1 and book_cat = '$cat' order by book_id"; 
                            $sql2="select * from book where buy_b = 'br' and buy_sit != 1 and book_cat = '$cat' order by book_id";
                        }
                        else{
                            $sql1="select * from book where buy_b = 'b' and book_name like '%$searchtxt%' and book_cat = '$cat' and owner_id != '$record[0]' order by book_id"; 
                            $sql2="select * from book where buy_b = 'br' and book_name like '%$searchtxt%' and book_cat = '$cat' and owner_id != '$record[0]' order by book_id";
                        }
                        $rs1=mysqli_query($link,$sql1);
                        //買賣分頁
                        @$data_nums = mysqli_num_rows($rs1); //統計總比數
                        $rs2=mysqli_query($link,$sql2);
                        @$data_nums2 = mysqli_num_rows($rs2); //統計總比數
                        include "pages.php";
                        $buy = 'b';
                        $borrow = 'br';
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <div id="tabs" style="text-align: center;">
                                        <a href='books.php?cat=<? echo $cat?>&searchtxt=<? echo $searchtxt?>' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">我想買書(<? echo $data_nums?>)<i class='ti-angle-right'></i></a>
                                        <a href='book_br.php?cat=<? echo $cat?>&searchtxt=<? echo $searchtxt?>' class='btn btn-primary btn-luxe-primary' style="margin-top: 20px;">我想借書(<? echo $data_nums2?>)<i class='ti-angle-right'></i></a>
                                </div>
                                        <div class="tab-content" data-tab-content="tab2">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                            <div class="container">
                                                            <div class="row text-center">
                                                    <?php
                                                    //借書輸出
                                                        if($data_nums2==0){
                                                                echo "<div class='section-title text-center' style='padding-top:20px'>
                                                                <h1 style='color:red'>目前無相關書籍</h1>
                                                                </div>";
                                                        }
                                                        else{
                                                            while($record2 = mysqli_fetch_row($rs2)){
                                                    ?>
                                                    <form method="post" action="book_info.php">
                                                        <div style="float:left; width:32%; height: 30%;margin: 3px; border: 1px solid;">
                                                        <img src="<?php echo $record2[6];?>">
                                                        <hr>
                                                        <div>
                                                            <p style="font-size: 15px; color: #000;"><?php echo $record2[2];?></p>
                                                            <input type="hidden" name="book" value="<? echo $record2[2];?>">
                                                            <p style="font-size: 15px; color: #000;">作者: <?php echo $record2[3];?></p>
                                                            <input type="hidden" name="own" value="<? echo $record2[1];?>">
                                                    <?
                                                            if($record2[1]!=$record[0] || empty($record[0])){
                                                                if($record2[7] != 1){
                                                    ?>
                                                                <input  class="btn btn-warning" type="submit" name="submit" value="借書" style="border-radius: 5px;">
                                                    <?
                                                                }else{
                                                    ?>
                                                                <input  class="btn btn-warning" type="submit" name="submit" value="已借出" style="border-radius: 5px;" disabled>
                                                    <?
                                                                }
                                                            }else{
                                                    ?>
                                                            <input class="btn btn-warning" type="submit" name="submit" value="這是你的書" style="border-radius: 5px;" disabled>
                                                    <?
                                                            }
                                                    ?>
                                                        </div>
                                                        </div>
                                                        </form>
                                                    <?php
                                                        }
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
                                                    echo " 頁 <a href=?page=".$pages2 .">末頁</a><br /><br />";
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
