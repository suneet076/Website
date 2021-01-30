<?php
include_once("mysql-connection.php");
$btn=$_POST["btn"];
if($btn=="save")
{
    dosave($conn);
}
function dosave($conn)
{
    $orgname=$_FILES["ppic"]["name"];
    $tmppath=$_FILES["ppic"]["tmp_name"];
move_uploaded_file($tmppath,"uploads/".$orgname);
    $uid=$_POST["uid"];
    $selpet=$_POST["selpet"];
    $age=$_POST["age"];
    $demand=$_POST["demand"];
    $gen=$_POST["gen"];
    $info=$_POST["info"];
    $query="insert into petdetail values('$uid','$selpet','$age','$demand','$gen', '$orgname','$info')";
    
    mysqli_query($conn,$query);
    
    $msg=mysqli_error($conn);
    if($msg=="")
    {
        echo "  record inserted successfully";
    }
    else
    {
        echo $msg;
    }
}
?>
