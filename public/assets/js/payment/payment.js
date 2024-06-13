function payment(){
}
payment.NAME         = "payment";
payment.VERSION      = "1.2";
payment.DESCRIPTION  = "Class payment";

payment.prototype.constructor = payment;
payment.prototype = {
    init: function(){
        $('#p-cart .shipment_city').change(function(){
            var state = $(this).val()
            pmt.getCityByState(state)
        })

        $('#p-cart .shipment_district').change(function(){
            var city = $(this).val()
            pmt.getZip(city)
        })

        $('#p-cart .btn-pay-now').unbind('click').bind('click',function(){
           // pmt.validateForm()
            pmt.payment()
        })
    },
    validateForm:function(){
        $("#form-payment").validate({
            rules: {
                full_name: "required",
                shipment_phone: "required",
                shipment_email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                full_name: "Please enter your full name",
                shipment_phone: "Please enter your phone",
                shipment_email: "Please enter a valid email address"
            },

            submitHandler: function(form) {

                form.submit();
            }
        });

    },
    /*******************************
     get districts by city code
     ******************************/
    getDistrictsCity:function(city){
        var link3 =api_link+'get_districts';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "get",
            data:{district_city_code:city},
            dataType: 'json',
            //contentType: 'application/json',
            success: function (res) {
                var option ="<option></option>"
                if(res.districts.length > 0){
                    res.districts.forEach(function(item){
                        option +='<option value='+item.district_code+'>'+item.district_name+'</option>'
                    })
                }
                //console.log(option)
                $('#p-cart .shipment_district').html(option)
                $('#p-cart .shipment_village').html('')
            },
            error : function (status,res,error) { }

        });
    },
    /*******************************
     get districts by city code
     ******************************/
    getCityByState:function(state){
        var link3 =api_link+'get_cities';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "get",
            data:{state:state},
            dataType: 'json',
            //contentType: 'application/json',
            success: function (res) {
                var option ="<option></option>"
                if(res.cities.length > 0){
                    res.cities.forEach(function(item){
                        option +='<option value='+item.city+'>'+item.city+'</option>'
                    })
                }
                //console.log(option)
                $('#p-cart .shipment_district').html(option)
                $('#p-cart .shipment_village').html('')
            },
            error : function (status,res,error) { }

        });
    },
    /*********************************
     get ward by district code
     *********************************/
    getWardDistrict:function(district){
        var link3 =api_link+'get_wards';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "get",
            data:{ward_district_code:district},
            dataType: 'json',
            //contentType: 'application/json',
            success: function (res) {
                var option ="<option></option>"
                if(res.wards.length > 0){
                    res.wards.forEach(function(item){
                        option +='<option value='+item.ward_id+'>'+item.ward_name+'</option>'
                    })
                }

                $('#p-cart .shipment_ward').html(option)
            },
            error : function (status,res,error) {
               console.log(error);
            }
        });
    },
    /*********************************
     get zip by city code
     *********************************/
    getZip:function(city){
        var link3 =api_link+'get_zips';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "get",
            data:{city:city},
            dataType: 'json',
            //contentType: 'application/json',
            success: function (res) {
                var option ="<option></option>"
                if(res.zips.length > 0){
                    res.zips.forEach(function(item){
                        option +='<option value='+item.zip+'>'+item.zip+'</option>'
                    })
                }

                $('#p-cart .shipment_ward').html(option)
            },
            error : function (status,res,error) {
                console.log(error);
            }
        });
    },
    /*
     payment
     */
    payment:function(){
        var method = ''
        var data_post = {}
        $('#p-cart .el').each(function(){
            var key = $(this).attr('key_clmn')
            if(key=="shipment_city"){
                var value = $(this).find("option:selected").text()
                data_post[key] =value;
            }else if(key=="shipment_district"){
                var value = $(this).find("option:selected").text()
                data_post[key] =value;
            }else if(key=="shipment_ward"){
                var value = $(this).find("option:selected").text()
                data_post[key] =value;
            }else if(key=="method"){
                method = $(this).val()
            }else{
                var value = $(this).val()
                data_post[key] =value;
            }

        });

        var data = {
            data_post:data_post,
            yourCart : localStorage.getItem('yourCart'),
            discount_code : localStorage.getItem('discount_code'),
            discount_value : localStorage.getItem('discount_value'),
            method:method
        }
        var link3 =api_link+'checkout/payment/';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "POST",
            dataType: 'json',
            data:data,
            //contentType: 'application/json',
            success: function (res) {
               if(res.error !=undefined){
                   $('#form-payment').addClass('was-validated')
               }else{
                   $('#form-payment').removeClass('was-validated')
                   localStorage.setItem('yourCart','');
                   localStorage.setItem('discount_code','');
                   localStorage.setItem('discount_value',0);
                   document.location.href = api_link+'order/'+res.order_id
               }
            },
            error : function (status,res,error) { }

        });
    },
    /*
     payment
     */
    getOrder:function(order_id){
        var link3 =api_link+'checkout/order/';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "get",
            dataType: 'json',
            data:{order_id:order_id},
            //contentType: 'application/json',
            success: function (res) {
            },
            error : function (status,res,error) { }

        });
    }
}

var pmt = new payment();
$(function(){
    pmt.init();
});
