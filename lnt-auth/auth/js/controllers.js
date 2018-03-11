'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
	.controller('mainController', function($scope, $location, $http, $window, $route) {

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
		
		$http.get("../api/auth").
			success(function(data) {
				if(data.loggedin == true) {
					$window.location = "../";
				}
			});

		$scope.getClass = function(path) {
		    if($location.path().substr(0, path.length) == path) {
				return "active";
		    } else {
				return "";
		    }
		}

		$scope.getClass = function(path) {
			if ($location.path().substr(0, path.length) == path) {
				return "pure-menu-selected";
			} else {
				return "";
			}
		};

		$scope.postForm = function(url, form, callback) {
			$http.post("../api/" + url, form).
				success(function(data) {
					$scope.successmsg = data.message;
					$scope.errormsg = "";

					if(callback) {
					    callback();
					}
				}).
				error(function(data) {
					$scope.successmsg = "";
					$scope.errormsg = data.message;
				});
		}

		$scope.login = function() {
			$window.location = "../";
		}

		$scope.$on('$routeChangeStart', function(next, current) { 
			$scope.errormsg = "";
			$scope.successmsg = "";
		});

	})

	.controller('activateController', function($scope, $http, $routeParams) {
		$scope.key = $routeParams.key;

		$scope.ajaxActivate = function() {
			$http.post("../api/auth/activate", {key: $scope.key}).
				success(function(data) {
					if(data.error == 1) {
						$scope.successmsg = "";
						$scope.errormsg = data.message;
					} else {
						$scope.successmsg = data.message;
						$scope.errormsg = "";
					}
				}).
				error(function(data) {
					$scope.successmsg = "";
					$scope.errormsg = data.message;
				});
		};
	})

	.controller('resetPassController', function($scope, $http, $routeParams) {
		$scope.key = $routeParams.key;

		$scope.ajaxReset = function(form) {
			form.key = $scope.key;

			$http.post("../api/auth/resetpass", form).
				success(function(data) {
					if(data.error == 1) {
						$scope.successmsg = "";
						$scope.errormsg = data.message;
					} else {
						$scope.successmsg = data.message;
						$scope.errormsg = "";
					}
				}).
				error(function(data) {
					$scope.successmsg = "";
					$scope.errormsg = data.message;
				});
		};
	})