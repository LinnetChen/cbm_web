$(function () {
    /*----nav----*/
    $('.open_menu').click(function () {
        $(this).toggleClass('close');
        $('nav').toggleClass('open');
        $('html,body').toggleClass('notscroll');
    });
    $('nav a').click(function () {
        $('.open_menu').removeClass('close');
        $('nav').removeClass('open');
    });
	
	/*-----TOP-----*/
    $(function () {
        $("#gotop").click(function () {
            jQuery("html,body").animate({
                scrollTop: 0
            }, 1000);
        });
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('#gotop').fadeIn("fast");
            } else {
                $('#gotop').stop().fadeOut("fast");
            }
        });
    });

    /*----main Banner----*/
    const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        autoplay: true,
        loop: true,
        allowTouchMove: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

    });

    /*----Job----*/
	const job_thumbs = new Swiper('.job_thumbs', {
		spaceBetween: 10,
		slidesPerView: 9,
		loop: true,
		freeMode: true,
		loopedSlides: 9, //looped slides should be the same
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
	});
    const job_info = new Swiper('.job_info', {
        direction: 'horizontal',
        loop: true,
		loopedSlides: 9,
		spaceBetween: 10,
		slidesPerView: 9,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        allowTouchMove: true,
		navigation: {
		nextEl: ".next-job",
		prevEl: ".prev-job",
		},
		thumbs: {
		swiper: job_thumbs,
		},
    });
	    

    //公告
    var _showTab = 0;
    $('.mainNews').each(function () {
        var $tab = $(this);
        var $defaultLi = $('.info_tab li', $tab).eq(_showTab).addClass('active');
        $($defaultLi.find('a').attr('href')).siblings().hide();
        $('ul.info_tab li', $tab).click(function () {
            var $this = $(this),
                _clickTab = $this.find('a').attr('href');
            $this.addClass('active').siblings('.active').removeClass('active');
            $(_clickTab).stop(false, true).addClass('active').siblings().removeClass('active');
            return false;
        }).find('a').focus(function () {
            this.blur();
        });
    });

    /*----Feature----*/
    const feature = new Swiper('.feature-swiper', {
        direction: 'horizontal',
        autoplay: true,
        loop: true,
        effect: 'creative',
        speed: 600,
        slidesPerView: 1,
        creativeEffect: {
            prev: {
                shadow: false,
                translate: ["100%", 0, -1],
            },
            next: {
                translate: ["100%", 0, 0],
                shadow: false,
            }
        },
        allowTouchMove: true,
        pagination: {
            el: ".feature-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: '.next-btn',
            prevEl: '.prev-btn',
        },

    });  
	
	/*----War (mobile device)----*/
	$('.warRed').click(function () {
        $('#war').addClass('red');
    });
	$('.warBlue').click(function () {
        $('#war').removeClass('red');
    });
	
	
 }); 	
	

