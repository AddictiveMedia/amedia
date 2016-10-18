jQuery(document).ready(function() {
  // toggle visibility of additional videos
  $('#showButton, #hideButton').on('click', function(e) {
    $('#more-videos, #showButtonDiv, #hideButtonDiv').toggleClass('hidden');
  });

  // smooth scrolling
  // scroll down to more-videos on clicking 'show more'
  // scroll back up to visible videos on clicking 'hide videos'
  $('a[href*="#"').click(function(){
    $('html, body').animate({
      scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
    return false;
  });
});