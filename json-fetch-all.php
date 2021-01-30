<?php

include_once("mysql-connection.php");
// 0 or more possibility
$tableid=$_GET["tableid"];
if($tableid=="pharmacy")
{
$city=$_GET["city"];
$query="select * from pharmacy where city='$city'";
}
else if($tableid=="doctor")
{
$city=$_GET["city"];
$query="select * from pro1 where city='$city'";
}
else if($tableid=="shelter")
{
    $city=$_GET["city"];
    $pet=$_GET["pet"];
$query="select * from shelter where city='$city' and selpets='$pet'";
}
else if($tableid=="petdetail")
{
    $pet=$_GET["pet"];
$query="select * from petdetail where pettype='$pet'";
}
$table=mysqli_query($conn,$query);

$ary=array();

	while($record=mysqli_fetch_array($table))//gives a record at a time
	{
		$ary[]=$record;//each record is stored in array
	}

echo json_encode($ary);