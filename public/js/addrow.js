var i=0;
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