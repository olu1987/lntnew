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
            nav = document.querySelector(".accessories .navigation"),
            promo = document.querySelector(".accessories .promo");
        if(nav){
            scrollArea.addEventListener('scroll', function () {
                var distance = promo.getBoundingClientRect().top;
                console.log(promo.scrollTop);
                if(distance < 0){
                    addClass(nav, 'fixed')
                }
                if(distance > 0) {
                    removeClass(nav, 'fixed')
                }
            })
        }
    }

    navScroll();
});