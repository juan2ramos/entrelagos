$(function () {

    /* Form */
    $('#form-contact').on("submit", function (e) {
        e.preventDefault();
        var fields = $(this).serializeArray();

        $.post("email.php", fields, responseForm, 'json');


    });
    function responseForm(r) {
        console.log(r);
        if (r.success == 0) {
            alert(r.message);
        }
        else {
            $('#contact-form').text('');
            $('#contact-form').append("<span class='message'>" + r.message + "<span>");
        }
    }

});
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        slideshowSpeed:	7000,
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
    navSlide();

});