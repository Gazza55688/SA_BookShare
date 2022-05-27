<?php
    require "connect.php";
    $web=new web;
    session_start();
    @$status = $_SESSION['status'];
    @$id = $_SESSION["user_id"];
    @$method = $_POST["method"];

    @$link = mysqli_connect("localhost", "root", "12345678", "user");
    $sqln = "select user_name from user where user_id='$id';";
    @$rs1 = mysqli_query($link, $sqln);
    @$record = mysqli_fetch_row($rs1);
    @$name=$record[0];
    if($method=="judge"){
            @$bkid = $_POST["bkid"];
            @$yes = $_POST["agree"];
            @$no = $_POST["no"];
            if(isset($yes)){
                @$sqlb="update book set buy_sit = 1 where book_id = '$bkid'";
                @$sqlc="update trade set t_status = 1 where book_id = '$bkid'";
                mysqli_query($link,$sqlc);
                if(mysqli_query($link,$sqlb)){
                    echo "<script> {window.alert('已同意此訂單!');location.href='manage.php'} </script>";
                }
                else{
                    echo "同意失敗";
                }
            }
            else{
                @$sqlb="update book set buy_sit = 2 where book_id = '$bkid'";
                @$sqlc="update trade set t_status = 2 where book_id = '$bkid'";
                mysqli_query($link,$sqlc);
                if(mysqli_query($link,$sqlb)){
                    echo "<script> {window.alert('已拒絕此訂單');location.href='manage.php'} </script>";
                }
                else{
                    echo "拒絕失敗";
                }
            }
    }
    else if($method=="delete"){
        @$trade_id = $_POST["delid"];
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
    else if($method=="takedown"){
        @$bkid = $_POST["bkid"];
        @$sqlb="delete from book where book_id = $bkid";
        if(mysqli_query($link,$sqlb)){
            echo "<script> {window.alert('下架成功');location.href='my.php'} </script>";
        }
        else{
            echo "刪除失敗";
        }
    }
?>