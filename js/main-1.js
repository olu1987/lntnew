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

    function hasClass(el, cls){
        if (!el.className) {
            return false;
        } else {
            var newElementClass = ' ' + el.className + ' ';
            var newClassName = ' ' + cls + ' ';
            return newElementClass.indexOf(newClassName) !== -1;
        }
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
        var modal = $(this)
        modal.find('.print-image').attr( "src", image);
        modal.find('.modal-title').html(title);
    });

    var navScroll = function(){
        var nav = document.querySelector(".sticky-nav-page .navigation"),
            promo = document.querySelector(".sticky-nav-page .promo");

        if(! promo){
            return;
        }

            window.addEventListener('scroll', function () {
                var distance = promo.getBoundingClientRect().top;
                if(distance < 50){
                    addClass(nav, 'fixed')
                }
                if(distance > 50) {
                    removeClass(nav, 'fixed')
                }
            })

    };

    navScroll();

    var clothingModule = (function () {

        var bigPicture = document.getElementById('big-picture');

        var thumbnails = document.querySelectorAll('.item .thumbnails');

        return {
            changePicture: function () {

                for(var i = 0, x = thumbnails.length; i < x; i++){

                    thumbnails[i].addEventListener('click', function () {

                        for(var i = 0, x = thumbnails.length; i < x; i++){

                            removeClass(thumbnails[i],'active');

                        }

                        addClass(this,'active');

                        var img = this.getAttribute('src');

                        bigPicture.setAttribute('src',img);

                    })

                }

            }
        };

    })();

    clothingModule.changePicture();

    window.addEventListener('load',function(){

        if(hasClass(document.body,'prints'))
        {
            return;
        }

        var loader = document.getElementById('loader');

        setTimeout(function(){
            removeClass(loader,'active');
        },500);

        setTimeout(function(){
            addClass(loader,'hidden');
        },1300);

    });

    (function printsLoaded(){
        if(! hasClass(document.body,'prints')){
            return;
        }

        function removeMask() {
            var prints = document.querySelectorAll('.prints .col-sm-6.print .img-responsive');
            if (prints.length > 60) {
                var loader = document.getElementById('loader');

                setTimeout(function(){
                    removeClass(loader,'active');
                },500);

                setTimeout(function(){
                    addClass(loader,'hidden');
                },1300);
            } else {
                setTimeout(removeMask, 15);
            }
        }

        removeMask();

    }())
});