var AccesoriesService = angular.module('PrintsService', [])
    .service('Prints', function () {
        this.items = [
            {   id:1,
                name:'Bert Original',
                character:'Bert',
                url:'img/ap-bert-opt.jpg',
                price:'150.00',
                column:'col-md-4 col-sm-6 col-xs-12'
            },


            {
                id:4,
                name:'Timothy Original',
                character:'Timothy',
                url:'img/pink-tiger-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },{
                id:2,
                name:'Bert Orange Green',
                character:'Bert',
                url:'img/bert-2-opt.jpg',
                price:'150.00',
                column:'col-md-4 col-sm-6 col-xs-12'
            },
            {
                id:5,
                name:'Timothy light Orange',
                character:'Timothy',
                url:'img/tiger-one-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },   {
                id:3,
                name:'Bert Enhanced',
                character:'Bert',
                url:'img/original-bert-opt.jpg',
                price:'150.00',
                column:'col-md-4 col-sm-6 col-xs-12'
            },
            {
                id:6,
                name:'Violet Rain Original',
                character:'Violet',
                url:'img/vr-3-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },
            {
                id:7,
                name:'Violet Rain Cosmic Aqua',
                character:'Violet',
                url:'img/vr-aqua-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            },
            {
                id:8,
                name:'Violet Rain Light',
                character:'Violet',
                url:'img/VR-purple-opt.jpg',
                price:'50.00',
                column:'col-md-8 col-sm-6 col-xs-12'
            }
        ]
    });