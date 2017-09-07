var app = angular.module('store', ['AccessoriesService']);

$(document).ready(function(){
    function addClass(el, className){
        if (el.classList)
            el.classList.add(className);
        else
            el.className += ' ' + className;
    }

    function removeClass(el, className){
        if (el.classList)
            el.classList.remove(className);
        else
            el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }



    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
    },  5000);

    $('.prints #myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var image = button.attr('src'),
            title = button.data('item');
        console.log(title);
        var modal = $(this)
        modal.find('.print-image').attr( "src", image);
        modal.find('.modal-title').html(title);
    })

    var navScroll = function(){
        var scrollArea = document.querySelector('body'),
            nav = document.querySelector(".sticky-nav-page .navigation"),
            promo = document.querySelector(".sticky-nav-page .promo");
        if(nav){
            scrollArea.addEventListener('scroll', function () {
                var distance = promo.getBoundingClientRect().top;
                if(distance < 120){
                    addClass(nav, 'fixed')
                }
                if(distance > 120) {
                    removeClass(nav, 'fixed')
                }
            })
        }
    }

    navScroll();
});
// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

app.controller('AccesoriesController',['$scope','Accessories',function($scope,Accessories){
    $scope.accessories = 'xxx';
}]);
/*app.service('accessoryService', function () {

    var accessories = [
            {
                name:'Tiger Top',
                thumbnail:'../../img/tiger-one-opt.jpg'
            }
        ]

    return accessories;

});*/

var AccesoriesService = angular.module('AccesoriesService', [])
    .service('Accessories', function () {
        this.accesory = function () { 'My Accessory'};

    });