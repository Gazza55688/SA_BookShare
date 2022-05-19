<?
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
?>