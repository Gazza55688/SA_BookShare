<?
    $per = 9; //每頁顯示項目數量
    @$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號
    @$rs1 = mysqli_query($link, $sql1.' LIMIT '.$start.', '.$per)or die("Error");
    $pages2 = ceil($data_nums2/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page2=1; //則在此設定起始頁數
    } else {
        $page2 = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start2 = ($page2-1)*$per; //每一頁開始的資料序號
    $rs = mysqli_query($link, $sql2.' LIMIT '.$start2.', '.$per)or die("Error");
?>