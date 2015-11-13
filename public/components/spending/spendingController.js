mayneApp.controller('spendingController', ['$scope','$http', function($scope, $http){
	$scope.spending = '';
	$scope.numberSold = '';
	$scope.errorFound = false;

    $http.get("/api/spendings")
    .then(function ($response){
        $scope.spendings = $response.data;
    });

    $scope.deleteSpending = function (spending){
        if (confirm("Are you sure?")){
            $http.post('/api/spendings/delete',{id: spending.id})
                .then(function (){
                    $scope.spendings.splice($scope.spendings.indexOf(spending), 1);
                });
        }
    }

	$scope.$watch('spending', function(newValue, oldValue, scope) {
		if (isNaN(newValue) && newValue.length > 1){
			$scope.spending = oldValue;
		}	
	});

	$scope.$watch('numberSold', function(newValue, oldValue, scope) {
		if (isNaN(newValue) && newValue.length > 1){
			$scope.numberSold = oldValue;
		}	
	});

	$scope.addSpending = function (){
        $scope.errorFound = false;
		if (isNaN($scope.spending) || isNaN($scope.numberSold) || $scope.spending == '' || $scope.numberSold == ''){
			$scope.errorFound = true;
            return;
		}
        $http.post("/api/spendings/create",{
            spending: $scope.spending,
            sold: $scope.numberSold
        }).then(function ($newSpending){

            $scope.spendings.push($newSpending.data);
            document.getElementById('spending').focus();
            $scope.spending = '';
            $scope.numberSold = '';
        });

	}
}]);