$(document).ready(function () {


  // фикс хедера
  $(window).scroll(function(){
    var top = $(document).scrollTop();
    if (top > 155) {
     $('.menu').addClass('fixed');
    } else {
     $('.menu').removeClass('fixed');
    }
  });


  // слайдер партнеры
  $('.slider').slick({
    slidesToScroll:1,
    slidesToShow:1,
    // autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover:true,
    arrows:true,
    dots:false,
    responsive: [
    
    {
      breakpoint: 768,
      settings: {
        arrows:false
      }
    }
  ]
  });

  // слайдер партнеры
  $('.new-model__slider').slick({
    slidesToScroll:1,
    slidesToShow:1,
    // autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover:true,
    arrows:false,
    dots:true,
    responsive: [
    
    {
      breakpoint: 768,
      settings: {
        arrows:false
      }
    }
  ]
  });

  

  

    

      
    
      

      

  //  // кнопка "вверх"
  // if ($('#back-to-top').length) {
  //  var scrollTrigger = 100, // px
  //  backToTop = function () {
  //  var scrollTop = $(window).scrollTop();
  //  if (scrollTop > scrollTrigger) {
  //    $('#back-to-top').addClass('show');
  //    } else {
  //    $('#back-to-top').removeClass('show');
  //    }
  // };
  // backToTop();
  //  $(window).on('scroll', function () {
  //    backToTop();
  //  });
  //    $('#back-to-top').on('click', function (e) {
  //    e.preventDefault();
  //    $('html,body').animate({
  //      scrollTop: 0
  //    }, 800);
  //    });
  // };

  // Mobile menu
 $(document).on('click', '.ms-menu .trigger', function() {  
  var menu  = $(".ms-menu .trigger"),
   $this = $(this);

  $.each(menu,function(key,value){
  
   var condition = (
    $(this).hasClass("active") &&
    $(this).closest('li').hasClass("active") &&
    $(this).closest('li').children('ul').hasClass("active") &&
    $this.get(0) !== $(this).get(0)
   );

   if( condition ){
    $(this).toggleClass('active');
        $(this).closest('li').toggleClass('active');
        $(this).closest('li').children('ul').toggleClass('active');
        $(this).closest('li').children('ul').slideToggle(200);
      }
  });

    $(this).toggleClass('active');
    $(this).closest('li').toggleClass('active');
    $(this).closest('li').children('ul').toggleClass('active');
    $(this).closest('li').children('ul').slideToggle(200);
 });



   // Mobile Sidebar
    var mobileSidebar = function()
        {
            function obj()
            {
                var self = this;
                self.animSpeed = 400;
                self.init = function()
                {
                    self.events();
                },
                self.events = function()
                {
                    $('.sidebar-open').click(function() {
                        self.open();
                    });
                    $('.sidebar-close, .sidebar-overlay').click(function() {
                        self.close();
                    });
                },
                self.open = function()
                {
                    $('.sidebar').addClass('sidebar_opened');
                    $('.sidebar-overlay').fadeIn(self.animSpeed);
                    // pageScroll.hide(1);
                },
                self.close = function()
                {
                    $('.sidebar').removeClass('sidebar_opened');
                    $('.sidebar-overlay').fadeOut(self.animSpeed);
                    // pageScroll.show(0);
            }
        }
        return new obj();
        }();
        mobileSidebar.init();





       $('select,input').styler();

             //gallery-widget
      var speedAnimation = 500;     //скорость Анимации

      $('.b-gallery-widget__item').click(function(){

        var sourceImg = $(this).children('img').attr('src');

        $('.b-gallery-widget__photo img').hide();
        $('.b-gallery-widget__photo img').attr('src', sourceImg);
        $('.b-gallery-widget__photo img').fadeIn(speedAnimation);
        $('.b-gallery-widget__item').removeClass('b-gallery-widget__item_current');
        $(this).addClass('b-gallery-widget__item_current');
      });

      // Colorbox
        $('a.js-cbox-modal').colorbox({
          title: " ",
          previous: false,
          next: false,
          arrowKey: false,
          rel: false,
          overlayClose: true,
          opacity: 0.8,
          maxWidth: '100%',
          maxHeight: '100%',
          onComplete: function() {
            $('input, select').styler();
            $.colorbox.resize();
          }
        });

      





});

