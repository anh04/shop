function filter(){
}
filter.NAME         = "filter";
filter.VERSION      = "1.2";
filter.DESCRIPTION  = "Class filter";

filter.prototype.constructor = filter;
filter.prototype = {
    init: function(){
        $('.btn-filter').unbind('click').bind('click',function(){
            this.classList.toggle("btn-custom-active");
            if($('.filtering').hasClass('hidden-clss')){
                $('.filtering').removeClass('hidden-clss')
                $('.filtering-active').removeClass('p-x')
                $('.filtering-active').addClass('p-s')
                $('.filtering-active').removeClass('w-100')
            }else{
                $('.filtering').addClass('hidden-clss')

                $('.filtering-active').addClass('w-100')
                $('.filtering-active').removeClass('p-s')
                $('.filtering-active').addClass('p-x')
            }
            //console.log("test");
        });
    },

}

var pmt = new filter();
$(function(){
    pmt.init();
});
