var i=0;
$(function () {
  $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
});
var clock;

$(document).ready(function() {

  clock = $('.clock').FlipClock(durasi*60, {
    clockFace: 'MinuteCounter',
    countdown: true,
    callbacks: {
      stop: function() {
        // window.location.href = 'http://google.com';
        // $('.message').html('The clock has stopped!');
      }
    }
  });

});
$( window ).load(function() {
  // if($( window ).scrollTop() > 10){   scroll down abit and get the action   
  $(".progress-bar").each(function(){
    each_bar_width = $(this).attr('aria-valuenow');
    $(this).width(each_bar_width + '%');
  });
 //  }  
});
$(document).ready(function() {
  $('#wizard').smartWizard({onLeaveStep:leaveAStepCallback,onFinish:onFinishCallback,enableFinishButton:true});

  $('#wizard_verticle').smartWizard({
    transitionEffect: 'slide'
  });
  function leaveAStepCallback(obj){
    var step_num= obj.attr('rel');
    return validateSteps(step_num);
  }

  function onFinishCallback(objs, context){
    if(validateAllSteps()){
      $('form').submit();
    }
  }
  function validateAllSteps(){
    var isStepValid = true;

    if(validateStep1() == false){
      isStepValid = false;
      $('#wizard').smartWizard('setError',{stepnum:1,iserror:true});
    }else{
      $('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
    }
    if(validateStep2() == false){
      isStepValid = false;
      $('#wizard').smartWizard('setError',{stepnum:2,iserror:true});
    }else{
      $('#wizard').smartWizard('setError',{stepnum:2,iserror:false});
    }

    if(validateStep3() == false){
      isStepValid = false;
      $('#wizard').smartWizard('setError',{stepnum:3,iserror:true});
    }else{
      $('#wizard').smartWizard('setError',{stepnum:3,iserror:false});
    }

    if(!isStepValid){
      $('#wizard').smartWizard('showMessage','Please correct the errors in the steps and continue');
    }

    return isStepValid;
  }

  function validateSteps(step){
    var isStepValid = true;
    // validate step 1
    if(step == 1){
      if(validateStep1() == false ){
        isStepValid = false;
        $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
      }else{
        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
      }
    }

    //validate step2

    if(step == 2){
      if(validateStep2() == false ){
        isStepValid = false;
        $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
      }else{
        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
      }
    }

    // validate step3
    if(step == 3){
      if(validateStep3() == false ){
        isStepValid = false;
        $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
      }else{
        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
      }
    }
    return isStepValid;
  }

  function validateStep1() {
    var isValid = true;
    var un = $('#judul').val();
    if(!un && un.length <= 0) {
      isValid = false;
    }
    return isValid;
  }
  function validateStep2() {
    var isValid = true;
    var un = $('#durasi').val();
    if(!un && un.length <= 0) {
      isValid = false;
    }
    return isValid;
  }
  function validateStep3() {
    var isValid = true;
    for(j=0;j<=i;j++) {
      if(isValid) {
        var un = $('#namaKD' + (i)).val();
        if (!un && un.length <= 0) {
          isValid = false;
        }
        var bn = $('#jumlahKD' + (i)).val();
        if (!bn && bn.length <= 0) {
          isValid = false;
        }
      }
    }
    return isValid;
  }

  $('.buttonFinish').addClass('btn btn-default');
  $('.buttonNext').addClass('btn btn-success');
  $('.buttonPrevious').addClass('btn btn-primary');
});

$(document).ready(function(){

  $("#add_row").click(function(){
    i++;
    $('#tab_logic').append('<div class="row" id="kd['+(i)+']">' +
        '<div class="col-md-1">' +
        (i+1) +
        '</div>' +
        '<div class="col-md-6">' +
        '<input name="kd['+(i)+'][nama]" id="namaKD'+(i)+'" type="text" placeholder="Nama KD" class="form-control input-md"  />' +
        '</div>' +
        '<div class="col-md-5">' +
        '<input  name="kd['+(i)+'][jumlah]" id="jumlahKD'+(i)+'"type="text" placeholder="Jumlah Soal"  class="form-control input-md">' +
        '</div>' +
        '</div>');
  });
  $("#delete_row").click(function(){
    if(i>0){
      var selector = "kd\\["+i+"\\]";
      $("#"+selector).remove();
      i--;
    }
  });

});

var editor_config = {
  path_absolute : "/",
  selector: "textarea.soal",
  height: 300,
  theme: 'modern',
  plugins: [
    'image imagetools tiny_mce_wiris'
  ],
  menubar: 'edit format',
  toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | tiny_mce_wiris_formulaEditor',
  relative_urls: false,
  file_browser_callback : function(field_name, url, type, win) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    if (type == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.open({
      file : cmsURL,
      title : 'Filemanager',
      width : x * 0.8,
      height : y * 0.8,
      resizable : "yes",
      close_previous : "no"
    });
  }
};
var soal_editor= {
  path_absolute : "/",
  selector: "textarea.jawaban",
  height: 100,
  theme: 'modern',
  plugins: [
    'image imagetools tiny_mce_wiris'
  ],
  menubar:false,
  toolbar1: 'link image tiny_mce_wiris_formulaEditor',
  file_browser_callback : function(field_name, url, type, win) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

    var cmsURL = soal_editor.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    if (type == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.open({
      file : cmsURL,
      title : 'Filemanager',
      width : x * 0.8,
      height : y * 0.8,
      resizable : "yes",
      close_previous : "no"
    });
  }
};
tinymce.init(editor_config);
tinymce.init(soal_editor);

$('div[data-form="deleteModal"]').on('click', '.form-delete', function(e){
  e.preventDefault();
  var $form=$(this);
  $('#delete').modal({ backdrop: 'static', keyboard: false })
      .on('click', '#delete-btn', function(){
        $form.submit();
      });
});
$('div[data-form="bannedModal"]').on('click', '.form-banned', function(e){
  e.preventDefault();
  var $form=$(this);
  $('#banned').modal({ backdrop: 'static', keyboard: false })
      .on('click', '#banned-btn', function(){
        $form.submit();
      });
});
$(document).ready(function(){
  var options = {
    legend: false,
    responsive: false
  };

  new Chart(document.getElementById("canvas1"), {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: {
      labels: [
        "Harian",
        "TKD",
        "USM"
      ],
      datasets: [{
        data: [quiz, tkd, usm],
        backgroundColor: [
          "#9B59B6",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#B370CF",
          "#36CAAB",
          "#49A9EA"
        ]
      }]
    },
    options: options
  });
});

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainerUSM",
      {
        title:{
          text: ""
        },
        theme: "theme2",
        animationEnabled: true,
        axisX: {
          valueFormatString: "Tryout #"
        },
        axisY:{
          valueFormatString: "#0"
        },
        data: [
          {
            type: "line",
            showInLegend: true,
            legendText: "Your Average Score",
            dataPoints: [
              { x: 1, y: 71, indexLabel: "gain", markerType: "triangle",  markerColor: "#6B8E23", markerSize: 12},
              { x: 2 , y: 55, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12  },
              { x: 3 , y: 50, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
              { x: 4 , y: 65, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
              { x: 5 , y: 85, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
              { x: 6 , y: 68, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
              { x: 7 , y: 28, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
              { x: 8 , y: 90, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
              { x: 9 , y: 24, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 }
            ]
          }
        ]
      });
  chart.render();
  var chart1 = new CanvasJS.Chart("chartContainerTKD",
      {
        title:{
          text: ""
        },
        theme: "theme2",
        animationEnabled: true,
        axisX: {
          valueFormatString: "Tryout #"
        },
        axisY:{
          valueFormatString: "#0"
        },
        data: [
          {
            type: "line",
            showInLegend: true,
            legendText: "Your Average Score",
            dataPoints: [
              { x: 1, y: 70, indexLabel: "gain", markerType: "triangle",  markerColor: "#6B8E23", markerSize: 12},
              { x: 2 , y: 55, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12  },
              { x: 3 , y: 50, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
              { x: 4 , y: 65, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
              { x: 5 , y: 85, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
              { x: 6 , y: 68, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
              { x: 7 , y: 28, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
              { x: 8 , y: 90, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
              { x: 9 , y: 24, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 }
            ]
          }
        ]
      });
  chart1.render();
}

