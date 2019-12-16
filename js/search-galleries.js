$("#BtnSearch").click(function(){
    console.log('icon')

    $.ajax({

        url : "APIs/api-search-galleries.php",
        method : "POST",
        data : $('form').serialize(),
        dataType : "JSON"

    })
    .done(function( searchResults ){

        //APPEND SEARCH RESULTS TO ELEMENT

        $('#search_result').empty();

        ajSearchResults = JSON.parse(searchResults); // Convert the text into a object

        for( let jResults of ajSearchResults ) { // JSON OBJECT WITH JSON OBJECTS IN IT 


            console.log(jResults)

            let searchResults = 
            `<a href="gallery.php?id=${jResults.id}">
                <div> 
                    <div class="overlay">
                        <p>${jResults.name}</p>        
                        <div></div>
                    </div>
                    <img src="images/IMG_8538.jpg"> 
                </div>
            </a>`;

            $('#search_result').append(searchResults);


        } // END LOOP


    
    })
 

    return false;

})

