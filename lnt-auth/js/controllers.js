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
		};

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
        $scope.image_source;
        $scope.setFormData = function (item) {
            $scope.modalState = 'edit';
			$scope.formItem = item;
            $scope.clearFileInput();
            $scope.formItem.item_image_url_2 = item.item_image_url_2;
            $scope.formItem.item_image_url_3 = item.item_image_url_3;
			$scope.formImageUrl = '../' + item.item_image_url;
			$scope.formImageUrl2 = '../' + item.item_image_url_2;
			$scope.formImageUrl3 = '../' + item.item_image_url_3;
			console.log($scope.formImageUrl2);
			$scope.modalAction = 'Edit';

        };
        $scope.setFormDataCreate = function (item) {
            $scope.modalState = 'create';
			$scope.formItem = {};
            $scope.clearFileInput();
			$scope.formImageUrl = '';
            $scope.modalAction = 'Add New';

        };
        $scope.setFormDataDelete = function (item) {
        	$scope.modalState = 'delete';
            $scope.formItem = item;
            $scope.clearFileInput();
			$scope.formImageUrl = '';
            $scope.modalAction = 'Delete';

        };

        $scope.submit = function (activeTable) {

            var form_data = $scope.formItem;
            var table = activeTable;
            var modal = angular.element('#adminModal');
            var action;


            if($scope.modalAction == 'Add New'){
                action = 'create'
            }else if($scope.modalAction == 'Delete'){
                action = 'delete';
				form_data = {'id' : parseInt($scope.formItem.id)}
            }else if($scope.modalAction == 'Edit'){
                action = 'update';
			}
            var requestUrl = "../api/item/"+ action + ".php?table=" + table;

            //console.log(form_data, table, requestUrl);

            // submit form data to api

            $.ajax({
                url: requestUrl,
                type : "POST",
                contentType : 'application/json',
                data : JSON.stringify(form_data),
                success : function(response) {
                    modal.modal('hide');
                    // api message
                    $scope.successMessage = response['message'];
                    console.log(response.message);

                    // empty form
                    $scope.formItem = {};
                    $scope.getItems();

                }.bind(this),
                error: function(xhr, resp, text){
                    // show error to console
                    console.log(xhr, resp, text);
                    console.warn(xhr.responseText);
                    $scope.userMessage = text;
                }
            });

            $http({
                method  : 'POST',
                url     : '../api/item//upload.php',
                processData: false,
                transformRequest: function (data) {
                    var formData = new FormData();
                    formData.append("image", $scope.formItem.imageFile);
                    return formData;
                },
                data : $scope.formItem,
                headers: {
                    'Content-Type': undefined
                }
            }).then(function(response){
                console.log(response.data);
            },function(response){
                console.log(response.data);
            });
        };

        $scope.uploadedFile = function(element) {
        	if(element.id == 'uploadFileInput2'){
                $scope.formItem.item_image_url_2 = 'img/' + element.files[0].name;
			}else if(element.id == 'uploadFileInput3'){
                $scope.formItem.item_image_url_3 = 'img/' + element.files[0].name;
			}else{
                $scope.formItem.item_image_url = 'img/' + element.files[0].name;
                $scope.formItem.item_image_url_2 = 'img/' + element.files[0].name;
                $scope.formItem.item_image_url_3 = 'img/' + element.files[0].name;
			};

            $scope.formItem.imageFile = element.files[0];
            var reader = new FileReader();

            reader.onload = function(event) {
                $scope.image_source = event.target.result;
                $scope.$apply(function($scope) {
                    $scope.files = element.files;
                });
            };
            reader.readAsDataURL(element.files[0]);
        }

        $scope.clearFileInput = function(){
            angular.forEach(
                angular.element("input[type='file']"),
                function(inputElem) {
                    angular.element(inputElem).val(null);
                });
            angular.forEach(
                angular.element(".preview-image"),
                function(inputElem) {
                    angular.element(inputElem).attr('src','');
                });
		}
	});
