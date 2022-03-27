//        MOBILE MENU
function mobileClick() {
    $("#mobile-menu").toggleClass('mobileAdd');
    $("#mobileOverlay").toggleClass('mobile-overlay');
}
//        MOBILE MENU END

$(window).scroll(function () {
    $('.nav-header').toggleClass('scrolled', $(this).fadeIn().scrollTop() > 65);
});



$(document).ready(function () {
    // Venobox code Here
    $('.venobox').venobox();

    // slick slider
    $('.slick1').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        autoplaySpeed: 1500,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    });

});

    // Sticky Header
    // $(function(){
    //     $(window).on('scroll', function (event){
    //         var scroll = $(window).scrollTop();
    //         if (scroll < 245){
    //             $(".banner-overlay-header").removeClass(".sticky");
    //         }
    //         else{
    //             $(".banner-overlay-header").addClass(".sticky");
    //         }
    //     });
    // });











