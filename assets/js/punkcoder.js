/**
 * PROJECT : punkcoder
 * TIME    : 2019/3/9 12:03
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
(function(window, $){
    var punkcoder = {};

    punkcoder.navbarSticky = function()
    {
        var scrollPosition = Math.round(window.scrollY);

        if (scrollPosition > 100){
            $('nav').addClass('navbar-sticky');
        }

        else {
            $('nav').removeClass('navbar-sticky');
        }
    };

    window.punkcoder = punkcoder;
    $(document).ready(function(){
        window.addEventListener('scroll', punkcoder.navbarSticky);
    });
})(window, $);