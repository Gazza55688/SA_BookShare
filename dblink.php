<?php
    require "connect.php";
    $web=new web;
    session_start();
    @$status = $_SESSION['status'];
    @$id = $_SESSION["user_id"];

    @$method = $_POST["method"];
    @$book_name = $_POST["book_name"];
    @$book_athor = $_POST["book_athor"];
    @$book_pub = $_POST["book_pub"];
    @$book_cat = $_POST["book_cat"];
    @$book_pic = $_POST["book_pic"];
    @$s_price = $_POST["s_price"];

    @$link = mysqli_connect("localhost", "root", "12345678", "user");
    $sqln = "select user_name from user where user_id='$id';";
    echo $sqln;
    @$rs1 = mysqli_query($link, $sqln);
    @$record = mysqli_fetch_row($rs1);
    @$name=$record[0];
    if($method=="insert"){
            @$sql="insert into book (own_name, book_name, book_athor, book_pub, book_cat, book_pic, buy_b, s_price) values ('$name','$book_name','$book_athor', '$book_pub', '$book_cat','$book_pic','$status','$s_price')";
            if(mysqli_query($link,$sql)){
                echo "<script> {window.alert('新增完成');location.href='books.php'} </script>";
            }
        }
    else
   {
		@$sql="update student set stu_name = '$stu_name', stu_dept = '$stu_dept', stu_phone = '$stu_phone' where stu_id = '$stu_id' ";
	   echo $sql;
	   if(mysqli_query($link,$sql))
		{
		   header('location:index.php?method=message&message=修改成功');
		}
   }
?>

<body>

</body>