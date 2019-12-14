setInterval(function(){    
    
    // MONEY EARNED
    $.ajax({
        
        url : 'APIs/api-moneyEarned-dashboard.php',
        method : 'POST',
        dataType : 'JSON'
        
    }).done(function(data){

        ajMoneyEarned = JSON.parse(data); // Convert the text into a object

        for( let jResults of ajMoneyEarned ) { // JSON OBJECT WITH JSON OBJECTS IN IT 

            let oldValue =  $('.totalMoneyErned').text();
            if( jResults.amountPaid != oldValue ){

                $('.totalMoneyErned').empty();
                $('.totalMoneyErned').append(jResults.amountPaid);


            }


        } 
    })


    // ALL ORDERS
    $.ajax({
        
        url : 'APIs/api-get-Orders-dashboard.php',
        method : 'POST',
        dataType : 'JSON'
        
    }).done(function(data){
        $('.allOrdersWithNotDeletedImages').empty();

        for( let jResults of data ) { // JSON OBJECT WITH JSON OBJECTS IN IT 
            
            let order = `<div><p>Gallery name: ${jResults.galleryName}</p> <p>Photo ID: ${jResults.photoID}</p> <p>Price: ${jResults.price}</p> </div>`;

            $('.allOrdersWithNotDeletedImages').append(order);


        } 
    })




    // TOP 5 IMAGES
    $.ajax({
        
        url : 'APIs/api-top-five-images.php',
        method : 'POST',
        dataType : 'JSON'
        
    }).done(function(data){
        $('.topFiveMostPopularImages').empty();

        for( let jResults of data ) { // JSON OBJECT WITH JSON OBJECTS IN IT 
            let topFiveImages = `<div><p>Count Buys: ${jResults.countBuys}</p> <p>Photo ID: ${jResults.photoID}</p> <img class="order_download_image" src="${jResults.photoFile}">  </div>`;

            $('.topFiveMostPopularImages').append(topFiveImages);


        } 
    })




    // TOP 5 CITIES
    $.ajax({
        
        url : 'APIs/api-top-five-cities.php',
        method : 'POST',
        dataType : 'JSON'
        
    }).done(function(data){
        $('.topFiveCitysBoughtFrom').empty();

        for( let jResults of data ) { // JSON OBJECT WITH JSON OBJECTS IN IT 
            let topFiveCities = `<div>Count Buys: ${jResults.countOfBuys} City Name: ${jResults.cityName}  </div>`;

            $('.topFiveCitysBoughtFrom').append(topFiveCities);


        } 
    })



}, 10000)