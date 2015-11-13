mayneApp.controller('predictionController', ['$scope', '$http', function ($scope, $http){
    $scope.rate = 0;
    $scope.adSpend = '';
    $scope.date = '';
    $scope.prediction = '';
    $scope.errorFound = false;
    $scope.drStart = '';
    $scope.drEnd = '';
    $scope.drPrediction = '';

    $http.get('/api/spendings/calculated-rate')
    .then(function ($response){
        $scope.rate = $response.data.rate;
    });

    $http.get("/api/predictions")
    .then(function ($response){
        $scope.predictions = $response.data;
    });

    $scope.calculatePrediction = function (){
        $scope.prediction = $scope.adSpend * $scope.rate;
    }

    $scope.addPrediction = function (){
        if ($scope.adSpend == '' || $scope.date == ''){
            $scope.errorFound = true;
            return;
        }

        $http.post('/api/predictions/create',{'ad_spend': $scope.adSpend, 'date': $scope.date,'prediction': $scope.prediction})
            .then(function ($newPrediction){
                $scope.predictions.push($newPrediction.data);
                document.getElementById('ad-spend').focus();
                $scope.adSpend = '';
                $scope.date = '';
                $scope.prediction = '';
            });
    }

    $scope.deletePrediction = function (prediction){
        if (confirm("Are you sure?")){
            $http.post('/api/predictions/delete',{id: prediction.id})
                .then(function (){
                    $scope.predictions.splice($scope.predictions.indexOf(prediction), 1);
                });
        }
    }

    $scope.dateRangeChange = function (){
        $scope.drPrediction = '';
        if ($scope.drStart == '' || $scope.drEnd == ''){
            return;
        }

        $http.get('/api/predictions/date-range/' + $scope.drStart + '/' + $scope.drEnd)
            .then(function($response){
                $scope.drPrediction = $response.data.prediction;
            });
    }

    $scope.$watch('adSpend', function(newValue, oldValue, scope) {
        if (isNaN(newValue) && newValue.length > 1){
            $scope.adSpend = oldValue;
        }
    });


}]);