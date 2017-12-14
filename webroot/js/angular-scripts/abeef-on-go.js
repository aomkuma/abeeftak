angular.module('abeef').config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "js/angular-scripts/views/home.html",
        controller : "ListController",
        resolve : {
			loadMyCtrl : [ '$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load({
					files : [ "js/angular-scripts/controllers/ListController.js" ]
				});
			} ]
		}
	})

	.when("/guest/signin", {
        templateUrl : "views/login.html",
        controller : "LoginController",
        resolve : {
			loadMyCtrl : [ '$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load({
					files : [ "angular-scripts/controllers/LoginController.js" ]
				});
			} ]
		}
	})

	.when("/homework/new_homework", {
        templateUrl : "views/homework/new_homework.html",
        controller : "NewHomeworkController",
        resolve : {
			loadMyCtrl : [ '$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load({
					files : [ "angular-scripts/controllers/NewHomeworkController.js" ]
				});
			} ]
		}
	});

	$locationProvider.hashPrefix('');
});
