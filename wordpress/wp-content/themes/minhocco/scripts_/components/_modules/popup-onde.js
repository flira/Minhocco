$q('.grid-onde .local').bind('click', function(e){
  // Set self as ".grid-onde .local" even if currentTarget actually is ".fechar"
  var self = $e(e.currentTarget).hasClass('local') ? $e(e.currentTarget) : $e(e.currentTarget).parent().parent();
  // Close others popups
  $q('.grid-onde .local.selected').length && !self.hasClass('selected') && $q('.grid-onde .local.selected').removeClass('selected');
  self.hasClass('selected') ? self.removeClass('selected') : self.addClass('selected');
});