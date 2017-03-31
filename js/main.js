$(document).ready(function(){

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


});