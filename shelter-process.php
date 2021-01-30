<?php
include_once("mysql-connection.php");
$btn=$_POST["btn"];
if($btn=="save")
{
    dosave($conn);
}
function dosave($conn)
{
    $orgname1=$_FILES["ppic1"]["name"];
    $tmppath1=$_FILES["ppic1"]["tmp_name"];
move_uploaded_file($tmppath1,"uploads/".$orgname1);
    $orgname2=$_FILES["ppic2"]["name"];
    $tmppath2=$_FILES["ppic2"]["tmp_name"];
move_uploaded_file($tmppath2,"uploads/".$orgname2);
    $orgname3=$_FILES["ppic3"]["name"];
    $tmppath3=$_FILES["ppic3"]["tmp_name"];
move_uploaded_file($tmppath3,"uploads/".$orgname3);
    $uid=$_POST["uid"];
    $pname=$_POST["pname"];
    $days=$_POST["days"];
    $contact=$_POST["contact"];
    $adder=$_POST["adder"];
    $city=$_POST["city"];
    $selpets=$_POST["selpets"];
    $info=$_POST["info"];
$query="insert into shelter values('$uid','$pname','$contact','$adder','$city','$days','$selpets','$info','$orgname1','$orgname2','$orgname3')";
    
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
?>
