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
        var loader = document.getElementById('loader');
        setTimeout(function(){
            removeClass(loader,'active');
        },500);

        setTimeout(function(){
            addClass(loader,'hidden');
        },1300);
    });

    var lazyLoadImageModule = {
        init:function(){
            this.window = $(document);
            this.searchInput = $('.search-input');
            this.filterButtons = $('.sidebar li a');
            this.unbinding();
            this.binding();
        },
        binding:function(){
            $.fn.isInViewport = this.isInViewportOrHigherInPage;
            this.window.on('resize scroll', lazyLoadImageModule.loadImage);
            this.searchInput.on('input', lazyLoadImageModule.loadImage);
            this.filterButtons.on('click', lazyLoadImageModule.loadImage);
        },
        unbinding:function(){
            this.window.off('resize scroll', lazyLoadImageModule.loadImage);
            this.searchInput.off('input', lazyLoadImageModule.loadImage);
            this.filterButtons.off('click', lazyLoadImageModule.loadImage);
        },
        loadImage:function(){
            var images = $('.item-img');
            images.each(function( index ){
                    var element = $(this);
                    if(element.isInViewport() && ! element.hasClass('active')){
                        element.attr('src', element.data('src'));
                        setTimeout(function(){
                            element.addClass('active');
                        },200);
                    }
                }
            );
        },
        isInViewportOrHigherInPage:function () {
            var elementTop = $(this).offset().top,
                viewportTop = $(window).scrollTop(),
                viewportBottom = viewportTop + $(window).height();
            return elementTop < viewportBottom;
        }
    };

    lazyLoadImageModule.init();
    lazyLoadImageModule.loadImage();

});