var AccessoriesService = angular.module('AccessoriesService', [])
    .service('Accessories',['$http' ,function ($http) {
        var accessoriesService = {
            async: function() {
                // $http returns a promise, which has a then function, which also returns a promise
                var promise = $http.get('api/item/read.php?table=accessories').then(function (response) {
                    // The then function here is an opportunity to modify the response
                    //console.log(response);
                    // The return value gets picked up by the then in the controller.
                    return response.data.records;
                });
                // Return the promise to the controller
                return promise;
            }
        };
        return accessoriesService;
    }]);