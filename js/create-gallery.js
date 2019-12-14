$('.createNewGallery').click(function(){


    console.log('create')
    $('#CreateGalleryBox').css('visibility', 'visible');


    $('.cancel').click(function(){


        $('#CreateGalleryBox').css('visibility', 'hidden');
        $('#CreateGalleryBox form input').val('');

    })

    Swal.fire({
        html : '<p>What is your new gallery called?</p>',
        input: 'text',
        showCancelButton: true,
        inputValidator: (value) => {
          if (!value) {
            return 'You need to write something!'
          }else{

                    $.ajax({

                        url : "APIs/api-create-gallery.php",
                        method : "POST",
                        data : {"tGalleryName": value },
                        dataType : "JSON"
                
                    })
                    .done(function( jData ){
                
                        if(jData.status == 1){
                
                        $(location).attr('href', 'galleries-overview.php');
                        }
                
                    })
                


          }
        }})

})

