$('.createNewGallery').click(function(){


    console.log('create')
    $('#CreateGalleryBox').css('visibility', 'visible');


    $('.cancel').click(function(){


        $('#CreateGalleryBox').css('visibility', 'hidden');
        $('#CreateGalleryBox form input').val('');

    })



$("#BtnCreateGallery").click(function(){

    let photographerID = $(this).parent().attr('id');

    $.ajax({

        url : "APIs/api-create-gallery.php",
        method : "POST",
        data : $('form').serialize(),
        dataType : "JSON"

    })
    .done(function( jData ){

        
        // jData = JSON.parse(sData);
        console.log(jData.message);

        $(location).attr('href', 'profile.php');


    })


    
    return false;

})


})

