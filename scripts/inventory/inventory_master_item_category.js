$(document).ready(function() {
    $(".deleteItemCategory").on("click", function() {
      $("#deleteItemCategory").modal("show");
  
      $tr = $(this).closest("tr");
      var data = $tr
        .children("td")
        .map(function() {
          return $(this).text();
        })
        .get();
      $("#displayBox").text(
        `(ID = ${data[0]}) and (Item Category Name = ${data[1]}) will be deleted !!!`
      );
      $("#deleteId").val(data[0]);
    });
  });

  $(document).ready(function() {
    $(".editItemCategory").on("click", function() {
      $("#editItemCategory").modal("show");
  
      $tr = $(this).closest("tr");
      var data = $tr
        .children("td")
        .map(function() {
          return $(this).text();
        })
        .get();
  
      $("#editItemCategoryId").val(data[0]);
      $("#editItemCategoryName").val(data[1]);
    });
  });


  
  function addItemCategory() {
    $designationId = $("#itemCategoryId");
  
    $.ajax({
      //create an ajax request to display.php
      type: "POST",
      url: "../../../pages/Inventory/master/get_category_item_id.php",
      success: function(response) {
        var id = JSON.parse(response);
        id = +id + 1;
        $designationId.val(`CAT-${id}`);
      }
    });
  }
  
  
  $('#itemCategoryTable').DataTable()