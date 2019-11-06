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
            console.log(id);
            $parametersId.val(`PMI-${id}`);
        }
    });
}

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
    $("parametersRow").remove(); 
    var month = $('#month').val();
    var year = $('#year').val();
    var date = `${year}-${month}-01`;

    if (month != "all") {
        $.ajax({
            //create an ajax request to display.php
            type: "POST",
            data: {
                'dateSend': date
            },
            url: "../../../pages/hr/master/get_parameter_list.php",
            success: function (response) {
                var dataList = JSON.parse(response);
                var dataListLength = dataList.length;
                var dataListLoop = dataListLength / 5;

                for (let i = 0; i < dataListLoop; i++) {
                    var displayParameter = "";
                    var allowance = '<td>';
                    var deductions = '<td>';
                    displayParameter +=`<tr id="parametersRow"><td>${dataList[i*4].parameterId}</td><td>${dataList[i+4].parameterDesignation}</td><td>${dataList[i+4].parameterDate}</td>`;
                    for (let j = 0; j < 5; j++) {
                        if(dataList[j].parameterType == "Allowance")
                        {
                            var valueCheckAlo = (dataList[j].parameterValueType == "percentage" ?  dataList[j].parameterValue+'%' : 'fLAT-Rs:'+dataList[j].parameterValue);
                            allowance +=`${dataList[j].parameterName}:${valueCheckAlo}<br>`;
                        }else{
                            var valueCheckDed = (dataList[j].parameterValueType == "percentage" ?  dataList[j].parameterValue+'%' : 'fLAT-Rs:'+dataList[j].parameterValue);
                            deductions +=`${dataList[j].parameterName}:${valueCheckDed}<br>`;
                        }
                    }
                    allowance +='</td>';
                    deductions +='</td>';
                    displayParameter +=allowance;
                    displayParameter +=deductions;
                    displayParameter +=`<td><p><button class="btn btn-primary btn-xs editEmployee" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deleteEmployee" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td>`;
                    $("table tbody").append(displayParameter);
                }
            }
        });

    } else {

    }
}