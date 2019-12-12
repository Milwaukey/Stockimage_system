$('.btnOpenAddCard').click(function(){

$('.add_new_card').show();


$('.cancel').click(function(){


    $('.add_new_card').hide();


})


})




$("#BtnAddCard").click(function(){

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

