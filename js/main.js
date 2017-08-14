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
    });

    var navScroll = function(){
        var nav = document.querySelector(".sticky-nav-page .navigation"),
            promo = document.querySelector(".sticky-nav-page .promo");

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
});