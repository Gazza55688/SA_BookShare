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
@$_SESSION['status'] = $_GET['method'];
@$status = $_GET['method'];

if($status=='b'){
    $status = "賣";
}
else{
    $status = "借出";
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
                                    echo  "<li><a href='index.php'>首頁</a></li><li><a href='books.php'>查看現有書籍</a></li><li><li><a href='my.php'>我的商品</a></li><li><a href='order.php'>檢視訂單</a></li><li><a href='cart.php'>購物車</a>
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
                                <h1 class="text-center">發布區(<? echo $status ?>)</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="featured-hotel" class="fh5co-bg-color" style="background-color:white">
                <div class="container">
                    <a href='books.php' class='btn btn-primary btn-luxe-primary'>回上一頁<i class='ti-angle-right'></i></a>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2>填寫書籍資料(所有皆為必填)</h2>
                            </div>
                        </div>
                    </div>


                    <form action="dblink.php" method="post">
                        <input type=hidden name="method" value="insert">
                        <div class="row">
                            <div class='feature-full-2col'>
                                <div class='f-hotel' style='border:1px black solid'>
                                    <div class='desc'>
                                        <label>
                                            書籍名稱：<input type='text' name='book_name' value='<?php echo @$book_name?>' style='height:30px;color:black' required>
                                        </label>
                                        <br>
                                        <label>
                                            作者名稱：<input type='text' name='book_athor' value='<?php echo @$book_athor?>' style='height:30px;color:black' required>
                                        </label>
                                        <br>
                                        <label>
                                            出版社名稱：<input type='text' name='book_pub' value='<?php echo @$book_pub?>' style='height:30px;color:black' required>
                                        </label>
										<br>
                                        <label>
                                            類型(其他類型請選其他)：
                                            <div class="input-group mb-3">
                                                <select name="book_cat" class="form-select" id="inputGroupSelect02" required>
                                                    <option selected>請選擇...</option>
                                                    <option value="文學小說">文學小說</option>
                                                    <option value="商業理財">商業理財</option>
                                                    <option value="藝術設計">藝術設計</option>
                                                    <option value="人文史地">人文史地</option>
                                                    <option value="心理勵志">心理勵志</option>
                                                    <option value="宗教命理">宗教命理</option>
                                                    <option value="自然科普">自然科普</option>
                                                    <option value="醫療保健">醫療保健</option>
                                                    <option value="生活風格">生活風格</option>
                                                    <option value="童書/青少年文學">童書/青少年文學</option>
                                                    <option value="考試用書/國中小參考書/教科書">考試用書/國中小參考書/教科書</option>
                                                    <option value="影視偶像">影視偶像</option>
                                                    <option value="漫畫/圖文書">漫畫/圖文書</option>
                                                    <option value="語言學習">語言學習</option>
                                                    <option value="電腦資訊">電腦資訊</option>
                                                    <option value="其他">其他</option>
                                                </select>
                                            </div>
                                        </label>
										<br>
                                        <label>
                                            圖片：<input type="file" name='book_pic' value='<?php echo $book_pic ?>' accept="image/jpeg,image/jpg,image/gif,image/png" required>
                                        </label>
										<br>
                                        <?
                                            if($status=="賣"){
                                        ?>
                                                <label>
                                                    價格: $ <input type="text" name="s_price" value="<?php echo @$s_price ?>" style='height:30px;color:black; width: 100px;'required> 
                                                </label>
                                        <?
                                            }
                                        ?>
                                        <br>
                                        <p><button class='btn btn-primary btn-luxe-primary'>新增<i class='ti-angle-right'></i></button></p>
                                    </div>
                                </div>
                            </div>
                      </div>
                    </form>

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
