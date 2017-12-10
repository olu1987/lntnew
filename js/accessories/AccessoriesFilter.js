app.filter('chooseCharacter', function () {
    return function (input, str) {
        var filtered = [];
        angular.forEach(input, function(item) {
            if(item.character.toLowerCase() == str || str == undefined) {
                filtered.push(item);
            }
        });
        return filtered;
    };
});

app.filter('chooseItem', function () {
    return function (input, str) {
        var filtered = [];
        angular.forEach(input, function(item) {
            if(item.item_type.toLowerCase() == str || str == undefined) {
                filtered.push(item);
            }
        });
        return filtered;
    };
});