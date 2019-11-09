$(document).ready(function () {
    $("#salaryDisplay").DataTable();
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

function displaySalaryParametersList() {


    $("#salaryDisplay tr").remove();
    var showTableHeading = `
    <tr>
        <th>ID</th>
        <th> Employee Name</th>
        <th>Designation</th>
        <th>Salary Date</th>
        <th>Basic Salary</th>
        <th>Allowance</th>
        <th>Deductions</th>
        <th>Net Salary</th>
        <th>Action</th>
    </tr>`;
    $("table thead").append(showTableHeading);
    var month = $("#month").val();
    var year = $("#year").val();
    var date = `${year}-${month}-01`;

    $.ajax({
        type: "POST",
        data: {
            "dateSend": date
        },
        url: "../../../pages/hr/transaction/display_salary.php",
        success: function (response) {
            if (JSON.parse(response) != "noData") {
                var dataList = JSON.parse(response);
                console.log(dataList);
                var displayHidden = '<tr>';
                var dataListLength = dataList.length;
                for (let i = 0; i < dataListLength; i++) {
                    displayHidden += `<td>${dataList[i].id}</td>`;
                    displayHidden += `<td>${dataList[i].name}</td>`;
                    displayHidden += `<td>${dataList[i].designation}</td>`;
                    displayHidden += `<td>${dataList[i].date}</td>`;
                    displayHidden += `<td>${dataList[i].basicSalary}</td>`;

                    var parameter = dataList[i].parameter.split(',');
                    var parameterType = dataList[i].parType.split(',');
                    var valueType = dataList[i].valueType.split(',');
                    var value = dataList[i].value.split(',');
                    var Allowance = 0;
                    var Deductions = 0;
                    var allowanceDisplay = '<td>';
                    var deductionsDisplay = '<td>';
                    parameterTypeSize = parameterType.length;
                    for (let j = 0; j < parameterTypeSize; j++) {
                        if (parameter[j] == 'Transportation') {
                            if (parameterType[j] == 'Allowance') {
                                if (valueType[j] == 'percentage') {
                                    var percentageValue = Math.ceil((+value[j]) * (+dataList[i].basicSalary)) / 100;
                                    Allowance += (+percentageValue);
                                    allowanceDisplay += `Transportation: ${value[j]}% = ₹${percentageValue}<br>`
                                } else {
                                    Allowance += (+value[j]);
                                    allowanceDisplay += `Transportation: ₹${value[j]}<br>`
                                }
                            }
                        }
                        if (parameter[j] == 'Medical') {
                            if (parameterType[j] == 'Allowance') {
                                if (valueType[j] == 'percentage') {
                                    var percentageValue = Math.ceil((+value[j]) * (+dataList[i].basicSalary)) / 100;
                                    Allowance += (+percentageValue);
                                    allowanceDisplay += `Medical: ${value[j]}% = ₹${percentageValue}<br>`
                                } else {
                                    Allowance += (+value[j]);
                                    allowanceDisplay += `Medical: ₹${value[j]}<br>`
                                }
                            }
                        }
                        if (parameter[j] == 'HRA') {
                            if (parameterType[j] == 'Allowance') {
                                if (valueType[j] == 'percentage') {
                                    var percentageValue = Math.ceil((+value[j]) * (+dataList[i].basicSalary)) / 100;
                                    Allowance += (+percentageValue);
                                    allowanceDisplay += `HRA: ${value[j]}% = ₹${percentageValue}<br>`
                                } else {
                                    Allowance += (+value[j]);
                                    allowanceDisplay += `HRA: ₹-${value[j]}<br>`

                                }
                            }
                        }
                        if (parameter[j] == 'Professional Tax') {
                            if (parameterType[j] == 'Deductions') {
                                if (valueType[j] == 'percentage') {
                                    var percentageValue = Math.ceil(((+value[j]) * (+dataList[i].basicSalary)) / 100);
                                    Deductions -= percentageValue;
                                    deductionsDisplay += `Professional Tax: ${value[j]}% = ₹-${percentageValue}<br>`
                                } else {
                                    Deductions -= (value[j]);
                                    deductionsDisplay += `Professional Tax: ₹-${value[j]}<br>`

                                }
                            }
                        }
                        if (parameter[j] == 'PF') {
                            if (parameterType[j] == 'Deductions') {
                                var percentageValue = Math.ceil(((+value[j]) * (+dataList[i].basicSalary)) / 100);
                                Deductions -= percentageValue;
                                deductionsDisplay += `PF: ${value[j]}% = ₹-${percentageValue}<br>`
                            } else {
                                Deductions -= (value[j]);
                                deductionsDisplay += `PF: ₹-${value[j]}<br>`
                            }
                        }
                    }
                    displayHidden +=allowanceDisplay;
                    displayHidden += `Total = ₹ ${Allowance}</td>`;
                    displayHidden +=deductionsDisplay;
                    displayHidden += `Total = ₹ ${Deductions}</td>`;
                    displayHidden += `<td>Bs ${dataList[i].basicSalary}<br>Al ${Allowance}<br>De ${Deductions}<br>............<br>${Allowance+(+dataList[i].basicSalary)+Deductions}</td>`;
                    displayHidden +=`<td><button class="btn btn-danger btn-xs deleteSalary" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>`
                    displayHidden += '</tr>'
                }
                $("table tbody").append(displayHidden);
            } else {
                var displayNothing = `<tr class='text-center' ><td colspan="8"> NO Data at this date</td></tr>`;
                $("table tbody").append(displayNothing);
            }
        }
    });
}

$(document).on("click", '.deleteSalary', function () {
    $("#deleteSalary").modal("show");
    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    $("#displayBox").text(
        `Salary details of Employee -(${data[1].toUpperCase()}) will be DELETED!!!.`
    );
    $("#deleteSalaryId").val(data[0]);
});
