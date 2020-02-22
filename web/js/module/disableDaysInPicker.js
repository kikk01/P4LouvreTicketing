/**
 * @param {array} days 
 * @param {*} picker 
 */
export function disableDaysInPicker(days, picker) {
    picker.set('disable', days);
}