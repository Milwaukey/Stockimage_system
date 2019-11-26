$("#BtnLogin").click(function(){

    $.ajax({

        url : "APIs/api-login.php",
        method : "POST",
        data : $('form').serialize(),
        dataType : "JSON"

    })
    .done(function( jData ){

    
        console.log(jData.message);

        if( jData.status == 0 ){

            $(location).attr('href', 'index.php');

        }else if( jData.status = 1 ){

            $(location).attr('href', 'profile.php');

        }


    })
  
    return false;

})

