$(".BtnDeleteImage").click(function(){

    let tDeleteImage = $(this).attr('id');


        $.ajax({
    
            url : "APIs/api-delete-photo.php",
            method : "POST",
            data : { "tPhotoID" : tDeleteImage },
            dataType : "JSON"
    
        })
        .done(function( jData ){
    
            console.log(jData.message);

            
            if( jData.status == 1 ){

                console.log( tDeleteImage );

            }


            // $('#photo_' + tDeleteImage).remove();


        })
            

})


    