var AccesoriesService = angular.module('AccesoriesService', [])
    .service('Accessories', function () {
        this.items = [
            {
                id:8,
                name:'',
                character:'Timothy',
                url:'img/timothy-green-square.jpg',
                price:'50.00'
            },
            {
                id:9,
                name:'Timothy Cosmic Pink Square',
                character:'Timothy',
                url:'img/timothy-pink-square.jpg',
                price:'50.00'
            },
            {
                id:10,
                name:'Timothy Cosmic Purple Square',
                character:'Timothy',
                url:'img/timothy-purple-square.jpg',
                price:'50.00'
            },
            {
                id:11,
                name:'Timothy Square',
                character:'Timothy',
                url:'img/timothy-original-square.jpg',
                price:'50.00'
            },
            {
                id:12,
                name:'Timothy Cosmic Yellow Square',
                character:'Timothy',
                url:'img/timothy-yellow-square.jpg',
                price:'50.00'
            }
        ]
    });