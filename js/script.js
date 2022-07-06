$('.pogoSlider').pogoSlider({
    targetWidth:1000,
    targetHeight:390,
    pauseOnHover:false,
    responsive:true
});


$('.prodSlider').slick({
    slidesToShow:3,
    slidesToMove:1,
    autoplay:true,
    infinity:true,
    arrows:true,
    responsive:[
        {
            breakpoint:1100,
            settings:{
                slidesToShow:3
            }
        },
        {
            breakpoint:992,
            settings:{
                slidesToShow:2
            }
        },
        {
            breakpoint:600,
            settings:{
                slidesToShow:1
            }
        }
    ]
});
$('.prodSlider2').slick({
    slidesToShow:3,
    slidesToMove:1,
    autoplay:true,
    infinity:true,
    arrows:true,
    responsive:[
        {
            breakpoint:1100,
            settings:{
                slidesToShow:3
            }
        },
        {
            breakpoint:992,
            settings:{
                slidesToShow:2
            }
        },
        {
            breakpoint:600,
            settings:{
                slidesToShow:1
            }
        }
    ]
});

$('.clientSlider').slick({
    slidesToShow:5,
    slidesToMove:2,
    autoplay:true,
    infinity:true,
    arrows:false,
    responsive:[
        {
            breakpoint:1100,
            settings:{
                slidesToShow:4
            }
        },
        {
            breakpoint:992,
            settings:{
                slidesToShow:3
            }
        },
        {
            breakpoint:600,
            settings:{
                slidesToShow:2
            }
        }
    ]
});

$(window).on('scroll',function(){
    var x = window.scrollY;
    if(x > 10){
        $('#topscroll').fadeIn();
    }
    else if(x < 10){
        $('#topscroll').fadeOut();
    }
});
$(document).on('click', '#topscroll', function(){
    $('html,body').animate({
        scrollTop:0
    });
});

$(window).on('load',function(){
    var navlinks = $('.navbar-nav').find('.nav-link');

    var url = location.href;
    url = url.split('/');
    var x = url[url.length-1];

    navlinks.each(function(){
        if(x == $(this).attr('href')){
            $(this).addClass('active');
        }
        else{
            $(this).removeClass('active');
        }
    });

    if(!navlinks.hasClass('active')){
        navlinks.eq(0).addClass('active');
    }
});