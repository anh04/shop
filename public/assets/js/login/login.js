
function login(){
}
login.NAME         = "login";
login.VERSION      = "1.2";
login.DESCRIPTION  = "Class login";

login.prototype.constructor = login;
login.prototype = {
    init: function(){
        $('.show-modal-login').unbind('click').bind('click',function(){
            lg.isCheckLogin()

        });

        $('.clss-logout').unbind('click').bind('click',function(){
            lg.logout()

        });

        $('#state').change(function(){
            var state = $(this).val()
            lg.getCitiesByState(state)
        })

        $('#city').change(function(){
            var city = $(this).val()
            lg.getZip(city)
        })

        $('#btn-register').unbind('click').bind('click',function(){
          //  $( "#register-form" ).trigger( "submit");
        })
    },
    /*******************************
    * isCheckLogin if has not login show modal login
    * was login logout
    */
     isCheckLogin:function(){
         var link3 =api_link+'checklogin';
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             "async": true,
             "crossDomain": true,
             "url": link3,
             "method": "get",
             dataType: 'json',
             error : function (status,xhr,error) {
                 console.log(error)
             },
             success: function (res) {
                 if(res.login=='1'){
                     console.log(res.login)
                     lg.logout()
                 }else{
                     $('#login-modal').modal('show')
                 }
             }
         });
     },
    /*************************************
        Log out
     */
    logout:function(){
        var link3 =api_link+'logout';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "GET",
            //contentType: 'application/json',
            error : function (status,xhr,error) {
            },
            success: function (res) {
                document.location.href = api_link
            }
        });
    },

    /**************************************
       get districts by city code
    ***************************************/
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

                $('#district').html(option)
                $('#ward').html('')
            },
            error : function (status,res,error) { }

        });
    },

    /**************************************
     get districts by city code
     **************************************/
    getCitiesByState:function(state){
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

                $('#city').html(option)
                $('#zip').html('')
            },
            error : function (status,res,error) { }

        });
    },

    /******************************************
     get ward by district code
     ******************************************/
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
                        option +='<option value='+item.ward_code+'>'+item.ward_name+'</option>'
                    })
                }

                $('#ward').html(option)
            },
            error : function (status,res,error) { }

        });
    },
    /******************************************
     get zip by city
     */
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

                $('#zip').html(option)
            },
            error : function (status,res,error) { }

        });
    }


}
var lg = new login();
$(function(){
    lg.init();
});
