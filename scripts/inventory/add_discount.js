$("#betweenDate").daterangepicker({
  locale: {
    format: "DD/MM/YYYY"
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
      date: date
    },
    url: "../../../pages/Inventory/transaction/get_discount_id.php",
    success: function(response) {
      var id = JSON.parse(response);
      id = +id + 1;
      discountId.val(`DAF-${date}-${id}`);
    }
  });
}
getDiscountId();

function getItemList() {
  var catCode = $("#itemCategory").val();

  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data: {
      catCode: catCode
    },
    url: "../../../pages/Inventory/transaction/get_item.php",
    success: function(response) {
      var itemList = JSON.parse(response);
      var itemCode = itemList[0].itemCode.split(",");
      var item = itemList[0].item.split(",");
      var arraySize = itemCode.length;
      $("#itemCode").empty();
      $("#item").empty();
      $("#itemCode").append(`<option value="-select-">-select-</option>`);
      $("#item").append(`<option value="-select-">-select-</option>`);
      for (let i = 0; i < arraySize; i++) {
        $("#itemCode").append(
          `<option value="${itemCode[i]}">${itemCode[i]}</option>`
        );
        $("#item").append(`<option value="${itemCode[i]}">${item[i]}</option>`);
      }
    }
  });
}

function itemCategorySelect() {
  var itemCat = $("#itemCode").val();
  $("#item").val(itemCat);
}
function itemSelect() {
  var item = $("#item").val();
  $("#itemCode").val(item);
}

$("#tableData tbody").on("click", ".deleteRow", function() {
  $(this)
    .closest("tr")
    .remove();
});

function addNewRow(){
    var newRow = `                                            <tr>
    <td>1</td>
    <td> <select class="form-control itemCategory" name="itemCategory[]" id="itemCategory" onchange="getItemList()">
            <option value="-Select-">-Select-</option>
            <?
            $sqlDisplayItemCategory = "SELECT item_category_id,item_category_name FROM item_category";
            if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                while ($displayCat = $rawDate->fetch_assoc()) {
                    $itemCategoryId = $displayCat['item_category_id'];
                    $ItemCategory = $displayCat['item_category_name'];
                    ?>
                    <option value="<? echo $itemCategoryId ?>"><? echo $ItemCategory ?></option>
            <?
                }
            }
            ?>
        </select>
    </td>
    <td> <select class="form-control itemCode" name="itemCode[]" id="itemCode" onchange="itemCategorySelect()">
            <!-- <option selected="selected">Alabama</option> -->
            <option value="-Select-">-Select-</option>

        </select>
    </td>
    <td> <select class="form-control item" name="item[]" id="item" onchange="itemSelect()">
            <option value="-Select-">-Select-</option>
        </select>
    </td>
    <td>
        <div class="input-group">
            <input type="number" min='0' max='100' name="taxPercentage" class="form-control" id="taxPercentage" placeholder="Enter Percentage(%)" required>
            <div class="input-group-addon">
                <i class="fa fa-percent"></i>
            </div>
        </div>
    </td>
    <td>
        <div class="input-group">
            <input type="number" min='0' max='1000000' name="flat" class="form-control" id="flat" required>
            <div class="input-group-addon">
                <i class="fa fa-inr"></i>
            </div>
        </div>
    </td>
    <td>
        <div class="input-group">
            <input type="number" min='0' max='1000000' name="minAmount" class="form-control" id="minAmount" required>
            <div class="input-group-addon">
                <i class="fa fa-inr"></i>
            </div>
        </div>
    </td>
    <td><button class="btn btn-danger btn-xs deleteRow" disabled><span class="glyphicon glyphicon-trash"></span></button></p>
    </td>
</tr>`;
    $("#tableData tbody").append(newRow)
}

