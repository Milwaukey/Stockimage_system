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

        $(location).attr('href', 'index.php');


    })


    
    return false;

})

