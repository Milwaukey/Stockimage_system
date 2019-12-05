$("#BtnCreateGallery").click(function(){

    let photographerID = $(this).parent().attr('id');

    $.ajax({

        url : "APIs/api-search-galleries.php",
        method : "POST",
        data : $('form').serialize(),
        dataType : "JSON"

    })
    .done(function( jData ){

        console.log(jData.message);
        //APPEND SEARCH RESULTS TO ELEMENT




    })


    
    return false;

})

