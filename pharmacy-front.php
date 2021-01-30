<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            $("#uid").blur(function(){
                var uidvalue=$("#uid").val();
                var url="ajax-user-chk.php?uidName="+uidvalue+"&tablename=pharmacy";
                $.get(url,function(response){
                    $("#erruid").html(response);
                });
            });
            $("#btnsearch").click(function(){
                var user=$("#uid").val();
                $.getJSON("json-fetch-user-record.php?uid="+user+"&tablename=pharmacy",function(response){
                    if (response.length==0)
                        {
                            alert("Invalid Id");
                        }
                    else
                        {
                        $("#fname").val(response[0].fname);
                        $("#mob").val(response[0].mobile);
                        $("#city").val(response[0].city);
                        $("#adder").val(response[0].address);
                        $("#hdnbox").val(response[0].grpic);
                        $("#lice").val(response[0].licence);
                        $("#imgid").prop("src","uploads/"+response[0].grpic);
                        }
                });
            });
});
        </script>
    <title>Document</title>
</head>
<body>
<form action="pharmacy-process.php" style="background:#5CDB95" class="container mt-2" method="post" enctype="multipart/form-data">
 <br>
 <h3 class="text-center"><img src="pics/pharm.svg" height="40" width="40" alt="">Pharmacy Console</h3>
 <div class="form-row">
     <div class="form-group col-md-4 offset-md-1">
        <label for="uid" class="h6">User Id</label>
      <input type="text" class="form-control" id="uid" name="uid" value="<?php echo $_SESSION['active_user'] ?>" readonly>
      <?php session_destroy();?>
      <input type="hidden" id="hdnbox" name="hdnbox">
      <small id="erruid" class="form-text text-muted"></small>
         </div>
      <div class="col-md-3 offset-md-1 ">
          <label for="btnsearch" ></label>
        <div id="btnsearch" class="form-control btn btn-primary mt-2">Fetch</div>
     </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-4 offset-md-1">
        <label for="fname" class="h6">Firm Name</label>
      <input type="text" class="form-control" id="fname" name="fname">
         </div>
     <div class="form-group col-md-4 offset-md-1">
        <label for="mob" class="h6">Mobile No</label>
      <input type="text" class="form-control" id="mob" name="mob" required>
      <small id="errmob" class="form-text text-muted"></small>
         </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-4 offset-md-1">
        <label for="adder" class="h6">Shop Address</label>
      <input type="text" class="form-control" id="adder" name="adder">
         </div>
     <div class="form-group col-md-4 offset-md-1">
        <label for="city" class="h6">City/Locality</label>
      <input type="text" class="form-control" id="city" name="city" required>
      <small id="errcity" class="form-text text-muted"></small>
         </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-4 offset-md-1">
        <label for="lice" class="h6" >Licence No</label>
      <input type="text" class="form-control" id="lice" name="lice">
         </div>
     </div>
       <div class="form-row">
     <div class="form-group col-md-4 offset-md-1">
           <label for="ppic" class="h6">Upload Paytm QR Code</label>
<input type="file" name="ppic" id="ppic" class=" mt-1"  accept="image/*"
onchange="showpreview(this,imgid);">
          
         </div>
         <div class="form-group col-md-2">
         <img src="" id="imgid" name="imgid" class="form-control-file" alt="Paytm QR Code">
         </div>
     </div>
     <div class="text-center">
   <button type="submit" class="btn btn-primary" name="btn" value="update">Update</button>
  &nbsp;
  <button type="submit" class="btn btn-primary"  name="btn" value="save">Send</button>
  <br>
  <br>
</div>
    </form>
</body>
</html>