var numberOfRows = 0;
$(".select2").select2();

$("#salesDate").datepicker({
  autoclose: true,
  format: "dd-mm-yyyy"
});

$("#salesDate").on("change", function () {
  let financialYear = "";
  let salesDate = $(this)
    .val()
    .split("-");
  if (+salesDate[1] > 3) {
    let presentYear = `${salesDate[2][2]}${salesDate[2][3]}`;
    let nextYear = `${+presentYear + 1}`;
    financialYear += presentYear + nextYear;

  } else {
    let presentYear = `${salesDate[2][2]}${salesDate[2][3]}`;
    let previousYear = `${+presentYear - 1}`;
    financialYear += previousYear + presentYear;
  }
  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      'financialYear': financialYear
    },
    url: "../../../pages/PurchaseAndsales/transaction/get_sales_id.php",
    success: function (response) {
      var id = JSON.parse(response);
      id = +id + 1;
      $("#salesId").val(`STNO-${financialYear}-${id}`);
    }
  });

  $(".tax").val('');
  $(".remainingQuantity").val('');
  $(".itemType").val('');
  $(".itemType").val('');
  for(let i= 0; i<=numberOfRows; i++){
  $(`select#itemCode${i}`)[0].selectedIndex = 0;
  $(`select#item${i}`)[0].selectedIndex = 0;
  }
});

function isNumberKey(evt) {
  var charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
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

function addNewRow() {
  numberOfRows++;
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  var newRow = `<tr>
  <td id='${numberOfRows}'>${numberOfRows + 1}</td>
  <td><select class="form-control itemCategory" name="itemCategory[]" id="itemCategory${numberOfRows}">
          <option value="-Select-">-Select-</option>
      </select>
  </td>
  <td> <select class="form-control itemCode" name="itemCode[]" id="itemCode${numberOfRows}">
          <!-- <option selected="selected">Alabama</option> -->
          <option value="-Select-">-Select-</option>

      </select>
  </td>
  <td> <select class="form-control item" name="item[]" id="item${numberOfRows}">
          <option value="-Select-">-Select-</option>
      </select>
  </td>
  <td><div class="input-group">
  <input style="background-color: transparent; border: transparent;" type="text" name="tax[]" class="form-control tax" id="tax${numberOfRows}" readonly required>
  </div>
  </td>
  <td>
      <div class="input-group">
          <input type="text" onkeypress="return isNumberKey(event)" name="quantity[]" class="form-control quantity" id="quantity${numberOfRows}" disabled required>
      </div>
  </td>
  <td>
  <div class="input-group">
      <input style="background-color: transparent; border: transparent;" type="text" name="remainingQuantity[]" class="form-control remainingQuantity" id="remainingQuantity${numberOfRows}" readonly required>
  </div>
</td>
  <td>
      <input style="background-color: transparent; border: transparent;" type="text" name="itemType[]" class="form-control itemType" id="itemType${numberOfRows}" readonly required>
  </td>
  <td>
      <div class="input-group">
          <input type="text"  name="pricePerUnit[]" onkeypress="return isNumberKey(event)" class="form-control pricePerUnit" id="pricePerUnit${numberOfRows}" disabled required>
      </div>
  </td>
  <td>
      <input style="background-color: transparent; border: transparent;" type="text" name="totalAmount[]" class="form-control totalAmount" id="totalAmount${numberOfRows}" readonly required>

  </td>
  <td>
      <input style="background-color: transparent; border: transparent;" type="text" name="totalAmountWithTax[]" class="form-control totalAmountWithTax" id="totalAmountWithTax${numberOfRows}" readonly required>

  </td>
  <td><button class="btn btn-danger btn-xs deleteRow"><span class="glyphicon glyphicon-trash"></span></button></p>
  </td>
</tr>`;
  $("#tableData tbody").append(newRow);
  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    url: "../../../pages/Inventory/transaction/get_item_category.php",
    success: function (response) {
      var itemCatList = JSON.parse(response);
      var catId = itemCatList[0].catId.split(",");
      var catName = itemCatList[0].catName.split(",");
      var arraySize = catId.length;
      $(`#itemCategory${numberOfRows}`).empty();
      $(`#itemCategory${numberOfRows}`).append(
        `<option value="-Select-">-Select-</option>`
      );
      for (let i = 0; i < arraySize; i++) {
        $(`#itemCategory${numberOfRows}`).append(
          `<option value="${catId[i]}">${catName[i]}</option>`
        );
      }
    }
  });
}

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
    $(`#itemCategory${i + 1}`).attr("id", `itemCategory${i}`);
    $(`#itemCode${i + 1}`).attr("id", `itemCode${i}`);
    $(`#item${i + 1}`).attr("id", `item${i}`);
    $(`#tax${i + 1}`).attr("id", `tax${i}`);
    $(`#quantity${i + 1}`).attr("id", `quantity${i}`);
    $(`#remainingQuantity${i + 1}`).attr("id", `remainingQuantity${i}`);
    $(`#itemType${i + 1}`).attr("id", `itemType${i}`);
    $(`#pricePerUnit${i + 1}`).attr("id", `pricePerUnit${i}`);
    $(`#totalAmount${i + 1}`).attr("id", `totalAmount${i}`);
    $(`#totalAmountWithTax${i + 1}`).attr("id", `totalAmountWithTax${i}`);
  }
  numberOfRows--;
  totalQuantityOfSales();
  totalAmountOfSales();
  totalAmountWithTaxOfSales();
});

function getItemList(id) {
  var catCode = $(`#itemCategory${id}`).val();

  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      catCode: catCode
    },
    url: "../../../pages/PurchaseAndsales/transaction/get_item.php",
    success: function (response) {
      var itemList = JSON.parse(response);
      var itemCode = itemList[0].itemCode.split(",");
      var item = itemList[0].item.split(",");
      var arraySize = itemCode.length;
      $(`#itemCode${id}`).empty();
      $(`#item${id}`).empty();
      $(`#itemCode${id}`).append(`<option value="-Select-">-Select-</option>`);
      $(`#item${id}`).append(`<option value="-Select-">-Select-</option>`);
      for (let i = 0; i < arraySize; i++) {
        $(`#itemCode${id}`).append(
          `<option value="${itemCode[i]}">${itemCode[i]}</option>`
        );
        $(`#item${id}`).append(
          `<option value="${itemCode[i]}">${item[i]}</option>`
        );
      }
    }
  });
}

$(document).on("change", ".itemCategory", function () {
  $(document).on("click", "#submitButton", function () {
    $(`#readySubmitButton`).prop("disabled", true);
    $(`#submitButton`).prop("disabled", false);
  });
  $(this).each(function () {
    var itemCategoryId = this.id;
    var onlyId = itemCategoryId.match(/(\d+)/);
    getItemList(onlyId[0]);
  });
});

$(document).on("change", ".itemCode", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $(this).each(function () {
    var itemCodeId = this.id;
    var onlyId = itemCodeId.match(/(\d+)/);
    itemCategorySelect(onlyId[0]);
    ValidateItem(onlyId[0]);
    stockDisplay(onlyId[0]);
    taxAndItemType(onlyId[0]);

  });
});

$(document).on("change", ".item", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $(this).each(function () {
    var itemId = this.id;
    var onlyId = itemId.match(/(\d+)/);
    itemSelect(onlyId[0]);
    ValidateItem(onlyId[0]);
    stockDisplay(onlyId[0]);
    taxAndItemType(onlyId[0]);
  });
});

function itemCategorySelect(id) {
  var itemCat = $(`#itemCode${id}`).val();
  $(`#item${id}`).val(itemCat);
}

function itemSelect(id) {
  var item = $(`#item${id}`).val();
  $(`#itemCode${id}`).val(item);
}

function taxAndItemType(id) {
  var item = $(`#item${id}`).val();
  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      "item": item
    },
    url: "../../../pages/PurchaseAndsales/transaction/get_taxAndItemType.php",
    success: function (response) {
      if (JSON.parse(response) == "nothing") {
        $(`#tax${id}`).val(null);
        $(`#itemType${id}`).val(null);
        $(`#quantity${id}`).prop("disabled", true);
        $(`#pricePerUnit${id}`).prop("disabled", true);
      } else {
        var taxAndItemType = JSON.parse(response);
        $(`#tax${id}`).val(`${taxAndItemType[0].tax}%`);
        $(`#itemType${id}`).val(taxAndItemType[0].itemType);
        $(`#quantity${id}`).prop("disabled", false);
        $(`#pricePerUnit${id}`).prop("disabled", false);
      }
    }
  });
}

function ValidateItem(id) {
  let presentCatRow = $(`#itemCategory${id}`).val();
  let presentItemCode = $(`#itemCode${id}`).val();

  for (let i = 0; i <= numberOfRows; i++) {
    let catRows = $(`#itemCategory${i}`).val();
    if (i != id) {
      if (presentCatRow == catRows) {
        let itemCode = $(`#itemCode${i}`).val();
        if (itemCode == presentItemCode) {
          alert(`you cannot select the same item ${$(`#item${id}`).val()}`);
          $(`select#itemCode${id}`)[0].selectedIndex = 0;
          $(`select#item${id}`)[0].selectedIndex = 0;
        }
      }
    } else {
      continue;
    }
  }
}

$(document).on("keyup", ".quantity", function () {
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  $(this).each(function () {
    var inputId = this.id;
    var onlyId = inputId.match(/(\d+)/);
    var percent = $(`#tax${onlyId[0]}`)
      .val()
      .split("%");
    amount(onlyId[0], percent[0]);
    checkQuantity(onlyId[0]);
    totalQuantityOfSales();
    totalAmountOfSales();
    totalAmountWithTaxOfSales();
  });
});

$(document).on("keyup", ".pricePerUnit", function () {
  $(this).each(function () {
    var inputId = this.id;
    var onlyId = inputId.match(/(\d+)/);
    var percent = $(`#tax${onlyId[0]}`)
      .val()
      .split("%");
    amount(onlyId[0], percent[0]);
    $(`#readySubmitButton`).prop("disabled", true);
    $(`#submitButton`).prop("disabled", false);
    totalAmountOfSales();
    totalAmountWithTaxOfSales();
  });
});

function amount(id, taxPercent) {
  var quantity = $(`#quantity${id}`).val();
  var pricePerUnit = $(`#pricePerUnit${id}`).val();
  var totalAmount = $(`#totalAmount${id}`);
  var totalAmountWithTax = $(`#totalAmountWithTax${id}`);

  if (pricePerUnit != "" || quantity != "") {
    totalAmount.val((+quantity * +pricePerUnit).toFixed(2));
    var percentValue = +(+totalAmount.val() * +taxPercent) / 100;
    totalAmountWithTax.val((percentValue + +totalAmount.val()).toFixed(2));
  }
}

function totalQuantityOfSales() {
  let totalQuantityOfSales = 0;
  for (let i = 0; i <= numberOfRows; i++) {
    let rowQuantity = $(`#quantity${i}`).val();
    totalQuantityOfSales += (+rowQuantity);
  }
  $('#totalQuantityOfSales').val(totalQuantityOfSales);
}

function totalAmountOfSales() {
  let totalAmountOfSales = 0;
  for (let i = 0; i <= numberOfRows; i++) {
    let rowAmount = $(`#totalAmount${i}`).val();
    totalAmountOfSales += (+rowAmount);
  }
  $('#totalAmountOfSales').val(totalAmountOfSales.toFixed(2));
}

function totalAmountWithTaxOfSales() {
  let totalAmountWithTaxOfSales = 0;
  for (let i = 0; i <= numberOfRows; i++) {
    let rowAmount = $(`#totalAmountWithTax${i}`).val();
    totalAmountWithTaxOfSales += (+rowAmount);
  }
  $('#totalAmountWithTaxOfSales').val(totalAmountWithTaxOfSales.toFixed(2));
}


function checkData() {
  let flag = false;
  $(`#readySubmitButton`).prop("disabled", true);
  $(`#submitButton`).prop("disabled", false);
  let supplierId = $("#supplierId").val();
  let salesDate = $("#salesDate").val();
  if (supplierId != "-Select-" && salesDate != "") {
    for (let i = 0; i <= numberOfRows; i++) {
      let valueItemCategory = $(`#itemCategory${i}`).val();
      let valueItemCode = $(`#itemCode${i}`).val();
      let quantity = $(`#quantity${i}`).val();
      let pricePerUnit = $(`#pricePerUnit${i}`).val();

      if (valueItemCategory == "-Select-") {
        flag = false;
        displayMessage(`Select the Item Category in Serial Number ${i + 1}`);
        return false;
      } else {
        if (valueItemCode == "-Select-") {
          flag = false;
          displayMessage(`Select the Item in Serial Number ${i + 1}`);
          return false;
        } else {
          if (quantity == "") {
            flag = false;
            displayMessage(
              `Enter the Quantity Value in Serial Number ${i + 1}`
            );
            return false;
          } else {
            if (pricePerUnit == "") {
              flag = false;
              displayMessage(
                `Enter the Price Per Unit Value in Serial Number ${i + 1}`
              );
              return false;
            } else {
              flag = true;
            }
          }
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

function stockDisplay(id) {
  var date = $('#salesDate').val();
  var item = $(`#item${id}`).val();
  if (date != "" && item != "-Select-") {
    $.ajax({
      //create an ajax request to display.php
      type: "POST",
      data: {
        "item": item,
        "date": date
      },
      url: "../../../pages/PurchaseAndsales/transaction/stock_check.php",
      success: function (response) {
        let remainingQuantity = JSON.parse(response)
        if (remainingQuantity != 'nothing') {
          $(`#remainingQuantity${id}`).val(remainingQuantity);
        } else {
          $(`#remainingQuantity${id}`).val(0);
        }
      }
    });
  } else {
    alert("Enter the sales Date");
    $(`select#itemCode${id}`).prop('selectedIndex', 0);
    $(`select#item${id}`).prop('selectedIndex', 0);
  }
}

function checkQuantity(id) {
  let remainingQuantity = +$(`#remainingQuantity${id}`).val();
  let inputQuantity = +$(`#quantity${id}`).val();
  if (+inputQuantity <= +remainingQuantity) {} else {
    $(`#quantity${id}`).val(0);
    alert(`The remaining stock is only  ${remainingQuantity} `);
  }
}