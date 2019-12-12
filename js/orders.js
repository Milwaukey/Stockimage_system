$('.view_order').click(function(){


    let orderId = $(this).parent().children(':first-child').text().slice(7);

    console.log(orderId);


    $.ajax({

        url : 'APIs/api-retrive-order.php',
        method : 'POST',
        data: {"orderId" : orderId},
        dataType : 'JSON'


    }).done(function(jData){


        if(jData.status == 0){
            console.log('NULL')


            $('.download_container').empty();
            
            let appendItem = `
            
            <img class="order_download_image" src="images/IMG_8538.jpg">

            <h2>Order #${jData.paymentID}</h2>
            <hr>
    
            <div class="payment_info">
            <p><span>Card used:</span> ${jData.ibanCode}</p>
            <p><span>Price:</span> ${jData.price} DKK</p>
            <p><span>Paid at:</span> ${jData.payDate} </p>
            </div>
                
            `;

            $('.download_container').append(appendItem);


            $('.add_new_card').show();
            $('.cancel').click(function(){
                $('.add_new_card').hide();
            })

        }

        if(jData.status == 1){

            $('.download_container').empty();
            
            let appendItem = `
            
            <img class="order_download_image" src="${jData.photoFile}">

            <h2>Order #${jData.paymentID}</h2>
            <hr>
    
            <div class="payment_info">
            <p><span>Card used:</span> ${jData.ibanCode}</p>
            <p><span>Price:</span> ${jData.price} DKK</p>
            <p><span>Format:</span> ${jData.format} </p>
            <p><span>Dimensions:</span> ${jData.vDimensions} x ${jData.hDimensions}</p>
    
            <p><span>Paid at:</span> ${jData.payDate} </p>
            </div>
    
            <a class="download_button" href="${jData.photoFile}" download> Download</a>
            
            `;

            $('.download_container').append(appendItem);

            $('.add_new_card').show();


        }





    }) 


})

