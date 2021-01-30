<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery-1.8.2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
<table class="container table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">UserId</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col" >Email</th>
      <th scope="col">Address</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Qualification</th>
      <th scope="col">Experience</th>
      <th scope="col">Specialization</th>
      <th scope="col">Picture</th>
      <th scope="col">Certificate Picture</th>
      <th scope="col">Date of Registeration</th>
    </tr>
  </thead>
  <tbody>
        <?php
        include_once("../mysql-connection.php");
        $query="select * from pro1";
        $table=mysqli_query($conn,$query);
        while($record=mysqli_fetch_array($table))
        {
        ?>
        <tr>
            <td><?php echo $record["uid"]; ?></td>
            <td><?php echo $record["name"]; ?></td>
            <td><?php echo $record["mob"]; ?></td>
            <td><?php echo $record["email"]; ?></td>
            <td><?php echo $record["address"]; ?></td>
            <td><?php echo $record["state"]; ?></td>
            <td><?php echo $record["city"]; ?></td>
            <td><?php echo $record["qual"]; ?></td>
            <td><?php echo $record["exp"]; ?></td>
            <td><?php echo $record["spel"]; ?></td>
            <td>
            <img src='../uploads/<?php echo $record["ppic1"]; ?>' height="50" width="50">
            </td>
            <td>
            <img src='../uploads/<?php echo $record["ppic2"]; ?>' height="50" width="50">
            </td>
            <td><?php echo $record["date"]; ?></td>
        </tr>
        <?php
        }
        ?>
  </tbody>
</table>
</body>
</html>