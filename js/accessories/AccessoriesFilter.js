var AccesoriesFilterService = angular.module('AccesoriesFilterService', [])
    .service('Filter', function () {
        this.filterFn = function (searchString) {
            return searchString;
        }
    });