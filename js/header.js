// $( '.header-nav-menu-item' ).hover(
//   function() {
//     $( this ).find('.header-nav-sub-menu').fadeIn(200);
//   }, function() {
//     $( this ).find('.header-nav-sub-menu').fadeOut(300);
//   }
// );

$( '.header-nav-menu-item' ).click(
  function() {
    $( this ).toggleClass('open');
  }
);