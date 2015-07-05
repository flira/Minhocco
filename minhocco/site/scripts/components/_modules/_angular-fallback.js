//load local version of angular if google CDN fails
!window.lteIE9 && !window.angular && document.write('<script src="scripts/angular.min.js"></script>');
//Same thing, but for old IE versions
window.lteIE9 && !window.angular && document.write('<script src="scripts/angular.fallback.min.js"></script>');