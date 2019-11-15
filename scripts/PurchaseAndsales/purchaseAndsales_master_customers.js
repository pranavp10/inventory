$('[data-mask]').inputmask()

$('#selectCity').select2();
$('#state').select2();


$("#state").on('change', function () {
    var state = $(this).val();
    $.ajax({
        //create an ajax request to display.php
        type: "POST",
        data: {
            "state": state
        },
        url: "../../../pages/PurchaseAndsales/master/get_city.php",
        success: function (response) {
            var cityNames = JSON.parse(response);
            console.log(cityNames);
            var display = '';
            var citySize = cityNames.length;
            for (let i = 0; i < citySize; i++) {
                display += `<option value="${cityNames[i].city}">${cityNames[i].city}</option>`
            }
            $('#selectCity').empty();
            $('#selectCity').append('<option value="-select-">-select-</option>');
            $('#selectCity').append(display);
        }
    });
});