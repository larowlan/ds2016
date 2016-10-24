$.getJSON( "http://localhost:8080/blogs", function( data ) {
  var items = [];
  $.each( data, function( key, val ) {
    $('.blog-main').append(function(index, html) {
      return "<div class='blog-post'><h2 class='blog-post-title'>" + val.title + "</h2><p>" + val.body + "</p></div>";
    });
  });
});
