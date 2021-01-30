<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
				$http.get("json-fetch-all.php?tableid=pharmacy&city="+$scope.selcity).then(okFx, notOkFx);

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
				$http.get("json-fetch-all-city.php?tableid=pharmacy").then(okFx, notOkFx);

				function okFx(result) //call back function
				{
					//alert(JSON.stringify(result.data));
					$scope.cityArray = result.data; //local to global assignment
					
				}

				function notOkFx(result) {
					alert(result.data);
				}
			}

		});

	</script>
</head>

<body ng-app="kuchbhiModule" ng-controller="mycontroller" ng-init="loadcity();">
    <nav class="navbar navbar-dark" style="background-color:#5CDB95;">
        <a class="navbar-brand mx-auto"><b>Pharmacy Search</b></a>
    </nav>
<br>
    <div class="container  row">
			<div class="h6 offset-md-5 mt-4">
				Select City:
				</div>
				<div class="h6 mt-3 col-md-3">
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
				<div class="col-md-4" ng-repeat="obj in jsonArray">
					<div class="card mt-2" style="background:#5CDB95">
						<img class="card-img-top form-control-file" src="uploads/{{obj.grpic}}"alt="Card image cap">
						<div class="card-body form-control-file">
    <div class="card-text h6 offset-md-2">Firm name: {{obj.fname}}</div>
    <div class="card-text h6 offset-md-2">City: {{obj.city}}</div>
    <div class="card-text h6 offset-md-2">Address: {{obj.address}}</div>
    <div class="card-text h6 offset-md-2">Mobile: {{obj.mobile}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>

</html>
