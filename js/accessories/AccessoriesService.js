var AccesoriesService = angular.module('AccesoriesService', [])
    .service('Accessories', function () {
        this.items = [
            {
                name:'Bert Square',
                url:'img/bert-pocket-square.jpg'
            },
            {
                name:'Tiger Square',
                url:'img/tiger-pocket-square.jpg'
            },
            {
                name:'Bert Soft Square',
                url:'img/bert-soft-square.jpg'
            }
        ]
    });