(function(a) {
  'use strict';
  var el, radios, panes, self,
  
  $a = function(p,el,n) {
    // A quick way to rewrap elements into jqlite.
    return a.element(p.find(el)[n]);
  },

  animateRadios = function () {
    radios.find('label').removeClass('selected');
    a.element(panes).removeClass('selected');
    $a(radios,'label',self.radioValue).addClass('selected');
    a.element(panes[self.radioValue]).addClass('selected');
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
    animateRadios();
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
    self.setClasses();
  };

  a.module('flBanner', [])
    .directive('flBanner', function() {
      return {
        restrict: 'E',
        transclude: true,
        scope: {},
        controller: function ($scope, $element) {
          /* 
           * 1 - Check if browser have support for CSS transitions,
                 but needs modernizr.
           * 2 - Make an alias for the "transclude" div,
           * 3 - Make an alias for the radios nav,
           * 4 - Select every "li" tag and add it to the controller scope,
           */
          
          el = $element.children()[0], //1
          radios = $a($element,'nav',1), //2
          panes = $scope.panes = el.getElementsByTagName('li'), //3
          self = this;

          a.element(document).ready(function () {
            // 1 - Rewrap "data-ng-transclude" with jqlite, for easier access;
            // 2 - Set the first pannel as the default pannel.
            el = a.element(el); //1
            self.timerValue = 10000;
            self.radioValue = '0'; //2
            
            self.animateRadios = animateRadios,
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