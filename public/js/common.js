/*ä¼—ç½‘ä¼ä¸šç½‘ç«™ç³»ç»ŸPHPç‰ˆ
http://www.zwebs.cn*/

$(document).ready(function(){
      //è¿”å›žé¡¶éƒ¨
      $("#gototop").click(function(){
          $("html,body").animate({scrollTop :0}, 800);return false;
      });
      $("#gotocate").click(function(){
           $("html,body").animate({scrollTop:$("#categories").offset().top},800);return false;
      });

      // æœç´¢
      $("#small_search").click(function(){
          $("#topsearch").slideToggle();
      });

      if($(window).width()>768){
          //é¼ æ ‡åˆ’è¿‡å°±å±•å¼€å­èœå•
          $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).slideDown();
          }, function() {
            $(this).find('.dropdown-menu').stop(true, true).slideUp();
          });
      }

      //å·¦ä¾§å¯¼èˆªèœå•
      // if ($("#firstpane .menu_body:eq(0)").text().replace(/[\r\n ]/g,"").length>0) {
      //   $("#firstpane .menu_body:eq(0)").show().prev().html("-").prev().addClass("left_active");
      // };
      $("ul.menu_body").each(function(){
       if ($(this).text().replace(/[\r\n ]/g,"").length<=0) {$(this).prev().remove();} //åŽ»æŽ‰span
      });

      $("#firstpane span.menu_head").click(function(){
          var spanatt = $(this).next("ul.menu_body").css('display');
          if (spanatt == "block"){
              var spantext = "+";
               $(this).prev().removeClass("left_active");
          }else{
              var spantext = "-";
              $(this).prev().addClass("left_active");
          }
          $(this).html(spantext).addClass("current").next("ul.menu_body").slideToggle(300).siblings("ul.menu_body");
      });

  
});