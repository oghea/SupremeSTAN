var i=0;

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
