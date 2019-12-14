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

            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                onOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              
              Toast.fire({
                icon: 'info',
                title: jData.message
              })

        }else if( jData.status = 1 ){

            $(location).attr('href', 'add-card.php');

        }

    })


    
    return false;

})

