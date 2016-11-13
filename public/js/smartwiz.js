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
