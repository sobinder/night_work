jQuery(function($) {
    $(document).ready(function() {

        (function() {
            $('.wp-megamenu > li:has(ul)').append("<i class='fa fa-plus'></i>").addClass('has-sub-menu').children('ul').addClass('');
            $('.wp-megamenu > li>i').on("click", function(e) {
                e.preventDefault();
                $(this).toggleClass('active').prev("ul").toggle()
            })
        }());

        /*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

        /*jshint browser: true, strict: true, undef: true */
        /*global define: false */

        ( function( window ) {

            'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

            function classReg( className ) {
                return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
            }

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
            var hasClass, addClass, removeClass;

            if ( 'classList' in document.documentElement ) {
                hasClass = function( elem, c ) {
                    return elem.classList.contains( c );
                };
                addClass = function( elem, c ) {
                    elem.classList.add( c );
                };
                removeClass = function( elem, c ) {
                    elem.classList.remove( c );
                };
            }
            else {
                hasClass = function( elem, c ) {
                    return classReg( c ).test( elem.className );
                };
                addClass = function( elem, c ) {
                    if ( !hasClass( elem, c ) ) {
                        elem.className = elem.className + ' ' + c;
                    }
                };
                removeClass = function( elem, c ) {
                    elem.className = elem.className.replace( classReg( c ), ' ' );
                };
            }

            function toggleClass( elem, c ) {
                var fn = hasClass( elem, c ) ? removeClass : addClass;
                fn( elem, c );
            }

            var classie = {
                // full names
                hasClass: hasClass,
                addClass: addClass,
                removeClass: removeClass,
                toggleClass: toggleClass,
                // short names
                has: hasClass,
                add: addClass,
                remove: removeClass,
                toggle: toggleClass
            };

// transport
            if ( typeof define === 'function' && define.amd ) {
                // AMD
                define( classie );
            } else {
                // browser global
                window.classie = classie;
            }

        })( window );


        ;( function( window ) {

            'use strict';

            // EventListener | @jon_neal | //github.com/jonathantneal/EventListener
            !window.addEventListener && window.Element && (function () {
                function addToPrototype(name, method) {
                    Window.prototype[name] = HTMLDocument.prototype[name] = Element.prototype[name] = method;
                }

                var registry = [];

                addToPrototype("addEventListener", function (type, listener) {
                    var target = this;

                    registry.unshift({
                        __listener: function (event) {
                            event.currentTarget = target;
                            event.pageX = event.clientX + document.documentElement.scrollLeft;
                            event.pageY = event.clientY + document.documentElement.scrollTop;
                            event.preventDefault = function () { event.returnValue = false };
                            event.relatedTarget = event.fromElement || null;
                            event.stopPropagation = function () { event.cancelBubble = true };
                            event.relatedTarget = event.fromElement || null;
                            event.target = event.srcElement || target;
                            event.timeStamp = +new Date;

                            listener.call(target, event);
                        },
                        listener: listener,
                        target: target,
                        type: type
                    });

                    this.attachEvent("on" + type, registry[0].__listener);
                });

                addToPrototype("removeEventListener", function (type, listener) {
                    for (var index = 0, length = registry.length; index < length; ++index) {
                        if (registry[index].target == this && registry[index].type == type && registry[index].listener == listener) {
                            return this.detachEvent("on" + type, registry.splice(index, 1)[0].__listener);
                        }
                    }
                });

                addToPrototype("dispatchEvent", function (eventObject) {
                    try {
                        return this.fireEvent("on" + eventObject.type, eventObject);
                    } catch (error) {
                        for (var index = 0, length = registry.length; index < length; ++index) {
                            if (registry[index].target == this && registry[index].type == eventObject.type) {
                                registry[index].call(this, eventObject);
                            }
                        }
                    }
                });
            })();

            // http://stackoverflow.com/a/11381730/989439
            function mobilecheck() {
                var check = false;
                (function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
                return check;
            }

            // http://www.jonathantneal.com/blog/polyfills-and-prototypes/
            !String.prototype.trim && (String.prototype.trim = function() {
                return this.replace(/^\s+|\s+$/g, '');
            });

            function UISearch( el, options ) {
                this.el = el;
                this.inputEl = el.querySelector( 'form > input.sb-search-input' );
                this._initEvents();
            }

            UISearch.prototype = {
                _initEvents : function() {
                    var self = this,
                        initSearchFn = function( ev ) {
                            ev.stopPropagation();
                            // trim its value
                            self.inputEl.value = self.inputEl.value.trim();

                            if( !classie.has( self.el, 'sb-search-open' ) ) { // open it
                                ev.preventDefault();
                                self.open();
                            }
                            else if( classie.has( self.el, 'sb-search-open' ) && /^\s*$/.test( self.inputEl.value ) ) { // close it
                                ev.preventDefault();
                                self.close();
                            }
                        }

                    this.el.addEventListener( 'click', initSearchFn );
                    this.el.addEventListener( 'touchstart', initSearchFn );
                    this.inputEl.addEventListener( 'click', function( ev ) { ev.stopPropagation(); });
                    this.inputEl.addEventListener( 'touchstart', function( ev ) { ev.stopPropagation(); } );
                },
                open : function() {
                    var self = this;
                    classie.add( this.el, 'sb-search-open' );
                    // focus the input
                    if( !mobilecheck() ) {
                        this.inputEl.focus();
                    }
                    // close the search input if body is clicked
                    var bodyFn = function( ev ) {
                        self.close();
                        this.removeEventListener( 'click', bodyFn );
                        this.removeEventListener( 'touchstart', bodyFn );
                    };
                    document.addEventListener( 'click', bodyFn );
                    document.addEventListener( 'touchstart', bodyFn );
                },


                close : function() {
                    this.inputEl.blur();
                    classie.remove( this.el, 'sb-search-open' );
                }
            }

            // add to global namespace
            window.UISearch = UISearch;

        } )( window );


        new UISearch( document.getElementById( 'sb-search' ) );


        $('.single-video a, a.video-popup').magnificPopup({
            disableOn:0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        (function () {
            $('.product-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows:false,
                autoplay:false,
                dots:false,
                fade:false,
                appendDots: $('.product-thumb-slider'),
                prevArrow:'<i class="fa fa-angle-left"></i>',
                nextArrow:'<i class="fa fa-angle-right"></i>',
                customPaging: function(slider, i) {
                    return '' + $(slider.$slides[i]).find('.featured-slider').attr('data-title') + '';
                },
                asNavFor:'.text-slider',

                responsive: [
                    {
                        breakpoint:991,
                        settings: {
                            slidesToShow:3,
                            slidesToScroll:3,
                            arrows:true,
                            fade:false,
                        }
                    },
                    {
                        breakpoint:576,
                        settings: {
                            slidesToShow:1,
                            slidesToScroll:1,
                            arrows:true,
                            fade:false,

                        }
                    }
                ]
            });

            $(".slick-dots li").on({
                mouseenter: function () {
                    $(this).trigger('click');
                },
                mouseleave: function () {
                }

            });




            (function () {
                $('.text-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll:1,
                    arrows:false,
                    dots:false,
                    fade:true,
                    autoplay:false,
                    prevArrow:'<i class="fa fa-angle-left"></i>',
                    nextArrow:'<i class="fa fa-angle-right"></i>',
                    asNavFor:'.product-slider',
                    responsive: [
                        {
                            breakpoint:767,
                            settings: {
                                slidesToShow:1,
                                slidesToScroll:1,
                                arrows:true,
                                fade:false,
                            }
                        },
                        {
                            breakpoint:576,
                            settings: {
                                slidesToShow:1,
                                slidesToScroll:1,
                                arrows:true,
                                fade:false,
                            }
                        }
                    ]
                });

              
 
                $('.slider').slick({
                    slidesToShow: 1,
                    slidesToScroll:1,
                    arrows:false,
                    dots:false,
                    fade:false,
                    autoplay:true,
                    autoplaySpeed:4000,
                    prevArrow:'<i class="fa fa-angle-left"></i>',
                    nextArrow:'<i class="fa fa-angle-right"></i>',
                });




                $('.special-slider').slick({
                    slidesToShow:3,
                    slidesToScroll:3,
                    arrows:true,
                    dots:false,
                    autoplay:false,
                    prevArrow:'<i class="fa fa-chevron-left slick-prev"></i>',
                    nextArrow:'<i class="fa fa-chevron-right slick-next"></i>',
                    responsive: [
                        {
                            breakpoint:1199,
                            settings: {
                                slidesToShow:2,
                                slidesToScroll:2,
                                arrows:true,
                                fade:false,
                            }
                        },
                        {
                            breakpoint:767,
                            settings: {
                                slidesToShow:2,
                                slidesToScroll:2,
                                arrows:true,
                                fade:false,
                            }
                        },
                        {
                            breakpoint:576,
                            settings: {
                                slidesToShow:1,
                                slidesToScroll:1,
                                arrows:true,
                                fade:false,

                            }
                        }
                    ]
                });
            }());



        }());

        slider = $('.featured-slider');
        slider.slick({
            slidesToShow:3,
            slidesToScroll:3,
            arrows:false,
            dots:false,
            prevArrow:'<i class="fa fa-chevron-left slick-prev"></i>',
            nextArrow:'<i class="fa fa-chevron-right slick-next"></i>',
            infinite:true,
            autoplay:true,
            responsive: [
                {
                    breakpoint:1199,
                    settings: {
                        slidesToShow:2,
                        slidesToScroll:2,
                        arrows:true,
                    }
                },
                {
                    breakpoint:767,
                    settings: {
                        slidesToShow:2,
                        slidesToScroll:2,
                        arrows:true,
                    }
                },
                {
                    breakpoint:576,
                    settings: {
                        slidesToShow:1,
                        slidesToScroll:1,
                        arrows:true,
                    }
                }
            ]
        });




//$('.my-slider')[0].slick.refresh();		



        (function() {
            $('.main-menu li:has(ul)').append("<i class='fa fa-plus'></i>").addClass('has-sub-menu').children('ul').addClass('sub-menu');
            $('.main-menu li>i').on("click", function(e) {
                e.preventDefault();
                $(this).toggleClass('active').prev("ul").toggle()
            })
        }());



        $(document).on('change', '#state', function() {
            if($(this).val() == "Florida") {
                $('#location-one').addClass('active');
                $('#location-two').removeClass('active');
                $('#location-three').removeClass('active');
                $('#location-four').removeClass('active');
            }
            else if($(this).val() == "Pennsylvania") {
                $('#location-two').addClass('active');
                $('#location-one').removeClass('active');
                $('#location-three').removeClass('active');
                $('#location-four').removeClass('active');
            }
            else if($(this).val() == "Indiana") {
                $('#location-three').addClass('active');
                $('#location-one').removeClass('active');
                $('#location-two').removeClass('active');
                $('#location-four').removeClass('active');
            }
            else if($(this).val() == "Georgia") {
                $('#location-four').addClass('active');
                $('#location-one').removeClass('active');
                $('#location-two').removeClass('active');
                $('#location-three').removeClass('active');
            }

            else {

            }
        });

        /*
         $('body.home .simple-locator-form').prepend("<h2 style='display:inline-block;'>20 Locations Across Florida, Georgia, Pennsylvania, & Indiana</h2>");
         $('#zip').change(function() {
             $('input.address.wpsl-search-form').val($(this).val());
             $('.simple-locator-form').find("button.wpslsubmit").click();
             $("#location").find('option').remove();
             $(".menu-891").addClass("loading");
             setTimeout(function() {
                 $("option.location:lt(5)").each(function(i) {
                     $(this).clone().appendTo("#location");
                     $(".menu-891").removeClass("loading")
                 })
             }, 6000)
         });
         $(".wpcf7").on('wpcf7:mailsent', function(event) {
             $("#location").find('option').remove()
         });
         */

        $(document).ready(function() {
          
           $(function() {
                $('a.zoom').click(function(e){
                    e.preventDefault();
                });
            });

            $('ul.tabs li.tab-link:first').addClass('current');
            $('.tab-content:first').addClass('current');

            $('ul.tabs li.tab-link').click(function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li.tab-link').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            });


            $(document).on('mouseenter', '[data-toggle="tab"]', function () {
                $(this).tab('show');
            });


            $('.nav-tabs li a').click(function (e) {
                //get selected href
                var href = $(this).attr('href');

                // show tab for all tabs that match href
                $('.nav-tabs li a[href="' + href + '"]').tab('show');
            });


            $('.nav-tabs li a').hover(function (e) {
                //get selected href
                var href = $(this).attr('href');

                // show tab for all tabs that match href
                $('.nav-tabs li a[href="' + href + '"]').tab('show');
            });

            $('#start-date').datepicker({autoclose:true});

            $("table.glossary-nav td a").on('click', function(e) {
                e.preventDefault();
                var contentId = $(this).attr('class');
                $(this).parent().parent().parent().find("a.active").removeClass("active");
                $(this).addClass("active");
                $(this).parent().parent().parent().parent().parent().find("table.glossary-table." + contentId).addClass("active").siblings().removeClass("active")
            })
            $("table.glossary-nav td a").on('click', function(e) {
                e.preventDefault();

            })
        });
        (function() {
            $.scrollUp()
        }());
        $(window).load(function() {



            $('.tab-content .tab-pane').first().addClass("active");
            $('.new-products ul li').first().find("a").addClass("active show");


            $('.location-gallery .gallery').each(function() {
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{enabled:true}
                });
            });



            $(function() {
                $('.location-thumbnails a').click(function(e){
                    e.preventDefault();
                });
            });




            (function () {
                $(".location-gallery .gallery").slick({
                    infinite:true,
                    slidesToShow:1,
                    slidesToScroll:1,
                    autoplay:true,
                    dots:false,
                    arrows:false,
                    asNavFor:'.location-thumbnails .gallery',
                    nextArrow:'<i class="fa fa-angle-right slick-next"></i>',
                    prevArrow:'<i class="fa fa-angle-left slick-prev"></i>',
                    responsive: [
                        {
                            breakpoint:767,
                            settings: {
                                slidesToShow:1,
                                slidesToScroll:1,
                            }
                        },
                        {
                            breakpoint:500,
                            settings: {
                                slidesToShow:1,
                                slidesToScroll:1,
                            }
                        }
                    ]
                });
            }());





            (function () {
                $(".location-thumbnails .gallery").slick({
                    infinite:true,
                    slidesToShow:3,
                    slidesToScroll:3,
                    autoplay:true,
                    dots:false,
                    arrows:false,
                    focusOnSelect:true,
                    asNavFor:'.location-gallery .gallery',
                    nextArrow:'<i class="fa fa-angle-right slick-next"></i>',
                    prevArrow:'<i class="fa fa-angle-left slick-prev"></i>',
                    responsive: [
                        {
                            breakpoint:767,
                            settings: {
                                slidesToShow:2,
                                slidesToScroll:2,
                            }
                        },
                        {
                            breakpoint:500,
                            settings: {
                                slidesToShow:2,
                                slidesToScroll:2,
                            }
                        }
                    ]
                });
            }());


            $('.location-thumbnails .gallery a').on("click", function(e) {
                e.preventDefault();

            })




            /*$('.stm-medias-unit').imagesLoaded(function() {
                $('.stm-medias-unit').isotope({
                    itemSelector: '.stm-media-single-unit',
                    layoutMode: 'masonry'
                })
            });
			*/
            $('.ticker').Ticker();
            if ($.cookie('boxed') == "yes") {
                $(".fixed-sidebar-left").addClass("active")
            }
            if ($.cookie('boxed') == "no") {
                $(".fixed-sidebar-left.active").removeClass("active")
            }
            $("body").fadeIn("fast"); /*var wow=new WOW({mobile:!0});wow.init();*/
            $(document).ready(function() {
                $("body").on("click", ".sidebar-toggle", function(e) {
                    e.preventDefault();
                    $.cookie('boxed', 'yes', {
                        expires: 7,
                        path: '/'
                    });
                    $(this).parent().parent().addClass('active')
                })
            });
            $(document).ready(function() {
                $("body").on("click", ".fixed-sidebar-left.active .sidebar-toggle", function(e) {
                    e.preventDefault();
                    $(this).parent().parent().removeClass('active');
                    $.cookie('boxed', 'no', {
                        expires: 7,
                        path: '/'
                    })
                })
            });
            var refreshDocHeight = function() {
                $(window).trigger('resize.px.parallax')
            };
            window.setInterval(refreshDocHeight, 0);

            function adjustModalMaxHeightAndPosition() {
                $('.modal').each(function() {
                    if ($(this).hasClass('in') == !1) {
                        $(this).show()
                    };
                    var contentHeight = $(window).height() - 60;
                    var headerHeight = $(this).find('.modal-header').outerHeight() || 2;
                    var footerHeight = $(this).find('.modal-footer').outerHeight() || 2;
                    $(this).find('.modal-content').css({
                        'max-height': function() {
                            return contentHeight
                        }
                    });
                    $(this).find('.modal-body').css({
                        'max-height': function() {
                            return (contentHeight - (headerHeight + footerHeight))
                        }
                    });
                    $(this).find('.modal-dialog').css({
                        'margin-top': function() {
                            return -($(this).outerHeight() / 2)
                        },
                        'margin-left': function() {
                            return -($(this).outerWidth() / 2)
                        }
                    });
                    if ($(this).hasClass('in') == !1) {
                        $(this).hide()
                    }
                })
            };
            $(window).resize(adjustModalMaxHeightAndPosition).trigger("resize");



        });

        (function() {
            $(window).scroll(function() {
                var nav = $("header"),
                    $this = $(this);
                if ($this.scrollTop() > 66) {
                    nav.addClass("sticky-header")
                } else {
                    nav.removeClass("sticky-header")
                }
            })
        })();




        $("body").on("click", ".close", function(e) {
            e.preventDefault();
            $(this).parent().removeClass('active');
            $(this).parent().prev(".edit").removeClass('active');
            $(this).parent().parent().parent().parent().removeClass('active')
        });

        $('[data-toggle="modal"]').on('click', function() {
            if (($(".modal").data('bs.modal') || {}).isShown) {
                var modal = $(".modal.in");
                $(modal).modal('hide')
            }
        });
        (function() {
            if (/ip(hone|od)|ipad/i.test(navigator.userAgent)) {
                $("body").css("cursor", "pointer")
            }
            $('.video-modal-btn').on("click", function(e) {
                $("#frame").attr("src", "https://www.youtube.com/embed/" + $(this).attr("video-id") + "?autoplay=1");
                return !0
            })
        }());
        $('#video-modal').on('hidden.bs.modal', function() {
            $("#frame").removeAttr("src", "https://www.youtube.com/embed/" + $(this).attr("video-id") + "?autoplay=1")
        });
        $(document).on('hidden.bs.modal', function(event) {
            if ($('.modal:visible').length) {
                $('body').addClass('modal-open')
            }
        });
        $(function() {
            var fourth_july = new Date();
            fourth_july = new Date(fourth_july.getFullYear(), 12 - 6, 04, 0, 0, 0);
            $('#january_to_july').countdown({
                until: fourth_july,
                alwaysExpire: !0,
                format: 'dHm',
                padZeroes: !0,
                //description: 'TO THE 4TH OF JULY',
                labels: ['&nbsp;Years', '&nbsp;Months', '&nbsp;WKS', '&nbsp;DAYS <span>&nbsp;</span>', '&nbsp;HOURS <span></span>&nbsp;', '&nbsp;MINUTES<span>&nbsp;</span>', '&nbsp;SECCONDS&nbsp;'],
                labels1: ['&nbsp;Year', '&nbsp;Month', '&nbsp;WK', '&nbsp;DAY <span>&nbsp;</span>', '&nbsp;HOUR <span></span>&nbsp;', '&nbsp;MINUTE<span>&nbsp;&nbsp;</span>', '&nbsp;SECCOND&nbsp;']
            })
        });
        var first_january = new Date();
        first_january = new Date(first_january.getFullYear(), 12 - 1, 31, 23, 59, 59);
        $('#july_january').countdown({
            until: first_january,
            alwaysExpire: !0,
            format: 'dHm',
            padZeroes: !0,
            //description: 'TO NEW YEARS EVE',
            labels: ['&nbsp;Years', '&nbsp;Months', '&nbsp;WKS', '&nbsp;DAYS <span>&nbsp;</span>', '&nbsp;HOURS <span></span>&nbsp;', '&nbsp;MINUTES<span>&nbsp;</span>', '&nbsp;SECONDS&nbsp;'],
            labels1: ['&nbsp;Year', '&nbsp;Month', '&nbsp;WK', '&nbsp;DAY <span>&nbsp;</span>', '&nbsp;HOUR <span></span>&nbsp;', '&nbsp;MINUTE<span>&nbsp;&nbsp;</span>', '&nbsp;SECOND&nbsp;']
        })
    });
    (function($, window, document, undefined) {
        $.fn.doubleTapToGo = function(params) {
            if (!('ontouchstart' in window) && !navigator.msMaxTouchPoints && !navigator.userAgent.toLowerCase().match(/windows phone os 7/i)) return !1;
            this.each(function() {
                var curItem = !1;
                $(this).on('click', function(e) {
                    var item = $(this);
                    if (item[0] != curItem[0]) {
                        e.preventDefault();
                        curItem = item
                    }
                });
                $(document).on('click touchstart MSPointerDown', function(e) {
                    var resetItem = !0,
                        parents = $(e.target).parents();
                    for (var i = 0; i < parents.length; i++)
                        if (parents[i] == curItem[0])
                            resetItem = !1;
                    if (resetItem)
                        curItem = !1
                })
            });
            return this
        }
    })(jQuery, window, document);
    jQuery(document).ready(function($) {
        $('.wp-megamenu li:has(ul)').doubleTapToGo()
    });
    ! function(t, i, e, s) {
        function o(i, e) {
            var h = this;
            "object" == typeof e && (delete e.refresh, delete e.render, t.extend(this, e)), this.$element = t(i), !this.imageSrc && this.$element.is("img") && (this.imageSrc = this.$element.attr("src"));
            var r = (this.position + "").toLowerCase().match(/\S+/g) || [];
            if (r.length < 1 && r.push("center"), 1 == r.length && r.push(r[0]), ("top" == r[0] || "bottom" == r[0] || "left" == r[1] || "right" == r[1]) && (r = [r[1], r[0]]), this.positionX != s && (r[0] = this.positionX.toLowerCase()), this.positionY != s && (r[1] = this.positionY.toLowerCase()), h.positionX = r[0], h.positionY = r[1], "left" != this.positionX && "right" != this.positionX && (this.positionX = isNaN(parseInt(this.positionX)) ? "center" : parseInt(this.positionX)), "top" != this.positionY && "bottom" != this.positionY && (this.positionY = isNaN(parseInt(this.positionY)) ? "center" : parseInt(this.positionY)), this.position = this.positionX + (isNaN(this.positionX) ? "" : "px") + " " + this.positionY + (isNaN(this.positionY) ? "" : "px"), navigator.userAgent.match(/(iPod|iPhone|iPad)/)) return this.imageSrc && this.iosFix && !this.$element.is("img") && this.$element.css({
                backgroundImage: "url(" + this.imageSrc + ")",
                backgroundSize: "cover",
                backgroundPosition: this.position
            }), this;
            if (navigator.userAgent.match(/(Android)/)) return this.imageSrc && this.androidFix && !this.$element.is("img") && this.$element.css({
                backgroundImage: "url(" + this.imageSrc + ")",
                backgroundSize: "cover",
                backgroundPosition: this.position
            }), this;
            this.$mirror = t("<div />").prependTo("body");
            var a = this.$element.find(">.parallax-slider"),
                n = !1;
            0 == a.length ? this.$slider = t("<img />").prependTo(this.$mirror) : (this.$slider = a.prependTo(this.$mirror), n = !0), this.$mirror.addClass("parallax-mirror").css({
                visibility: "hidden",
                zIndex: this.zIndex,
                position: "fixed",
                top: 0,
                left: 0,
                overflow: "hidden"
            }), this.$slider.addClass("parallax-slider").one("load", function() {
                h.naturalHeight && h.naturalWidth || (h.naturalHeight = this.naturalHeight || this.height || 1, h.naturalWidth = this.naturalWidth || this.width || 1), h.aspectRatio = h.naturalWidth / h.naturalHeight, o.isSetup || o.setup(), o.sliders.push(h), o.isFresh = !1, o.requestRender()
            }), n || (this.$slider[0].src = this.imageSrc), (this.naturalHeight && this.naturalWidth || this.$slider[0].complete || a.length > 0) && this.$slider.trigger("load")
        }

        function h(s) {
            return this.each(function() {
                var h = t(this),
                    r = "object" == typeof s && s;
                this == i || this == e || h.is("body") ? o.configure(r) : h.data("px.parallax") ? "object" == typeof s && t.extend(h.data("px.parallax"), r) : (r = t.extend({}, h.data(), r), h.data("px.parallax", new o(this, r))), "string" == typeof s && ("destroy" == s ? o.destroy(this) : o[s]())
            })
        }! function() {
            for (var t = 0, e = ["ms", "moz", "webkit", "o"], s = 0; s < e.length && !i.requestAnimationFrame; ++s) i.requestAnimationFrame = i[e[s] + "RequestAnimationFrame"], i.cancelAnimationFrame = i[e[s] + "CancelAnimationFrame"] || i[e[s] + "CancelRequestAnimationFrame"];
            i.requestAnimationFrame || (i.requestAnimationFrame = function(e) {
                var s = (new Date).getTime(),
                    o = Math.max(0, 16 - (s - t)),
                    h = i.setTimeout(function() {
                        e(s + o)
                    }, o);
                return t = s + o, h
            }), i.cancelAnimationFrame || (i.cancelAnimationFrame = function(t) {
                clearTimeout(t)
            })
        }(), t.extend(o.prototype, {
            speed: .2,
            bleed: 0,
            zIndex: -100,
            iosFix: !0,
            androidFix: !0,
            position: "center",
            overScrollFix: !1,
            refresh: function() {
                this.boxWidth = this.$element.outerWidth(), this.boxHeight = this.$element.outerHeight() + 2 * this.bleed, this.boxOffsetTop = this.$element.offset().top - this.bleed, this.boxOffsetLeft = this.$element.offset().left, this.boxOffsetBottom = this.boxOffsetTop + this.boxHeight;
                var t = o.winHeight,
                    i = o.docHeight,
                    e = Math.min(this.boxOffsetTop, i - t),
                    s = Math.max(this.boxOffsetTop + this.boxHeight - t, 0),
                    h = this.boxHeight + (e - s) * (1 - this.speed) | 0,
                    r = (this.boxOffsetTop - e) * (1 - this.speed) | 0;
                if (h * this.aspectRatio >= this.boxWidth) {
                    this.imageWidth = h * this.aspectRatio | 0, this.imageHeight = h, this.offsetBaseTop = r;
                    var a = this.imageWidth - this.boxWidth;
                    this.offsetLeft = "left" == this.positionX ? 0 : "right" == this.positionX ? -a : isNaN(this.positionX) ? -a / 2 | 0 : Math.max(this.positionX, -a)
                } else {
                    this.imageWidth = this.boxWidth, this.imageHeight = this.boxWidth / this.aspectRatio | 0, this.offsetLeft = 0;
                    var a = this.imageHeight - h;
                    this.offsetBaseTop = "top" == this.positionY ? r : "bottom" == this.positionY ? r - a : isNaN(this.positionY) ? r - a / 2 | 0 : r + Math.max(this.positionY, -a)
                }
            },
            render: function() {
                var t = o.scrollTop,
                    i = o.scrollLeft,
                    e = this.overScrollFix ? o.overScroll : 0,
                    s = t + o.winHeight;
                this.boxOffsetBottom > t && this.boxOffsetTop <= s ? (this.visibility = "visible", this.mirrorTop = this.boxOffsetTop - t, this.mirrorLeft = this.boxOffsetLeft - i, this.offsetTop = this.offsetBaseTop - this.mirrorTop * (1 - this.speed)) : this.visibility = "hidden", this.$mirror.css({
                    transform: "translate3d(0px, 0px, 0px)",
                    visibility: this.visibility,
                    top: this.mirrorTop - e,
                    left: this.mirrorLeft,
                    height: this.boxHeight,
                    width: this.boxWidth
                }), this.$slider.css({
                    transform: "translate3d(0px, 0px, 0px)",
                    position: "absolute",
                    top: this.offsetTop,
                    left: this.offsetLeft,
                    height: this.imageHeight,
                    width: this.imageWidth,
                    maxWidth: "none"
                })
            }
        }), t.extend(o, {
            scrollTop: 0,
            scrollLeft: 0,
            winHeight: 0,
            winWidth: 0,
            docHeight: 1 << 30,
            docWidth: 1 << 30,
            sliders: [],
            isReady: !1,
            isFresh: !1,
            isBusy: !1,
            setup: function() {
                if (!this.isReady) {
                    var s = t(e),
                        h = t(i),
                        r = function() {
                            o.winHeight = h.height(), o.winWidth = h.width(), o.docHeight = s.height(), o.docWidth = s.width()
                        },
                        a = function() {
                            var t = h.scrollTop(),
                                i = o.docHeight - o.winHeight,
                                e = o.docWidth - o.winWidth;
                            o.scrollTop = Math.max(0, Math.min(i, t)), o.scrollLeft = Math.max(0, Math.min(e, h.scrollLeft())), o.overScroll = Math.max(t - i, Math.min(t, 0))
                        };
                    h.on("resize.px.parallax load.px.parallax", function() {
                        r(), o.isFresh = !1, o.requestRender()
                    }).on("scroll.px.parallax load.px.parallax", function() {
                        a(), o.requestRender()
                    }), r(), a(), this.isReady = !0
                }
            },
            configure: function(i) {
                "object" == typeof i && (delete i.refresh, delete i.render, t.extend(this.prototype, i))
            },
            refresh: function() {
                t.each(this.sliders, function() {
                    this.refresh()
                }), this.isFresh = !0
            },
            render: function() {
                this.isFresh || this.refresh(), t.each(this.sliders, function() {
                    this.render()
                })
            },
            requestRender: function() {
                var t = this;
                this.isBusy || (this.isBusy = !0, i.requestAnimationFrame(function() {
                    t.render(), t.isBusy = !1
                }))
            },
            destroy: function(e) {
                var s, h = t(e).data("px.parallax");
                for (h.$mirror.remove(), s = 0; s < this.sliders.length; s += 1) this.sliders[s] == h && this.sliders.splice(s, 1);
                t(e).data("px.parallax", !1), 0 === this.sliders.length && (t(i).off("scroll.px.parallax resize.px.parallax load.px.parallax"), this.isReady = !1, o.isSetup = !1)
            }
        });
        var r = t.fn.parallax;
        t.fn.parallax = h, t.fn.parallax.Constructor = o, t.fn.parallax.noConflict = function() {
            return t.fn.parallax = r, this
        }, t(e).on("ready.px.parallax.data-api", function() {
            t('[data-parallax="scroll"]').parallax()
        })
    }(jQuery, window, document)
}(jQuery));

!function(t,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n():"function"==typeof define&&define.amd?define(n):(t=t||self).LazyLoad=n()}(this,(function(){"use strict";function t(){return(t=Object.assign||function(t){for(var n=1;n<arguments.length;n++){var e=arguments[n];for(var i in e)Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i])}return t}).apply(this,arguments)}var n="undefined"!=typeof window,e=n&&!("onscroll"in window)||"undefined"!=typeof navigator&&/(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),i=n&&"IntersectionObserver"in window,o=n&&"classList"in document.createElement("p"),a=n&&window.devicePixelRatio>1,r={elements_selector:"img",container:e||n?document:null,threshold:300,thresholds:null,data_src:"src",data_srcset:"srcset",data_sizes:"sizes",data_bg:"bg",data_bg_hidpi:"bg-hidpi",data_bg_multi:"bg-multi",data_bg_multi_hidpi:"bg-multi-hidpi",data_poster:"poster",class_applied:"applied",class_loading:"loading",class_loaded:"loaded",class_error:"error",load_delay:0,auto_unobserve:!0,cancel_on_exit:!1,callback_enter:null,callback_exit:null,callback_applied:null,callback_loading:null,callback_loaded:null,callback_error:null,callback_finish:null,callback_cancel:null,use_native:!1},c=function(n){return t({},r,n)},l=function(t,n){var e,i=new t(n);try{e=new CustomEvent("LazyLoad::Initialized",{detail:{instance:i}})}catch(t){(e=document.createEvent("CustomEvent")).initCustomEvent("LazyLoad::Initialized",!1,!1,{instance:i})}window.dispatchEvent(e)},s=function(t,n){return t.getAttribute("data-"+n)},u=function(t,n,e){var i="data-"+n;null!==e?t.setAttribute(i,e):t.removeAttribute(i)},d=function(t){return s(t,"ll-status")},f=function(t,n){return u(t,"ll-status",n)},_=function(t){return f(t,null)},g=function(t){return null===d(t)},v=function(t){return"delayed"===d(t)},b=["loading","applied","loaded","error"],p=function(t){return b.indexOf(d(t))>-1},m=function(t,n){return u(t,"ll-timeout",n)},h=function(t){return s(t,"ll-timeout")},E=function(t,n,e,i){t&&(void 0===i?void 0===e?t(n):t(n,e):t(n,e,i))},y=function(t,n){o?t.classList.add(n):t.className+=(t.className?" ":"")+n},L=function(t,n){o?t.classList.remove(n):t.className=t.className.replace(new RegExp("(^|\\s+)"+n+"(\\s+|$)")," ").replace(/^\s+/,"").replace(/\s+$/,"")},I=function(t){return t.llTempImage},k=function(t,n,e){if(e){var i=e._observer;i&&n.auto_unobserve&&i.unobserve(t)}},A=function(t){t&&(t.loadingCount+=1)},w=function(t){for(var n,e=[],i=0;n=t.children[i];i+=1)"SOURCE"===n.tagName&&e.push(n);return e},z=function(t,n,e){e&&t.setAttribute(n,e)},C=function(t,n){t.removeAttribute(n)},O=function(t){return!!t.llOriginalAttrs},x=function(t){if(!O(t)){var n={};n.src=t.getAttribute("src"),n.srcset=t.getAttribute("srcset"),n.sizes=t.getAttribute("sizes"),t.llOriginalAttrs=n}},N=function(t){if(O(t)){var n=t.llOriginalAttrs;z(t,"src",n.src),z(t,"srcset",n.srcset),z(t,"sizes",n.sizes)}},M=function(t,n){z(t,"sizes",s(t,n.data_sizes)),z(t,"srcset",s(t,n.data_srcset)),z(t,"src",s(t,n.data_src))},R=function(t){C(t,"src"),C(t,"srcset"),C(t,"sizes")},T=function(t,n){var e=t.parentNode;e&&"PICTURE"===e.tagName&&w(e).forEach(n)},G={IMG:function(t,n){T(t,(function(t){x(t),M(t,n)})),x(t),M(t,n)},IFRAME:function(t,n){z(t,"src",s(t,n.data_src))},VIDEO:function(t,n){w(t).forEach((function(t){z(t,"src",s(t,n.data_src))})),z(t,"poster",s(t,n.data_poster)),z(t,"src",s(t,n.data_src)),t.load()}},S=function(t,n,e){var i=G[t.tagName];i&&(i(t,n),A(e),y(t,n.class_loading),f(t,"loading"),E(n.callback_loading,t,e),E(n.callback_reveal,t,e))},j=["IMG","IFRAME","VIDEO"],D=function(t){t&&(t.loadingCount-=1)},F=function(t,n){!n||n.toLoadCount||n.loadingCount||E(t.callback_finish,n)},P=function(t,n,e){t.addEventListener(n,e),t.llEvLisnrs[n]=e},V=function(t,n,e){t.removeEventListener(n,e)},U=function(t){return!!t.llEvLisnrs},$=function(t){if(U(t)){var n=t.llEvLisnrs;for(var e in n){var i=n[e];V(t,e,i)}delete t.llEvLisnrs}},q=function(t,n,e){!function(t){delete t.llTempImage}(t),D(e),L(t,n.class_loading),k(t,n,e)},H=function(t,n,e){var i=I(t)||t;if(!U(i)){!function(t,n,e){U(t)||(t.llEvLisnrs={}),P(t,"load",n),P(t,"error",e),"VIDEO"===t.tagName&&P(t,"loadeddata",n)}(i,(function(o){!function(t,n,e,i){q(n,e,i),y(n,e.class_loaded),f(n,"loaded"),E(e.callback_loaded,n,i),F(e,i)}(0,t,n,e),$(i)}),(function(o){!function(t,n,e,i){q(n,e,i),y(n,e.class_error),f(n,"error"),E(e.callback_error,n,i),F(e,i)}(0,t,n,e),$(i)}))}},B=function(t){t&&(t.toLoadCount-=1)},J=function(t,n,e){!function(t){t.llTempImage=document.createElement("img")}(t),H(t,n,e),function(t,n,e){var i=s(t,n.data_bg),o=s(t,n.data_bg_hidpi),r=a&&o?o:i;r&&(t.style.backgroundImage='url("'.concat(r,'")'),I(t).setAttribute("src",r),A(e),y(t,n.class_loading),f(t,"loading"),E(n.callback_loading,t,e),E(n.callback_reveal,t,e))}(t,n,e),function(t,n,e){var i=s(t,n.data_bg_multi),o=s(t,n.data_bg_multi_hidpi),r=a&&o?o:i;r&&(t.style.backgroundImage=r,y(t,n.class_applied),f(t,"applied"),k(t,n,e),E(n.callback_applied,t,e))}(t,n,e)},K=function(t,n,e){!function(t){return j.indexOf(t.tagName)>-1}(t)?J(t,n,e):function(t,n,e){H(t,n,e),S(t,n,e)}(t,n,e),B(e),F(n,e)},Q=function(t){var n=h(t);n&&(v(t)&&_(t),clearTimeout(n),m(t,null))},W=function(t,n,e,i){"IMG"===t.tagName&&($(t),function(t){T(t,(function(t){R(t)})),R(t)}(t),function(t){T(t,(function(t){N(t)})),N(t)}(t),L(t,e.class_loading),D(i),E(e.callback_cancel,t,n,i),setTimeout((function(){i.resetElementStatus(t,i)}),0))},X=function(t,n,e,i){E(e.callback_enter,t,n,i),p(t)||(e.load_delay?function(t,n,e){var i=n.load_delay,o=h(t);o||(o=setTimeout((function(){K(t,n,e),Q(t)}),i),f(t,"delayed"),m(t,o))}(t,e,i):K(t,e,i))},Y=function(t,n,e,i){g(t)||(e.cancel_on_exit&&function(t){return"loading"===d(t)}(t)&&W(t,n,e,i),E(e.callback_exit,t,n,i),e.load_delay&&v(t)&&Q(t))},Z=["IMG","IFRAME"],tt=function(t){return t.use_native&&"loading"in HTMLImageElement.prototype},nt=function(t,n,e){t.forEach((function(t){-1!==Z.indexOf(t.tagName)&&(t.setAttribute("loading","lazy"),function(t,n,e){H(t,n,e),S(t,n,e),B(e),f(t,"native"),F(n,e)}(t,n,e))})),e.toLoadCount=0},et=function(t){var n=t._settings;i&&!tt(t._settings)&&(t._observer=new IntersectionObserver((function(e){!function(t,n,e){t.forEach((function(t){return function(t){return t.isIntersecting||t.intersectionRatio>0}(t)?X(t.target,t,n,e):Y(t.target,t,n,e)}))}(e,n,t)}),function(t){return{root:t.container===document?null:t.container,rootMargin:t.thresholds||t.threshold+"px"}}(n)))},it=function(t){return Array.prototype.slice.call(t)},ot=function(t){return t.container.querySelectorAll(t.elements_selector)},at=function(t){return function(t){return"error"===d(t)}(t)},rt=function(t,n){return function(t){return it(t).filter(g)}(t||ot(n))},ct=function(t){var n,e=t._settings;(n=ot(e),it(n).filter(at)).forEach((function(t){L(t,e.class_error),_(t)})),t.update()},lt=function(t,e){var i;this._settings=c(t),this.loadingCount=0,et(this),i=this,n&&window.addEventListener("online",(function(t){ct(i)})),this.update(e)};return lt.prototype={update:function(t){var n,o,a=this._settings,r=rt(t,a);(this.toLoadCount=r.length,!e&&i)?tt(a)?nt(r,a,this):(n=this._observer,o=r,function(t){t.disconnect()}(n),function(t,n){n.forEach((function(n){t.observe(n)}))}(n,o)):this.loadAll(r)},destroy:function(){this._observer&&this._observer.disconnect(),delete this._observer,delete this._settings,delete this.loadingCount,delete this.toLoadCount},loadAll:function(t){var n=this,e=this._settings;rt(t,e).forEach((function(t){K(t,e,n)}))},resetElementStatus:function(t){!function(t,n){p(t)&&function(t){t&&(t.toLoadCount+=1)}(n),f(t,null)}(t,this)},load:function(t){K(t,this._settings,this)}},lt.load=function(t,n){var e=c(n);K(t,e)},n&&function(t,n){if(n)if(n.length)for(var e,i=0;e=n[i];i+=1)l(t,e);else l(t,n)}(lt,window.lazyLoadOptions),lt}));

