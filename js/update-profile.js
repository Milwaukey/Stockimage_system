$('.BtnUpdateImage').click(function(){

    $('.Update_personal_info').show();

    
})





$('.Update_personal_info form button').click(function(){

    $.ajax({

        url : "APIs/api-update-profile.php",
        method : "POST",
        data : $('form').serialize(),
        dataType : "JSON"

    })
    .done(function( jData ){
        
        if(jData.status == 1){

            setInterval(function(){

                $(location).attr('href', 'profile.php');

            }, 100)



                $('.Update_personal_info').hide();
                            
        }


    })

    return false;

})