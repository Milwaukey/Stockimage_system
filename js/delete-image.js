$(".BtnDeleteImage").click(function(){

    let tDeleteImage = $(this).attr('id');
            
        $.ajax({
            
            url : "APIs/api-delete-photo.php",
            method : "POST",
            data : { "tPhotoID" : tDeleteImage },
            dataType : "JSON"
            
        })
        .done(function( jData ){   

            console.log('test');
            
            if( jData.status == 1 ){
                $('#photo_' + tDeleteImage).hide();
            }

        }).fail(function(){
            console.log('fail')
        })

        
})


