$(document).ready(function()
{
   $("a[data-rel='GTransporte']").attr('rel', 'GTransporte');
   $("a[rel^='GTransporte']").fancybox({});
   $("a[data-rel='PhotoGallery1']").attr('rel', 'PhotoGallery1');
   $("a[rel^='PhotoGallery1']").fancybox({});
   $("a[data-rel='PhotoGallery2']").attr('rel', 'PhotoGallery2');
   $("a[rel^='PhotoGallery2']").fancybox({});
   $("a[data-rel='PhotoGallery3']").attr('rel', 'PhotoGallery3');
   $("a[rel^='PhotoGallery3']").fancybox({});
   $("a[data-rel='PhotoGallery4']").attr('rel', 'PhotoGallery4');
   $("a[rel^='PhotoGallery4']").fancybox({});
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
});
