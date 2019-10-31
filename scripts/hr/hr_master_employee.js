$(document).ready(function() {
  $(".deleteDesignation").on("click", function() {
    $("#deleteDesignation").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();
    $("#displayBox").text(
      `(ID = ${data[0]}) and (Designation = ${data[1]}) will be deleted !!!`
    );
    $("#deleteId").val(data[0]);
  });
});
$(document).ready(function() {
  $(".editDesignation").on("click", function() {
    $("#editDesignation").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();

    $("#editDesignationId").val(data[0]);
    $("#editDesignationName").val(data[1]);
  });
});
function addDesignation() {
  $employeeId = $("#employeeId");

  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    url: "../../../pages/hr/master/get_employee_id.php",
    success: function(response) {
      var id = JSON.parse(response);
      id = +id + 1;
      $employeeId.val(`EMP-${id}`);
    }
  });
}

$(document).ready(function() {
  $("#designationTable").DataTable();
});
