<?php
    @$method = $_GET["method"];
    @$searchtxt = $_SESSION['searchtxt'];
    if(empty($method)){
        $method = 'b';
    }
?>
<?php
    $link=mysqli_connect("localhost","root","12345678","user");
    $sql="select * from book where buy_b = '$method' order by book_id";
    $rs=mysqli_query($link,$sql);
    //分頁
    @$data_nums = mysqli_num_rows($rs); //統計總比數
    $per = 9; //每頁顯示項目數量
    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號
    $rs = mysqli_query($link, $sql.' LIMIT '.$start.', '.$per)or die("Error");
    //輸出
    while($record = mysqli_fetch_row($rs)){
?>
        <div style="float:left; width:30%; margin: 5px; border: 1px solid;">
        <img src="<?php echo $record[6];?>">
        <hr style="border: 1px solid;">
        <div>
            <p style="font-size: 15px; color: #000;"><?php echo $record[2];?></p>
            <p style="font-size: 15px; color: #000;">作者: <?php echo $record[3];?></p>
            <p style="font-size: 15px; color: #000;">出版社: <?php echo $record[4];?></p>
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
