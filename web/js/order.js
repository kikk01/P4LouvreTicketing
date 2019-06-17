$(document).ready(function(){
    var bankHolidays = [];
    var currentYear = new Date().getFullYear();
    var nextYear = new Date().getFullYear()+1;
    var myvar = $('.js-datepicker').pickadate();
    var picker = myvar.pickadate('picker');
    getBankHolidaysAjx(currentYear, picker);
    getBankHolidaysAjx(nextYear, picker);

    var date = new Date();
    $('.js-datepicker').pickadate({
        min: true,                                  // true = today     false remove limit
        max: new Date(date.setFullYear(date.getFullYear()+1)), 
        format: 'dd/mm/yyyy' 
    });
    
    function getBankHolidaysAjx(year, picker){
        $.ajax({
            url: 'https://jours-feries-france.antoine-augusti.fr/api/'+year,
            type: 'GET',
            cache: false,
            error:function(err){
                console.log(err);
            },
            success:function(datas){
                setBankHolidays(datas, picker);
            }
        })
    }

    function setBankHolidays(datas){
        $.each(datas, function(i, d) {
            bankHolidays.push(new Date(d.date));
        });
        picker.set('disable', bankHolidays);
        picker.set('disable', [2,7]);
    }
})