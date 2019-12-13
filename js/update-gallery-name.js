$('#update_gallery_name').click(function(){
    $('.update_gallery_name_form input').val('');

    
    $('.update_gallery_name_form').show();
    
    
    $('.update_gallery_name_form button').click(function(){
        
        
        let galleryId = $(this).attr('class');
        let galleryName = $('.update_gallery_name_form .input_wrapper input').val();

        $.ajax({
    
            url : "APIs/api-update-gallery-name.php",
            method : "POST",
            data : {"galleryId" : galleryId, "gallery_name_update": galleryName},
            dataType : "JSON"
    
        })
        .done(function( jData ){
    
            if( jData.status == 1 ){
    
                $('.gallery_name').empty()
                $('.gallery_name').append(jData.galleryName);
                $('.update_gallery_name_form').hide();
            
                
            }
    
    
        })
      
        return false;


    })

    

})