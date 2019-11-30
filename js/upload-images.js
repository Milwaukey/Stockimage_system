$('#BtnUpload_images').click(function(){


    $('.frmUploadImages').show();


    $('.frmUploadImages').submit(function(){


        var frmUploadImages = document.querySelector('.frmUploadImages');
        var data = new FormData(frmUploadImages);
        let galleryID = $('.frmUploadImages').attr('id');

        $.ajax({
    
            url : "APIs/api-upload-photo.php?galleryID=" + galleryID,
            method : "POST",
            data : data,
            contentType: false,
            processData: false,
            dataType : "JSON"
    
        })
        .done(function( jData ){


            console.log(jData)

            
            if(jData.status == 1){

                window.location.reload(true);

            }
    
    
        })
    
        return false;

    })


})

