$(document).ready(function() {
    // Récupération de l'élément qui contient le protoype
    let $container = $('div#louvre_ticketingbundle_command_tickets');
    let counter = 0;

    displayTickets();
    addDatePicker();
    // Récupération de la valeur de l'input à chaque fois qu'elle change
    $('#louvre_ticketingbundle_command_quantity').on('input', displayTickets);
    
    function displayTickets() {
        
        counter = $container.children().length; // Définition du compteur  de ticket
        let inputVal = $('#louvre_ticketingbundle_command_quantity').val();               // Définition de la valeur de l'input

        // Controle de la validité de la saisie
        if (inputVal > 0) {
            let diff = inputVal - counter;          // Compare la valeur de la saisie par apport au compteur
            
            // Ajout de ticket
            if (diff > 0) { 
                while (diff > 0) {
                    createNewWidget();
                    counter ++;
                    diff --;
                }
            }

            // Suppression de ticket
            else if (diff < 0) {
                while (diff < 0){
                    $container.children().last().remove();
                    diff ++;
                }
            }
            addDatePicker();
        }
    };

    function createNewWidget() {
        let template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Ticket n°' + (counter+1))
            .replace(/__name__/g, counter);
        let $prototype = $(template);
        $container.append($prototype);  
        $container.addClass("row");
        $container.children().addClass("col-sm-6 col-md-3");
    }

    function addDatePicker() {
        $('.js-datepickerBirth').pickadate(
        {    
            // allow picker to appear at the top of input if it is a the bottom of page
            onOpen: function(){
                var container  = $(this.$node).next('.picker');
                var classState = exceedsBottomViewport(container, '.picker__box');
                
                if(classState){
                    container.addClass('picker--drop-up');
                }
            },
            selectMonths: true,
            selectYears: true,
            selectYears: 90, 
            max: new Date(), 
            format: 'dd/mm/yyyy' 
        })   
        
        function exceedsBottomViewport(container, elem){
            var dropdown  = container.find(elem),
            dropdown_top    = dropdown.offset().top - document.documentElement.scrollTop,
            dropdown_height = dropdown.height(),
            viewport_height = document.documentElement.clientHeight;
            
            return dropdown_top + dropdown_height > viewport_height;
        }
    }  
});

