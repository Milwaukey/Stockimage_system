$("#BtnCreateGallery").click(function(){

    let photographerID = $(this).parent().attr('id');

    $tUser2bDeleted = $_SESSION['ID']
    $.ajax({

        url : "APIs/api-delete-users.php",
        method : "GET",
        data : {"id":$tUser2bDeleted},
        dataType : "JSON"

    })
    .done(function( jData ){

        
        // jData = JSON.parse(sData);
        console.log(jData.message);

        $(location).attr('href', 'index.php');


    })


    
    return false;

})

