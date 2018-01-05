var AccesoriesService = angular.module('PrintsService', [])
    .service('Prints',['$http',function ($http) {

        var printsService = {
            async: function() {
                // $http returns a promise, which has a then function, which also returns a promise
                var promise = $http.get('api/item/read.php?table=prints').then(function (response) {
                    // The then function here is an opportunity to modify the response
                    //console.log(response);
                    // The return value gets picked up by the then in the controller.
                    return response.data.records;
                });
                // Return the promise to the controller
                return promise;
            }
        };
        return printsService;


    }]);