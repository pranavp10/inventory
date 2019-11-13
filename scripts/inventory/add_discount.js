var numberOfRows = 0;

$("#betweenDate").daterangepicker({
  locale: {
    format: "DD-MM-YYYY"
  }
});

function getCurrentFiscalYear() {
  //get current date
  var today = new Date();
  //get current month
  var curMonth = today.getMonth();
  var fiscalYr = "";
  if (curMonth > 3) {
    //
    var nextYr1 = (today.getFullYear() + 1).toString();
    fiscalYr =
      today.getFullYear().toString() +
      "-" +
      nextYr1.charAt(2) +
      nextYr1.charAt(3);
  } else {
    var nextYr2 = today.getFullYear().toString();
    fiscalYr =
      (today.getFullYear() - 1).toString() +
      "-" +
      nextYr2.charAt(2) +
      nextYr2.charAt(3);
  }
  return fiscalYr;
}

function getDiscountId() {
  var discountId = $("#discountId");
  var fiscalYear = getCurrentFiscalYear().split("-");
  var date = `${fiscalYear[0][2]}${fiscalYear[0][3]}${fiscalYear[1]}`;
  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      "date": date
    },
    url: "../../../pages/Inventory/transaction/get_discount_id.php",
    success: function (response) {
      var id = JSON.parse(response);
      id = +id + 1;
      discountId.val(`DAF-${date}-${id}`);
    }
  });
}
getDiscountId();

function getItemList(id) {
  var catCode = $(`#itemCategory${id}`).val();

  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      'catCode': catCode
    },
    url: "../../../pages/Inventory/transaction/get_item.php",
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
        $(`#item${id}`).append(`<option value="${itemCode[i]}">${item[i]}</option>`);
      }
    }
  });
}

function itemCategorySelect(id) {
  var itemCat = $(`#itemCode${id}`).val();
  $(`#item${id}`).val(itemCat);
}

function itemSelect(id) {
  var item = $(`#item${id}`).val();
  $(`#itemCode${id}`).val(item);
}

$(document).on("change", '.itemCategory', function () {
  $(this).each(function () {
    var itemCategoryId = this.id;
    var onlyId = itemCategoryId.match(/(\d+)/);
    getItemList(onlyId[0]);
    $(`#itemCategory${onlyId[0]} option[value='-Select-']`).remove();
  })
});

$(document).on("change", '.itemCode', function () {
  $(this).each(function () {
    var itemCodeId = this.id;
    var onlyId = itemCodeId.match(/(\d+)/);
    itemCategorySelect(onlyId[0]);
    ValidateItem(onlyId[0]);
  })
});

$(document).on("change", '.item', function () {
  $(this).each(function () {
    var itemId = this.id;
    var onlyId = itemId.match(/(\d+)/);
    itemSelect(onlyId[0]);
    ValidateItem(onlyId[0]);
  })
});

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

function addNewRow() {
  numberOfRows++;
  var newRow = `                                            <tr>
    <td id='${numberOfRows}'>${numberOfRows+1}</td>
    <td> <select class="form-control itemCategory" name="itemCategory[]" id="itemCategory${numberOfRows}">

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
    <td>
        <label><input class="percent" type="radio" name="discountType${numberOfRows}" id="percent${numberOfRows}" value="percent" checked>Percent(%)</label>
        <label><input class="flat" type="radio" name="discountType${numberOfRows}" id="flat${numberOfRows}" value="flat">Flat</label>
    </td>
    <td>
        <div class="input-group">
            <input type="number" min='0' max='1000000' name="discountValue[]" class="form-control discountValue"  id="discountValue${numberOfRows}" required>
            <div class="input-group-addon">
                <i id="icon${numberOfRows}" class="fa fa-percent"></i>
            </div>
        </div>
    </td>
    <td>
        <div class="input-group">
            <input type="number" min='0' max='1000000' name="minAmount" class="form-control" value="0" id="minAmount${numberOfRows}" required>
            <div class="input-group-addon">
                <i class="fa fa-inr"></i>
            </div>
        </div>
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
      $(`#itemCategory${numberOfRows}`).append(`<option value="-Select-">-Select-</option>`);
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
    $(`#${i+1}`).html(i + 1);
    $(`#${i+1}`).attr('id', `${i}`);
    $(`#itemCategory${i+1}`).attr('id', `itemCategory${i}`);
    $(`#itemCode${i+1}`).attr('id', `itemCode${i}`);
    $(`#item${i+1}`).attr('id', `item${i}`);
    $(`#percent${i+1}`).attr('id', `percent${i}`).attr('name', `discountType${i}`);
    $(`#flat${i+1}`).attr('id', `flat${i}`).attr('name', `discountType${i}`);
    $(`#discountValue${i+1}`).attr('id', `discountValue${i}`);
    $(`#minAmount${i+1}`).attr('id', `minAmount${i}`);
    $(`#icon${i+1}`).attr('id', `icon${i}`);
  }
  numberOfRows--;

});

$(document).on("click", '.percent', function () {
  $(this).each(function () {
    var percentId = this.id;
    var onlyId = percentId.match(/(\d+)/);
    $(`#icon${onlyId[0]}`).removeClass("fa-inr");
    $(`#icon${onlyId[0]}`).addClass("fa-percent");
    checkValueInput(onlyId[0]);
  });
});


$(document).on("click", '.flat', function () {
  $(this).each(function () {
    var flatId = this.id;
    var onlyId = flatId.match(/(\d+)/);
    $(`#icon${onlyId[0]}`).removeClass("fa-percent");
    $(`#icon${onlyId[0]}`).addClass("fa-inr");
  });
});

$(document).on("keyup", '.discountValue', function () {
  $(this).each(function () {
    var inputId = this.id;
    var onlyId = inputId.match(/(\d+)/);
    var radioCheck = $(`input[type=radio][name=discountType${onlyId[0]}]:checked`).val();
    if (radioCheck == 'percent') {
      checkValueInput(onlyId[0]);
    }
  })
});

function checkValueInput(id) {
  if ($(`#discountValue${id}`).val() > 100) {
    alert("No numbers above 100");
    $(`#discountValue${id}`).val('0');
  }
}

function checkDiscountName() {
  var discountNameButton = $('#discountNameButton');
  var discountNameButtonIcon = $('#discountNameButtonIcon');
  var discountName = $('#discountName').val();
  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      "name": discountName
    },
    url: "../../../pages/Inventory/transaction/checkDiscountName.php",
    success: function (response) {
      var check = JSON.parse(response);
      if (check === 'yes') {
        discountNameButton.removeClass('btn-danger').addClass('btn-success').attr('disabled', true);
        discountNameButtonIcon.removeClass('fa-question-circle').addClass('fa-check');
        $('#discountName').attr('readonly', true);

      } else {

      }
    }
  });
}

function displayMessage(message) {
  $("#alert").show().html(`<div id="alertInside"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> ${message} </strong></div>
  <script>setTimeout(fade_out, 7000);
  function fade_out() {
  $("#alertInside").fadeOut().empty();
  $('#alert').hide();
  }</script>`)
}

function checkData() {
  var itemCategory = [];
  var itemCode = [];
  var discountName = $("#discountName").val();
  var betweenDate = $('#betweenDate').val();
  if ($('#discountName').is('[readonly]') && discountName != '' && $("#discountNameButton").hasClass('btn-success')) {


    for (let i = 0; i <= numberOfRows; i++) {
      var valueItemCategory = $(`#itemCategory${i}`).val();
      var valueItemCode = $(`#itemCode${i}`).val();
      var valueItemCode = $(`#itemCode${i}`).val();
      var discountValue = $(`#discountValue${i}`).val();

      if (valueItemCategory == '-Select-') {
        displayMessage(`Select the Item Category in Serial Number ${i}`);
        return false;
      } else {
        if (valueItemCode == '-Select-') {
          displayMessage(`Select the Item in Serial Number ${i}`);
          return false;
        } else {
          if (discountValue == '') {
            displayMessage(`Enter the Discount Value in Serial Number ${i}`);
            return false;
          } else {
            itemCategory.push(valueItemCategory);
            itemCode.push(valueItemCode);
          }
        }
      }
    }
    $.ajax({
      //create an ajax request to display.php
      type: "POST",
      data: {
        "betweenDate": betweenDate,"itemCategory":itemCategory,"itemCode":itemCode
      },
      url: "../../../pages/Inventory/transaction/chackDiscountList.php",
      success: function (response) {
        var list = JSON.parse(response);
        var listLength = list.length;
        for(let i=0; i<listLength; i++){
          if(list[i].value == "yes"){
            displayMessage(`The Serial Number ${i} Item is already under the offer for the given Date `);
          return false;
          }else{
            $('#submitButton').removeClass('btn-danger').addClass('btn-success').prop('type', 'submit').attr("onclick", "").html(`Submit<i class="fa fa-check"></i>`);
            
          }
        }
      }
    });


  } else {
    displayMessage('Enter Discount Name and check Availability');
    return false;
  }
}

