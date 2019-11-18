$('#fromDate').datepicker({
  autoclose: true,
  format: 'dd-mm-yyyy'
});
$('#toDate').datepicker({
  autoclose: true,
  format: 'dd-mm-yyyy'
});
$('#editFromDate').datepicker({
  autoclose: true,
  format: 'dd-mm-yyyy'
});
$('#editToDate').datepicker({
  autoclose: true,
  format: 'dd-mm-yyyy'
});

$('#customerId').select2();

$.ajax({
  //create an ajax request to display.php
  type: "POST",
  url: "../../../pages/PurchaseAndsales/master/get_credit_limit_id.php",
  success: function(response) {
    var id = JSON.parse(response);
    id = +id + 1;
    $("#creditLimitId").val(`CCL-${id}`);
  }
});

$(document).ready(function() {
  $(".editCreditLimit").on("click", function() {
    $("#editCreditLimit").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();

    $("#editCreditLimitId").val(data[0]);
    $("#editCustomerId").val(data[1]);
    $("#editFromDate").val(data[2]);
    $("#editToDate").val(data[3]);
    $("#editCreditLimitValue").val(data[4]);
  });
});
$(document).ready(function() {
  $(".deleteCreditLimit").on("click", function() {
    $("#deleteCreditLimit").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();
    $("#displayBox").text(
      `(ID = ${data[0]}) and ( The Credit Limit of Customer Or Company with Name ${data[1]}) will be deleted !!!`
    );
    $("#deleteCreditLimitId").val(data[0]);
  });
});