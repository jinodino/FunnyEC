
$(document).ready(function(){ 
    
    // toggle flag 
    // var toggleFlag = true;
    // $('.testbutton').click(function() {
    //     alert(1)
    //     // toggle flase width change 
    //     if ( toggleFlag == false) {  
    //         $('.product_view').width('86%'); 
    //     }
    //     $('.product_menu').toggle(300, function () {
    //         // toggle true width change 
    //         if ( toggleFlag == true) {
    //             toggleFlag = false;
    //             $('.product_view').width('100%'); 
    //         } else {
    //             toggleFlag = true;
    //         }
    //     });
    // });

    $('#loginbutton').click(function() {
        var customerId = $('#loginId').val();
        var customerPassword = $('#loginPassword').val();

        // ajax --start
        $.ajax({
            url : '/login'

            , type : 'post'
            , data : {
                customerId : customerId,
                customerPassword : customerPassword
            }
            , datetype : 'JSON'
            , success : function(res){
                
                var ss = JSON.parse(res);
                    
                if(res == "0") {
                    alert("nono");
                }else { 
                    $('#myModal').modal('hide');

                    $('.header_right_register').append("<a id='signout' onclick='logout()'>SING OUT</a>");   
                    
                    $('#signin').remove();

                }
            }   
            , error : function(){
                alert('Error');
            }
        });
    });
});

// toggle flag 
    var toggleFlag = true;
    $('.testbutton').click(function() {
        alert(1)
        // toggle flase width change 
        if ( toggleFlag == false) {  
            $('.product_view').width('86%'); 
        }
        $('.product_menu').toggle(300, function () {
            // toggle true width change 
            if ( toggleFlag == true) {
                toggleFlag = false;
                $('.product_view').width('100%'); 
            } else {
                toggleFlag = true;
            }
        });
    });

function logout() {

    $.ajax({
            url : '/logout'

            , type : 'post'
            , datetype : 'JSON'
            , success : function(res){
                location.reload();
                                    
            }   
            , error : function(){
                alert('Error');
            }
        });
}


// Select Menual Event 
function selectMenual(id) {
    
    var productName = $('#' + id).attr('value');
 

    $(".product_top").load("../../application/views/public/product_top_test.php");
    $(".product_top").height('130px');
    
    // ajax --start
    $.ajax({
        url : '/productload'

        , type : 'get'
        , data : {
            
        }
        , datetype : 'JSON'
        , success : function(res){
            
            $('#product_a_name').text("/ " + productName);
            $('#product_top_second_kind').text(productName + "'s シューズ");
            $('.product_menu').width('10%');
            $('.product_view').width('86%');
            var ss = JSON.parse(res);


            var productElement = "";
        
            ss.forEach(element => {
                productElement += '<div class="product_view_container">';
                productElement += '    <div class="product_view_container_piture" onclick=productInfoPageGo(' + element.num + ')>';
                productElement += '        <img src="' + element.src + '" alt="default"></img>';
                productElement += '    </div>';
                productElement += '    <div class="product_view_container_display">';
                productElement += '        <div class="product_info">';
                productElement += '            <span>' + element.title + '</span>';
                productElement += '        </div>';
                productElement += '    <div class="product_price"> ' + element.price + '</div>';
                productElement += '    </div>';
                productElement += '</div>';
            });
            $('.product_view').html(productElement);
            $('.productinfo_view').html(productElement);
        }   
        , error : function(){
            alert('Error');
        }
    });

}

function productInfoPageGo(num) {
    var infoPage = num;
    location.href = "/productInfo?productNum=" + infoPage;
}

var toggleFlag = true;
function toggle() {
    //toggle flag 
    if ( toggleFlag == false) {  
        $('.product_view').width('86%');
        $('.productinfo_view').width('86%'); 
    }

    // 상품 페이지 에서 토글
    $('.product_menu').toggle(300, function () {
        // toggle true width change 
        if ( toggleFlag == true) {
            toggleFlag = false;
            $('.product_view').width('100%');
            // $('.productinfo_view').width('100%'); 
        } else {
            toggleFlag = true;
        }
    });
    
    // 상품 상세 페이지 -> 상품 페이지 토글
    $('.product_info_menu').toggle(300, function () {
        // toggle true width change 
        if ( toggleFlag == true) {
            toggleFlag = false;
            // $('.product_view').width('100%');
            $('.productinfo_view').width('100%'); 
        } else {
            toggleFlag = true;
        }
    });
}