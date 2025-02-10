$(document).ready(function()
{
   var Carousel2Opts =
   {
      delay: 3000,
      duration: 500,
      easing: 'linear',
      mode: 'forward',
      direction: '',
      scalemode: 1,
      pagination: true,
      pagination_img_default: 'images/page_default.png',
      pagination_img_active: 'images/page_active.png',
      start: 0
   };
   $("#Carousel2").on('activate', function(event, index)
   {
      switch(index)
      {
      }
   });
   $("#Carousel2").on('beforeActivate', function(event, index)
   {
      switch(index)
      {
         case 0:
            AnimateCss('Title1', 'transform-scale-in', 400, 500);
            AnimateCss('Review1', 'transform-lightspeed-in', 800, 500);
            AnimateCss('User1', 'animate-rotate-in-left', 800, 1000);
            break;
         case 1:
            AnimateCss('Title2', 'transform-scale-in', 500, 500);
            AnimateCss('Review2', 'transform-lightspeed-in', 800, 500);
            AnimateCss('User2', 'animate-rotate-in-left', 800, 1000);
            break;
         case 2:
            AnimateCss('Title3', 'transform-scale-in', 500, 500);
            AnimateCss('Review3', 'transform-lightspeed-in', 800, 500);
            AnimateCss('User3', 'animate-rotate-in-left', 800, 1000);
            break;
      }
   });
   $("#Carousel2").carousel(Carousel2Opts);
   var Carousel1Opts =
   {
      delay: 3000,
      duration: 500,
      easing: 'linear',
      mode: 'forward',
      direction: '',
      scalemode: 1,
      pagination: true,
      pagination_img_default: 'images/page_default.png',
      pagination_img_active: 'images/page_active.png',
      start: 0
   };
   $("#Carousel1").on('activate', function(event, index)
   {
      switch(index)
      {
      }
   });
   $("#Carousel1").on('beforeActivate', function(event, index)
   {
      switch(index)
      {
         case 0:
            AnimateCss('Title1', 'transform-scale-in', 400, 500);
            AnimateCss('Review1', 'transform-lightspeed-in', 800, 500);
            AnimateCss('User1', 'animate-rotate-in-left', 800, 1000);
            break;
         case 1:
            AnimateCss('Title2', 'transform-scale-in', 500, 500);
            AnimateCss('Review2', 'transform-lightspeed-in', 800, 500);
            AnimateCss('User2', 'animate-rotate-in-left', 800, 1000);
            break;
         case 2:
            AnimateCss('Title3', 'transform-scale-in', 500, 500);
            AnimateCss('Review3', 'transform-lightspeed-in', 800, 500);
            AnimateCss('User3', 'animate-rotate-in-left', 800, 1000);
            break;
      }
   });
   $("#Carousel1").carousel(Carousel1Opts);
   $("a[href*='#LayoutGrid4']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid4').offset().top-100 }, 600, 'easeOutQuad');
   });
   $("a[href*='#support']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_support').offset().top-100 }, 600, 'easeOutQuad');
   });
   function LayoutGrid6Scroll()
   {
      var $obj = $("#wb_LayoutGrid6");
      if (!$obj.hasClass("in-viewport") && $obj.inViewPort(false))
      {
         $obj.addClass("in-viewport");
         AnimationResume('FontAwesomeIcon1');
         AnimationResume('FontAwesomeIcon2');
         AnimationResume('wb_FontAwesomeIcon3');
         AnimationResume('FontAwesomeIcon4');
         AnimationResume('wb_Heading1');
         AnimationResume('wb_Heading2');
         AnimationResume('wb_Heading3');
         AnimationResume('Heading4');
         AnimationResume('wb_Text1');
         AnimationResume('wb_Text2');
         AnimationResume('Text3');
         AnimationResume('Text4');
      }
   }
   LayoutGrid6Scroll();
   $(window).scroll(function(event)
   {
      LayoutGrid6Scroll();
   });
   $("a[href*='#LayoutGrid5']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid5').offset().top-100 }, 600, 'easeOutQuad');
   });
   $("a[href*='#contact']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_contact').offset().top }, 600, 'easeOutCubic');
   });
   function FontAwesomeIcon3Scroll()
   {
      var $obj = $("#wb_FontAwesomeIcon3");
      if (!$obj.hasClass("in-viewport") && $obj.inViewPort(false))
      {
         $obj.addClass("in-viewport");
         AnimateCss('wb_FontAwesomeIcon3', 'transform-lightspeed-in', 100, 1000);
      }
   }
   FontAwesomeIcon3Scroll();
   $(window).scroll(function(event)
   {
      FontAwesomeIcon3Scroll();
   });
   function FontAwesomeIcon8Scroll()
   {
      var $obj = $("#wb_FontAwesomeIcon8");
      if (!$obj.hasClass("in-viewport") && $obj.inViewPort(false))
      {
         $obj.addClass("in-viewport");
         AnimateCss('wb_FontAwesomeIcon8', 'transform-lightspeed-in', 200, 1000);
      }
   }
   FontAwesomeIcon8Scroll();
   $(window).scroll(function(event)
   {
      FontAwesomeIcon8Scroll();
   });
   function FontAwesomeIcon11Scroll()
   {
      var $obj = $("#wb_FontAwesomeIcon11");
      if (!$obj.hasClass("in-viewport") && $obj.inViewPort(false))
      {
         $obj.addClass("in-viewport");
         AnimateCss('wb_FontAwesomeIcon11', 'transform-lightspeed-in', 400, 1000);
      }
   }
   FontAwesomeIcon11Scroll();
   $(window).scroll(function(event)
   {
      FontAwesomeIcon11Scroll();
   });
   function Heading8Scroll()
   {
      var $obj = $("#wb_Heading8");
      if (!$obj.hasClass("in-viewport") && $obj.inViewPort(false))
      {
         $obj.addClass("in-viewport");
         AnimateCss('wb_Heading8', 'transform-swing', 100, 1000);
      }
      else
      if ($obj.hasClass("in-viewport") && !$obj.inViewPort(true))
      {
         $obj.removeClass("in-viewport");
         AnimateCss('wb_Heading8', 'animate-fade-out', 0, 0);
      }
   }
   if (!$('#wb_Heading8').inViewPort(true))
   {
      $('#wb_Heading8').addClass("in-viewport");
   }
   Heading8Scroll();
   $(window).scroll(function(event)
   {
      Heading8Scroll();
   });
   function Heading1Scroll()
   {
      var $obj = $("#wb_Heading1");
      if (!$obj.hasClass("in-viewport") && $obj.inViewPort(false))
      {
         $obj.addClass("in-viewport");
         AnimateCss('wb_Heading1', 'transform-swing', 100, 1000);
      }
      else
      if ($obj.hasClass("in-viewport") && !$obj.inViewPort(true))
      {
         $obj.removeClass("in-viewport");
         AnimateCss('wb_Heading1', 'animate-fade-out', 0, 0);
      }
   }
   if (!$('#wb_Heading1').inViewPort(true))
   {
      $('#wb_Heading1').addClass("in-viewport");
   }
   Heading1Scroll();
   $(window).scroll(function(event)
   {
      Heading1Scroll();
   });
   function Heading2Scroll()
   {
      var $obj = $("#wb_Heading2");
      if (!$obj.hasClass("in-viewport") && $obj.inViewPort(false))
      {
         $obj.addClass("in-viewport");
         AnimateCss('wb_Heading2', 'transform-swing', 100, 1000);
      }
      else
      if ($obj.hasClass("in-viewport") && !$obj.inViewPort(true))
      {
         $obj.removeClass("in-viewport");
         AnimateCss('wb_Heading2', 'animate-fade-out', 0, 0);
      }
   }
   if (!$('#wb_Heading2').inViewPort(true))
   {
      $('#wb_Heading2').addClass("in-viewport");
   }
   Heading2Scroll();
   $(window).scroll(function(event)
   {
      Heading2Scroll();
   });
});
