$('#update_gallery_name').click(function(){
    
    let galleryId = $('.frmUploadImages').attr('id');

    Swal.fire({
      html : '<p>Enter the new gallery name here</p>',
      input: 'text',
      showCancelButton: true,
      inputValidator: (value) => {
        if (!value) {
          return 'You need to write something!'
        }else{


          $.ajax({
    
            url : "APIs/api-update-gallery-name.php",
            method : "POST",
            data : {"galleryId" : galleryId, "gallery_name_update": value},
            dataType : "JSON"
    
        })
        .done(function( jData ){
    
            if( jData.status == 1 ){
    
                $('.gallery_name').empty()
                $('.gallery_name').append(jData.galleryName);
                $('.update_gallery_name_form').hide();
            
                $('#delete_gallery').show();
                $('#update_gallery_name').show();
                $('#BtnUpload_images').show();

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
                    title: 'The name is updated succesfully!'
                  })
                
            }
    
    
        })

        }
      }
    })

  
})