<?
session_start();
require '../../../connect.php';

if ($_POST['dateSend'] != NULL) {
    $data = $_POST['dateSend'];
    $sqlDisplaySalary = "SELECT des.description,GROUP_CONCAT(pa.parameter_name SEPARATOR ',') as par_name, sal.`id`, sal.`salaryDate`, emp.emp_first_name, emp.emp_last_name, emp.emp_basic_salary, GROUP_CONCAT(pa.parameters_type SEPARATOR ',') as par_type, GROUP_CONCAT(pa.parameter_value_type SEPARATOR ',') as par_value_type,GROUP_CONCAT(pa.parameter_value SEPARATOR ',') as par_value FROM parameters as pa, `salary_generation` AS sal INNER JOIN employees_details AS emp  ON sal.`employee_id`=emp.emp_id INNER JOIN designation AS des ON des.designation_id = emp.emp_designation WHERE sal.`parameter_id`=pa.parameter_id AND sal.`salaryDate`='$data' GROUP BY sal.`id`";

    if ($rawData = $connect->query($sqlDisplaySalary)) {

        if (mysqli_num_rows($rawData)) {
            while ($extractDate = $rawData->fetch_assoc()) {
                $firstName = $extractDate['emp_first_name'];
                $lastName = $extractDate['emp_last_name'];
                $name = "$firstName $lastName";
                $displaySalary[] = array("parameter"=>$extractDate['par_name'],"date"=>$extractDate['salaryDate'],"id"=>$extractDate['id'],"name" => $name,"designation" => $extractDate['description'], "basicSalary" => $extractDate['emp_basic_salary'], "parType" => $extractDate['par_type'], "valueType" => $extractDate['par_value_type'], "value" => $extractDate['par_value']);
            }
            echo (json_encode($displaySalary));
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

