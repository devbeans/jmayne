var mayneApp = angular.module("mayneApp",["ngRoute",'720kb.datepicker']);


//Let's set the routes here ¯\_(ツ)_/¯
mayneApp.config(function($routeProvider) {
	$routeProvider
	.when('/',{
		templateUrl : "components/spending/index.htm",
		controller : "spendingController"
	})
    .when('/predictions',{
		templateUrl : "components/prediction/index.htm",
		controller : "predictionController"
	});
});