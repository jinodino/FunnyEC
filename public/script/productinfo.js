$(document).ready(function(){
    $('.product_count_text').prop('disabled', true);
       $(document).on('click','#plus',function(){
        $('.product_count_text').val(parseInt($('.product_count_text').val()) + 1 );
    });
    $(document).on('click','#minus',function(){
        $('.product_count_text').val(parseInt($('.product_count_text').val()) - 1 );
            if ($('.product_count_text').val() == 0) {
                $('.product_count_text').val(1);
            }
    });
 });

 function sizeCheck(id) {

    var buttonId = id;
    var count = $( '.size_button' ).children().length;
    
    $("#" + buttonId).css("color", "white");
    $("#" + buttonId).css("background-color", "black");
    

    for (let index = 1; index <= count; index++) {

        var backgroundColor = $("#size" + index).css("background-color");

        if( "size" + index != id ) {
            // $("#size" + index).css("background-color", "black");
            // $("#size" + index).css("background-color", "white");
            $("#size" + index).css("background-color", "white");
            $("#size" + index).css("color", "black");
        }else {
            // $("#size" + index).css("background-color", "black");
            
        }
    }

    
    // backgroundColor == "rgb(0, 0, 0)" &&

 }