<?php

include_once("mysql-connection.php");
$tableid=$_GET["tableid"];
if($tableid=="doctor")
{
$query="select distinct city from pro1";
}
else if($tableid=="pharmacy")
{
$query="select distinct city from pharmacy";
}
else if($tableid=="shelter")
{
$query="select distinct city from shelter";
}
else if($tableid=="petdetail")
{
$query="select distinct city from petdetail";
}
$table=mysqli_query($conn,$query);

$ary=array();

	while($record=mysqli_fetch_array($table))//gives a record at a time
	{
		$ary[]=$record;//each record is stored in array
	}

echo json_encode($ary);