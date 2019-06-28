$(document).ready(function(){
    displayMessage();
    $('.reduce-price').change(function() {
        displayMessage();
    })

    function displayMessage(){
        var displayMessage = false;
        $('.reduce-price').each(function(index, element){
            if (element.checked){
                displayMessage = true;
                //return false
            }
        })
        console.log(displayMessage);
        if(displayMessage === true){
            $('#reduce-price-message').css('visibility', 'visible');    
        }
        else{
            $('#reduce-price-message').css('visibility', 'hidden');
        }        
    }
})