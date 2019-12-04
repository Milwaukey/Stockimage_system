$(".BtnBuyImage").click(function(){

    
    let tBuyImage = $(this).attr('id');
    
    // HIDE / SHOW POP UP 
    
    $('#select_card').show();

    
    $('#select_card').change(function(){
        
        
        let price = $('.photo_price_' + tBuyImage).text();
        let cardID = $("#select_card option:selected").val();
    
        $.ajax({
    
            url : "APIs/api-create-payment.php",
            method : "POST",
            data : { "tPhotoID" : tBuyImage, "tCardID": cardID, "tPrice": price },
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

                    $(location).attr('href', 'profile.php');

                })
                
                

            }
        


        })
            


    })


    return false;
    
})
