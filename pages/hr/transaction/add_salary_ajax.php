<?
session_start();
require '../../../connect.php';

if ($_POST['dateSend'] != NULL) {
    $data = $_POST['dateSend'];
    $sqlAddSalary = "SELECT emp.emp_first_name,emp.emp_last_name, emp.emp_basic_salary, des.description, GROUP_CONCAT(pa.parameters_type SEPARATOR ',') as par_type, GROUP_CONCAT(pa.parameter_value_type SEPARATOR ',') as par_value_type,GROUP_CONCAT(pa.parameter_value SEPARATOR ',') as par_value FROM employees_details emp INNER JOIN designation des ON emp.emp_designation = des.designation_id INNER JOIN parameters pa ON pa.designation_id= des.designation_id WHERE pa.parameter_date='$data' GROUP BY emp.emp_id";

    if ($rawData = $connect->query($sqlAddSalary)) {
        $checkData = mysqli_fetch_assoc($rawData);
        if ($checkData != NULL) {

            while ($extractDate = $rawData->fetch_assoc()) {
                $firstName = $extractDate['emp_first_name'];
                $lastName = $extractDate['emp_last_name'];

                $name = "$firstName $lastName";
                $addSalary[] = array("name" => $name, "designation" => $extractDate['description'], "basicSalary" => $extractDate['emp_basic_salary'], "parType" => $extractDate['par_type'], "valueType" => $extractDate['par_value_type'], "value" => $extractDate['par_value']);
            }
            echo (json_encode($addSalary));
        } else {
            echo json_encode('noData');
        }
    } else {
        echo json_encode('noData');
    }
} else {
    echo json_encode('noData');
}
?>