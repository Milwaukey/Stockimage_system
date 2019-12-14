$(".BtnDeleteImage").click(function(){

    let tDeleteImage = $(this).attr('id');

    console.log(tDeleteImage)
            
        $.ajax({
            
            url : "APIs/api-delete-photo.php",
            method : "POST",
            data : { "tPhotoID" : tDeleteImage },
            dataType : "JSON"
            
        })
        .done(function( jData ){   

            
            if( jData.status == 1 ){
                $('#photo_' + tDeleteImage).hide();
            }

            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                onOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              
              Toast.fire({
                icon: 'success',
                title: 'The image was deleted succesfully!'
              })

        }).fail(function(){
            console.log('fail')
        })

        
})


