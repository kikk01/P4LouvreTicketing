$(document).ready(function(){
    $('.js-datepickerBirth').pickadate(
    {    
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
       
})
