app.controller('AccessoriesController',['$scope','Accessories',function($scope,Accessories){
    Accessories.async().then(function(d) {
        $scope.items = d;
        console.log($scope.items)
    });

}]);