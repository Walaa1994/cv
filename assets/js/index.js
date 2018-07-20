new WOW().init();
$(".rotate-btn").click(function(){
  $("#card-1").addClass("flipped");
});
$(".rotate-btn.back").click(function(){
  $("#card-1").removeClass("flipped");
});