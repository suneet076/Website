<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
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
            $("#btnsignup").click(function(){
                var qstring=$("#signupfrm").serialize();
                alert(qstring);
var url="ajax-user-save.php?"+qstring+"&tablename=user";
                $.get(url,function(response){
                    if(response=="Saved..")
                        {
                            $("#errsignup").html(response);
                            location.href="citizen-front.php";
                        }
                    else
                        {
                    alert(response);
                        }
                });
            });
            $("#eye").click(function(){
                if($('#pass').attr("type") == "password")
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
</head>
<body>
<form id="signupfrm" class="container mt-5 table-success" >
 <br>
 <h3 class="text-center">Signup Here</h3>
 <div class="form-row">
     <div class="form-group col-md-4 offset-md-4">
        <label for="uidsignup">User Id</label>
      <input type="text" class="form-control" id="uidsignup" name="uidsignup" required>
     </div>
 </div>
 <div class="form-row">
     <div class="form-group col-md-4 offset-md-4">
      <label for="pass">Password</label>
      <input type="password" class="form-control" id="pass" name="pass">
      <i id="eye" class="fa fa-eye-slash form-group" aria-hidden="true"></i>
    </div>
 </div>
  <div class="form-row">
    <div class="form-group col-md-4 offset-md-4">
      <label for="mob">Mobile No</label>
      <input type="text" class="form-control" id="mob" name="mob">
      <small id="errmob" class="form-text text-muted"></small>
    </div>
  </div>
  <div class="form-row">
         <div class="form-group col-md-4 offset-md-4">
      <label for="prof">Profession</label>
      <select id="prof" name="prof" class="form-control">
        <option selected>Choose...</option>
        <option value="Pharmacy">Pharmacy</option>
        <option value="Doctor">Doctor</option>
        <option value="Citizen">Citizen</option>
        <option value="Shelter Provider">Shelter Provider</option>
      </select>
    </div>
    </div>
    <div class="form-row">
    <div class="col-md-3 offset-md-2 ">
   <small id="errsignup">****</small>
   </div>
  <div class="col-md-2 offset-md-0">
  <button type="button" class="btn btn-primary form-control" id="btnsignup" name="btnsignup">SignUp</button>
</div>
   </div>
   <br>
    </form>
</body>
</html>