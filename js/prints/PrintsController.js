app.controller('PrintsController',['$scope','Prints','$http',function($scope,Prints,$http){

    Prints.async().then(function(d) {
        $scope.items = d;
        console.log($scope.items)
    });

}]);