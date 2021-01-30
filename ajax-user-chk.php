<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
include_once("mysql-connection.php");
$uidvalue=$_GET["uidName"];
$tablename=$_GET["tablename"];
if($tablename=="pharmacy")
{
$query="select * from pharmacy where uid='$uidvalue'";
$table=mysqli_query($conn,$query);
$count=mysqli_num_rows($table);
if($count==0)
{
echo "Available,You can take it.....";
}
else
{
    echo "Already Selected";
}
}
else if($tablename=="pro1")
{
$query="select * from pro1 where uid='$uidvalue'";
$table=mysqli_query($conn,$query);
$count=mysqli_num_rows($table);
if($count==0)
{
echo "Available,You can take it.....";
}
else
{
    echo "Already Selected";
}
}
else if($tablename=="user")
{
$query="select * from user where uid='$uidvalue'";
$table=mysqli_query($conn,$query);
$count=mysqli_num_rows($table);
if($count==0)
{
echo "Invalid User";
}
else
{
    echo "Valid User";
}
}
else if($tablename=="shelter")
{
$query="select * from shelter where uid='$uidvalue'";
$table=mysqli_query($conn,$query);
$count=mysqli_num_rows($table);
if($count==0)
{
echo "Available,You can take it.....";
}
else
{
    echo "Already Selected";
}
}
?>
</body>
</html>
