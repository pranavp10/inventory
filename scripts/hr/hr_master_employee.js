$(document).ready(function() {
  $(".deleteEmployee").on("click", function() {
    $("#deleteEmployee").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();
    $("#displayBox").text(
      `Employee details of (${data[1].toUpperCase()}) will be DELETED!!!.`
    );
    $("#deleteEmployeeId").val(data[0]);
  });
});

$(document).ready(function() {
  $(".editEmployee").on("click", function() {
    $("#editEmployee").modal("show");
    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();
      var name = data[1].split(' ');

    $("#updateEmployeeId").val(data[0]);
    $("#updateEmployeeFirstName").val(name[0]);
    $("#updateEmployeeLastName").val(name[1]);
    $("#updateEmployeeEmail").val(data[2]);
    isoDateDob = data[5].split("-").reverse().join("-");
    $("#updateEmployeeDOB").val(isoDateDob);
    $(`#updateEmployeeDesignation option:contains(${data[3]})`).attr('selected', 'selected');
    $(`#updateEmployeeGender option[value="${data[4]}"]`).prop('selected', true);
    $("#updateEmployeeBasicSalary").val(+data[8]);
    isoDateJoining = data[7].split("-").reverse().join("-");
    $("#updateEmployeeDOJoining").val(isoDateJoining);
    $("textarea#updateEmployeeAddress").val(data[6]);
  });
});

function addEmployee() {
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
