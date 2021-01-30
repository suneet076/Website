<?php
session_start();
include_once("mysql-connection.php");
$tablename=$_GET["tablename"];
if($tablename=="user")
{
    include_once("SMS_OK_sms.php");
$uid=$_GET["uidsignup"];
$query1="select * from user where uid='$uid'";
$table=mysqli_query($conn,$query1);
$count=mysqli_num_rows($table);
if($count==0)
{
    $pass=$_GET["passsign"];
    $mob=$_GET["mob"];
    $prof=$_GET["prof"];
    $query="insert into user values('$uid','$pass','$mob',CURRENT_DATE(),'$prof')";
    mysqli_query($conn,$query);
    $msg=mysqli_error($conn);

		if($msg=="")
        {SendSMS($mob,"You have successfully signed up at petcare.com...Welcome "."User Id: ".$uid." Password: ".$pass);
         echo "Successfully Signed Up .";
                    }
		else
			echo "Check Details";
}
else
{
    echo "user id already exist...";
}
}
else if($tablename=="userdetail")
{
$uid=$_GET["uid"];
$query1="select * from userdetail where uid='$uid'";
$table=mysqli_query($conn,$query1);
$count=mysqli_num_rows($table);
if($count==0)
{
    $name=$_GET["name"];
    $adder=$_GET["adder"];
    $city=$_GET["city"];
    $mob=$_GET["mob"];
    $query="insert into userdetail values('$uid','$name','$adder','$city','$mob')";
    mysqli_query($conn,$query);
    echo "Saved Successfully";
}
else
{
    echo "user id already exist...";
}
}
else if($tablename=="fpass")
{
include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$query="select * from user where uid='$uid'";
    
        $table=mysqli_query($conn,$query);
    if(mysqli_num_rows($table)==0)
    {
        echo "sorry, User I'd does not exist!";
    }
    else
    {
        $record=mysqli_fetch_array($table);
            $mob=$record["mob"];
            $msg="Your Password :".$record["pass"];
            SendSMS($mob,$msg);
        echo "Password is sent";
    }
}
else if($tablename=="userlogin")
{
$uid=$_GET["uid"];
$pass=$_GET["pass"];
if($uid=="")
{
    echo "please enter  userid";
}
    else
    {
$query="select * from user where uid='$uid'";
        $table=mysqli_query($conn,$query);
        if(mysqli_num_rows($table)==0)
    {
        echo "Sorry, UserId does not exist!";
    }
        else
        {
        while($record=mysqli_fetch_array($table))
        {
            if($uid==$record["uid"] && $pass==$record["pass"])
            {
                $_SESSION["active_user"]=$record["uid"];
             echo $record["type"];
                break;
            }
            else
            {
                echo "please enter correct userid and password";
            }
        }
}
}
}
?>