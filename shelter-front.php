<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
             $("#contact").blur(function(){
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
                var url="ajax-user-chk.php?uidName="+uidvalue+"&tablename=shelter";
                $.get(url,function(response){
                    $("#erruid").html(response);
                });
            });
            $("#selpet").click(function(){
        var refselpet=document.getElementById("selpet");
            var all="";
        for(var i=0;i<refselpet.length;i++)
            {
                if(refselpet[i].selected==true)
                    {
                var a=refselpet[i].value;
                all=all+a+",";
                    }
            }
            all=all.substr(0,all.length-1);
            document.getElementById("selpets").value=all;
        });
});
        
        </script>
</head>
<body>
    <form class="container mt-2" style="background:#5CDB95" action="shelter-process.php" method="post" enctype="multipart/form-data">
 <br>
 <h3 class="text-center"><img src="pics/shelt1.svg" height="50" width="50" alt="">Shelter Providers</h3>
 <hr>
 <br>
 <div class="form-row">
     <div class="form-group col-md-4">
        <label for="uid" class="h6">User Id</label>
<input type="text" class="form-control" value="<?php echo $_SESSION['active_user'] ?>" id="uid" name="uid" readonly>
      <small id="erruid" class="form-text text-muted"></small>
         </div>
         <div class="form-group col-md-4">
        <label for="pname" class="h6">Person Name</label>
      <input type="text" class="form-control" id="pname" name="pname" >
         </div>
         <div class="form-group col-md-4">
        <label for="contact" class="h6">Contact No</label>
      <input type="text" class="form-control" id="contact" name="contact" >
        <small id="errmob" class="form-text text-muted"></small>
         </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-4">
        <label for="adder" class="h6">Address</label>
      <input type="text" class="form-control" id="adder" name="adder" >
         </div>
         <div class="form-group col-md-4">
        <label for="city" class="h6">City</label>
      <input type="text" class="form-control" id="city" name="city" >
         </div>
         <div class="form-group col-md-4">
      <label for="days" class="h6">Max Days</label>
     <select id="days" name="days" class="form-control">
        <option selected value="0">Choose...</option>
        <option value="1">1 </option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>
    </div>
     </div>
      <div class="form-row">
          <div class=" form-group col-md-3 offset-2">
              <label for="selpet" class="h6">Select Pets</label>
     <select id="selpet" name="selpet"  class="form-control" multiple>
        <!--<option value="0">Choose...</option>-->
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="fish">fish</option>
        <option value="cow">Cow</option>
        <option value="buffalo">Buffalo</option>
      </select>
          </div>
          <div class="form-group col-md-4 offset-1">
        <label for="selpets" class="h6">Selected Pets</label>
      <input type="text" class="form-control" id="selpets" name="selpets" readonly>
         </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-8 offset-2">
             <label for="info" class="h6">Other Information</label>
              <textarea name="info" class="form-control" id="info" cols="90" rows="5" placeholder="comment"></textarea>
          </div>
      </div>
      <h3 class="text-center" class="h6">Gallery</h3>
      <br>
       <div class="form-row">
                <div class="form-group col-md-2 offset-2">
         <img src="" id="imgid1" name="imgid1" width="100" height="100" alt="Shelter facility picture">
          <br>
<input type="file" name="ppic1" id="ppic1" class="mt-1"  accept="image/*"
onchange="showpreview(this,imgid1);">
         </div>
        <div class="form-group col-md-2 offset-1">
         <img src="" id="imgid2" name="imgid2" width="100" height="100" alt="Shelter picture">
          <br>
<input type="file" name="ppic2" id="ppic2" class="mt-1"  accept="image/*"
onchange="showpreview(this,imgid2);">
         </div>
        <div class="form-group col-md-2 offset-1">
         <img src="" id="imgid3" name="imgid3" width="100" height="100" alt="Shelter facility management team picture">
          <br>
<input type="file" name="ppic3" id="ppic3" class="mt-1"  accept="image/*"
onchange="showpreview(this,imgid3);">
         </div>
     </div>
     <div class="text-center">
  <button type="submit" class="btn btn-primary"  name="btn" value="save">Upload to Server</button>
  <br>
  <br>
</div>
    </form>
</body>
</html>