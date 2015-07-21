// Some functions to use angular.element with less characters

window.$q = function (query) {
  return angular.element(document.querySelectorAll(query));
};
window.$e = function (el) {
  return angular.element(el);
};