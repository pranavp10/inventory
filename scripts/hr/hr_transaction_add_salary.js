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
        <th><input type="checkbox" id="selectAll"></th>                                            
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
                console.log(dataList);
                var displayHidden = '<tr>';
                var dataListLength = dataList.length;
                for(let i = 0; i<dataListLength; i++){
                    displayHidden +=`<td><input type="checkbox" name="select[]" value='${i}' class="selectAll" id='${i}' ></td>`;
                    displayHidden += `<td hidden><input style="background-color: transparent; border: transparent;" type="text" name="parameterID[]" value="${dataList[i].parameterID}" class="form-control" readonly required></td>`;
                    displayHidden +=`<td hidden><input style="background-color: transparent; border: transparent;" type="text" name="empID[]" value="${dataList[i].empId}" class="form-control" readonly required></td>`;
                    displayHidden +=`<td hidden><input style="background-color: transparent; border: transparent;" type="text" name="date[]" value="${year}-${month}-01" class="form-control" readonly required></td>`;
                    displayHidden +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="employeeName[]" value="${dataList[i].name}" class="form-control" readonly required></td>`;
                    displayHidden +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="employeeDesignation[]" value="${dataList[i].designation}" class="form-control" readonly required></td>`;
                    displayHidden +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="BasicSalary[]" value="${dataList[i].basicSalary}" class="form-control" readonly required></td>`;
                    
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
                    displayHidden +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="allowance[]" value="${Allowance}" class="form-control" readonly required></td>`;
                    displayHidden +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="deductions[]" value="${Deductions}" class="form-control" readonly required></td>`;
                    displayHidden +=`<td><input style="background-color: transparent; border: transparent;" type="text" name="netSalary[]" value="${Allowance+(+dataList[i].basicSalary)+Deductions}" class="form-control" readonly required></td>`;
                    displayHidden +='</tr>'
                }
                $("table tbody").append(displayHidden);
                $('#saveSalary').attr("disabled", false);
            } else {
                var displayNothing = `<tr class='text-center' ><td colspan="8"> NO Data at this date</td></tr>`;
                $("table tbody").append(displayNothing);
            }
        }
    });
}

$(document).on("click", '#selectAll', function (){
    if($('#selectAll').is(':checked')){

        $(".selectAll").prop('checked', true);
        // $(".selectAll").val(1);
    }else{
        $(".selectAll").prop('checked', false);
        // $(".selectAll").val(0);
    }
});



// $(document).on("click", '.selectAll', function (){
//     $(this).each(function(){
//         if(this.checked){
//             // $(this).val(1);
//             console.log(this.value);            
//         }else{
//             $(this).val(0);
//             // console.log(this.value);
//         }
//     })
// });