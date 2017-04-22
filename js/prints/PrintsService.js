var AccesoriesService = angular.module('PrintsService', [])
    .service('Prints', function () {
        this.items = [
            {   id:1,
                name:'Bert Square',
                character:'Bert',
                url:'img/ap-bert-opt.jpg',
                price:'150.00',
                column:'col-md-4 col-sm-6 col-xs-12'
            },


            {
                id:4,
                name:'Bert Orange and Petrol Square',
                character:'Timothy',
                url:'img/pink-tiger-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },{
                id:2,
                name:'Bert Soft Square',
                character:'Bert',
                url:'img/bert-2-opt.jpg',
                price:'150.00',
                column:'col-md-4 col-sm-6 col-xs-12'
            },
            {
                id:5,
                name:'Bert Purple and Emerald Square',
                character:'Timothy',
                url:'img/tiger-one-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },   {
                id:3,
                name:'Bert Blue Green Square',
                character:'Bert',
                url:'img/original-bert-opt.jpg',
                price:'150.00',
                column:'col-md-4 col-sm-6 col-xs-12'
            },
            {
                id:6,
                name:'Bert Soft Pink Square',
                character:'Bert',
                url:'img/vr-3-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },
            {
                id:7,
                name:'Timothy Cosmic Aqua Square',
                character:'Timothy',
                url:'img/vr-aqua-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },
            {
                id:8,
                name:'Timothy Cosmic Aqua Square',
                character:'Timothy',
                url:'img/VR-purple-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            }
        ]
    });