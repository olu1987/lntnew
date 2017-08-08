app.filter('chooseCharacter', function () {
    return function (input, str) {
        var filtered = [];
        angular.forEach(input, function(item) {
            if(item.character_name.toLowerCase() == str || str == undefined) {
                filtered.push(item);
            }
        });
        return filtered;

    };
});