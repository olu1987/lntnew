app.controller('ClothingController',['$scope','Clothing',function($scope,Clothing){
    Clothing.async().then(function(d) {
        $scope.items = d;
        console.log($scope.items)
    });


}]);