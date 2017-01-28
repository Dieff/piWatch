function fetchNewContent(url){
  $.ajax({
    url: url,
    })
  .done(function(resp) {
    $('#right_content').html(resp);
  });
};

$(document).ready(function(){
  //Sets the lefthand content to only ever take up 1/3 of page
  let navWidth = $(document).width()/3;
  if(navWidth > 300){
    navWidth = 300;
  }
  $('#left_navbar').width(navWidth).height($(document).height());
  $('#right_content').css('max-height', $(document).height() + 'px');

  var currentlySelectedTab = 'homepage';

  $('#left_navbar').children().width(navWidth-5).click((a) => {
    fetchNewContent($(a.currentTarget).find('span').html());
    $('#left_navbar').children().removeClass('ui-state-active');
    $(a.currentTarget).addClass('ui-state-active');
  });

  $('#homepage').click();
});
