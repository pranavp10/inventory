$('.select2').select2();

$('#purchaseDate').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy'
});

$("#purchaseDate").on('change',function(){
    // for the id genetation
})
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return false;
    return true;
}  
