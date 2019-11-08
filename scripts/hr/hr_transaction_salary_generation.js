$('.input-group.date').datepicker({
    format: "mm-yyyy",
    viewMode: "months",
    minViewMode: "months"
});

function addParameters() {
    $parametersId = $("#parametersId");

    $.ajax({
        //create an ajax request to display.php
        type: "POST",
        url: "../../../pages/hr/master/get_parameter_id.php",
        success: function (response) {
            var id = JSON.parse(response);
            id = +id + 1;
            $parametersId.val(`PMI-${id}`);
        }
    });
}


function checkValueInput() {
    if ($(`input[type='radio'][name=${this.id}]:checked`).val() == 'percentage') {
        if ($(this).val() > 100) {
            alert("No numbers above 100");
            $(this).val('0');
        }
    }
}

function checkValueRadio() {

    if ($(`#${this.name}`).val() > 100) {
        alert("No numbers above 100");
        $(`#${this.name}`).val('0');
    }
}
$('#hra').keyup(checkValueInput).keyup();
$('#medical').keyup(checkValueInput).keyup();
$('#transportation').keyup(checkValueInput).keyup();
$('#pf').keyup(checkValueInput).keyup();
$('#professionalTax').keyup(checkValueInput).keyup();

$('input[type=radio][name=hra]').change(checkValueRadio).change();
$('input[type=radio][name=medical]').change(checkValueRadio).change();
$('input[type=radio][name=transportation]').change(checkValueRadio).change();
$('input[type=radio][name=pf]').change(checkValueRadio).change();
$('input[type=radio][name=professionalTax]').change(checkValueRadio).change();

$('#editHra').keyup(checkValueInput).keyup();
$('#editMedical').keyup(checkValueInput).keyup();
$('#editTransportation').keyup(checkValueInput).keyup();
$('#editPf').keyup(checkValueInput).keyup();
$('#editProfessionalTax').keyup(checkValueInput).keyup();

$('input[type=radio][name=editHra]').change(checkValueRadio).change();
$('input[type=radio][name=editMedical]').change(checkValueRadio).change();
$('input[type=radio][name=editTransportation]').change(checkValueRadio).change();
$('input[type=radio][name=editPf]').change(checkValueRadio).change();
$('input[type=radio][name=editProfessionalTax]').change(checkValueRadio).change();




$(document).ready(function () {
    $("#designationTable").DataTable();
});

function getYear() {
    var start = 1900;
    var end = new Date().getFullYear();
    var options = "";
    for (var year = end; year >= start; year--) {
        options += "<option value=" + year + ">" + year + "</option>";
    }
    document.getElementById("year").innerHTML = options;
}
getYear();

// ##############################for the get Parameters
function getParametersList() {
    // $("#parametersTable").empty();

    $('#parametersTable tr').remove();
    var showTableHeading = `
    <tr>
        <th>ID</th>
        <th>Designation</th>
        <th>Date</th>
        <th>Allowance</th>
        <th>Deductions</th>
        <th>Action</th>
    </tr>`;
    $("table thead").append(showTableHeading);
    var month = $('#month').val();
    var year = $('#year').val();
    var date = `${year}-${month}-01`;

    if (month != "all") {
        $.ajax({
            type: "POST",
            data: {
                'dateSend': date
            },
            url: "../../../pages/hr/master/get_parameter_list.php",
            success: function (response) {
                if (JSON.parse(response) != 'nothing') {
                    var dataList = JSON.parse(response);
                    var dataListLength = dataList.length;
                    var dataListLoop = dataListLength / 5;

                    for (let i = 0; i < dataListLoop; i++) {
                        var displayParameter = "";
                        var allowance = '<td>';
                        var deductions = '<td>';
                        displayParameter += `<tr class="parametersRow"><td>${dataList[i*4].parameterId}</td><td>${dataList[i+4].parameterDesignation}</td><td>${dataList[i+4].parameterDate}</td>`;
                        for (let j = 0; j < 5; j++) {
                            if (dataList[j].parameterType == "Allowance") {
                                var valueCheckAlo = (dataList[j].parameterValueType == "percentage" ? dataList[j].parameterValue + '%' : 'fLAT-Rs:' + dataList[j].parameterValue);
                                allowance += `${dataList[j].parameterName}:${valueCheckAlo},<br>`;
                            } else {
                                var valueCheckDed = (dataList[j].parameterValueType == "percentage" ? dataList[j].parameterValue + '%' : 'fLAT-Rs:' + dataList[j].parameterValue);
                                deductions += `${dataList[j].parameterName}:${valueCheckDed},<br>`;
                            }
                        }
                        allowance += '</td>';
                        deductions += '</td>';
                        displayParameter += allowance;
                        displayParameter += deductions;
                        displayParameter += `<td><p><button class="btn btn-primary btn-xs editParameter" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deleteParameter" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td>`;
                        $("table tbody").append(displayParameter);
                    }
                } else {
                    var displayNothing = `<tr class='text-center' ><td colspan="6"> NO Data at this date</td></td>`;
                    $("table tbody").append(displayNothing);
                }
            }
        });

    } else {
        $.ajax({
            type: "POST",
            data: {
                'dateSend': month
            },
            url: "../../../pages/hr/master/get_parameter_list.php",
            success: function (response) {
                if (JSON.parse(response) != 'nothing') {
                    var dataList = JSON.parse(response);
                    var dataListLength = dataList.length;
                    var dataListLoop = dataListLength / 5;
                    var DisplayLoopStart = 0;
                    var DisplayLoopEnd = 5;

                    for (let i = 0; i < dataListLoop; i++) {
                        var displayParameter = ``;
                        var allowance = '<td>';
                        var deductions = '<td>';
                        displayParameter += `<tr class="parametersRow"><td>${dataList[DisplayLoopStart].parameterId}</td><td>${dataList[DisplayLoopStart].parameterDesignation}</td><td>${dataList[DisplayLoopStart].parameterDate}</td>`;
                        for (let j = DisplayLoopStart; j < DisplayLoopEnd; j++) {
                            if (dataList[j].parameterType == "Allowance") {
                                var valueCheckAlo = (dataList[j].parameterValueType == "percentage" ? dataList[j].parameterValue + '%' : 'fLAT-Rs:' + dataList[j].parameterValue);
                                allowance += `${dataList[j].parameterName}:${valueCheckAlo},<br>`;
                            } else {
                                var valueCheckDed = (dataList[j].parameterValueType == "percentage" ? dataList[j].parameterValue + '%' : 'fLAT-Rs:' + dataList[j].parameterValue);
                                deductions += `${dataList[j].parameterName}:${valueCheckDed},<br>`;
                            }
                        }
                        DisplayLoopStart += 5;
                        DisplayLoopEnd += 5;
                        allowance += '</td>';
                        deductions += '</td>';
                        displayParameter += allowance;
                        displayParameter += deductions;
                        displayParameter += `<td><p><button class="btn btn-primary btn-xs editParameter" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deleteParameter" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td>`;
                        $("table tbody").append(displayParameter);
                    }
                } else {

                    var displayNothing = `<tr class='text-center' ><td colspan="6"> NO Data at this date</td></td>`;
                    $("table tbody").append(displayNothing);
                }
            }
        });
    }
}


$(document).on("click", '.editParameter', function () {
    $("#editParameter").modal("show");
    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    $("#editParametersId").val(data[0]);
    $("#editParametersDate").val(data[2]);
    $("#editDesignationId").val(data[1]);
    var editAllowance = data[3].split(',');
    var editDeductions = data[4].split(',');
    var editAllowanceDeduction = editAllowance.concat(editDeductions);

    function addValueToInput(number, nameAndId) {
        if (editAllowanceDeduction[number].includes('%')) {
            $(`input[type='radio'][name='${nameAndId}'][value='percentage']`).prop("checked", true);
            $(`#${nameAndId}`).val(+(editAllowanceDeduction[number].match(/\d+/g)));
        } else {
            $(`input[type='radio'][name='${nameAndId}'][value='flat']`).prop("checked", true);
            $(`#${nameAndId}`).val(+(editAllowanceDeduction[number].match(/\d+/g)));
        }
    }

    addValueToInput(0, 'editHra');
    addValueToInput(1, 'editMedical');
    addValueToInput(2, 'editTransportation');
    addValueToInput(4, 'editPf');
    addValueToInput(5, 'editProfessionalTax');
});



$(document).on("click", '.deleteParameter', function () {
    $("#deleteParameter").modal("show");
    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    $("#displayBox").text(
        `Parameter details of Designation-(${data[1].toUpperCase()}) will be DELETED!!!.`
    );
    $("#deleteParameterId").val(data[0]);
});

function designationCheckUsingSelect() {
    let inputDate = $('#dateSelect').val();
    if (inputDate != '') {
        let designation = $('#designationId').val();
        $.ajax({
            //create an ajax request to display.php
            type: "POST",
            data: {
                'date': `01-${inputDate}`,
                'designation': designation
            },
            url: "../../../pages/hr/master/check_perematers.php",
            success: function (response) {
                var check = JSON.parse(response);
                if (check == 'present') {
                    alert(`you have already created the Parameters for this Date 01-${inputDate}`);
                    $("select#designationId")[0].selectedIndex = 0;
                    $('#dateSelect').val('');
                }
            }
        });
    }

}

function designationCheckUsingDate() {
    let designation = $('#designationId').val();
    if (designation != '--select--') {
        let inputDate = $('#dateSelect').val();
        $.ajax({
            //create an ajax request to display.php
            type: "POST",
            data: {
                'date': `01-${inputDate}`,
                'designation': designation
            },
            url: "../../../pages/hr/master/check_perematers.php",
            success: function (response) {
                var check = JSON.parse(response);
                if (check == 'present') {
                    alert(`you have already created the Parameters for this Date 01-${inputDate}`);
                    $("select#designationId").prop('selectedIndex', 0);
                    $('#dateSelect').val('');
                }
            }
        });
    }

}