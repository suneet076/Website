<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				$http.get("json-fetch-all.php?tableid=doctor&city="+$scope.selcity).then(okFx, notOkFx);

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
			$scope.selcity="none";
			 $scope.loadcity=function(){
				$http.get("json-fetch-all-city.php?tableid=doctor").then(okFx, notOkFx);

				function okFx(result) //call back function
				{
					//alert(JSON.stringify(result.data));
					$scope.cityArray = result.data; //local to global assignment
					
				}

				function notOkFx(result) {
					alert(result.data);
				}
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
        <a class="navbar-brand"><i class="fa fa-paw fa-2x"></i><b>Pet Care</b></a>
        <a class="navbar-brand mx-md-auto"><b>Doctor Search</b></a>
    </nav>
<br>
<div class="container form-row">
			<div class="h6 offset-5 mt-4">
				Select City:
				</div>
				<div class="h6 mt-3 col-md-2">
				<select ng-model="selcity" class="form-control">
				<option value="none" selected>Select</option>
					<option value={{obj.city}} ng-repeat="obj in cityArray">{{obj.city}}</option>
					
				</select>
			</div>
			<div class="h6 mt-3 col-md-3">
<input type="button" class="btn btn-primary offset-1" value="Fetch" ng-click="fetchJsonData();">

			</div>
		</div>
		<div class="container">
		<br>
			<div class="row">
				<div class="col-md-3" ng-repeat="obj in jsonArray">
					<div class="card" style="background:#5CDB95">
						<img class="card-img-top" src="uploads/{{obj.ppic1}}" height="200" width="100" alt="Card image cap">
						<div class="card-body">
    <div class="card-text h6 offset-2">Name: {{obj.name}}</div>
    <div class="card-text h6 offset-2">Degree: {{obj.qual}}</div>
    <div class="card-text h6 offset-2">Mobile: {{obj.mob}}</div>
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
        <h5 class="modal-title offset-4" id="exampleModalLabel">Doctor's Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        		<div colspan="2" align="center">
        		<img src="uploads/{{selObj.ppic1}}" width="200" height="200" alt="">
        		&nbsp;&nbsp;&nbsp;
        		<img src="uploads/{{selObj.ppic2}}" width="200" height="200" alt="">
           </div>
           <br>
        <table width="100%" border="0" rules="">
        	<tr class="h6 row">
        		<td class="col-4 offset-2">Name</td><td class="col-4">{{selObj.name}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-4 offset-2">city</td><td class="col-4">{{selObj.city}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-4 offset-2">Address</td><td class="col-4">{{selObj.address}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-4 offset-2">Experience</td><td class="col-4">{{selObj.exp}} </td>
        		
        	</tr>
        	<tr class="h6 row">
        		<td class="col-4 offset-2">Specialization</td><td class="col-4">{{selObj.spel}} </td>
        		
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
