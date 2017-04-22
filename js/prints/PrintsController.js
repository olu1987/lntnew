app.controller('PrintsController',['$scope','Prints',function($scope,Prints){
    $scope.items = Prints.items;

}]);