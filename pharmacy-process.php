<?php
include_once("mysql-connection.php");
$btn=$_POST["btn"];
if($btn=="save")
{
    dosave($conn);
}
else if($btn=="update")
{
     doupdate($conn);
}
function dosave($conn)
{
    $orgname=$_FILES["ppic"]["name"];
    $tmppath=$_FILES["ppic"]["tmp_name"];
move_uploaded_file($tmppath,"uploads/".$orgname);
    $uid=$_POST["uid"];
    $fname=$_POST["fname"];
    $lice=$_POST["lice"];
    $mob=$_POST["mob"];
    $adder=$_POST["adder"];
    $city=$_POST["city"];
    $query="insert into pharmacy values('$uid','$fname','$mob','$adder','$city','$lice','$orgname')";
    
    mysqli_query($conn,$query);
    
    $msg=mysqli_error($conn);
    if($msg=="")
    {
        echo "  Record inserted successfully";
    }
    else
    {
        echo $msg;
    }
}
function doupdate($conn)
{
    $orgname=$_FILES["ppic"]["name"];
    $tmppath=$_FILES["ppic"]["tmp_name"];
    $uid=$_POST["uid"];
    $fname=$_POST["fname"];
    $mob=$_POST["mob"];
    $adder=$_POST["adder"];
    $city=$_POST["city"];
    $oldname=$_POST["hdnbox"];
    if($orgname=="")
    {
        $finalname=$oldname;
    }
    else
    {
        $finalname=$orgname;
        move_uploaded_file($tmppath,"uploads/".$orgname);
    }
    
$query="update pharmacy set fname='$fname',mobile='$mob',address='$adder',city='$city'
,grpic='$finalname' where uid='$uid'";

    mysqli_query($conn,$query);
    
    $msg=mysqli_error($conn);
    if($msg=="")
    {
        echo "   Record updated successfully";
    }
    else
    {
        echo $msg;
    }
}
?>
