$(function () { 
  $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
});  

$( window ).load(function() {
  // if($( window ).scrollTop() > 10){   scroll down abit and get the action   
  $(".progress-bar").each(function(){
    each_bar_width = $(this).attr('aria-valuenow');
    $(this).width(each_bar_width + '%');
  });
       
 //  }  
});

$("#sidebar li a").each(function() {
  if (this.href == window.location.href) {
    $(this).parents('li').addClass("active");
  }
});
$('#datepickId .input-group.date').datepicker({
  format: "dd/mm/yyyy",
  startDate: "01/01/1980",
  endDate: "30/12/2005",
  maxViewMode: 3,
  todayBtn: "linked",
  autoclose: true,
  todayHighlight: true,
  toggleActive: true
});