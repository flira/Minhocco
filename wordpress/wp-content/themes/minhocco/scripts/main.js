//load local version of angular if google CDN fails
!window.lteIE9 && !window.angular && document.write('<script src="scripts/angular.min.js"></script>');
//Same thing, but for old IE versions
window.lteIE9 && !window.angular && document.write('<script src="scripts/angular.fallback.min.js"></script>');
// Some functions to use angular.element with less characters

window.$q = function (query) {
  return angular.element(document.querySelectorAll(query));
};
window.$e = function (el) {
  return angular.element(el);
};
(function(ng) {
  'use strict';
  var el, radios, panes, self,

  $a = function(p,el,n) {
    // A quick way to rewrap elements into jqlite.
    return ng.element(p.find(el)[n]);
  },

  animateRadiosFn = function () {
    radios.find('label').removeClass('selected');
    ng.element(panes).removeClass('selected');
    $a(radios,'label',self.radioValue).addClass('selected');
    ng.element(panes[self.radioValue]).addClass('selected');
  },

  repeatItensFn = function () {
    var first = ng.element(panes[0]).clone(),
        last = ng.element(panes[panes.length - 1]).clone();
        ng.element(first).addClass('dummy');
        ng.element(last).addClass('dummy');
        el.find('ul').prepend(last);
        el.find('ul').append(first);
  },

  setClassesFn = function () {
    //add important visual classes
    var obj = {
      'ul': 'list',
      'li': 'item',
      'a': 'a',
      'img': 'img',
      'figure': 'fig'
    };
    for (var i in obj) {
      el.find(i).addClass('fl-banner-' + obj[i]);
    }
    self.animateRadios();
  },

  adjustSizesFn = function () {
    // Method to keep the banner width the same as it's parent
    var i = panes.length;
    el.find('ul').css('width',i * 100 + '%');
    el.find('li').css('width', 100 / i + '%');
  },

  changeRadioValueFn = function(v,e) {
    /*
     * Method to change "this.radioValue" before moving the banner,
     * preventing it to change to a value out of bounds
     * 2 - Kill banner timer.
     */
    v = v ? v : 1;
    if(e) {
      e.preventDefault();
      window.clearInterval(self.timer); //1
    }
    self.radioValue = parseFloat(self.radioValue) + v +'';
    if(self.radioValue == -1 ) self.radioValue = panes.length - 1 + '';
    if(self.radioValue == panes.length) self.radioValue = 0;
    self.moveBanner();
  },

  moveBannerFn = function() {
    animateRadiosFn();
    if (!window.TweenLite) {
      el.find('ul').css('left', (-self.radioValue * 100) + '%');
    }
    else {
      TweenLite.to(el.find('ul')[0], .75, {
        left: (-self.radioValue * 100) + '%',
        ease: Power2.easeInOut
      });
    }
  },

  initFn = function () {
    self.adjustSizes();
    window.onresize = self.adjustSizes;
    //self.repeatItens();
    self.setClasses();
  };

  ng.module('flBanner', [])
    .directive('flBanner', function() {
      return {
        restrict: 'E',
        transclude: true,
        scope: {},
        controller: function ($scope, $element) {
          /*
           * 1 - Make an alias for the "transclude" div,
           * 2 - Make an alias for the radios nav,
           * 3 - Removes dummy "li" from the "panes"
           */

          el = $element.children()[0], //1
          radios = $a($element,'nav',1), //2
          panes = $scope.panes =  el.getElementsByTagName('li'),
          self = this;
          console.log('here');

          ng.element(document).ready(function () {
            // 1 - Rewrap "data-ng-transclude" with jqlite, for easier access;
            // 2 - Set the first pannel as the default pannel.
            el = ng.element(el); //1
            self.trueLength = panes.length;
            self.timerValue = 10000;
            self.radioValue = '0'; //2

            self.animateRadios = animateRadiosFn,
            self.repeatItens = repeatItensFn,
            self.setClasses = setClassesFn,
            self.adjustSizes = adjustSizesFn,
            self.changeRadioValue = changeRadioValueFn,
            self.moveBanner = moveBannerFn;
            self.timer = window.setInterval(self.changeRadioValue, self.timerValue);
            self.init = initFn;

            self.init();
          });
        },
        controllerAs: 'flBannerCtrl',
        template:
        '<div class="fl-banner-holder" role="banner">' +
          '<div class="fl-banner-tc" data-ng-transclude></div>' +
          '<div class="fl-banner-ctrl">' +
            '<nav class="fl-banner-arrows">' +
              '<ul>' +
                '<li>' +
                  '<a class="fl-banner-arrow-prev" href="#anterior" aria-label="anterior" data-ng-click="flBannerCtrl.changeRadioValue(-1, $event)"></a>' +
                '</li>' +
                '<li>' +
                  '<a class="fl-banner-arrow-next" href="#proximo" aria-label="próximo" data-ng-click="flBannerCtrl.changeRadioValue(1, $event)"></a>' +
                '</li>' +
              '</ul>' +
            '</nav>' +
            '<nav class="fl-banner-radio">' +
              '<ul>' +
                '<li data-ng-repeat="pane in panes">' +
                  '<input type="radio" class="fl-banner-radio-input" id="fl-radio-{{$index}}" name="fl-banner-radio" value="{{$index}}" data-ng-model="flBannerCtrl.radioValue" data-ng-change="flBannerCtrl.moveBanner()"/>' +
                  '<label class="fl-banner-radio-btn" for="fl-radio-{{$index}}">imagem {{$index+1}}</label>' +
                '</li>' +
              '</ul>' +
            '</nav>' +
          '</div>' +
        '</div>',
        replace: true
      };
    });
}(angular));
$q('.grid-onde .local').bind('click', function(e){
  // Set self as ".grid-onde .local" even if currentTarget actually is ".fechar"
  var self = $e(e.currentTarget).hasClass('local') ? $e(e.currentTarget) : $e(e.currentTarget).parent().parent();
  // Close others popups
  $q('.grid-onde .local.selected').length && !self.hasClass('selected') && $q('.grid-onde .local.selected').removeClass('selected');
  self.hasClass('selected') ? self.removeClass('selected') : self.addClass('selected');
});
(function( ){
  'use strict';
  var lft = function (el) {
    return document.querySelector(el).offsetLeft;
  };
  var wdt = function (el) {
    return document.querySelector(el).offsetWidth;
  };
  var pos = function ( ) {
    if ($q(".encap.sub-menu-list").length) {
      var x = lft(".body-header .encap") + 85;
      x += lft(".main-menu-a.selected");
      x -= (wdt(".encap.sub-menu-list") / 2);
      $q(".encap.sub-menu-list").css('left',x + 'px');
    }
  };
  $e(window).bind('resize', function(e) {
    pos();
  });
  pos( );
}());
(function(a){
    'use strict';
    a.element(document.getElementsByTagName('html')).removeClass('no-js');
    a.module('minhocco', ['flBanner']);
}(angular));
