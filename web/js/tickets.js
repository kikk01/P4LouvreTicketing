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
        var date = new Date();
        $('.js-datepicker').pickadate(
        {     
            disable:[           
                new Date(date.getFullYear(), 4, 1),     // disable 1st May(cause count begin january = 0) of  current year
                new Date(date.getFullYear()+1, 4, 1),   // and disable 1st may of next year
                new Date(date.getFullYear(), 10, 1),    // disable 1st Nov
                new Date(date.getFullYear()+1, 10, 1),
                new Date(date.getFullYear(), 11, 25),   // disable 25th Dec
                new Date(date.getFullYear()+1, 11, 25),
                2, 0                                       // disable tuesday & Sunday
            ],
            min: true,                                  // true = today     false remove limit
            max: new Date(date.setFullYear(date.getFullYear()+1)), 
            format: 'dd/mm/yyyy' 
        })
    }
});
