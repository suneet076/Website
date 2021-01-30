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
    $orgname1=$_FILES["ppic1"]["name"];
    $tmppath1=$_FILES["ppic1"]["tmp_name"];
move_uploaded_file($tmppath1,"uploads/".$orgname1);
    $orgname2=$_FILES["ppic2"]["name"];
    $tmppath2=$_FILES["ppic2"]["tmp_name"];
move_uploaded_file($tmppath2,"uploads/".$orgname2);
    $uid=$_POST["uid"];
    $name=$_POST["name"];
    $mob=$_POST["mob"];
    $email=$_POST["email"];
    $add=$_POST["add"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $qual=$_POST["qual"];
    $exp=$_POST["exp"];
    $spel=$_POST["spel"];
    $query="insert into pro1 values('$uid','$name','$mob','$email','$add', '$state','$city','$qual','$exp','$spel','$orgname1','$orgname2',current_date())";
    
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
function doupdate($conn)
{
    $orgname1=$_FILES["ppic1"]["name"];
    $tmppath1=$_FILES["ppic1"]["tmp_name"];
    $orgname2=$_FILES["ppic2"]["name"];
    $tmppath2=$_FILES["ppic2"]["tmp_name"];
    $uid=$_POST["uid"];
    $name=$_POST["name"];
    $mob=$_POST["mob"];
    $email=$_POST["email"];
    $add=$_POST["add"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $qual=$_POST["qual"];
    $exp=$_POST["exp"];
    $spel=$_POST["spel"];
    $oldname1=$_POST["hdnbox1"];
    $oldname2=$_POST["hdnbox2"];
    if($orgname1=="")
    {
        $finalname1=$oldname1;
    }
    else
    {
        $finalname1=$orgname1;
        move_uploaded_file($tmppath1,"uploads/".$orgname1);
    }
    
    if($orgname2=="")
    {
        $finalname2=$oldname2;
    }
    else
    {
        $finalname2=$orgname2;
        move_uploaded_file($tmppath2,"uploads/".$orgname2);
    }
    
    $query="update pro1 set name='$name',mob='$mob',email='$email',address='$add',state='$state',city='$city'
,qual='$qual',exp='$exp',spel='$spel',ppic1='$finalname1',ppic2='$finalname2'
,date=current_date() where uid='$uid'";

    mysqli_query($conn,$query);
    
    $msg=mysqli_error($conn);
    if($msg=="")
    {
        echo "   record updated successfully";
    }
    else
    {
        echo $msg;
    }
}
?>
