app.controller('AccessoriesController',['$scope','Accessories','Filter',function($scope,Accessories,Filter){
    $scope.items = Accessories.items;
    $scope.filterFn = Filter.filterFn;
}]);