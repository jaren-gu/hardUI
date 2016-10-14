
(function($){

    //变量
    var Window = $(window);
    var Body = $('body');
    var Navbar = $('.navbar');
    var Topbar = $('#topbar');

    //高度常量
    var windowH = Window.height();
    var bodyH = Body.height();
    var navbarH = 0;
    var topbarH = 0;

    //高度变量
    if (Navbar.is(':visible')) { navbarH = Navbar.height(); }
    if (Topbar.is(':visible')) { topbarH = Topbar.height(); }

    $.fn.sidebar = function(opt){
        $('.sidebar-menu li a.accordion-toggle').on('click', function(e) {
            e.preventDefault();

            //如果点击的菜单是缩小状态且是最低级菜单，不做任何操作
            if($('body').hasClass('sb-l-m') && !$(this).parents('ul.sub-nav').length){ return; }

            //如果点击的菜单是可下拉，则打开菜单
            if(!$(this).parents('ul.sub-nav').length){
                if($(window).width()>900){
                    if($('body.sb-top').length) { return; }
                }

                $('a.accordion-toggle.menu-open').next('ul').slideUp('fast', 'swing', function(){
                    $(this).attr('style','').prev().removeClass('menu-open');
                });
            }
            //如果如果点击的菜单为二级下拉菜(还有三级)，则关闭当前非顶级菜单
            else{
                var activeMenu = $(this).next('ul.sub-nav');
                var siblingMenu = $(this).parent().siblings('li').children('a.accordion-toggle.menu-open').next('ul.sub-nav');

                activeMenu.slideUp('fast', 'swing', function(){
                    $(this).attr('style', '').prev().removeClass('menu-open');
                });
                siblingMenu.slideUp('fast', 'swing', function(){
                    $(this).attr('style','').prev().removeClass('menu-open');
                });
            }

            //
            if(!$(this).hasClass('menu-open')) {
                $(this).next('ul').slideToggle('fast', 'swing', function() {
                    $(this).attr('style', '').prev().toggleClass('menu-open');
                });
            }
        });
    };


    //点击按钮sidebar大小切换事件
    var sidebarLeftToggle = function() {
        // If sidebar is set to Horizontal we return
        if ($('body.sb-top').length) { return; }
        // We check to see if the the user has closed the entire
        // leftside menu. If true we reopen it, this will result
        // in the menu resetting itself back to a minified state.
        // A second click will fully expand the menu.
        if (Body.hasClass('sb-l-c') && options.collapse === "sb-l-m") {
            Body.removeClass('sb-l-c');
        }
        // Toggle sidebar state(open/close)
        Body.toggleClass('sb-l-m').removeClass('sb-r-o').addClass('sb-r-c');
        triggerResize();
    };

    //设置当前body的最小高度
    var resizeBody = function() {
        windowH = $(window).height();
        $('#sidebar_left').css('min-height', windowH);
    };

    //根据当前窗口的width设置sidebar的大小
    var sbOnLoadCheck = function() {
        if ($('body.sb-top').length) {
            // If window is < 1080px wide collapse both sidebars and add ".mobile-view" class
            if ($(window).width() < 900) {
                Body.addClass('sb-top-mobile').removeClass('sb-top-collapsed');
            }
            return;
        }
        if (!$('body.sb-l-o').length && !$('body.sb-l-m').length && !$('body.sb-l-c').length) {
            $('body').addClass('sb-l-o');
        }
        if (!$('body.sb-r-o').length && !$('body.sb-r-c').length) {
            $('body').addClass('sb-r-c');
        }
        if (Body.hasClass('sb-l-m')) { Body.addClass('sb-l-disable-animation'); }
        else { Body.removeClass('sb-l-disable-animation'); }

        if ($(window).width() < 1080) {
            Body.removeClass('sb-r-o').addClass('mobile-view sb-l-m sb-r-c');
        }
        resizeBody();
    };
    //根据窗口的变化缩小sidebar
    var sbOnResize = function() {
        if ($('body.sb-top').length) {
            // If window is < 1080px wide collapse both sidebars and add ".mobile-view" class
            if ($(window).width() < 900 && !Body.hasClass('sb-top-mobile')) {
                Body.addClass('sb-top-mobile');
            } else if ($(window).width() > 900) {
                Body.removeClass('sb-top-mobile');
            }
            return;
        }
        // If window is < 1080px wide collapse both sidebars and add ".mobile-view" class
        if ($(window).width() < 1080 && !Body.hasClass('mobile-view')) {
            Body.removeClass('sb-r-o').addClass('mobile-view sb-l-m sb-r-c');
        } else if ($(window).width() > 1080) {
            Body.removeClass('mobile-view');
        } else {
            return;
        }
        resizeBody();
    };

    var triggerResize = function() {
        setTimeout(function() {
            $(window).trigger('resize');

            if(Body.hasClass('sb-l-m')) {
                Body.addClass('sb-l-disable-animation');
            }
            else {
                Body.removeClass('sb-l-disable-animation');
            }
        }, 300)
    };

    sbOnLoadCheck();
    $("#toggle_sidemenu_l").on('click', sidebarLeftToggle);
    $(window).resize(sbOnResize);

})(jQuery);



