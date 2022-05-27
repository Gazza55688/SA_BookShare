<?php
class web{
    public $localhost="localhost";
    public $name="root";
    public $pass="12345678";
    public $database="user";
    public $connect;
    public $row;
    function __construct(){
        $this->connect=mysqli_connect($this->localhost,$this->name,$this->pass,$this->database);
    }
    function query($sql){
        return mysqli_query($this->connect,$sql);
    }
    function userLogin($user_id,$user_p){
        $sql="select * from user where user_id='$user_id' && user_p='$user_p'";
        if(mysqli_num_rows($this->query($sql))>=1){
            return mysqli_fetch_row($this->query($sql))[0];
        }
        return false;
    }
    /*function userLove($user_id){
        $arr=array();
        $arr[0]=mysqli_fetch_row($this->query("select d1 from user where user_id=$user_id"))[0];
        $arr[1]=mysqli_fetch_row($this->query("select d2 from user where user_id=$user_id"))[0];
        $arr[2]=mysqli_fetch_row($this->query("select d3 from user where user_id=$user_id"))[0];
        return $arr;
    }*/
    function userSignUp($user_name,$user_t,$user_id,$user_p){
        $sql="insert into user(user_name, user_t,  user_id,user_p) values('$user_name','$user_t','$user_id','$user_p')";
        if($this->query($sql)){
            return true;
        }
        return false;
    }
    function adminLogin($user_id,$user_p){
        $sql="select * from user where user_id='$user_id' && user_p='$user_p'";
        if(mysqli_num_rows($this->query($sql))>=1){
            return true;
        }
        return false;
    }
    function room(){
        return $this->query("select * from room");
    }
    function announce(){
        return $this->query("select * from announce");
    }
    function announceWhich($announce){
        return $this->query("select * from announce where id=$announce");
    }
    function announceName($announce){
        return mysqli_fetch_row($this->query("select name from announce where id=$announce"))[0];
    }
    function whichRoom($roomid){
        return $this->query("select * from room where id=$roomid");
    }
    function roomNum($roomid){
        return mysqli_fetch_row($this->query("select num from room where id=$roomid"))[0];
    }
    function roomName($roomid){
        return mysqli_fetch_row($this->query("select name from room where id=$roomid"))[0];
    }
    function roomPrice($roomid){
        return $this->query("select price from room where id=$roomid");
    }
    function announcePercent($announce){
        return $this->query("select percent from announce where id=$announce");
    }
    function roomReduce($roomid){
        $remain=$this->roomNum($roomid);
        $remain-=1;
        return $this->query("update room set num=$remain where id=$roomid");
    }
    function amountCal($roomid,$start,$end,$announce){
        $price=mysqli_fetch_row($this->roomPrice($roomid))[0];
        $day=round((strtotime($end)-strtotime($start))/3600/24);
        if($announce==0){
            $percent=1;
        }
        else{
            $percent=mysqli_fetch_row($this->announcePercent($announce))[0];
        }
        return $price*$day*$percent;
    }
    function recordInsert($userid,$date,$start,$end,$roomid,$announce,$amount){
        if($announce!=0){
            return $this->query("insert into record(userid,date,start,end,roomid,announceid,amount) values($userid,'$date','$start','$end',$roomid,$announce,$amount)");
        }
        else{
            return $this->query("insert into record(userid,date,start,end,roomid,announceid,amount) values($userid,$date','$start','$end',$roomid,NULL,$amount)");
        }
    }
    function timeCheck($date,$start,$end){
        if((strtotime($date)-strtotime($start))>0 or (strtotime($date)-strtotime($end))>0){
            return false;
        }
        else if((strtotime($start)-strtotime($end))>0){
            return false;
        }
        else{
            return true;
        }
    }
    function recordsearch($userid){
        return $this->query("select * from trade where own_id=$userid");
    }
    function recordOrder($recordid){
        return $this->query("select * from record where recordid=$recordid");
    }
    function record(){
        return $this->query("select * from trade");
    }
    function cancelInform($roomid,$announce){
        $arr=array();
        $arr[0]=$this->roomName($roomid);
        $arr[1]=$this->announceName($announce);
        return $arr;
    }
    function recordStart($delid){
        return mysqli_fetch_row($this->query("select start from record where recordid=$delid"))[0];
    }
    function delRecordTimeCheck($delid){
        $date=date("Y-m-d");
        $start=$this->recordStart($delid);
        if($date==$start){
            return false;
        }
        return true;
    }
    function roomNumAdd($delid){
        $arr=array();
        $arr[0]=mysqli_fetch_row($this->query("select roomid from record where recordid=$delid"))[0];
        $arr[1]=$this->roomNum(mysqli_fetch_row($this->query("select roomid from record where recordid=$delid"))[0]);
        return $arr;
    }
    function delRecord($delid){
        $arr=$this->roomNumAdd($delid);
        $remain=$arr[1]+1;
        if($this->query("delete from record where recordid=$delid")){
            if($this->query("update room set num=$remain where id=$arr[0]")){
                return true;
            }return false;
        }
    }
    function userLoveChange($d,$n,$userid){
        return $this->query("update user set `$d`=$n where id=$userid");
    }
    function userLoveSearch($d,$i,$userid){
        $d=$d.strval($i);
        return mysqli_fetch_row($this->query("select `$d` from user where id=$userid"))[0];
    }
    function announceShow($announce){
        return $this->query("select * from announce where id=$announce");
    }
    function announceUpdate($updateid,$name,$word,$start,$end,$percent){
        return $this->query("update announce set name='$name',word='$word',start='$start',end='$end',percent=$percent where id=$updateid");
    }
    function announceInsert($name,$word,$start,$end,$percent){
        return $this->query("insert into announce(name,word,start,end,percent) values('$name','$word','$start','$end',$percent)");
    }
    function announceDelete($delid){
        return $this->query("delete from announce where id=$delid");
    }
    function responseShow(){
        return $this->query("select * from response");
    }
    function responseUserName($userid){
        return mysqli_fetch_row($this->query("select name from user where id=$userid"))[0];
    }
    function orderUpdate($start,$end,$announce,$updateid,$roomid){
        $amount=$this->amountCal($roomid,$start,$end,$announce);
        return $this->query("update record set start='$start',end='$end',announceid=$announce,amount=$amount where recordid=$updateid");
    }
    function roomAmount($roomid){
        return $this->query("select * from amount where roomid=$roomid");
    }
    function roomMonthTot(){
        $arr=array();
        for($i=0;$i<4;$i++){
            $arr[$i]=0;
        }
        $i=9;
        $i=0;
        $result=$this->query("select * from amount");
        while($row=mysqli_fetch_row($result)){
            $arr[$i]=$arr[$i]+$row[1];
            $arr[$i+1]=$arr[$i+1]+$row[2];
            $arr[$i+2]=$arr[$i+2]+$row[3];
            $arr[$i+3]=$arr[$i+3]+$row[4];
        }
        return $arr;
    }
}
$web=new web;





?>