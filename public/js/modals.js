
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