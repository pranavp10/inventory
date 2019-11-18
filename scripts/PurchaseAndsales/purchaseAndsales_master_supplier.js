$("[data-mask]").inputmask();

$("#selectCity").select2();
$("#state").select2();

$("#state").on("change", function() {
  var state = $(this).val();
  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      'state': state
    },
    url: "../../../pages/PurchaseAndsales/master/get_city.php",
    success: function(response) {
      var cityNames = JSON.parse(response);
      var display = "";
      var citySize = cityNames.length;
      for (let i = 0; i < citySize; i++) {
        display += `<option value="${cityNames[i].city}">${cityNames[i].city}</option>`;
      }
      $("#selectCity").empty();
      $("#selectCity").append('<option value="-select-">-select-</option>');
      $("#selectCity").append(display);
    }
  });
});

$.ajax({
  //create an ajax request to display.php
  type: "POST",
  url: "../../../pages/PurchaseAndsales/master/get_supplier_id.php",
  success: function(response) {
    var id = JSON.parse(response);
    id = +id + 1;
    $("#supplierId").val(`SUP-${id}`);
  }
});

$(document).ready(function() {
  $(".deleteSupplier").on("click", function() {
    $("#deleteSupplier").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();
    $("#displayBox").text(
      `(ID = ${data[0]}) and (Supplier Or Company with Name ${data[1]}) will be deleted !!!`
    );
    $("#deleteSupplierId").val(data[0]);
  });
});
$(document).ready(function() {
  $(".editSupplier").on("click", function() {
    $("#editSupplier").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();

    $("#editSupplierId").val(data[0]);
    $("#editGstin").val(data[1]);
    $("#editSupplierName").val(data[2]);

    var creatStateOption = $("<option selected></option>")
      .val(data[3])
      .text(`${data[3]}`);
    $(`#editState option[value='${data[3]}']`).remove();
    $("#editState").append(creatStateOption);
    $("#editState")
      .select2()
      .trigger("change");

    $("#editCityPinCode").val(+data[5]);
    $("#editSupplierNumber").val(data[6]);
    $("#editSupplierEmail").val(data[7]);
    $("#editSupplierAddress").val(data[8]);
    $.ajax({
      //create an ajax request to display.php
      type: "POST",
      data: {
        'state': data[3]
      },
      url: "../../../pages/PurchaseAndsales/master/get_city.php",
      success: function(response) {
        var cityNames = JSON.parse(response);

        var display = "";
        var citySize = cityNames.length;
        for (let i = 0; i < citySize; i++) {
          display += `<option value="${cityNames[i].city}">${cityNames[i].city}</option>`;
        }
        $("#editSelectCity").empty();
        $("#editSelectCity").append(
          '<option value="-select-">-select-</option>'
        );
        $("#editSelectCity").append(display);
        var creatCityOption = $("<option selected></option>")
          .val(data[4])
          .text(`${data[4]}`);
        $(`#editSelectCity option[value='${data[4]}']`).remove();
        $("#editSelectCity").append(creatCityOption);
        $("#editSelectCity")
          .select2()
          .trigger("change");
      }
    });
  });
});
$("#editState").on("change", function() {
    var state = $(this).val();
    $.ajax({
      //create an ajax request to display.php
      type: "POST",
      data: {
        'state': state
      },
      url: "../../../pages/PurchaseAndsales/master/get_city.php",
      success: function(response) {
        var cityNames = JSON.parse(response);
        var display = "";
        var citySize = cityNames.length;
        for (let i = 0; i < citySize; i++) {
          display += `<option value="${cityNames[i].city}">${cityNames[i].city}</option>`;
        }
        $("#editSelectCity").empty();
        $("#editSelectCity").append('<option value="-select-">-select-</option>');
        $("#editSelectCity").append(display);
      }
    });
  });
  
  $('#customerTable').DataTable()