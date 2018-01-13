
(function($) {

    "use strict";
    var HT = {};
    /*=============SHORTCODE===========*/
        /*plyr setup*/
       
        // $('.sm-audio audio, video').mediaelementplayer();
        plyr.setup();
        /* couter up */
        var counter = $(".counter-number");
        counter.counterUp({
            delay: 10,
            time: 1000
        });
        HT.postGallery = function() {
            var postGallery = $(".blog-post-gallery");
            postGallery.not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                infinite: false,
            });
        };
        /*case studies*/
        HT.isotope = function(){
            var qsRegex;
            var buttonFilter;
            // init Isotope
            var $grid = $('.theme-cases-grid').isotope({
                itemSelector: '.theme-case-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                filter: function() {
                    var $this = $(this);
                    var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                    var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
                    return searchResult && buttonResult;
                }
            });
            var filter = $('.theme-cases-filter');
            filter.on('click', 'button', function() {
                buttonFilter = $(this).attr('data-filter');
                $grid.isotope();
            });
            // use value of search field to filter
            var $quicksearch = $('#quicksearch').keyup(debounce(function() {
                qsRegex = new RegExp($quicksearch.val(), 'gi');
                $grid.isotope();
            }));
            // change is-checked class on buttons
            filter.each(function(i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });
            // debounce so filtering doesn't happen every millisecond
            function debounce(fn, threshold) {
                var timeout;
                return function debounced() {
                    if (timeout) {
                        clearTimeout(timeout);
                    }

                    function delayed() {
                        fn();
                        timeout = null;
                    }
                    setTimeout(delayed, threshold || 100);
                };
            }
        };
        /*theme tabs*/
        var themetabs = $(".theme-tabs");
        themetabs.organicTabs({
            "speed": 200
        });
    /*=============//SHORTCODE===========*/
    /*BLOG ITEM CAROUSEL*/
    /*Blog style 7*/
    var blogCarousel =  $(".consult-blog-carousel-style");
    blogCarousel.not('.slick-initialized').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            }
        ]
    });
    /*SERMON ITEM CAROUSEL*/
    
    var sermonCarousel =  $(".sermon-carousel-style");
    sermonCarousel.not('.slick-initialized').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            }
        ]
    });
    /*PASTOR ITEM CAROUSEL*/
    var staffCarousel =  $(".staff-carousel-style");
    staffCarousel.not('.slick-initialized').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 2,
                    variableWidth: false,
                    dots: false,
                    arrows: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            }
        ]
    });
    /*TESTIMONAIL CAROUSEL*/
    var testiCarousel = $('.theme-testi');
    testiCarousel.not('.slick-initialized').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: false,
                    arrows: false,
                }
            }
        ]
    });
    /*button click effect*/
    $(function(){
        var ink, d, x, y;
        var buttoneff = $(".theme-btn-material, #mc-embedded-subscribe, .theme-btn-animation");
        buttoneff.on('click', function(e){
            
            if($(this).find(".ink").length === 0){
                $(this).prepend("<span class='ink'></span>");
            }
                
            ink = $(this).find(".ink");
            ink.removeClass("theme-ripple");
            
            if(!ink.height() && !ink.width()){
                d = Math.max($(this).outerWidth(), $(this).outerHeight());
                ink.css({height: d, width: d});
            }
            
            x = e.pageX - $(this).offset().left - ink.width()/2;
            y = e.pageY - $(this).offset().top - ink.height()/2;
            
            ink.css({top: y+'px', left: x+'px'}).addClass("theme-ripple");
        });
    });

    /*topbar on mobile*/
    HT.topbar_mobile = function () {
        var topbartoggle = $('#topbar-toggle');
        topbartoggle.on('click', function () {
            var themtopbar = $('.theme-topbar');
            themtopbar.slideToggle('fast');
        });
    }

    HT.menu_mobile = function(){
        enquire.register("screen and (max-width:991px)", {
            match: function() {
                $('.theme-wrap-primary-menu').ht_menu({
                    resizeWidth: '991',
                    initiallyVisible: false,
                    collapserTitle: '',
                    animSpeed: 'fast',
                    easingEffect: null,
                    indentChildren: false,
                    childrenIndenter: '&nbsp;&nbsp;',
                    expandIcon: '',
                    collapseIcon: ''
                });
            }
        });
    }

    /*search effect*/
    var searchbtn = $('#ht-btn-search');
    var topsearch = $('.topsearch');
    var searchform = $(".header-search-form-input");
    var closebtn =  $('.close-form-btn');
    var searchoverlay = $('.search-overlay');
    var body = $('body');
    searchbtn.on('click', function() {
        topsearch.addClass('x-code');
        searchoverlay.addClass('display-ove');
        searchform.addClass('display-input');
        searchform.focus();
        body.addClass('body-fixed');
        closebtn.on('click', function() {
            topsearch.removeClass('x-code');
            searchform.removeClass('display-input');
            searchoverlay.removeClass('display-ove');
            body.removeClass('body-fixed');
        })
    });
    /*end search effect*/
    /* Scroll to top */
    var scrolltop = $('.scroll-to-top');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            scrolltop.addClass('scroll-animation');
        } else {
            scrolltop.removeClass('scroll-animation');
        }
    });
    scrolltop.on('click', function () {
        $('html, body').animate({
            scrollTop: $("html").offset().top
        }, 300);
    });

    /*READY*/
    $(document).ready(function() {
        /*fix vc full row rtl*/
        $(document).on('vc-full-width-row', function () {
            var $elements = $('[data-vc-full-width="true"]');
            var body = $('body');
            if(body.hasClass('rtl')){
                $.each($elements, function () {
                    var $el = $(this);
                    $el.css('right', $el.css('left')).css('left', '');
                });
            }
        });
        /*Topbar on mobile*/
        HT.topbar_mobile();
        /*Product gallery*/
        var woocommerceGallery = $('.woocommerce .product .woocommerce-product-gallery .flex-control-thumbs');
        woocommerceGallery.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            infinite: false,
            variableWidth: false,
            dots: false,
        });
    });

    /*LOAD*/
    $(window).on('load',function(){
        HT.isotope();
        HT.menu_mobile();
        HT.postGallery();
        /*loading effect*/
        
        var pload = $("#p-loading");
        var pcircular = $(".p-circular");
        pload.fadeOut("slow");
        pcircular.fadeOut();

        /*Gallery masonry*/
        // masonry layout
        var gridman = $('.gallery-grid-items');
        if($('.vc_row').hasClass('fw-gallery-nospace')){
           gridman.masonry({
                // options...
                itemSelector: '.gallery-item',
                gutter: 0,
            });
        }else{
            gridman.masonry({
                // options...
                itemSelector: '.gallery-item',
                gutter: 10,
            });
        }
        var $grid = $('.blog-masonry-grid-items').masonry({
          // specify itemSelector so stamps do get laid out
          itemSelector: '.blog-masonry-it',
          gutter: 30,
        });
        // with jQuery
        var loadmore = $('.load-more a');
        loadmore.on( 'click', function(e) {
            e.preventDefault();
            // create new item elements
            var $items = $('<div class="blog-masonry-it"></div>');
            // append items to grid
            $grid.masonry()
                .append($items)
                // add and lay out newly appended items
                .masonry( 'appended', $items);    
        });
    });


    /*Search form for home v1 and v2*/
    // var searchbtn = $('#ht-btn-search');
    // var topsearch = $('.topsearch');
    // searchbtn.on("click", function(){
    //    topsearch.toggleClass('show-searchbox');
    // });
    /*Sticky memu*/
  
    var mnstick = $(".menu-stick");
    var logged = $('.logged-in.admin-bar');
    if(logged.length){
        mnstick.sticky({
            topSpacing: 32,
            className: 'ht-menu-stick',
            wrapperClassName: 'ht-stick-wrapper',
        });
    }else{
        mnstick.sticky({
            topSpacing: 0,
            className: 'ht-menu-stick',
            wrapperClassName: 'ht-stick-wrapper',
        });
    }
   
    /*Iconbox carousel*/
    var iconboxCarousel = $(".theme-iconbox-carousel");
    iconboxCarousel.not('.slick-initialized').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: false,
        fade: false,
        variableWidth: true,
        draggable: false,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                    variableWidth: false,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    variableWidth: false,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 130,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    dots: true,
                    arrows: false,
                }
            }
        ]
    });

    /*Light box*/
    var consultLightbox = $('.consult-lightbox-popup');
    consultLightbox.fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        prevEffect: 'none',
        nextEffect: 'none',
        arrows: false,
        helpers: { media: {}, buttons: {} }
    });  
    var fancybox = $(".fancybox");
    fancybox.fancybox({
        openEffect  : 'none',
        closeEffect : 'none'
    });
    /*js for fancybox audio with elementmedia*/
    var $video_player, _player, _isPlaying = false;
    $(".fancy_audio").fancybox({
        // set type of content (we are building the HTML5 <video> tag as content)
        type: "html",
        // other API options
        scrolling: "no",
        fitToView: false,
        autoSize: false,
        beforeLoad: function () {
            // build the HTML5 video structure for fancyBox content with specific parameters
            this.content = "<audio id='audio_player' src='" + this.href + "' poster='" + $(this.element).data("poster") + "' width='410' height='30' controls='controls' preload='none' ></audio>";
            // set fancyBox dimensions
            this.width = 410; // same as video width attribute
            this.height = 30; // same as video height attribute
        },
        afterShow: function () {
            // initialize MEJS player
            var $video_player = new MediaElementPlayer('#audio_player', {
                defaultVideoWidth: this.width,
                defaultVideoHeight: this.height,
                success: function (mediaElement, domObject) {
                    _player = mediaElement; // override the "mediaElement" instance to be used outside the success setting
                    _player.load(); // fixes webkit firing any method before player is ready
                    _player.play(); // autoplay video (optional)
                    _player.addEventListener('playing', function () {
                        _isPlaying = true;
                    }, false);
                } // success
            });
        },
        beforeClose: function () {
            // if video is playing and we close fancyBox
            // safely remove Flash objects in IE
            if (_isPlaying && navigator.userAgent.match(/msie [6-8]/i)) {
                // video is playing AND we are using IE
                _player.remove(); // remove player instance for IE
                _isPlaying = false; // reinitialize flag
            };
        }
    });
    /*Select dropdown*/
    var consultdrop = $('.consult-dropdown-list');
    consultdrop.dropkick();
    
    // Charitable selection
    $('[name="sortby"],[name="category-filter"]').change(function() {
      $(this).closest('form').submit();
    });

    // Charitable Progress bar
    $('.progress .progress-bar').css("width",
        function() {
            return $(this).attr("aria-valuenow") + "%";
        }
    )
})(jQuery);