import { disableDaysInPicker} from '../disableDaysInPicker.js';

/**
 * 
 * @param {string} year 
 * @param {*} picker
 */
export function disableBankHolidaysAjx(year, picker){
    $.ajax({
        url: 'https://jours-feries-france.antoine-augusti.fr/api/'+year,
        type: 'GET',
        cache: false,
        error:function(err){
            console.log(err);
        },
        success:function(data){
            let bankHolidays = [];
            $.each(data, function(i, d) {
                bankHolidays.push(new Date(d.date));
            });

            disableDaysInPicker(bankHolidays, picker)
        }
    })
}