<?php
    require "connect.php";
    $web=new web;
    session_start();
    @$status = $_SESSION["status"];
    @$id = $_SESSION["user_id"];
    @$method = $_POST["method"];
    @$buy_brw = $_POST["buy_brw"];
    @$buyer_id = $_POST["buyer_id"];

    @$link = mysqli_connect("localhost", "root", "12345678", "user");
    $sqln = "select user_name from user where user_id='$id';";
    @$rs1 = mysqli_query($link, $sqln);
    @$record = mysqli_fetch_row($rs1);
    @$name=$record[0];
    //t_status=0: 尚未同意or拒絕 t_status=1: 拒絕 t_status=2: 同意(未填評價) t_status=3: 同意(已填評價)
    if($method=="judge"){//同意or拒絕
            @$bkid = $_POST["bkid"];
            @$yes = $_POST["agree"];
            @$no = $_POST["no"];
            if(isset($yes)){
                @$sqlb="update book set buy_sit = 1 where book_id = '$bkid'";
                @$sqlc="update trade set t_status_1 = 2, t_status_2 = 2 where book_id = '$bkid' and buy_id = '$buyer_id'";
                @$sqld="update trade set t_status_1 = 1, t_status_2 = 1 where book_id = '$bkid' and buy_id != '$buyer_id'";
                mysqli_query($link,$sqlc);
                mysqli_query($link,$sqld);
                if(mysqli_query($link,$sqlb)){
                    echo "<script> {window.alert('已同意此訂單!');location.href='manage.php'} </script>";
                }
                else{
                    echo "同意失敗";
                }
            }
            else{
                @$sqlc="update trade set t_status = 1 where book_id = '$bkid' and buy_id = '$buyer_id'";
                mysqli_query($link,$sqlc);
                if(mysqli_query($link,$sqlb)){
                    echo "<script> {window.alert('已拒絕此訂單');location.href='manage.php'} </script>";
                }
                else{
                    echo "拒絕失敗";
                }
            }
    }
    else if($method=="delete"){//取消訂單
        @$trade_id = $_POST["tid"];
        @$bkid = $_POST["bkid"];
        @$sqlb="delete from trade where trade_id = $trade_id";
        @$sqlc="update book set buy_sit = 0 where book_id = '$bkid'";
        mysqli_query($link,$sqlc);
        if(mysqli_query($link,$sqlb)){
            echo "<script> {window.alert('取消成功');location.href='order.php'} </script>";
        }
        else{
            echo "刪除失敗";
        }
    }
    else if(isset($_POST["rate"])){//評價
        $bkid = $_POST["bkid"];
        $_SESSION["bkid"] = $bkid;
        $site = $_POST["site"];
        $_SESSION["site"] = $site;
        $tid = $_POST["tid"];
        $_SESSION["tid"] = $tid;
        echo "<script> {window.alert('前往評價');location.href='rate.php'} </script>";
    }
    else if(isset($_POST["back"])){//還書
        $bkid = $_POST["bkid"];
        @$sqlb="update book set buy_sit = 0 where book_id = '$bkid'";
        if(mysqli_query($link,$sqlb)){
            echo "<script> {window.alert('還書成功!');location.href='manage.php'} </script>";
        }
        else{
            echo "還書失敗";
        }
    }
    else if($method=="insert_rate"){//新增評價
        $score = $_POST["score"];
        $text = $_POST["rate_t"];
        $uid = $_POST["uid"];
        $bkid = $_POST["bkid"];
        $site = $_POST["site"];
        $tid = $_POST["tid"];
        @$sqlb="insert into rate (user_id, book_id, trade_id, rate, rate_w) values ('$uid', '$bkid', '$tid','$score', '$text')";
        $sqlj="select buy_id from trade where trade_id = $tid";
        $result_j = mysqli_query($link, $sqlj);
        while($row=mysqli_fetch_row($result_j)){
            if($row[0]==$uid){
                @$sqlc="update trade set t_status_2 = 3 where trade_id = $tid";
                mysqli_query($link,$sqlc);
            }
            else{
                @$sqlc="update trade set t_status_1 = 3 where trade_id = $tid";
                mysqli_query($link,$sqlc);
            }
        }
        if(mysqli_query($link,$sqlb)&&mysqli_query($link,$sqlc)){
            echo "<script> {window.alert('評價完成!');location.href='$site.php'} </script>";
        }
        else{
            echo "評價失敗";
        }
    }
?>