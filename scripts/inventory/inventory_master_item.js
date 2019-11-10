$(document).ready(function() {
    $(".deleteItem").on("click", function() {
      $("#deleteItem").modal("show");
  
      $tr = $(this).closest("tr");
      var data = $tr
        .children("td")
        .map(function() {
          return $(this).text();
        })
        .get();
      $("#displayBox").text(
        `(ID = ${data[0]}) and (Item Name = ${data[1]}) will be deleted !!!`
      );
      $("#deleteId").val(data[0]);
    });
  });

  $(document).ready(function() {
    $(".editItem").on("click", function() {
      $("#editItem").modal("show");
  
      $tr = $(this).closest("tr");
      var data = $tr
        .children("td")
        .map(function() {
          return $(this).text();
        })
        .get();
        $("#editItemId").val(data[0]);
      var value = $(`#editItemCategory option:contains("${data[1]}")`).val();
      var creatOption = $("<option selected></option>").val(value).text(`${data[1]}`);
      $(`#editItemCategory option[value='${value}']`).remove();
      $('#editItemCategory').append(creatOption);
      $('#editItemCategory').select2().trigger('change');
      $("#editItemName").val(data[2]);
    });
  });


  
  function addItem() {
    $itemId = $("#itemId");
  
    $.ajax({
      //create an ajax request to display.php
      type: "POST",
      url: "../../../pages/Inventory/master/get_item_id.php",
      success: function(response) {
        var id = JSON.parse(response);
        id = +id + 1;
        $itemId.val(`ITM-${id}`);
      }
    });
  }
  
  
  $('#ItemTable').DataTable()

  $('#itemCategory').select2()

  