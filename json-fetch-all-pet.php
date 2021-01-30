<?php

include_once("mysql-connection.php");
$tableid=$_GET["tableid"];
if($tableid=="shelter")
{
$query="select distinct selpets from shelter";
}
else if($tableid=="petdetail")
{
$query="select distinct pettype from petdetail";
}

$table=mysqli_query($conn,$query);

$ary=array();

	while($record=mysqli_fetch_array($table))//gives a record at a time
	{
		$ary[]=$record;//each record is stored in array
	}

echo json_encode($ary);