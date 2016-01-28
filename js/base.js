
/* init */
var scrollTop = $(document).scrollTop();

if( scrollTop > 80 )
    $('.lpm-page-header-fixed').fadeIn('fast')


// $( '.header-nav-menu-item' ).hover(
//   function() {
//     $( this ).find('.header-nav-sub-menu').fadeIn(200);
//   }, function() {
//     $( this ).find('.header-nav-sub-menu').fadeOut(300);
//   }
// );

$( '.header-nav-menu-item' ).click(
  function(event) {

    var $item = $(this);

    $item.toggleClass('open');

    return false;
    
    // add a listener to hide this
    // document.addEventListener("click", function(){
    //   alert('gg');
    //   $item.removeClass('open');
    // });
  }
);

$(document).click(function (e){

});

var onScroll = function(){
  
  var scrollTop = $(document).scrollTop();

  if( scrollTop > 80 )
    $('.lpm-page-header-fixed').fadeIn('fast')
  else
    $('.lpm-page-header-fixed').fadeOut('fast')
};

window.addEventListener('scroll', onScroll, false);


