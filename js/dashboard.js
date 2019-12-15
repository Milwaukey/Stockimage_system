const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 10000,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: 'info',
    title: 'Updating data for dashboard!'
  })



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
            
            let order = `
            <div class="orders_info_dash">
                <p>${jResults.orderID}</p>
                <p>${jResults.photoID}</p>
                <p>${jResults.payDate}</p>
                <p>${jResults.price} DKK</p>
            </div>
            `;
            
            
            
            // `<div><p>Gallery name: ${jResults.galleryName}</p> <p>Photo ID: ${jResults.photoID}</p> <p>Price: ${jResults.price}</p><p>Pay Date: ${jResults.payDate}</p> </div>`;

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
            let topFiveImages = `
            
            <li><div class="top_images_img"><img src="${jResults.photoFile}"></div><p>Photo ID: ${jResults.photoID}</p></li>
            
            `;           
            
            
            // `<div><p>Count Buys: ${jResults.countBuys}</p> <p>Photo ID: ${jResults.photoID}</p> <img class="order_download_image" src="${jResults.photoFile}">  </div>`;

            $('.topFiveMostPopularImages').append(topFiveImages);


        } 
    })




    // TOP 5 CITIES
    $.ajax({
        
        url : 'APIs/api-top-five-cities.php',
        method : 'POST',
        dataType : 'JSON'
        
    }).done(function(jData){
        $('.topFiveCitysBoughtFrom').empty();


        // console.log(data);
        let dataValueForChart = [];
        let dataNameForChart = [];


        for(jCities of jData){

            dataValueForChart.push(jCities.countOfBuys);
            dataNameForChart.push(jCities.cityName);

        }
          
        var ctx = document.getElementById('myChart').getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
        
            // The data for our dataset
            data : {
                datasets: [{
                    data: dataValueForChart,
                    backgroundColor: [
                        '#E7F1EC',
                        '#49777e',
                        '#282828',
                        '#D3C979',
                        '#f9f9f9'                    ],
                }],
            
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: dataNameForChart,
                
            },
               
        
            // Configuration options go here
            options: {}
        });



    })










}, 10000)


