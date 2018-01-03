'use strict';

/* Controllers */

var app = angular.module('progressApp', ['ngProgress']);

angular.module('myApp.controllers', [])
	.controller('mainController', function($scope, $location, $http, $window, $route) {
		
		$scope.getUserData = function() {
			$http.get("api/auth").
				success(function(data) {
					$scope.userdata = data.userdata;

					if(data.loggedin == false) {
						$window.location = "auth/";
					}
				}).
				error(function(data) {
					$window.location = "auth/";
				});
		}

		$scope.getClass = function(path) {
			if ($location.path().substr(0, path.length) == path) {
				return "pure-menu-selected";
			} else {
				return "";
			}
		};

		$scope.postForm = function(url, form) {
			$http.post("api/" + url, form).
				success(function(data) {
					$scope.successmsg = data.message;
					$scope.errormsg = "";
				}).
				error(function(data) {
					$scope.successmsg = "";
					$scope.errormsg = data.message;
				});
		}

		$scope.getUserData();

		$scope.logout = function() {
			$http.get("api/auth/logout").
    			success(function() {
    				$window.location = "auth/";
    			}).
    			error(function() {
    				$window.location = "auth/";
    			})
		};

		$scope.$on('$routeChangeStart', function(next, current) { 
			$scope.errormsg = "";
			$scope.successmsg = "";
		});

        $scope.getItems = function() {
            $scope.items = {};
            $http.get("../api/item/read.php?table=prints").
            success(function(data) {
                $scope.items.prints = data.records;
                if(data.loggedin == false) {
                    $window.location = "auth/";
                }
            }).
            error(function(data) {
                $window.location = "auth/";
            });

            $http.get("../api/item/read.php?table=accessories").
            success(function(data) {
                $scope.items.accessories = data.records;
                if(data.loggedin == false) {
                    $window.location = "auth/";
                }
            }).
            error(function(data) {
                $window.location = "auth/";
            });

            $http.get("../api/item/read.php?table=clothing").
            success(function(data) {
                $scope.items.clothing = data.records;
                console.log($scope.items);
                if(data.loggedin == false) {
                    $window.location = "auth/";
                }
            }).
            error(function(data) {
                $window.location = "auth/";
            });

            $scope.activeTable = 'prints'


        };

        $scope.getItems();

	})
