$("#BtnSignup").click(function(){

    $.ajax({

        url : "APIs/api-signup-user.php",
        method : "POST",
        data : $('form').serialize(),
        dataType : "JSON"

    })
    .done(function( jData ){

        
        // jData = JSON.parse(sData);
        console.log(jData.message);

        $(location).attr('href', 'login.php');


    })



    return false;

})

