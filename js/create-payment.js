$(".BtnBuyImage").click(function(){

    
    let tBuyImage = $(this).attr('id');

    // HIDE / SHOW POP UP 
    
    $('#select_card').show();
    
    
    
    $('#select_card').change(function(){
        
        
        let cardID = $("#select_card option:selected").val();
    
        $.ajax({
    
            url : "APIs/api-create-payment.php",
            method : "POST",
            data : { "tPhotoID" : tBuyImage, "tCardID": cardID, "tPrice": 100 },
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
