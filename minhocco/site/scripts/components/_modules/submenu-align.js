(function( ){
  'use strict';
  var lft = function (el) {
    return document.querySelector(el).offsetLeft;
  };
  var wdt = function (el) {
    return document.querySelector(el).offsetWidth;
  };
  var pos = function ( ) {
    var x = lft(".body-header .encap") + 85;
    x += lft(".main-menu-a.selected");
    x -= (wdt(".encap.sub-menu-list") / 2);
    $q(".encap.sub-menu-list").css('left',x + 'px');
  };
  $e(window).bind('resize', function(e) {
    pos();
  });
  pos( );
}());