(function() {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
      el = el.trim()
      if (all) {
        return [...document.querySelectorAll(el)]
      } else {
        return document.querySelector(el)
      }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
      let selectEl = select(el, all)
      if (selectEl) {
        if (all) {
          selectEl.forEach(e => e.addEventListener(type, listener))
        } else {
          selectEl.addEventListener(type, listener)
        }
      }
    }

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
      el.addEventListener('scroll', listener)
    }

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
      let position = window.scrollY + 200
      navbarlinks.forEach(navbarlink => {
        if (!navbarlink.hash) return
        let section = select(navbarlink.hash)
        if (!section) return
        if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
          navbarlink.classList.add('active')
        } else {
          navbarlink.classList.remove('active')
        }
      })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
      let header = select('#header')
      let offset = header.offsetHeight

      let elementPos = select(el).offsetTop
      window.scrollTo({
        top: elementPos - offset,
        behavior: 'smooth'
      })
    }

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
      const headerScrolled = () => {
        if (window.scrollY > 100) {
          selectHeader.classList.add('header-scrolled')
        } else {
          selectHeader.classList.remove('header-scrolled')
        }
      }
      window.addEventListener('load', headerScrolled)
      onscroll(document, headerScrolled)
    }

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
      const toggleBacktotop = () => {
        if (window.scrollY > 100) {
          backtotop.classList.add('active')
        } else {
          backtotop.classList.remove('active')
        }
      }
      window.addEventListener('load', toggleBacktotop)
      onscroll(document, toggleBacktotop)
    }

    /**
     * Mobile nav toggle
     */
    on('click', '.mobile-nav-toggle', function(e) {
      select('#navbar').classList.toggle('navbar-mobile')
      this.classList.toggle('fa-bars')
      this.classList.toggle('fa-xmark')
    })

    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function(e) {
      if (select('#navbar').classList.contains('navbar-mobile')) {
        e.preventDefault()
        this.nextElementSibling.classList.toggle('dropdown-active')
      }
    }, true)

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on('click', '.scrollto', function(e) {
      if (select(this.hash)) {
        e.preventDefault()

        let navbar = select('#navbar')
        if (navbar.classList.contains('navbar-mobile')) {
          navbar.classList.remove('navbar-mobile')
          let navbarToggle = select('.mobile-nav-toggle')
          navbarToggle.classList.toggle('fa-bars')
          navbarToggle.classList.toggle('fa-xmark')
        }
        scrollto(this.hash)
      }
    }, true)

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
      if (window.location.hash) {
        if (select(window.location.hash)) {
          scrollto(window.location.hash)
        }
      }
    });

    /**
     * Preloader
     */
    // let preloader = select('#preloader');
    // if (preloader) {
    //   window.addEventListener('load', () => {
    //     preloader.remove()
    //   });
    // }


    // $(window).on("load", function() {
    //     fadeOutTime = 500;
    //     sayHelloDuration = 5000;

    //     // function hideSayHello() {
    //     //     var sayHello = $('.say-hello');
    //     //     sayHello.fadeOut(fadeOutTime);
    //     // }

    //     function hidePreloader() {
    //         var preloader = $('.spinner-wrapper');
    //         preloader.fadeOut(fadeOutTime);
    //         setTimeout(function() {
    //             hideSayHello();
    //         }, sayHelloDuration);
    //     }
    //     hidePreloader();
    // });

    // let preloader = select('#preloader');
    // if (preloader) {

    // }
    $(window).on("load", function() {
        $.when($('#preloader').fadeOut(250));
    });

    // $(window).on("load", function() {
    //     fadeOutTime = 500;
    //     sayHelloDuration = 5000;
    //     var preloader = $('#preloader');
    //     preloader.fadeOut(fadeOutTime);
    //         setTimeout(function() {
    //         }, sayHelloDuration);
    //     // $.when($('#preloader').fadeOut(1000)).then(displaySplashPage);
    //     // $('#preloader').delay(1000).fadeOut('slow');
    //   });

    /**
     * Animation on scroll
     */
    window.addEventListener('load', () => {
      AOS.init({
        duration: 1000,
        easing: "ease-in-out",
        once: true,
        mirror: false
      });
    });

  })()


  $(document).ready(function () {
    var mySwiper = new Swiper(".tlswipe", {
      autoHeight: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      speed: 500,
      direction: "horizontal",
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      pagination: {
        el: ".tlswipe-pagination",
        type: "progressbar"
      },
      loop: false,
      effect: "slide",
      spaceBetween: 30,
      on: {
        init: function () {
          $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
          $(".swiper-pagination-custom .swiper-pagination-switch").eq(0).addClass("active");
        },
        slideChangeTransitionStart: function () {
          $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
          $(".swiper-pagination-custom .swiper-pagination-switch").eq(mySwiper.realIndex).addClass("active");
        }
      }
    });
    $(".swiper-pagination-custom .swiper-pagination-switch").click(function () {
      mySwiper.slideTo($(this).index());
      $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
      $(this).addClass("active");
    });
  });

