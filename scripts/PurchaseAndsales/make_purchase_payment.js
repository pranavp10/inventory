var numberOfRows = 0;
$("#paymentDate").datepicker({
  autoclose: true,
  format: "dd-mm-yyyy"
});
$(".select2").select2();

function isNumberKey(evt) {
  var charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}
$("#paymentDate").on("change", function () {
  let financialYear = "";
  let paymentDate = $(this)
    .val()
    .split("-");
  if (+paymentDate[1] > 3) {
    let presentYear = `${paymentDate[2][2]}${paymentDate[2][3]}`;
    let nextYear = `${+presentYear + 1}`;
    financialYear += presentYear + nextYear;

  } else {
    let presentYear = `${paymentDate[2][2]}${paymentDate[2][3]}`;
    let previousYear = `${+presentYear - 1}`;
    financialYear += previousYear + presentYear;
  }
  $.ajax({

    type: "POST",
    data: {
      'financialYear': financialYear
    },
    url: "../../../pages/PurchaseAndsales/processing/get_purchase_payment_id.php",
    success: function (response) {
      var id = JSON.parse(response);
      id = +id + 1;
      $("#purchaseId").val(`PPAY-${financialYear}-${id}`);
    }
  });
});


$("#paymentType").on("change", function () {
  let paymentType = $(this).val();
  if (paymentType === "Cheque") {
    $('#checkNoDisplay').prop('hidden', false);
  } else {
    $('#checkNoDisplay').prop('hidden', true);
    $('#checkNo').val("");
  }
});

$("#supplierId").on("change", function () {
  for (i = 0; i <= numberOfRows; i++) {
    displayPurchaseID(i);
  }
  getTotalAmount();
});

function displayPurchaseID(id) {
  let supplierId = $("#supplierId").val();
  $.ajax({
    type: "POST",
    data: {
      'supplierId': supplierId
    },
    url: "../../../pages/PurchaseAndsales/processing/get_purchase_id.php",
    success: function (response) {
      var customerId = JSON.parse(response);
      $(`#purchaseId${id}`).empty();
      $(`#purchaseId${id}`).append(
        `<option value="-Select-">-Select-</option>`
      );
      if (customerId !== "nothing") {
        customerId.forEach(customerId => $(`#purchaseId${id}`).append(
          `<option value="${customerId}">${customerId}</option>`
        ));
      } else {
        displayMessage("No Purchase is done with the supplier")
      }
    }
  });
}

function displayMessage(message) {
  $("#alert").show()
    .html(`<div id="alertInside"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> ${message} </strong></div>
    <script>setTimeout(fade_out, 90000);
    function fade_out() {
    $("#alertInside").fadeOut().empty();
    $('#alert').hide();
    }</script>`);
}


$("#newRow").on("click", function () {
  numberOfRows++;
  tr = `                                            <tr>
  <td id="${numberOfRows}">${numberOfRows + 1}</td>
  <td> <select class="form-control purchaseId" name="purchaseId[]" id="purchaseId${numberOfRows}">
          <option value="-Select-">-Select-</option>
      </select>
  </td>
  <td>
      <div class="input-group">
          <input style="background-color: transparent; border: transparent;" type="text" name="totalAmount[]" class="form-control totalAmount" id="totalAmount${numberOfRows}" readonly required>
      </div>
  </td>
  <td>
      <input style="background-color: transparent; border: transparent;" type="text" name="balance[]" class="form-control balance" id="balance${numberOfRows}" readonly required>
  </td>
  <td>
      <div class="input-group">
          <input type="text" name="amountToPay[]" onkeypress="return isNumberKey(event)" class="form-control amountToPay" id="amountToPay${numberOfRows}" required>
      </div>
  </td>
  <td>
      <input style="background-color: transparent; border: transparent;" type="text" name="remainingAmount[]" class="form-control remainingAmount" id="remainingAmount${numberOfRows}" readonly required>
  </td>
  <td><button class="btn btn-danger btn-xs deleteRow"><span class="glyphicon glyphicon-trash"></span></button></p>
  </td>
</tr>`;

  $("#tableData tbody").append(tr);
  displayPurchaseID(numberOfRows);
});

$("#tableData tbody").on("click", ".deleteRow", function () {
  var $tr = $(this).closest("tr");
  var data = $tr
    .children("td")
    .map(function () {
      return $(this).text();
    })
    .get();
  var deletedRowNumber = data[0] - 1;

  $(this)
    .closest("tr")
    .remove();
  for (let i = deletedRowNumber; i < numberOfRows; i++) {
    $(`#${i + 1}`).html(i + 1);
    $(`#${i + 1}`).attr("id", `${i}`);
    $(`#purchaseId${i + 1}`).attr("id", `purchaseId${i}`);
    $(`#totalAmount${i + 1}`).attr("id", `totalAmount${i}`);
    $(`#balance${i + 1}`).attr("id", `balance${i}`);
    $(`#amountToPay${i + 1}`).attr("id", `amountToPay${i}`);
    $(`#remainingAmount${i + 1}`).attr("id", `remainingAmount${i}`);

  }
  numberOfRows--;
});

$(document).on("change", ".purchaseId", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $(this).each(function () {
    var purchaseIdId = this.id;
    var onlyId = purchaseIdId.match(/(\d+)/);
    ValidatePurchaseId(onlyId[0]);
    getAmount(onlyId[0]);
  });
});


function ValidatePurchaseId(id) {
  let presentPurchaseId = $(`#purchaseId${id}`).val();

  for (let i = 0; i <= numberOfRows; i++) {
    let rowPurchase = $(`#purchaseId${i}`).val();
    if (i != id) {
      if (presentPurchaseId == rowPurchase) {
        let purchaseId = $(`#purchaseId${i}`).val();
        if (purchaseId == presentPurchaseId) {
          alert(`you cannot select the same Purchase Id ${$(`#purchaseId${id}`).val()}`);
          $(`select#purchaseId${id}`)[0].selectedIndex = 0;
        }
      }
    } else {
      continue;
    }
  }
}

function getAmount(id) {
  let presentPurchaseId = $(`#purchaseId${id}`).val();
  $.ajax({
    type: "POST",
    data: {
      'presentPurchaseId': presentPurchaseId
    },
    url: "../../../pages/PurchaseAndsales/processing/get_purchase_payment.php",
    success: function (response) {
      var amount = JSON.parse(response);

      if (amount !== "nothing") {
        $(`#totalAmount${id}`).val(`${amount.totalAmount}`)
      } else {
        displayMessage("No Purchase is done with the supplier")
      }
    }
  });
}

function getTotalAmount() {
  let supplierId = $(`#supplierId`).val();
  $.ajax({
    type: "POST",
    data: {
      'supplierId': supplierId
    },
    url: "../../../pages/PurchaseAndsales/processing/get_total_payment.php",
    success: function (response) {
      var totalAmount = JSON.parse(response);
      if (totalAmount !== "nothing") {
        $(`#totalAmountOfSupplier`).val(`${totalAmount.totalAmountSupplier}`)
      } else {
        displayMessage("No Purchase is done with the supplier")
      }
    }
  });
}
$(document).on("keyup", ".amountToPay", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $(this).each(function () {
    var inputId = this.id;
    var onlyId = inputId.match(/(\d+)/);
    AmountPayLessThenBalance(onlyId[0]);

  });

});

function AmountPayLessThenBalance(id) {
  let balanceAmount = +$(`#balance${id}`).val();
  let inputAmount = +$(`#amountToPay${id}`).val();

  if (+inputAmount > +balanceAmount) {
    alert(`Amount cannot be grater then ${balanceAmount}`);
    $(`#amountToPay${id}`).val(0);
  } else {
    remainingAmount(id);
  }
}

function remainingAmount(id) {
  let balanceAmount = +$(`#balance${id}`).val();
  let inputAmount = +$(`#amountToPay${id}`).val();

  $(`#remainingAmount${id}`).val(balanceAmount - inputAmount);
}