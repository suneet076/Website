<!DOCTYPE html>
<html lang="en">

<head>
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
$http.get("json-fetch-all.php?tableid=petdetail&pet="+$scope.selpet).then(okFx, notOkFx);

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
            $scope.petArray=[];
			$scope.selpet="none";
              function loadpet (){
				$http.get("json-fetch-all-pet.php?tableid=petdetail").then(okFx, notOkFx);

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
        <a class="navbar-brand mx-auto"><b>Buy Pets</b></a>
    </nav>
<br>
<div class="container  row">
			<div class="h6 offset-md-5 mt-1">
				Select Pet:
				</div>
			<div class="h6 col-md-2">
				<select ng-model="selpet" class="form-control">
				<option value="none" selected>Select</option>
					<option value={{obj.pettype}} ng-repeat="obj in petArray">{{obj.pettype}}</option>
				</select>
			</div>
			<div class="h6  col-3">
<input type="button" class="btn btn-primary offset-1" value="Fetch" ng-click="fetchJsonData();">

			</div>
		</div>
		<div class="container">
		<br>
			<div class="row">
				<div class="col-md-4" ng-repeat="obj in jsonArray">
					<div class="card mt-3" style="background:#5CDB95">
						<img class="card-img-top form-control-file" src="uploads/{{obj.pic}}" alt="Card image cap">
						<div class="card-body">
    <div class="card-text h6 offset-md-2"></div>
    <div class="card-text h6 offset-md-2">Pet type: {{obj.pettype}}</div>
    <div class="card-text h6 offset-md-2">Price: {{obj.demand}}Rs</div>
                  <button class="btn btn-primary offset-4" 
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
        <h5 class="modal-title offset-md-4" id="exampleModalLabel">pet's Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        		<div colspan="" align="center">
        		<img src="uploads/{{selObj.pic}}" width="200" height="200" alt="">
           </div>
           <br>
        <table width="100%" border="0" rules="">
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Price</td><td class="col-md-4">{{selObj.demand}}Rs </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Gender</td><td class="col-md-4">{{selObj.gender}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Age</td><td class="col-md-4">{{selObj.age}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-md-4 offset-md-2">Other information</td><td class="col-md-4">{{selObj.info}} </td>
        		
        	</tr>
        </table>
      </div>
    </div>
  </div>
</div>
	

</body>

</html>
