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
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
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
      $("#paymentId").val(`PPAY-${financialYear}-${id}`);
      for (i = 0; i <= numberOfRows; i++) {
        displayPurchaseID(i);
      }
      $('.totalAmount').val("");
      $('.amountToPay').val("");
      $('.balance').val("");
      $('.remainingAmount').val("");
      getTotalAmount();
    }
  });
});


$("#paymentType").on("change", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  let paymentType = $(this).val();
  if (paymentType === "Cheque") {
    $('#checkNoDisplay').prop('hidden', false);
  } else {
    $('#checkNoDisplay').prop('hidden', true);
    $('#checkNo').val("");
  }
});

$("#supplierId").on("change", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $("#paymentDate").prop("disabled", false);
  
  let paymentDate = $("#paymentDate")
    .val()
  if ($(this).val() != "-Select-" && paymentDate !== '') {
    for (i = 0; i <= numberOfRows; i++) {
      displayPurchaseID(i);
    }
    $('.totalAmount').val("");
    getTotalAmount();
  } else {
    $('.totalAmount').val("");
  }
});

function displayRemainingAmount(){
  let supplierId = $("#supplierId").val();
  let paymentDate = $("#paymentDate").val();
  $.ajax({
    type: "POST",
    data: {
      'supplierId': supplierId,
      'paymentDate': paymentDate
    },
    url: "../../../pages/PurchaseAndsales/processing/get_purchase_payed_amount.php",
    success: function (response) {
      let totalAmountPayed = JSON.parse(response);
      if (totalAmountPayed !== "nothing") {
        let value = +totalAmountPayed[0].amountPayedTillNow
        $(`#totalAmountPayedToSupplier`).val(value.toFixed(2));
      } else {
        $(`#totalAmountPayedToSupplier`).val(0)
      }
    }
  });
}

function displayPurchaseID(id) {
  let supplierId = $("#supplierId").val();
  let paymentDate = $("#paymentDate").val();
  $.ajax({
    type: "POST",
    data: {
      'supplierId': supplierId,
      'paymentDate': paymentDate
    },
    url: "../../../pages/PurchaseAndsales/processing/get_purchase_id.php",
    success: function (response) {
      var customerId = JSON.parse(response);
      $(`#purchaseId${id}`).empty();
      $(`#purchaseId${id}`).append(
        `<option value="-Select-">-Select-</option>`
      );

      if (customerId !== "nothing") {
        let purchaseId1 =customerId.map(function (customerId){
          if(+customerId.payedPurchaseId > 0 ||customerId.payedPurchaseId == null){ 
            return customerId.purchaseId;
          }
        });
        purchaseId = purchaseId1.filter(function( element ) {
          return element !== undefined;
      });
        purchaseId.forEach(purchaseId => $(`#purchaseId${id}`).append(
          `<option value="${purchaseId}">${purchaseId}</option>`
          ));
          displayRemainingAmount();
      } else {
        $(`#totalAmountOfSupplier`).val("")
        displayMessage("No Purchase is done on of before the give date ");

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
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
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
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
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
  totalPayedAmount();
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
    $(`#amountToPay${onlyId[0]}`).val("");
    $(`#remainingAmount${onlyId[0]}`).val("");
    totalPayedAmount();
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
          $(`#totalAmount${id}`).val("");
          $(`#balance${id}`).val("");
          $(`#amountToPay${id}`).val("");
          $(`#remainingAmount${id}`).val("");
          totalPayedAmount();
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
      const [totalAmount, amountPaid] = [+amount.totalAmount, +amount.amountPaid];
      if (amount !== "nothing") {
        $(`#totalAmount${id}`).val(`${totalAmount.toFixed(2)}`);
        $(`#balance${id}`).val(`${amountPaid.toFixed(2)}`);
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
      let totalAmount = JSON.parse(response);
      if (totalAmount !== "nothing") {
        $(`#totalAmountOfSupplier`).val(`${parseFloat(totalAmount.totalAmountSupplier)}`);
      } else {
        displayMessage("No Purchase is done with the supplier")
      }
    }
  });
}
$(document).on("keyup", ".amountToPay", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $(this).each(function () {
    var inputId = this.id;
    var onlyId = inputId.match(/(\d+)/);
    AmountPayLessThenBalance(onlyId[0]);
    totalPayedAmount();
  });

});

function AmountPayLessThenBalance(id) {
  let balanceAmount = +$(`#balance${id}`).val();
  let inputAmount = +$(`#amountToPay${id}`).val();

  if (+inputAmount > +balanceAmount) {
    alert(`Amount cannot be grater then ${balanceAmount}`);
    $(`#amountToPay${id}`).val(0);
    $(`#remainingAmount${id}`).val(0);
  } else {
    remainingAmount(id);
  }
}

function remainingAmount(id) {
  let balanceAmount = +$(`#balance${id}`).val();
  let inputAmount = +$(`#amountToPay${id}`).val();
  $(`#remainingAmount${id}`).val((balanceAmount - inputAmount).toFixed(2));
}

function checkData() {
  let flag = false;
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  let supplierId = $("#supplierId").val();
  let paymentDate = $("#paymentDate").val();
  if (supplierId != "-Select-" && paymentDate != "") {
    for (let i = 0; i <= numberOfRows; i++) {
      let purchaseId = $(`#purchaseId${i}`).val();
      let amountToPay = $(`#amountToPay${i}`).val();

      if (purchaseId == "-Select-") {
        flag = false;
        displayMessage(`Select the Purchase Id in row ${i + 1}`);
        return false;
      } else {
        if (amountToPay == "" || amountToPay == "0") {
          flag = false;
          displayMessage(
            `Enter the amount to Pay in row  ${i + 1}`
          );
          return false;
        } else {
          flag = true;
        }
      }
    }
    if (flag === true) {
      $(`#readySubmitButton`).prop("disabled", false);
      $(`#submitButton`).prop("disabled", true);
    }
  } else {
    displayMessage("Enter the Sales date and Select the Supplier");
    return false;
  }
}

function totalPayedAmount() {
  let totalPayedAmount = $('#totalAmountOfSupplier').val();
  let totalAmountPayedBefore = $('#totalAmountPayedToSupplier').val();
  let totalInputAmount = 0;
  for (let i = 0; i <= numberOfRows; i++) {
    let inputAmount = +$(`#amountToPay${i}`).val();
    totalInputAmount += inputAmount;
  }
  let balance = (totalPayedAmount-totalInputAmount-totalAmountPayedBefore).toFixed(2);
  $('#totalAmountPayed').val(totalInputAmount);
  $('#remainingBalance').val(balance);
}