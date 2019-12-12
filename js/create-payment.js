var stopBuy = 0;


let tBuyImage;


$(".BtnBuyImage").click(function(){

    $('.price_buy_image').empty();
    $('.photo_buy').empty();
    
    console.log(stopBuy);


    let tBuyImage = $(this).attr('id');

    let price_onScreen = $('.photo_price_' + tBuyImage).text();

    
    $('.price_buy_image').append(price_onScreen);
    $('.photo_buy').append('Image_' + tBuyImage);


    $('#select_card').show();


})





$('#select_card').change(function(){ 

    $('#select_card').append('<div class="btnBuy">BUY</div>');

    $('.btnBuy').click(function(){
    
    let price =  $('.price_buy_image').text();
    let cardID = $("#select_card option:selected").val();
    let photoId = $('.photo_buy').text().slice(6);

    console.log(photoId)

    $.ajax({

        url : "APIs/api-create-payment.php",
        method : "POST",
        data : { "tPhotoID" : photoId, "tCardID": cardID, "tPrice": price },
        dataType : "JSON"

    })
    .done(function( jData ){

        console.log(jData.test);

        if(jData.status == 1){


            Swal.fire(
                'Confirmed!',
                'Purchase went through',
                'success'
              )


            $('.swal2-confirm').click(function(){

                $(location).attr('href', 'orders.php');

            })
            
            

        }
    


    })

})
})

stopBuy++;


