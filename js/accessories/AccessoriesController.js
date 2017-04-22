app.controller('AccessoriesController',['$scope','Accessories',function($scope,Accessories){
    $scope.items = Accessories.items;

}]);