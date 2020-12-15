<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!--Bootstrap js-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--Owl-Carousel js-->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!--Magnific js-->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<!--wNumb js-->
<script src="{{ asset('js/wNumb.js') }}"></script>
<!--NoUiSlider js-->
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<!-- Isotop Js -->
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/custom-isotop.js') }}"></script>
<!-- Counter JS -->
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<!-- Way Points JS -->
<script src="{{ asset('js/waypoints-min.js') }}"></script>
<!-- Custom Clock JS -->
<script src="{{ asset('js/clock-custom.js') }}"></script>
<!--Main js-->
<script type="text/javascript" src="{{ asset('js/modal.js') }}" ></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
	 $('.brandcheck').change(function(){
        $('#loading').show();
        $('.games-category').hide();
         
        $.ajax({
                type: 'get',
                url:'{{url(session("locale"),"searchBrand")}}',
                data: $('#brandfilter').serialize(),
                datatype: 'html',
                success: function (data) {
                    $('#loading').hide();
                    $('.games-category').show();
                      
                    
                    $(".games-category").html(data.html);
            }
         });
    });
    $('.filter_select').change(function(){
        $('#loading').show();
        $('.games-category').hide();
        $.ajax({
                type: 'get',
                url:'{{url(session("locale"),"search")}}',
                data: $('.filter_select').serialize(),
                datatype: 'html',
                success: function (data) {
                    $('#loading').hide();
                    $('.games-category').show();
                      
                    $('select[name="name"]').val(0);
                    $('select[name="price"]').val(0);
                    $('select[name="latest"]').val(0);
                    $(".games-category").html(data.html);
            }
         });
    });


    $('#search_input').keyup(function(){
        var searchtext = $(this).val() ;
        if(searchtext != ''){
            $.ajax({
                type: 'get',
                url:'{{url(session("locale"),"auto-search")}}',
                data: {
                    search_input: searchtext 
                },
                success:function(response){
                    document.getElementById('show-list').style.display = 'block' ;
                    $('#show-list').html(response);
                }
            });
        }else{
            document.getElementById('show-list').style.display = 'none' ;
        }
    });

    $("#CountryCurr").change(function(){
        var curr = $(this).val()  ;
        let _token   = $('meta[name="csrf-token"]').attr('content');
        if(curr != ''){
            $.ajax({
                type: 'post',
                url:'{{url(session("locale"),"setcookie")}}',
                data: {
                    currency: curr ,
                     _token: _token
                },
                success:function(response){
                    location.reload() ;
                }
            });
        }
    });

    $("#close").click(function(){
         document.getElementById("myModal").style.display = "none";
    }) ;



    $("#couponID").click(function(){
        var voucher = document.getElementById('coupon_voucher').value ;
        let _token   = $('meta[name="csrf-token"]').attr('content');
       // var products = document.getElementById('products').value ;
        var total = document.getElementById('total').value ;

        if(voucher == ""){
            alert('Enter voucher code please') ;
            document.getElementById('coupon_voucher').focus() ;
            return false ;
        }

        $.ajax({
            type: 'get',
            url:'{{url(session("locale"),"apply_voucher")}}',
            data: {
                coupon: voucher ,
                 _token: _token,
                 total:total
            },
            datatype:'json',
            success:function(response){
                if(response == 'fail'){
                    document.getElementById('coupon_respone').style.display = 'block' ;
                    document.getElementById('coupon_respone').innerHTML = document.getElementById('coupon_msg').value ;
                }else if(response == 'fail1'){
                    document.getElementById('coupon_respone').style.display = 'block' ;
                    document.getElementById('coupon_respone').innerHTML = document.getElementById('coupon1_msg').value ;
                }else if(response == 'fail2'){
                    document.getElementById('coupon_respone').style.display = 'block' ;
                    document.getElementById('coupon_respone').innerHTML = document.getElementById('used_code').value ;
                }else{
                    var myObj = JSON.parse(response);
                    document.getElementById('real_total').innerHTML = document.getElementById('currency').value + " "+myObj.total ;
                    document.getElementById('discount').style.display ='block';
                    document.getElementById('discountamount').innerHTML =document.getElementById('currency').value + " "+'-'+myObj.discount; 
                    document.getElementById('coupon_voucher').readOnly = true ;
                    document.getElementById('coupon_delete').style.display = 'block' ;
                    document.getElementById('couponID').disabled = true;
                    document.getElementById('coupon_respone').style.display = 'none' ;
                }
            }
        });
    });

    $("#coupon_delete").click(function(){
        document.getElementById('real_total').innerHTML = document.getElementById('currency').value + " "+document.getElementById('total').value ;
        document.getElementById('discount').style.display ='none';
        document.getElementById('discountamount').innerHTML = "" ;
        document.getElementById('coupon_voucher').readOnly = false ;
        document.getElementById('coupon_voucher').value = "" ;
        document.getElementById('coupon_delete').style.display = 'none' ;
        document.getElementById('couponID').disabled = false;
        document.getElementById('coupon_respone').style.display = 'none' ;
    });


    $("#UpdateCart").click(function(){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        var products = [] ;
        
        $(".shop-cart-item").each(function(){
            var element = {} ;
            var product_id = $(this).find('#product_id').val()
            var qty = $(this).find("#quantity").val() ;
            var rowId = $(this).find("#rowId").val() ;
            element.product_id= product_id ;
            element.qty= qty ;
            element.rowId= rowId ;
            products.push(element) ;
        });
        $.ajax({
            type: 'post',
            url:'{{url(session("locale"),"update-cart")}}',
            data: {
                products: products ,
                _token: _token,
            },
            datatype:'json',
            success:function(response){
                location.reload();
            },
        });
    });

    $(".minus dis").click(function(){
        var qty = $("#quantity").val() ;
        //var newqty = qty - 1 ;
        document.getElementById('newQty').value = $(this).find('#quantity').val() ;
    });

    $(".plus").click(function(){
        var qty = $("#quantity").val() ;
        //var newqty = (qty + 1 );
        //alert(newqty);
        $(this).find('#newQty').val() = $(this).find('#quantity').val() ;
    });
    
});
</script>