$(".btn-search").hover(function(){
  $(".input-search").toggleClass("active").focus;
  $(this).toggleClass("animate");
  $(".input-search").val("");
});