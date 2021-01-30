<?php
$uid=$_GET["uid"];
$tablename=$_GET["tablename"];
include_once("../mysql-connection.php");
if($tablename=="pharmacy")
{
$query="select * from pharmacy where uid='$uid'";
}
else if($tablename=="pro1")
{
$query="select * from pro1 where uid='$uid'";
}
$table=mysqli_query($conn,$query);
$ary=array();
while($record=mysqli_fetch_array($table))
{
    $ary[]=$record;
}
echo json_encode($ary);
?>