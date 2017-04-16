app.controller('AccessoriesController',['$scope','Accessories',function($scope,Accessories){
    $scope.searchTerm = '';
    $scope.items = Accessories.items;

}]);