$("#BtnAddCard").click(function(){

    // let userID = $(this).parent().attr('id');

    $.ajax({

        url : "APIs/api-add-card.php",
        method : "POST",
        data : $('form').serialize(),
        dataType : "JSON"

    })
    .done(function( jData ){

        if( jData.status == 0 ){

            $(location).attr('href', 'index.php');

        }else if( jData.status = 1 ){

            $(location).attr('href', 'profile.php');

        }

    })


    
    return false;

})

