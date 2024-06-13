
function product(){
}
product.NAME         = "product";
product.VERSION      = "1.2";
product.DESCRIPTION  = "Class product";

product.prototype.constructor = product;
product.prototype = {
    init: function(){
        $('.prd-img-btn').unbind('click').bind('click',function(){
            var $me = $(this)
            library_images.prototype.show_libraries($me)
        })

        $('.img-selected-source').unbind('click').bind('click',function(){
            var source = $(this).attr('src')
            if(source !=undefined){
               // console.log(source);
                $('#zoomed-image').attr('src', source)
                imageZoom("zoomed-image","zoom-result");
                $('.img-selected-source.selected').removeClass('selected')
                $(this).addClass('selected')
            }

        })

        $('.library-img-selected-source').unbind('click').bind('click',function(){
            var source = $(this).attr('src')
            if(source !=undefined){
                // console.log(source);
                $('#zoomed-image').attr('src', source)
                imageZoom("zoomed-image","zoom-result");
                $('.library-img-selected-source.selected').removeClass('selected')
                $(this).addClass('selected')
            }

        })

        $('.prd-size').bind('click',function(){
            $('.prd-size.selected').removeClass('selected')
            $(this).addClass('selected')
        })

        common.prototype.btnMinus('#p-product #minus-prduct-btn')
        common.prototype.btnPlus('#p-product #plus-prduct-btn')
        common.prototype.btnAddtoCar('#p-product')

        prd.search_product_type('#prd_type','search_product_type')
        $('#prd_type').append(js_prd_type_name).trigger('change')

    },

    /****************************/
   search_product_type:function(element,link1,callback){
        $(element).select2({
            placeholder: 'Search ',
            minimumInputLength: 1,
            language: {
                inputTooShort: function () {
                    return 'Search';
                }
            },
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "async": true,
                "crossDomain": true,
                url: api_link+link1,
                type: 'post',
                dataType: 'json',
                delay: 300,
                data: function (params) {
                    var _data = {text_search:params.term}
                    return _data;
                },
                processResults: function (data, params) {
                    data1 = $.map(data.prd_types, function (obj) {
                        return {
                            text:obj.prd_type_name ,
                            provider:obj.provider,
                            id:obj.prd_type_id
                        };
                    });
                    //console.log(data1);
                    return { results: data1 }

                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; },
            templateResult: function (data) {
                return '<div class="padding-5">' +
                    '<div class="select2-result-repository__title">' + data.text +'</div>' +
                    '<div class="pull-right">' + data.provider +'</div>' +
                    '</div>';

            },
            templateSelection: function (data) {
                if (!data.text) return data.id;
                else return data.text;
            }
        });
        if(callback) callback();
       
    },

    /*********************************************************/
}
var prd = new product();
$(function(){
    prd.init();
});