$(".BtnBuyImage").click(function(){

    
    let tBuyImage = $(this).attr('id');

    // HIDE / SHOW POP UP 
    
    $('#select_card').show();
    
    
    
    $('#select_card').change(function(){

        
        let cardID = $("#select_card option:selected").val();
        let price = $('.photo_price').text();
    
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
    
                  $('#select_card').hide();

            }
        


        })
            


    })


    return false;
    
})




"SELECT name, tusers.userID, count(tusers.userID) FROM tusers INNER JOIN tcards ON tcards.userID = tusers.userID INNER JOIN tpayments ON tcards.cardID = tpayments.cardID GROUP BY tusers.name DESC
"SELECT tcards.cardID, count(tcards.cardID) FROM tcards INNER JOIN tpayments ON tcards.cardID = tpayments.cardID GROUP BY tcards.cardID DESC