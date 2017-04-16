var AccesoriesService = angular.module('AccesoriesService', [])
    .service('Accessories', function () {
        this.items = [
            {   id:1,
                name:'Bert Square',
                character:'Bert',
                url:'img/bert-pocket-square.jpg',
                price:'50.00'
            },
            {
                id:2,
                name:'Tiger Square',
                character:'Timothy',
                url:'img/tiger-pocket-square.jpg',
                price:'50.00'
            },
            {
                id:3,
                name:'Bert Soft Square',
                character:'Bert',
                url:'img/bert-soft-square.jpg',
                price:'50.00'
            }
        ]
    });