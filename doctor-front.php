<?php session_start(); ?>
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
        function showpreview(file,imgid) 
            {
			if (file.files && file.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$(imgid).prop('src', e.target.result);
				}
				reader.readAsDataURL(file.files[0]);
			}
		}
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
              $("#email").blur(function(){
            var email=$(this).val();
            var r=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/ ;
            if(email=="")
                {
                $("#erremail").html("Invalid Email-Id");
                }
            else
			if(r.test(email)==true)
                {
                $("#erremail").html("Valid Email-Id");
                }
            else
                {
                $("#erremail").html("ok");
                }
        });
            $("#uid").blur(function(){
                var uidvalue=$("#uid").val();
                var url="ajax-user-chk.php?uidName="+uidvalue+"&tablename=pro1";
                $.get(url,function(response){
                    $("#erruid").html(response);
                });
            });
            $("#btnfetch").click(function(){
                var user=$("#uid").val();
                var url="json-fetch-user-record.php?uid="+user+"&tablename=pro1";
$.getJSON(url,function(response)
          {
                    if (response.length==0)
                        {
                            alert("Invalid Id");
                        }
                    else
                        {
                        $("#name").val(response[0].name);
                        $("#mob").val(response[0].mob);
                        $("#email").val(response[0].email);
                        $("#state").val(response[0].state);
                        $("#city").val(response[0].city);
                        $("#qual").val(response[0].qual);
                        $("#spel").val(response[0].spel);
                        $("#add").val(response[0].address);
                        $("#exp").val(response[0].exp);
                        $("#hdnbox1").val(response[0].ppic1);
                        $("#hdnbox2").val(response[0].ppic2);
                        $("#imgid1").prop("src","uploads/"+response[0].ppic1);
                        $("#imgid2").prop("src","uploads/"+response[0].ppic2);
                        }
                });
            });
});
        </script>
</head>
<body>
<form action="doctor-process.php" style="background:#5CDB95" class="container mt-5" method="post" enctype="multipart/form-data">
 <br>
 <center>
<h3 class=""><i class="fa fa-user-md"></i> Doctor’s Profile</h3></center>
 <div class="form-row">
    <input type="hidden" id="hdnbox1" name="hdnbox1">
    <input type="hidden" id="hdnbox2" name="hdnbox2">
     <div class="form-group col-md-8">
        <label for="uid" class="h6">User Id</label>
<input type="text" class="form-control" id="uid" name="uid" value="<?php echo $_SESSION['active_user']?>" readonly>
     <?php session_destroy(); ?>
      <small id="erruid" class="form-text text-muted"></small>
     </div>
     <div class="col-md-4 ">
          <label for="btnfetch" ></label>
        <div id="btnfetch" class="form-control btn btn-primary mt-2">Fetch</div>
    </div>
 </div>
  <div class="form-row">
       <div class="form-group col-md-4">
      <label for="name" class="h6">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group col-md-4">
      <label for="mob" class="h6">Mobile No</label>
      <input type="text" class="form-control" id="mob" name="mob">
      <small id="errmob" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-md-4">
      <label for="email" class="h6">Email</label>
      <input type="text" class="form-control" id="email" name="email">
      <small id="erremail" class="form-text text-muted"></small>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="add" class="h6">Address</label>
      <input type="text" class="form-control" id="add" name="add">
    </div>
    <div class="form-group col-md-4">
      <label for="state" class="h6">State</label>
      <input list="states" class="form-control" id="state" name="state">
       <datalist id="states">
           <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
  </datalist>
    </div>
    <div class="form-group col-md-4">
      <label for="city" class="h6">City/Locality</label>
      <input type="text" class="form-control" id="city" name="city">
    </div>
  </div>
  <div class="form-row">
         <div class="form-group col-md-4">
      <label for="qual" class="h6">Qualification</label>
      <select id="qual" name="qual" class="form-control">
        <option selected>Choose...</option>
        <option value="MVSc">Master of Veterinary Science [MVSc]</option>
        <option value="BVSc">Bachelor of Veterniary Science(BVSc)& A.H</option>
        <option value="AnimalNutrition">BVSc(Animal Nutrition)</option>
        <option value="LiveStock">BVSc(Live Stock Production & Management)</option>
        <option value="Parasitology">MVSc(Veterniary Parasitology)</option>
        <option value="Pathology">MVSc(Veterniary Pathology)</option>
        <option value="Microbiology">MVSc(Veterniary Microbiology)</option>
        <option value="Nutrition">MVSc(Animal Nutrition)</option>
        <option value="Radiology">MVSc(Veterniary Surgery and Radiology)</option>
        <option value="Management">MVSc(Live Stock Production & Management)</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="exp" class="h6">Exp.(years)</label>
     <select id="exp" name="exp" class="form-control">
        <option selected>Choose...</option>
        <option value="0"> 0 yr </option>
        <option value="5"> less than 5 yr</option>
        <option value="10"> less than 10 yr</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="spel" class="h6">Specialization</label>
      <input type="text" class="form-control" id="spel" name="spel">
    </div>
  </div >
  <div class="form-row">
        <div class="form-group col-md-2 offset-md-4">
    <img src="" id="imgid1" name="imgid1" width="100" height="100" alt="Profile Pic">
    <br>
    <input type="file" name="ppic1" id="ppic1" class="mt-1"  accept="image/*"
    onchange="showpreview(this,imgid1);">
        </div>
        <div class="form-group col-md-5 offset-md-1">
    <img src="" id="imgid2" name="imgid2" width="100" height="100" alt="Cerificate Proof Pic">
    <br>
    <input type="file" name="ppic2" id="ppic2" class="mt-1"  accept="image/*"
    onchange="showpreview(this,imgid2);">
        </div>
    </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary"  name="btn" value="save">Save</button>
   <button type="submit" class="btn btn-primary" name="btn" value="update">Update</button>
</div>
  <br>
    </form>
</body>
</html>