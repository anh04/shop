
function product_file(){
    this.file_tranfer = new DataTransfer()
    this.was_changed =0;
}
product_file.NAME         = "product_file";
product_file.VERSION      = "1.2";
product_file.DESCRIPTION  = "Class product_file";

product_file.prototype.constructor = product_file;
product_file.prototype = {
    init: function(){
        //files
        $('#library-area').on('click','.exsiting-file-delete',function(){
            $(this).closest('.row').remove();
        })

        $("#prd_library").on('change', function(e){
            var fileBloc ='';
            for(var i = 0; i < this.files.length; i++){
                fileBloc +='<div class="row  mt-2" style="width: 100%">' +
                    '<div class="col-10 file-name">'+this.files.item(i).name+'</div>' +
                    '<div class="col-2 file-delete text-right" style="cursor: pointer"><fa class="fa fa-trash text-danger"></fa></div>' +
                    '</div>'
            };
            $("#files-area").append(fileBloc);

            for (let file of this.files) {
                prd_f.file_tranfer.items.add(file);
            }

            this.files = prd_f.file_tranfer.files;

            $('#files-area .file-delete').click(function(){
                let name = $(this).closest('.row').find('.file-name').text();
                $(this).parent().remove();
                for(let i = 0; i < prd_f.file_tranfer.items.length; i++){
                    // Correspondance du fichier et du nom
                    if(name === prd_f.file_tranfer.items[i].getAsFile().name){
                        prd_f.file_tranfer.items.remove(i);
                        continue;
                    }
                }
                document.getElementById('prd_library').files = prd_f.file_tranfer.files;
            });
        });


    },
    /*********************************************************/


}
var prd_f = new product_file();
$(function(){
    prd_f.init();
});