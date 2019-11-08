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

function getSalaryParametersList() {


    $("#parametersTable tr").remove();
    var showTableHeading = `
    <tr>
        <th><input type="checkbox" name="selectAll" id="selectAll"></th>                                            
        <th>ID</th>
        <th>Employee Name</th>
        <th>Designation</th>
        <th>Basic Salary</th>
        <th>Allowance</th>
        <th>Deductions</th>
        <th>Net Salary</th>
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
        url: "../../../pages/hr/transaction/add_salary_ajax.php",
        success: function (response) {
            if (JSON.parse(response) != "noData") {
                var dataList = JSON.parse(response);
                var display = '<tr>';
                var dataListLength = dataList.length;
                for(let i = 0; i<dataListLength; i++){
                    display +=`<td><input type="checkbox" name="select[]" id="selectAll${i}"></td>`;
                    display +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="id[]" value="ASG-${month}${year[2]}${year[3]}-${i}" class="form-control" readonly required></td>`;
                    display +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="id[]" value="${dataList[i].name}" class="form-control" readonly required></td>`;
                    display +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="id[]" value="${dataList[i].designation}" class="form-control" readonly required></td>`;
                    display +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="id[]" value="${dataList[i].basicSalary}" class="form-control" readonly required></td>`;
                    
                    var parameterType = dataList[i].parType.split(',');
                    var valueType = dataList[i].valueType.split(',');
                    var value = dataList[i].value.split(',');
                    var Allowance = 0;
                    var Deductions = 0;

                    parameterTypeSize = parameterType.length;
                    for(let j=0; j<parameterTypeSize; j++){
                        if(parameterType[j] == 'Allowance'){                            
                            if(valueType[j] == 'percentage'){
                                var percentageValue =Math.ceil((+value[j])*(+dataList[i].basicSalary))/100;
                                Allowance += (+percentageValue);
                            }else{
                                Allowance += (+value[j]);
                            }
                        }else{
                            if(valueType[j] == 'percentage'){
                                var percentageValue =Math.ceil(((+value[j])*(+dataList[i].basicSalary))/100);
                                Deductions -=percentageValue;
                            }else{
                                Deductions -= (value[j]);
                            }
                        }
                    }
                    display +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="id[]" value="${Allowance}" class="form-control" readonly required></td>`;
                    display +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="id[]" value="${Deductions}" class="form-control" readonly required></td>`;
                    display +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="id[]" value="${Allowance+(+dataList[i].basicSalary)+Deductions}" class="form-control" readonly required></td>`;
                    display +='</tr>'
                }
                display +=`<tr class='text-center' ><td colspan="8"><button type="button" class="btn btn-alert">
                <strong><i class="fa fa-times"></i> Cancel</strong></button> <button type="submit" id="submitSalary" class="btn btn-primary">
                <strong> Submit</strong></button></td></tr>`;
                $("table tbody").append(display);

            } else {
                var displayNothing = `<tr class='text-center' ><td colspan="8"> NO Data at this date</td></tr>`;
                $("table tbody").append(displayNothing);
            }
        }
    });
}

$(document).on('submit');