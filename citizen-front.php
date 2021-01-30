<?php
session_start();
if(isset($_SESSION["active_user"])==false)
    header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
         $(document).ready(function(){
             $("#mob").blur(function(){
			var exp=/^[6-9]{1}[0-9]{9}$/;
			var mob=$(this).val();
			var resp=exp.test(mob);
			if(resp==false)
                {
				$("#errmob").html("Invalid Mobile Number");
                }
			else
                {
					$("#errmob").html("Valid Mobile Number");
                }
		});
            $("#btndetail").click(function(){
                var uid=$("#uid").val();
                var name=$("#name").val();
                var adder=$("#adder").val();
                var city=$("#city").val();
                var mob=$("#mob").val();
var url="ajax-user-save.php?uid="+uid+"&name="+name+"&tablename=userdetail&adder="+adder+"&city="+city+"&mob="+mob;
                $.get(url,function(response){
                    $("#errdetail").html(response);
                });
            });
            $("#eye").click(function(){
                if($("#pass").attr("type") == "password")
                    {
            $("#pass").attr("type","text");
            $("#eye").addClass("fa-eye").removeClass("fa-eye-slash");
                    }
                else if($('#pass').attr("type") == "text")
                {
            $("#pass").attr("type","password");
            $("#eye").addClass("fa-eye-slash").removeClass("fa-eye");
                }
        });
});
        </script>
        <style>
           a
            {
            color:black;
            }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark pointer-event" style="background:#5CDB95">
        <a class="navbar-brand h6" href="#">
           Welcome ! <?php echo $_SESSION['active_user']?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse expand-lg" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto text-center">
                <li class="nav-item mr-2">
                     <a class="h5 nav-link nav-item table" style="color:white; margin-right:20px; " href="logout.php" >Logout</a>
                </li>
            </ul>
        </div>

    </nav>
<br>
<br>
	<div class="container">
		<div class="row">
		<div class="col-md-3 offset-md-1">
				<div class="card mt-3" style="background:#5CDB95" >
					<img src="pics/userlogin.png" class="card-img-top" alt="...">
					<div class="card-body text-center">
						<h5 class="card-title">User Profile</h5>
						<p class="card-text "></p>
						<div data-target="#details" data-toggle="modal" class="btn btn-primary">User Details</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 offset-md-1">
				<div class="card mt-3">
					<img src="pics/vet1.png"  class="card-img-top" alt="...">
					<div class="card-body text-center" style="background:#5CDB95">
						<h5 class="card-title">Find Doctor</h5>
						<p class="card-text "></p>
						<a href="doctor-angular-fetch.php" class="btn btn-primary">Find Doctor</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 offset-md-1">
				<div class="card mt-3" style="background:#5CDB95">
					<img src="pics/sellpet.jpg" class="card-img-top" alt="...">
					<div class="card-body text-center">
						<h5 class="card-title">Sell Pet</h5>
						<p class="card-text"></p>
						<a href="pet-detail-front.php" class="btn btn-primary">Sell Pet</a>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<hr>
		<br>
		<div class="row">
		<div class="col-md-3 offset-md-1">
				<div class="card mt-3" style="background:#5CDB95">
					<img src="pics/shelter1.png" class="card-img-top" alt="...">
					<div class="card-body text-center">
						<h5 class="card-title">Find Shelter Provider</h5>
						<p class="card-text "></p>
						<a href="shelter-angular-fetch.php" class="btn btn-primary">Shelter Provider</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 offset-md-1">
				<div class="card mt-3" style="background:#5CDB95">
					<img src="pics/pharmacy.jpg" class="card-img-top" alt="...">
					<div class="card-body text-center">
						<h5 class="card-title">Find Pharmacy</h5>
						<p class="card-text "></p>
						<a href="pharmacy-angular-fetch.php" class="btn btn-primary">Find Pharmacy</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 offset-md-1">
				<div class="card mt-3" >
					<img src="pics/shop-512.png" class="card-img-top" alt="...">
					<div class="card-body text-center" style="background:#5CDB95">
						<h5 class="card-title">Buy Pet</h5>
						<p class="card-text"></p>
						<a href="buy-angular-fetch.php" class="btn btn-primary">Buy Pet</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="details" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:#5CDB95">
       <div class="modal-header">
        <h5 class="modal-title offset-md-4"><i class="fa fa-user fa-2x"></i>&nbsp;User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="container">
 <br>
 <div class="form-row">
     <div class="form-group col-md-5 offset-md-1">
        <label for="uid" class="h6">User Id</label>
      <input type="text" class="form-control" id="uid" name="uid" required>
     </div>
 </div>
 <div class="form-row">
     <div class="form-group col-md-5 offset-md-1">
      <label for="name" class="h6">Name</label>
       <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group col-md-5 offset-md-1">
      <label for="adder" class="h6">Address</label>
       <input type="text" class="form-control" id="adder" name="adder">
    </div>
 </div>
  <div class="form-row">
   <div class="form-group col-md-5 offset-md-1">
      <label for="city" class="h6">City</label>
      <input type="text" class="form-control" id="city" name="city">
    </div>
    <div class="form-group col-md-5 offset-md-1">
      <label for="mob" class="h6">Mobile No</label>
      <input type="text" class="form-control" id="mob" name="mob">
      <small id="errmob" class="form-text text-muted"></small>
    </div>
  </div>
  <br>
  <div class="form-row">
        <div class="col-md-5 offset-md-4">
        <button type="button" id="btndetail" name="btndetail" class="form-control btn btn-primary">Save</button>
        </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-5 offset-md-3">
        <small id="errdetail"></small>
        </div>
        </div>
        <br>
    </form>
      </div>
    </div>
  </div>
</div>
	</div>
    <br>
	<hr>
	<div class="container">
	    <p class="float-right">
	        <a href="#">Back to top</a>
	    </p>
	    <p>
	        © 2017-2021 copyright. · 
	        <a href="#">Privacy</a>
	         · 
	         <a href="#">Terms</a>
	    </p>
	</div>
</body>
</html>