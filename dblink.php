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
    if($method=="insert"){
            @$book_name = $_POST["book_name"];
            @$book_athor = $_POST["book_athor"];
            @$book_pub = $_POST["book_pub"];
            @$book_cat = $_POST["book_cat"];
            @$book_pic = $_POST["book_pic"];
            @$s_price = $_POST["s_price"];
            @$sql="insert into book (owner_id, book_name, book_athor, book_pub, book_cat, book_pic, buy_b, s_price) values ('$id','$book_name','$book_athor', '$book_pub', '$book_cat','images/$book_pic','$status','$s_price')";
            if(mysqli_query($link,$sql)){
                echo "<script> {window.alert('新增完成');location.href='books.php'} </script>";
            }
            else{
                echo "新增失敗";
            }
        }
    else if($method=="change"){
		  @$sql="update student set stu_name = '$stu_name', stu_dept = '$stu_dept', stu_phone = '$stu_phone' where stu_id = '$stu_id' ";
	       if(mysqli_query($link,$sql)){
		   header('location:index.php?method=message&message=修改成功');
		  }
   }
    else if($method=="insert_b"){
        @$book_id = $_POST["id"];
        @$buy_id = $_POST["buy_id"];
        @$sqlb="insert into trade (book_id, buy_id) values ('$book_id', '$buy_id')";
        if(mysqli_query($link,$sqlb)){
            echo "<script> {window.alert('下單成功，請隨時注意訂單列表中的狀態欄!');location.href='books.php'} </script>";
        }
    }
    else if($method=="takedown"){//下架
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