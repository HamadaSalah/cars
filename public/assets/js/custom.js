$(document).ready(function(){
    $(".fc-day").hover(function(){
      $(this).find(".fc-event-title").css("display", "block");
      }, function(){
        $(this).find(".fc-event-title").css("display", "none");
    });
  });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".selectTut").change(function(e){
  var $te = $(this);

    e.preventDefault();

    var name = $(this).val();
    // var password = $("input[name=password]").val();
    // var email = $("input[name=email]").val();

    $.ajax({
       type:'POST',
       url:"api/tut",
       data:{name:name},
       success:function(data){
        $te.parent().parent().closest(".mytutform").find("#Total").val(data.amount);
        $te.parent().parent().closest(".mytutform").find("#1stPaymt").val(Math.floor(data.amount/data.count));
        $te.parent().parent().closest(".mytutform").find("#2stPaymt").val(Math.floor(data.amount/data.count));
        $te.parent().parent().closest(".mytutform").find("#3stPaymt").val(Math.floor(data.amount/data.count));
        if(data.count == 4) {
          $te.parent().parent().closest(".mytutform").find("#4stPaymt").val(Math.floor(data.amount/data.count));
          $te.parent().parent().closest(".mytutform").find("#4stPaymt").parent().css("opacity", "1");

        }
        else {
          $te.parent().parent().closest(".mytutform").find("#4stPaymt").parent().css("opacity", "0");

        }
       }
    });

});


$(function(){
  $("#AddSTD").on('click', function(){
    var ele = $(this).closest('.mytutform').clone(true);
    $(this).closest('.mytutform').append(ele);
  })
})