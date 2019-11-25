$("#BtnAddCard").click(function(){

    let userID = $(this).parent().attr('id');

    $.ajax({

        url : "APIs/api-add-card.php",
        method : "POST",
        data : $('form').serialize() + "&userID=" + userID,
        dataType : "JSON"

    })
    .done(function( jData ){

        
        // jData = JSON.parse(sData);
        console.log(jData.message);

        // $(location).attr('href', 'index.php');


    })


    
    return false;

})

