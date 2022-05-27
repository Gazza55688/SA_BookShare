<?
if(isset($_GET["status"]) && $_GET["status"]=="logout"){
    session_destroy();
}
else{
    if(isset($_SESSION["user_id"])){
        $type=$_SESSION["user_id"];
    }     
}
$link=mysqli_connect("localhost","root","12345678","user");
@$sql="select * from user where user_id = $type";
@$rs=mysqli_query($link,$sql);
@$record = mysqli_fetch_row($rs);
if(isset($type)){
    echo "<li><a class='active'>$record[1]，你好</a></li><li><a href='index.php'>首頁</a></li><li><a href='books.php'>查看現有書籍</a></li><li><li><a href='my.php'>我的書籍</a></li><li><a href='manage.php'>管理訂單</a><li></li><li><a href='order.php'>檢視訂單</a><li><a href='index.php?status=logout'>登出</a></li>";
}
else{
    echo "<li><a class='active' href='index.php'>主頁</a></li><li><a href='books.php'>查看現有書籍</a></li><li><a href='login.php'>登入</a></li>";
}
?>
