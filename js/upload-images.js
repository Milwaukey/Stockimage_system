$('#BtnUpload_images').click(function(){

console.log('upload')

$('.upload_image_popup').addClass('upload_animationBox');

    $('.frmUploadImages').show();
    $('#UpdateNameGallery').show();
    $('#uploadImagesContainer').css('visibility', 'visible');



 



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

                $('.frmUploadImages').hide();
                $('#UpdateNameGallery').hide();
                $('#uploadImagesContainer').css('visibility', 'hidden');


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
                    title: 'The new image(s) is added! Just wait a second.'
                  })

                  setTimeout(function(){

                      window.location.reload(true);

                  },3000)


            
            }
    
    
        })
    
        return false;

    })


})


$('.btnCancel').click(function(){

    console.log('hej')


    $('.frmUploadImages').hide();
    $('#UpdateNameGallery').hide();
    $('#uploadImagesContainer').css('visibility', 'hidden');
    $('.upload_image_popup').removeClass('upload_animationBox');

})