import { disableBankHolidaysAjx } from './module/ajx/disableBankHolidaysAjx.js'
import { disableDaysInPicker } from './module/disableDaysInPicker.js'

$(document).ready(function(){
    let pickerElt = $('.js-datepicker');
    
    // init date picker
    pickerElt.pickadate({
        min: true,                  // true = today     false remove limit
        max: new Date(new Date().setFullYear(new Date().getFullYear() + 1)), 
        format: 'dd/mm/yyyy' 
    });

    let picker = pickerElt.pickadate('picker');console.log(picker);
    let currentYear = new Date().getFullYear();
    let nextYear    = new Date().getFullYear()+1;
    disableBankHolidaysAjx(currentYear, picker);
    disableBankHolidaysAjx(nextYear, picker);
    disableDaysInPicker([2,7], picker);
})