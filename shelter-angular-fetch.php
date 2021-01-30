<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js">
	</script>

	<script>
		var module = angular.module("kuchbhiModule", []);
		module.controller("mycontroller", function($scope, $http) {

			$scope.jsonArray = []; //empty json array

			$scope.fetchJsonData = function() {
				loadJSON();

			}
			function loadJSON(){
$http.get("json-fetch-all.php?tableid=shelter&city="+$scope.selcity+"&pet="+$scope.selpet).then(okFx, notOkFx);

				function okFx(result) //call back function
				{
					//alert(JSON.stringify(result.data));
					$scope.jsonArray = result.data; //local to global assignment
				}

				function notOkFx(result) {
					alert(result.data);
				}
			}
			//-=-=-=-=-=-=-=-=-=-=-=-=-=
            $scope.cityArray=[];
            $scope.petArray=[];
			$scope.selcity="none";
			$scope.selpet="none";
			 function loadcity (){
				$http.get("json-fetch-all-city.php?tableid=shelter").then(okFx, notOkFx);

				function okFx(result) //call back function
				{
					//alert(JSON.stringify(result.data));
					$scope.cityArray = result.data; //local to global assignment
					
				}

				function notOkFx(result) {
					alert(result.data);
				}
			}
             //=--===--=-=-=-==-=-=-=--=-=
              function loadpet (){
				$http.get("json-fetch-all-pet.php?tableid=shelter").then(okFx, notOkFx);

				function okFx(result) //call back function
				{
					//alert(JSON.stringify(result.data));
					$scope.petArray = result.data; //local to global assignment
					
				}

				function notOkFx(result) {
					alert(result.data);
				}
			}
			//-=-=-=-=-=-=-=-=-=-=-=-=-=
            $scope.loadcity = function() {
				loadpet();
				loadcity();

			}
			//-=-=-=-=-=-=-=-=-=-=-=-=-=
			$scope.selObj;
			$scope.showDetails=function(index)
			{
				$scope.selObj=$scope.jsonArray[index];
				//alert(JSON.stringify($scope.selObj));
			}

		});

	</script>
</head>

<body ng-app="kuchbhiModule" ng-controller="mycontroller" ng-init="loadcity();">
    <nav class="navbar navbar-dark" style="background-color:#5CDB95;">
        <a class="navbar-brand mx-auto"><b>Shelter Search</b></a>
    </nav>
    <br>
<div class="row container">
			<div class="h6 offset-md-2 mt-1">
				Select City:
				</div>
				<div class="h6 col-md-3">
				<select ng-model="selcity" class="form-control">
				<option value="none" selected>Select</option>
					<option value={{obj.city}} ng-repeat="obj in cityArray">{{obj.city}}</option>
				</select>
			</div>
			<div class="h6 mt-1">
				Select Pet:
				</div>
			<div class="h6 col-md-3">
				<select ng-model="selpet" class="form-control">
				<option value="none" selected>Select</option>
					<option value={{obj.selpets}} ng-repeat="obj in petArray">{{obj.selpets}}</option>
				</select>
			</div>
			<div class="h6 col-md-2">
<input type="button" class="btn btn-primary offset-md-1" value="Fetch" ng-click="fetchJsonData();">

			</div>
		</div>
		<div class="container">
		<br>
			<div class="row">
				<div class="col-md-3" ng-repeat="obj in jsonArray">
					<div class="card mt-3" style="background:#5CDB95">
						<img class="card-img-top form-control-file" src="uploads/{{obj.pic1}}" alt="Card image cap">
						<div class="card-body container">
    <div class="card-text h6 offset-md-2">Name: {{obj.pname}}</div>
    <div class="card-text h6 offset-md-2">Shelter Pet: {{obj.selpets}}</div>
    <div class="card-text h6 offset-md-2">Mobile: {{obj.contact}}</div>
                  <button class="btn btn-primary offset-md-4" 
                  data-toggle="modal" data-target="#detailsModal" 
                  ng-click="showDetails($index);" >Details</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<!-- Modal -->
	 <!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background:#5CDB95">
      <div class="modal-header">
        <h5 class="modal-title offset-md-4" id="exampleModalLabel">Shelter's Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table">
        		<div class="container" align="center">
        		<img  height="125" width="125"src="uploads/{{selObj.pic1}}" alt="">
        		&nbsp;&nbsp;&nbsp;
        		<img  height="125" width="125"src="uploads/{{selObj.pic2}}" alt="">
        		&nbsp;&nbsp;&nbsp;
        		<img  height="125" width="125"src="uploads/{{selObj.pic3}}" alt="">
           </div>
           <br>
        <table width="100%" border="0" rules="">
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Name:</td><td class="col-md-4">{{selObj.pname}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">city:</td><td class="col-md-4">{{selObj.city}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Address:</td><td class="col-md-4">{{selObj.address}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Shelter Days:</td><td class="col-md-4">{{selObj.days}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Other information:</td><td class="col-md-4">{{selObj.info}} </td>
        		
        	</tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	

</body>

</html>
