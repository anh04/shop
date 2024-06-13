
function common(){
}
common.NAME         = "common";
common.VERSION      = "1.2";
common.DESCRIPTION  = "Class common";

common.prototype.constructor = common;
common.prototype = {
    btnMinus:function(el){
        $(el).unbind('click').bind('click',function(){
            var amount = parseInt($(this).closest('.closest-btn-action').find('.amount-prduct').val());
            if(amount >0) {
                amount--
                $(this).closest('.closest-btn-action').find('.amount-prduct').val(amount)
            }
        })
    },
    /***************************************************/
    btnPlus:function(el){
        $(el).unbind('click').bind('click',function(){
            var amount = parseInt($(this).closest('.closest-btn-action').find('.amount-prduct').val());
            amount++
            $(this).closest('.closest-btn-action').find('.amount-prduct').val(amount)
        })
    },
    /*********************************************************/
    btnAddtoCar:function(el){
        $(el + ' .btn-add-to-cart').unbind('click').bind('click',function(){
            common.prototype.addtoCart($(this))
        })
    },
    /*********************************************************/
    addtoCart:function($me,direct){
        var yourCart = localStorage.getItem('yourCart')
        var el = $me.closest('.specific-product')
        if(yourCart !='' && yourCart != null && yourCart != undefined){
            var amount_prduct = el.find('.amount-prduct').val()
            if(parseInt(amount_prduct) > 0){
                var pduct_add=el.find('.prd_id').val()
                var item_cart={}
                item_cart['amount']= amount_prduct
                item_cart['prd_id']= pduct_add
                item_cart['prd_name']= el.find('.prd_name').val()
                item_cart['prd_price']= el.find('.prd_price').val()
                item_cart['prd_regular_price']= el.find('.prd_regular_price').val()
                if(direct){
                    item_cart['prd_color']= el.find('.prd_color').val()
                    item_cart['prd_size']= el.find('.prd_size').val()
                    item_cart['prd_sex']= el.find('.prd_sex').val()
                }else{
                    var temp_path = el.find('.img-selected-source.selected').attr('src')
                    var pos = temp_path.lastIndexOf("/");
                    pos++
                    item_cart['prd_color']=temp_path.substr(pos);
                    item_cart['prd_size']=el.find('.prd-size.selected').text()
                    item_cart['prd_sex']="female";
                }

                var yourCart = JSON.parse(yourCart)
                //check existing product in cart
                var pduct_in_cart=false
                var amount = 0
                yourCart.forEach(function(itm){
                    if(parseInt(pduct_add) == itm.prd_id){
                        pduct_in_cart =true
                        if(direct){
                            itm.amount = parseInt(amount_prduct)
                        }else{
                            itm.amount = parseInt(amount_prduct) + parseInt(itm.amount)
                        }
                    }
                    amount += parseInt(itm.amount)
                })

                if(!pduct_in_cart){
                    amount += parseInt(amount_prduct)
                    yourCart.push(item_cart)
                }
                //console.log(yourCart)
                $('.amount-of-product-cart').text(amount)
                localStorage.setItem('yourCart',JSON.stringify(yourCart));
            }
        }else{
            yourCart =[];
            var item_cart={}
            var amount_prduct = el.find('.amount-prduct').val()
            var pduct_add=el.find('.prd_id').val()
            var item_cart={}
            item_cart['amount']= amount_prduct
            item_cart['prd_id']= pduct_add
            item_cart['prd_name']= el.find('.prd_name').val()
            item_cart['prd_price']= el.find('.prd_price').val()
            item_cart['prd_regular_price']= el.find('.prd_regular_price').val()

            if(direct){
                item_cart['prd_color']= el.find('.prd_color').val()
                item_cart['prd_size']= el.find('.prd_size').val()
                item_cart['prd_sex']= el.find('.prd_sex').val()
            }else{
                var temp_path = el.find('.img-selected-source.selected').attr('src')
                var pos = temp_path.lastIndexOf("/");
                pos++
                item_cart['prd_color']=temp_path.substr(pos);
                item_cart['prd_size']=el.find('.prd-size.selected').text()
                item_cart['prd_sex']="female";
            }

            yourCart.push(item_cart)

            $('.amount-of-product-cart').text(amount_prduct)

            localStorage.setItem('yourCart',JSON.stringify(yourCart));
        }
        $('#modal-success .modal-title').text('Add cart successfully')
        $('#modal-success').modal('show')
        setTimeout(function(){
            $('#modal-success').modal('hide')
        },1500)
    },

    /*********************************************************/
    removeProdductInCart:function($me){
        var yourCart = localStorage.getItem('yourCart')
        var el = $me.closest('.specific-product')
        if(yourCart !='' && yourCart != null && yourCart != undefined){
            var pduct_add=el.find('.prd_id').val()
            var amount_prduct = el.find('.amount-prduct').val()
            var amount = 0
            var yourCart = JSON.parse(yourCart)
            if(parseInt(amount_prduct) > 0){
                //check existing product in cart
                yourCart.forEach(function(itm){
                    if(parseInt(pduct_add) == itm.prd_id){
                        itm.amount = parseInt(amount_prduct)
                    }
                    amount += parseInt(itm.amount)
                })
                //console.log(yourCart)
                $('.amount-of-product-cart').text(amount)
                localStorage.setItem('yourCart',JSON.stringify(yourCart));
            }else{
                var i=0;
                yourCart.forEach(function(itm){
                    if(parseInt(pduct_add) == itm.prd_id){
                        yourCart.splice(i,1)
                        return
                    }
                    i++
                })

                if(yourCart.length >0){
                    yourCart.forEach(function(itm){
                        amount += parseInt(itm.amount)
                    })
                    $('.amount-of-product-cart').text(amount)
                    localStorage.setItem('yourCart',JSON.stringify(yourCart));
                }else{
                    $('.amount-of-product-cart').text(0)
                    localStorage.setItem('yourCart','');
                }
            }
        }
    }
    /********************************************************/
}
