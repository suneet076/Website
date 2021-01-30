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
            $("#uid").blur(function(){
                var uidvalue=$("#uid").val();
                var url="ajax-user-chk.php?uidName="+uidvalue+"&tablename=user";
                $.get(url,function(response){
                    $("#erruid").html(response);
                });
            });
});
        </script>
    <title>Document</title>
</head>
<body>
<form action="pet-detail-process.php"  class="container mt-2"style="background:#5CDB95" method="post" enctype="multipart/form-data">
 <br>
 <h3 class="text-center"><img src="pics/detail.svg" width="50" height="50" alt="">Post Pet Details</h3>
 <br>
 <div class="form-row">
     <div class="form-group col-md-4 offset-md-2">
        <label for="uid" class="h6">User Id</label>
      <input type="text" class="form-control" id="uid" name="uid" required>
      <input type="hidden" id="hdnbox" name="hdnbox">
      <small id="erruid" class="form-text text-muted"></small>
         </div>
      <div class="col-md-4 offset-md-1 ">
    <label for="selpet" class="h6">Select Pets</label>
     <select id="selpet" name="selpet"  class="form-control">
        <option value="0">Choose...</option>
        <option value="Dog">Dog</option>
        <option value="Cat">Cat</option>
        <option value="Hamster">Hamster</option>
        <option value="Parrot">Parrot</option>
        <option value="Spider">Spider</option>
        <option value="fish">fish</option>
        <option value="Cow">Cow</option>
        <option value="Buffalo">Buffalo</option>
      </select>
     </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-4 offset-md-2">
        <label for="age" class="h6">Age</label>
      <input type="text" class="form-control" id="age" name="age">
         </div>
     <div class="form-group col-md-4 offset-1">
        <label for="demand" class="h6">Amount demanded</label>
      <input type="text" class="form-control" id="demand" name="demand" placeholder="Rs">
         </div>
     </div>
     <div class="form-row">
     <div class="col-md-1 h6 offset-md-7">
         Gender
     </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-4 offset-md-7">
       <input type="radio"  id="male" name="gen" value="Male">
        <label for="male" class="h6">Male</label>
       &nbsp;
       <input type="radio"  id="female" name="gen" value="Female">
        <label for="female" class="h6">Female</label>
         </div>
     </div>
       <div class="form-row">
          <div class="form-group col-md-2 offset-md-3">
         <img src="" id="imgid" name="imgid" width="200" height="200" alt="">
         </div>
          <div class="col-md-2 offset-md-2 mt-5">
           <label for="ppic" class="h6">Pet Pic</label>
<input type="file" name="ppic" id="ppic" class="mt-1"  accept="image/*"
onchange="showpreview(this,imgid);">
        </div>
         </div>
         <br>
         <div class="form-row">
             <div class="col-md-6 offset-md-3">
                <label for="info" class="h6">Other Information</label>
    <textarea class="form-control" placeholder="Description and Contact Information" name="info" id="info" cols="60" rows="5"></textarea>
             </div>
         </div>
         <br>
     <div class="form-row">
     <div class="col-md-4 offset-md-4">
  <button type="submit" class="form-control btn btn-primary"  name="btn" value="save">Save</button>
  </div>
  <br>
  <br>
</div>
    </form>
</body>
</html>